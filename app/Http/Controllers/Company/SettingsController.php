<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders;
use App\Service;
use App\Bank;
use Illuminate\Support\Carbon;
use Auth;
use DB;
use Charts;

class SettingsController extends Controller
{


    public function getDashboard() {

        $companyId = Auth::user()->id;

        $activeServicesCount = Service::Active($companyId)->count();



        $disabledServicesCount = Service::Blocked($companyId)->count();

        $mostReservedServiceId = DB::table('orders')
                                    ->where('company_id', $companyId)
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

        $banksCount = Bank::where('company_id', $companyId)->count();

        $newOrdersCount = $this->getCount($companyId, 5);

        $notDoneOrdersCount = $this->getCount($companyId, 0);;

        $selects = array(
            'COUNT(id) AS count',
            'SUM(total_price) AS sum'
        );

        $doneOrders = $this->getCount($companyId, 1);
        $sumOrders = Orders::where('company_id', $companyId)->where('status', 1)
                            ->whereHas('payment', function ($q) {
                                $q->where('status', 1);
                            })->sum('orders.total_price');

//        dd($mostReservedService);
        return view('company.dashboard.index', compact('activeServicesCount', 'disabledServicesCount', 'mostReservedService', 'sumOrders',
                    'banksCount', 'newOrdersCount', 'notDoneOrdersCount', 'doneOrders'));
    }







    private function getCount($company_id, $status) {

        $data = Orders::where('company_id', $company_id)->where('status', $status)
                        ->whereHas('payment', function ($q) {
                            $q->where('status', 1);
                        })
                        ->count();

        return $data;

    }



    public function statistics() {

        $companyId = Auth::user()->id;

        $doneOrdersChart = Charts::database(Orders::DoneOrders($companyId)->get(), 'bar', 'highcharts')
                                ->elementLabel("الحجوزات المنتهية")
                                ->title('مخطط الحجوزات المنتهية')
                                ->dimensions(0, 200)
                                ->groupByMonth();

        $notDoneOrdersChart = Charts::database(Orders::NotDoneOrders($companyId)->get(), 'bar', 'highcharts')
                                ->elementLabel("الحجوزات التي لم تتم")
                                ->title('مخطط الحجوزات التي لم تتم')
                                ->dimensions(0, 200)
                                ->groupByMonth();

        $activeServicesChart = Charts::database(Service::Active($companyId)->get(), 'bar', 'highcharts')
                                    ->elementLabel("الخدمات المفعلة")
                                    ->title('مخطط الخدمات المفعلة')
                                    ->dimensions(0, 200)
                                    ->groupByMonth();

        $blockedServicesChart = Charts::database(Service::Blocked($companyId)->get(), 'bar', 'highcharts')
                                    ->elementLabel("الخدمات الموقوفة من قبل الإدارة")
                                    ->title('مخطط الخدمات الموقوفة من قبل الإدارة')
                                    ->dimensions(0, 200)
                                    ->groupByMonth();

        $banksChart = Charts::database(Bank::where('company_id', $companyId)->get(), 'bar', 'highcharts')
                            ->elementLabel("الحسابات البنكية")
                            ->title('مخطط الحسابات البنكية')
                            ->dimensions(0, 200)
                            ->groupByMonth();

        $doneOrdersCount = Orders::DoneOrders($companyId)->count();
        $notDoneOrdersCount = Orders::NotDoneOrders($companyId)->count();
        $activeServicesCount = Service::Active($companyId)->count();
        $blockedServicesCount = Service::Blocked($companyId)->count();
        $banksCount = Bank::where('company_id', $companyId)->count();

        return view('company.dashboard.statistics',compact('doneOrdersChart', 'doneOrdersCount', 'notDoneOrdersChart',
                    'notDoneOrdersCount', 'activeServicesChart', 'activeServicesCount', 'blockedServicesChart',
                    'blockedServicesCount', 'banksChart', 'banksCount'));
    }
}
