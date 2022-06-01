<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Vinkla\Hashids\Facades\Hashids;

class NearByController extends Controller {

    public function index() {

        return view('web.near_by.index');
    }

//    public function calcPrice($late, $long) {
//
//        $sql = 'SELECT `id` , `lat`, `long`, `name`,
//                    111.045* DEGREES(ACOS(COS(RADIANS(latpoint))
//                               * COS(RADIANS(`lat`))
//                               * COS(RADIANS(longpoint) - RADIANS(`long`))
//                               + SIN(RADIANS(latpoint))
//                               * SIN(RADIANS(`lat`)))) AS distance_in_km
//               FROM `users`
//               JOIN (
//                   SELECT ' . $late . '  AS latpoint,  ' . $long . ' AS longpoint
//
//                 ) AS p ON `user_type`=2 ORDER BY distance_in_km LIMIT 50';
//
////        echo $sql;die;
//
//        $data = DB::select($sql);
//
////        dd(count($data));
//
////        return json_encode(['data' => $data]);
//
//        return view('web.near_by.test', compact($data));
//    }

    public function nearLocations(Request $request) {

        $lat = $request->lat;
        $long = $request->long;

        $sql = 'SELECT `id` , `name`, `lat`, `long`,
                    111.045* DEGREES(ACOS(COS(RADIANS(latpoint))
                               * COS(RADIANS(`lat`))
                               * COS(RADIANS(longpoint) - RADIANS(`long`))
                               + SIN(RADIANS(latpoint))
                               * SIN(RADIANS(`lat`)))) AS distance_in_km
               FROM `users`
               JOIN (
                   SELECT ' . $lat . '  AS latpoint,  ' . $long . ' AS longpoint

                 ) AS p ON `user_type`=2 ORDER BY distance_in_km LIMIT 50';

        $data = DB::select($sql);

        foreach($data as $key => $value){

            $data[$key]->url =  route('web.companies.show', Hashids::encode($value->id));
        }

//        return response()->json(['data' => $data]);
        return json_encode(['code' => count($data), 'data' => $data]);
    }
}