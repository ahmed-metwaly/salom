<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
//use App\Http\Requests;

class User {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle( $request, Closure $next, $guard = null ) {

        if ( Auth::check() ) {

            if ( Auth::user()->user_type != 2 ) {

                if (!Auth::user()->email && !Auth::user()->phone && !Auth::user()->password) {

                    return redirect()->route('home')->with('new_social_user', 'رجاء أكمل بياناتك من صفحتك الشخصية لتتمتع بكافة خدماتنا');
                }

                if ( Auth::user()->conf_status != 1 ){

                    return redirect()->route('home')->with('not_conf', 'برجاء التحقق من بريدك الإلكتروني, لتفعيل عضويتك');
                }

                return $next($request);
            }

            return redirect()->route('home')->with('user_guest', 'هذه الخدمة متوفرة للأعضاء فقط');
        }

        return redirect()->route('get-login')->with('user_guest', 'هذه الخدمة متوفرة للأعضاء فقط');
    }
}

