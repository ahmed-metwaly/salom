<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Redirect;
use URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        // echo bcrypt('hr1@ws4it.com');
        return view('web.auth.login');
    }

    public function login(Request $request)
    {
        
        $this->validateLogin($request);

        $user = User::where('email', $request->email)->first();

        if($user){

            $status = $user->status;
            $conf_status = $user->conf_status;

            if(!$status){

                session(['not_status' => 'لقد إيقاف عضويتك من قبل الإدارة, تواصل مع الإدارة لمزيد من التفاصيل']);

                return redirect()->route('home');
            }

            if(!$conf_status){

                session(['not_conf' => 'برجاء التحقق من بريدك الإلكتروني, لتفعيل عضويتك']);

                return redirect()->route('home');
            }


            if($user->admin_is_conf == 0 && $user->user_type == 2) {

                session(['new_user' => 'في انتظار موافقة الادارة']);
                return redirect()->route('home');
            }

        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

            $request->session()->forget('new_user');
            $request->session()->forget('user_guest');
            $request->session()->forget('not_conf');

            return $this->sendLoginResponse($request);

//            $request->session()->regenerate();
//
//            $this->clearLoginAttempts($request);
//
//            if( !$this->authenticated($request, $this->guard()->user()) ) {
//
//                dd(URL::previous()) ;
//
////                return $request->session()->pull('prevUrl')
////                    ? Redirect::to($request->session()->pull('prevUrl'))
////                    : redirect()->intended($this->redirectPath());
//
//            }

        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function credentials(Request $request){

        if(is_numeric($request->email)){

            return ['phone' => $request->email, 'password'=>$request->password];
        }
        return $request->only($this->username(), 'password');
    }


    public function redirectToProvider($provider){

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider){
        
        //$provider = 'google';
        $user = Socialite::driver($provider)->stateless()->user();

    //  dd($user);
        $authUser = $this->findOrCreateUser($user, $provider);
       

        if($authUser == 'email_exists') {

            return redirect($this->redirectTo)->with('alert', 'بريد إلكتروني موجود سابقًا');
        }

        if (!$authUser->email && !$authUser->phone && !$authUser->password) {

            session(['new_social_user' => 'رجاء أكمل بياناتك من صفحتك الشخصية لتتمتع بكافة خدماتنا']);
        }
        
       $dataU = User::find($authUser->id);
       
        if($dataU->remember_token == '') {
        
            $dataU->password = bcrypt('slaaaa');
            
            $dataU->remember_token = csrf_token();
        
            $dataU->save();
        }
        
        auth()->logout();

       auth()->login($dataU, true);

        return redirect()->route('home');
    }

    protected function findOrCreateUser($user, $provider){

        $authUser = User::where([ ['provider_id', $user->id], ['provider', $provider] ])->first();

        if ($authUser) {
            return $authUser;
        }

        $userExists = User::whereNotNull('email')->where('email', $user->email)->count();

        if( $userExists > 0 ) {
            return 'email_exists';
        }


        $user_type = 3;

        $photo = isset($user->avatar_original) ? $user->avatar_original : $user->avatar;
        $name = isset($user->name) && $user->name != '' ? $user->name : $user->id;

        return User::create([
            'name'          => $name,
            'email'         => $user->email,
            'provider'      => $provider,
            'provider_id'   => $user->id,
            'photo'         => $photo,
            'user_type'     => $user_type,
//            'id_number'     => $id_number,
            
        ]);
    }
}
