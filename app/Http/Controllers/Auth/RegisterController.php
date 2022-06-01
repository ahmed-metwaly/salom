<?php

namespace App\Http\Controllers\Auth;

use App\City;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function chooseRegistrationType() {

        return view('web.auth.register_type');
    }

    public function showRegistrationForm() {

        session(['user_type' => 'user']);

        return view('web.auth.register_user');
    }

    public function showCompanyRegistrationForm() {

        session(['user_type' => 'company']);

        $cities = City::select('id', 'city')->get();

        return view('web.auth.register_company', compact('cities'));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $user->remember_token = $user->id . md5(csrf_token());
        $user->save();

        $sent = $this->senEmail($user->email, $user->id);

        if( $sent ){
            return redirect()->route('home')->with('new_user', trans('messages.emailSendTrue'));
        }

        return redirect()->route('home')->with('new_user', trans('messages.emailSendFalse'));

//        $this->guard()->login($user);
//
//        return $this->registered($request, $user)
//            ?: redirect($this->redirectPath());
    }

    public function registerCompany(Request $request) {

        $this->companyValidator($request->all())->validate();

        event(new Registered($user = $this->createCompany($request->all())));

        $siteData = Controller::getSiteData();


        $vars = [
            'from' => $siteData['site_email'],
            'messagesTitle' => 'موقع '. $siteData['site_name'],
            'to' => $user->email,
            'fromName' => $siteData['site_name'],
            'subject' => 'تفعيل حسابك في '. $siteData['site_name'],
            'token' => $user->id . md5(csrf_token())
        ];
        //$mailed = true;
        
        
       //$mailed = sendEmail('web.emails.user_activate', $vars);
       
       $mailed = mail($user->email, 'تفعيل حسابك في '. $siteData['site_name'] ,
       $user->id . md5(csrf_token()));

        if( $mailed ){

            $user->remember_token = $user->id . md5(csrf_token());
            $user->save();

            return redirect()->route('home')->with('new_user', trans('messages.emailSendTrue'));
        }

        return redirect()->route('home')->with('new_user', trans('messages.emailSendFalse'));

    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|max:10|unique:users|regex:/(05)[0-9]{8}/',
            'image' => 'required|mimes:jpg,jpeg,png,tiff',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function companyValidator(array $data) {

        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|max:10|unique:users|regex:/(05)[0-9]{8}/',
            'image' => 'required|mimes:jpg,jpeg,png,tiff',
            'password' => 'required|string|min:6|confirmed',
            'city_id' => 'required',
            'location_text' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['user_type'] = 3;
//        $data['id_number'] = randIdNumber(5);

        if ( isset($data['image']) && $data['image'] ) {

            $data['photo'] = newUploading($data['image'], '/uploads/users');
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'photo' => $data['photo'],
            'password' => $data['password'],
            'user_type' => $data['user_type'],
//            'id_number' => $data['id_number'],
        ]);
    }

    protected function createCompany(array $data) {

        //dd($data);

        $data['user_type'] = 2;
//        $data['id_number'] = randIdNumber(5);

        if ( isset($data['image']) && $data['image'] ) {

            $data['photo'] = newUploading($data['image'], '/uploads/users');
        }

        $invitedBy = isset($data['invitedBy']) && $data['invitedBy'] != null ? $data['invitedBy']  : 1;

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'photo' => $data['photo'],
            'password' => $data['password'],
            'user_type' => $data['user_type'],
//            'id_number' => $data['id_number'],
            'city_id' => $data['city_id'],
            'location_text' => $data['location_text'],
            'lat' => $data['lat'],
            'long' => $data['long'],
            'invited_by' => $invitedBy,
        ]);
    }

    protected function senEmail($user_email, $user_id) {

        $siteEmail = Controller::getSiteData()['site_email'];
        $siteName = Controller::getSiteData()['site_name'];

        $vars = [
            'from' => $siteEmail,
            'messagesTitle' => 'موقع '. $siteName,
            'to' => $user_email,
            'fromName' => $siteName,
            'subject' => 'تفعيل حسابك في '. $siteName,
            'token' => $user_id . md5(csrf_token())
        ];

        $mailed = sendEmail('web.emails.user_activate', $vars);


        if( !$mailed ) {
            return false;
        }

        return true;
    }
}
