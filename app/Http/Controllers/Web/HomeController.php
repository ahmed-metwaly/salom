<?php

namespace App\Http\Controllers\Web;

use App\Orders;
use App\Promotion;
use App\Rating;
use App\Service;
use App\Slider;
use App\User;
use App\City;
use App\Day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

class HomeController extends Controller {

    public function index() {

        $sliderImages = Slider::all();

        $data = Promotion::where('type', 1)->orderBy('id', 'DESC')->get();

        $specialService = [];
        
        foreach($data as $oneServ) {

            if(strtotime($oneServ->start_at) <= strtotime(date('Y-m-d')) && strtotime($oneServ->end_at) > strtotime(date('Y-m-d')) && strtotime($oneServ->end_at) >= strtotime($oneServ->start_at)) {

                $specialService = $oneServ;
                
                continue;

            }

        }

        $mostReservedService = '';
        // if not available ads
        if(isset($specialService->id) && $specialService->id != NULL)  {

            $mostReservedServiceId = DB::table('orders')
                            ->join('payments', function ($join) {
                                $join->on('orders.id', '=', 'payments.order_id')
                                    ->where('payments.status', '=', 1);
                            })
                            ->select('service_id', DB::raw('count(*) as serviceCount'))
                            ->groupBy('service_id')
                            ->orderBy('serviceCount', 'DESC')
                            ->pluck('service_id')
                            ->first();

            $mostReservedService = Service::find($mostReservedServiceId);

        }

        
        $data = DB::table('services')
                        ->join('promotions', function ($join) {
                            $join->on('services.id', '=', 'promotions.promotionable_id')
                                ->where('promotions.type', '=', 2)->where('promotions.is_active', true);
                        })
                        
                        ->select('services.*', 'promotions.id as promotion_id', 'promotions.start_at as start_at', 'promotions.end_at as end_at')
                        ->orderBy('priority', 'ASC')
                        ->get();
                        
        $services = [];
        $I = 0;
        
        foreach($data as $oneServ) {

            if(strtotime($oneServ->start_at) <= strtotime(date('Y-m-d')) && strtotime($oneServ->end_at) > strtotime(date('Y-m-d')) && strtotime($oneServ->end_at) >= strtotime($oneServ->start_at)) {

                $services[] = $oneServ;
                
                $I++;
            }

            if($I == 2) {

                continue;

            }

        }


        $servAll = Service::join('users', 'services.company_id', '=', 'users.id')
                       ->join('cities', 'users.city_id', '=', 'cities.id')->orderBy('services.created_at', 'DESC')->limit(3)->distinct()
                       ->select('services.*')->get();


        foreach($servAll as $item) {

            $services[] = $item;

        }

        $data = Promotion::join('users', 'promotions.promotionable_id', '=', 'users.id')->where('promotions.type', 3)->where('promotions.is_active', true)->orderBy('promotions.priority', 'ASC')
                ->join('cities', 'users.city_id', '=', 'cities.id')
                ->select('promotions.start_at as start_at', 'promotions.end_at as end_at',
                         'users.id as id', 'users.name as name', 'users.location_text as location_text',
                         'users.photo as photo', 'cities.city as city')->get();

        $companies = [];

        foreach($data as $company) {

            if(strtotime($company->start_at) <= strtotime(date('Y-m-d')) && strtotime($company->end_at) > strtotime(date('Y-m-d')) && strtotime($company->end_at) >= strtotime($company->start_at)) {

                $companies[] = $company;
                
                $I++;
            }

            if($I == 2) {

                continue;

            }

        }

        // last order added
        // last service added
        // max service reated
        // max service orderd

        if(count($companies) < 6) {
            
            $countL = 6 - count($companies);

            $limit = round($countL / 2);

            $orders = Orders::join('users', 'orders.company_id', '=', 'users.id')
                      ->join('cities', 'users.city_id', '=', 'cities.id')
                      ->orderBy('orders.created_at', 'DESC')->limit($limit)->distinct()
                      ->select('users.id as id', 'users.name as name', 'users.location_text as location_text',
                      'users.photo as photo', 'cities.city as city')->get();
  
            $serv = Service::join('users', 'services.company_id', '=', 'users.id')
                       ->join('cities', 'users.city_id', '=', 'cities.id')->orderBy('services.created_at', 'DESC')->limit($limit)->distinct()
                       ->select('users.id as id', 'users.name as name', 'users.location_text as location_text',
                       'users.photo as photo', 'cities.city as city')->get();


            
            $resDre = [];
            $ids = [];
            foreach($orders as $order) {

                foreach($serv as $ser) {

                    if($ser->id == $order->id) {
                        $ids[] = $ser->id;
                    }
                }
                // $companies[] = $ser;
                $companies[] = $order;

            }

            foreach ($serv as $v) {
                
                if(! in_array($v->id, $ids)) {

                    $companies[] = $v;

                }


            }

            // dd($resDre);

            // $companies[] = $resDre;

        }

        $cities = City::all();

        return view('web.home.index', compact('sliderImages', 'specialService', 'mostReservedService',
            'services', 'companies', 'cities'));
    }

}
