<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\ResetPassword;
use Illuminate\Support\Facades\Validator;
use App\User;

class AuthController extends Controller
{

    public function getLogin() {

        return view('company.auth.login');
    }

    public function postLogin(Request $request) {

        $this->validateLogin($request);

        $user =  Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        
        if(Auth::check()) {

            if(Auth::user()->admin_is_conf == 0 && Auth::user()->user_type == 2) {

                session(['new_user' => 'في انتظار موافقة الادارة']);

                return redirect()->route('home');

            }

            return redirect()->route('companyDashboard');

        }
        return redirect()->route('company-login-get')->with('mDanger', trans('messages.loginFalse'));
    }

    public function logout() {

        Auth::logout();

        return redirect()->route('home');
    }

    public function getForgetPassword() {

        return view('company.auth.forget_password');
    }

    public function postForgetPassword( Request $request ) {

        $rules = [

            'email' => 'required|email|min:3:max:255',
        ];

        $validator = Validator::make( $request->all(), $rules );

        if ( $validator->fails() ) {

            return redirect()->back()->withErrors( $validator )->withInput();
        }

        $user = User::where( 'email', $request->email )->first();

        if ( $user ) {

            $siteEmail = Controller::getSiteData2()['site_email'];
            $siteName = Controller::getSiteData2()['site_name'];

            $vars = [
                'from'          => $siteEmail,
                'messagesTitle' => $siteName . ' رابط استعادة كلمة المرور ',
                'to'            => $user->email,
                'fromName'      => $siteName,
                'subject'       => $siteName . ' رابط استعادة كلمة المرور ',
                'token'         => md5(csrf_token()),
                'data'          => [
                    'token'         => md5(csrf_token()),
                    'siteName'      => $siteName
                ]
            ];

            sendEmail( 'company.emails.forgetPassword', $vars );

            $gData        = new ResetPassword;
            $gData->email = $user->email;
            $gData->token = md5(csrf_token());
            $gData->save();

            return back()->with( 'mOk', trans( 'messages.fPasswordTrue' ) );
        }

        return back()->with( 'mNo', trans( 'messages.fPasswordError' ) );
    }

    public function getRestPassword( $token ) {

        $tokenIsValid = ResetPassword::where( 'token', $token )->count();

        if ( $tokenIsValid != 1 ) {
            return redirect()->route( 'company-login-get' )->with( 'mNo', trans( 'messages.tokenNotValid' ) );
        }

        return view( 'company.auth.rest_password',['token' => $token] );
    }

    public function postResetPassword(Request $request) {

        $rules = [
            'password'     => 'min:3|max:255',
            'password_con' => 'same:password',
        ];

        $token = $request->user_token;

        // validation done ^_^
        collValidation( $request, $rules, "route('back()')" );

        $email = ResetPassword::where( 'token', $token )->first()->email;

        if ( isset( $email ) && $email != '' ) {

            $updatePassword = User::where( 'email', $email )->first();

            $updatePassword->password = bcrypt( trim( $request->password ) );

            return $updatePassword->save() ?
                    redirect()->route( 'company-login-get' )->with( 'mOk', trans( 'messages.rPasswordOk' ) ) :
                    redirect()->route( 'company-login-get' )->with( 'mNo', trans( 'messages.rPasswordNo' ) );
        }

        return redirect()->route( 'company-login-get' )->with( 'mNo', trans( 'messages.tokenNotValid' ) );
    }



    protected function validateLogin(Request $request){

        $this->validate($request, [
            'email' => 'required|email|min:3:max:255',
            'password' => 'min:3|max:255',
        ]);
    }
}
