<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function checkAuthorization() {

        $allowRoute = levels( auth()->user()->group_id );

        $route = \Request::route()->getName();

        if(! in_array($route, $allowRoute)) {

            return false;
        }
        return true;
    }

    public function getSiteData() {

        $setting = Settings::find(1);

        return [ 'site_name' => $setting->name, 'site_email' => $setting->email, 'site_phone' => $setting->phone ];
    }

//    public function getSiteData2() {
//
//        $setting = Settings::find(1);
//
//        return [ 'site_name' => $setting->name, 'site_email' => $setting->email ];
//    }

    public function getSiteCommission() {

        $setting = Settings::find(1);

        return $setting->commission;
    }
}
