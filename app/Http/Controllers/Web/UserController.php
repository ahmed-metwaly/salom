<?php
namespace App\Http\Controllers\Web;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use Hash;
use App\ResetPassword;

class UserController extends Controller {


    public function getUserData() {

        $userId = \Auth::user()->id;

        $user = User::find($userId);

        if($user->user_type == 2){

            $cities = City::all();
            return view('web.auth.company_profile', compact('user', 'cities'));
        }

        elseif($user->user_type == 3)
            return view('web.auth.profile', compact('user'));

        elseif($user->user_type == 1)
            return redirect()->route('admin-edit', $userId);
    }

    public function storeUserData(Request $request) {

        if (\Auth::user()->user_type == 2) {

            return $this->updateCompanyData($request);
        }
        elseif (\Auth::user()->user_type == 3) {

            return $this->updateUserData($request);
        }

    }

    public function activateAccount($token) {

        $user = User::where('remember_token', $token)->first();

        if ($user) {

            $user->conf_status = 1;
//            $user->remember_token = NULL;
            $user->save();
            if($user->admin_is_conf == 0 && $user->user_type = 2) {

                session(['new_user' => 'تم تفعيل الاميل بنجاح و في انتظار موافقة الادارة']);

            } else {

                session(['new_user' => trans('messages.activeOk')]);

            }


            return redirect()->route('home');
        }

        session(['new_user' => trans('messages.activeNo')]);

        return redirect()->route('home');
    }

    public function findUserByIdNum(Request $request) {

        $query = $request->q;

        $data = User::where('id_number', 'LIKE', '%'.$query.'%')->select('id', 'id_number')->get();

        $rows = [];
        foreach ($data as $value) {
            $rows[] = array(
                "id" => $value->id,
                'text' => $value->id_number
            );
        }

        return json_encode( $rows);
    }

    public function showChangePasswordForm() {

        return view('web.auth.change_password');
    }

    public function changePassword(Request $request){

        $request->validate([
            'current-password' => 'required',
            'password' => 'required|string|min:3',
            'password_confirmation' => 'required|same:password',
        ]);

        if (!(Hash::check($request->get('current-password'), \Auth::user()->password))) {

            return redirect()->back()->with("alert","كلمة المرور الحالية التي أدخلتها لا تتطابق مع كلمة مرورك, حاول مرة أخرى");
        }
        if(strcmp($request->get('current-password'), $request->get('password')) == 0){

            return redirect()->back()->with("alert","كلمة المرور الجديدة لا يمكن أن تكون نفس الحالية, أدخل كلمة مرور أخرى");
        }

    //Change Password

        $user = User::where('id', \Auth::user()->id)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->home()->with("alert","تم تغيير كلمة المرور بنجاح");
    }


    protected function updateUserData($request) {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,id,'. \Auth::user()->id,
            'phone' => 'required|max:10|unique:users,id,'. \Auth::user()->id. '|regex:/(05)[0-9]{8}/',
            'image' => 'mimes:jpg,jpeg,png,tiff',
        ]);

        if ($request->has('password')) {

            $this->validate($request, [
                'password' => 'required|string|min:6|confirmed'
            ]);
        }

        if (isset($request->image) && $request->image != '') {

            @unlink(public_path('uploads/users/') . \Auth::user()->photo);

            $request['photo'] = newUploading($request->file('image'), '/uploads/users');
        }

        $updated = \Auth::user()->update($request->all());

        $request->session()->forget('new_social_user');

        return $updated
            ? redirect()->route('home')->with('alert', 'تم تعديل بياناتك الشخصية بنجاح')
            : redirect()->route('home')->with('alert', 'حدث خطأ اثناء تعديل بياناتك الشخصية, رجاء حاول مرة أخرى');
    }

    protected function updateCompanyData($request) {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,id,'. \Auth::user()->id,
            'phone' => 'required|max:10|unique:users,id,'. \Auth::user()->id. '|regex:/(05)[0-9]{8}/',
            'image' => 'mimes:jpg,jpeg,png,tiff',
            'city_id' => 'required',
            'location_text' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);

        if (isset($request->image) && $request->image != '') {

            @unlink(public_path('uploads/users/') . \Auth::user()->photo);

            $request['photo'] = newUploading($request->file('image'), '/uploads/users');
        }

        $updated = \Auth::user()->update($request->all());

        return $updated
            ? redirect()->route('home')->with('alert', 'تم تعديل بياناتك الشخصية بنجاح')
            : redirect()->route('home')->with('alert', 'حدث خطأ اثناء تعديل بياناتك الشخصية, رجاء حاول مرة أخرى');
    }

    public function getForgetPassword()
    {
        return view('web.auth.forget_password');
    }

    public function postForgetPassword(Request $request)
    {


        $this->validate($request, ['email' => 'required|email|min:3:max:255' ]);
        // validation done ^_^

        $email = User::where('email', $request->email)->first();

        if ($email != NULL && isset($email->email) && $email->email != '') {

            $siteEmail = Controller::getSiteData()['site_email'];
            $siteName = Controller::getSiteData()['site_name'];
            $tok = csrf_token();
            $vars = [
                'from' => $siteEmail,
                'messagesTitle' => $siteName . ' رابط استعادة كلمة المرور ',
                'to' => $email->email,
                'fromName' => $siteName,
                'subject' => $siteName . ' رابط استعادة كلمة المرور ',
                'token' => $tok,
                'data' => [
                    'token' => $tok,
                    'siteName' => $siteName
                ]
            ];


            sendEmail('admin.emails.forgetPassword', $vars);

            return redirect()->route('home')->with('alert', trans('messages.fPasswordTrue'));

        }

        return redirect()->route('forgetPassword')->with('alert', trans('messages.fPasswordError'));
    }

    public function getRestPassword( $token ) {

        $tokenIsValid = ResetPassword::where( 'token', $token )->first();
// dd($tokenIsValid->email);
        if ( ! isset($tokenIsValid->email) && $tokenIsValid->email == '' ) {

            return back()->with('alert', trans('messages.tokenNotValid'));
        }

        return view( 'web.auth.rest_password',['token' => $token] );
    }

    public function postRestPassword( Request $request ) {


        $rules = [
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('reset-password')->withErrors($validator)->withInput();
        }

        $userId = ResetPassword::where( 'token', $request->token_old)->first();

        $data = User::where('email', $userId->email)->update(['password' => bcrypt(trim($request->password))]);

        if($data) {

            return redirect()->route('home')->with('alert', 'تم تحديث كلمة المرور بنجاح');

        }

        return redirect()->route('home')->with('alert', 'حدث خطأ ما ،، يرجي المحاولة مرة اخري');


    }


}
