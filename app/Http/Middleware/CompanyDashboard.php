<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CompanyDashboard {


    public function handle( $request, Closure $next, $guard = null ) {

        if ( Auth::check() && Auth::user()->user_type == 2 ) {

            if ( Auth::user()->conf_status != 1 ){

                return redirect()->route('company-login-get')->with('mNo', trans('messages.notActive'));
            }


            if(Auth::user()->admin_is_conf == 0 ) {

                return redirect()->route('company-login-get')->with('mNo', 'في انتظار موافقة الادارة');


            }

            return $next($request);
        }

        return redirect()->route('company-login-get');
    }
}

