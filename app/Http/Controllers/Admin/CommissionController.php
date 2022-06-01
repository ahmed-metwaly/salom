<?php

namespace App\Http\Controllers\Admin;

use App\CommissionPayment;
use App\Orders;
use App\Payment;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Settings;
use Session;

class CommissionController extends Controller
{

    public function getAdd() {

        $checked =  Controller::checkAuthorization();

        // if( !$checked ) {
        //     return view('errors.403');
        // }

        $commission = Settings::where('id', 1)->pluck('commission')->first();

        return view('admin.commissions.add_percentage', compact('commission'));
    }

    public function postAdd(Request $request) {

        $rules = [
            'commission' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('admin-add')->withErrors($validator)->withInput();
        }

        $setting = Settings::find(1);

        $setting->commission = $request->commission;

        return $setting->save() ?
            redirect()->route('commission-percentage')->with('mOk', trans('messages.commissionAddedOk')) :
            redirect()->route('commission-percentage')->with('mNo', trans('messages.updateFalse'))->withInput();
    }

    public function owedBalances() {

        $commissionPayed = [];
        $commissionOwed = [];

    //ids المراكز اللي ليها حجوزات تمت بالفعل
        // $companiesIds = User::whereHas('companyOrders.payment', function ($q) {
        //                             $q->where('status', 1);
        //                         })
        //                         ->pluck('id');


        $companiesIds = Orders::where('status',1)->groupBy('company_id')->pluck('company_id');
        foreach ($companiesIds as $id) {

            $data = CommissionPayment::where('company_id', $id)->latest()->first();
            $payed_commission_sum = CommissionPayment::where('company_id', $id)->sum('payed');


            if ( $data ) {

                $data['payed_commission_sum'] = $payed_commission_sum;
                $commissionPayed[] = $data; //فيه_تاريخ_اخر_دفع
            }
            else
                $commissionOwed[] = $id;  // فقط id

        }

//        dd($commissionPayed);

    //الناس اللي ما دفعتش قبل كده.....
        $new_obj = $this->getOwedOrders($commissionOwed);

    //الناس اللي دفعت قبل كده.....
        $payed_obj = $this->getPayedOrders($commissionPayed);

//        dd($payed_obj);
//        dd($new_obj);

        return view('admin.commissions.owed_balances', compact('new_obj', 'payed_obj'));
    }

    public function owedBalancesShow($ids) {

        $orders_ids = explodeByComma($ids);

        $old_data = $this->getOrders($orders_ids);

        $data = $this->getAdditionalData($old_data);

        return view('admin.commissions.owed_balances_show', compact('data'));
    }

    public function sessionSavePayment(Request $request) {

        $commission = explode(' ', $request->commission);

        Session::put('commission', $commission[0]);

        $url = route('commission-commissionPaying', ['company_id' => $request->company_id]);

        return json_encode(['code' => true, 'url' => $url]);
    }


    public function getPaying($company_id) {

        $commission = Session::get('commission');

        return view('admin.commissions.get_pay', compact('commission', 'company_id'));
    }

    public function confirmPaying(Request $request, $company_id) {

        $rules = [
            'payed' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('commission-commissionPaying', $company_id)->withErrors($validator)->withInput();
        }

        $company_name = getCompanyName($company_id);

        $base = $request->base;
        $payed = $request->payed;

        return view('admin.commissions.confirm_pay', compact('company_name', 'base', 'payed', 'company_id'));
    }

    public function postPaying(Request $request) {

        $base = explode(' ', $request->base);
        $payed = explode(' ', $request->payed);

        $data = new CommissionPayment();

        $data->company_id   = $request->company_id;
        $data->base         = $base[0];
        $data->payed        = $payed[0];

        return $data->save() ?
            redirect()->route('commission-printCommissionPaying', $data->id)->with('mOk', trans('messages.commissionPayedOk')) :
            redirect()->route('commission-owedBalances')->with('mNo', trans('messages.updateFalse'));
    }


    public function payingPrint($id) {

        $data = CommissionPayment::where('id', $id)->first();

        return view('admin.commissions.print_pay', compact('data'));

    }


    public function payedBalances() {

        $data = CommissionPayment::with(['company' => function($q) {
                                $q->select('id', 'name');
                            }])
                            ->get();

        return view('admin.commissions.payed_balances', compact('data'));
    }


    protected function getOwedOrders($commissionOwed) {

        $owedOrders = Orders::whereHas('payment', function ($q) {
                                    $q->where('status', 1);
                                })
                                ->with([
                                    'company' => function($q) {
                                        $q->select('id', 'name');
                                    },
                                    'payment'
                                ])
                                ->whereIn('company_id', $commissionOwed)
                                ->where('status', 1)
                                ->select('id', 'date', 'company_id')
                                ->orderBy('company_id')
                                ->get();
//        if ($owedOrders) {

            $new_obj = [];

            foreach ($owedOrders as $key => $order) {

                end($new_obj);
                $last_key = key($new_obj);

                if( $key != 0 && $order->company->name == $new_obj[$last_key]['company']  ) {

                    $new_obj[$last_key]['owed_months'] =  $new_obj[$last_key]['owed_months'] . ',' . date('m', strtotime($order->date));

                    $new_obj[$last_key]['orders'] =  $new_obj[$last_key]['orders'] . ',' . $order->id;

                    $new_obj[$last_key]['owed_commission'] =  $new_obj[$last_key]['owed_commission'] + $order->payment->commission;
                }
                else {

                    array_push($new_obj, array('company' => $order->company->name,
                        'orders' => $order->id,
                        'company_id' => $order->company->id,
                        'owed_months' => date('m', strtotime($order->date)),
                        'owed_commission' => $order->payment->commission
                    ));
                }
            }
//        }

        return $new_obj;
    }

    protected function getPayedOrders($commissionPayed){

        $payed_obj = [];

        foreach ($commissionPayed as $key => $payedCompany) {

            // $payed_obj[$key]['all_commissions'] = Payment::where('status', 1)
            //                                                 ->whereHas('order.company', function ($q) use($payedCompany) {
            //                                                     $q->where('company_id', $payedCompany->company_id);
            //                                                 }) 
            //                                                 ->sum('commission');


            $payed_obj[$key]['all_commissions'] = Payment::where('payments.status', 1)->join('orders', 'payments.order_id', '=', 'orders.id')->where('orders.company_id', $payedCompany->company_id)->where('orders.status', 1)->sum('payments.commission');

            $payed_obj[$key]['dates'] = Orders::whereHas('payment', function ($q) {
                                                    $q->where('status', 1);
                                                })
                                                ->where('company_id', $payedCompany->company_id)
                                                ->where('status', 1)
                                                ->orderBy('date', 'ASC')
                                                ->pluck('date');

            $payed_obj[$key]['owed_commission'] = $payed_obj[$key]['all_commissions'] - $payedCompany->payed_commission_sum;

            $payed_obj[$key]['company'] = getCompanyName($payedCompany->company_id);
            $payed_obj[$key]['company_id'] = $payedCompany->company_id;

            $all_months = count( payedMonthsCount($payed_obj[$key]['dates']) );

            $payed_obj[$key]['payed_months'] = round( ($all_months * $payedCompany->payed_commission_sum) / $payed_obj[$key]['all_commissions'] ) ;

            $payed_obj[$key]['owed_months'] = round( ($all_months * $payed_obj[$key]['owed_commission']) / $payed_obj[$key]['all_commissions'] ) ;

            // التاريخ اللي هحسب من بعده
            $last_date = date('Y-m-d', strtotime($payed_obj[$key]['dates'][0] . ' + ' . $payed_obj[$key]['payed_months'] . 'months'));

            $payed_obj[$key]['orders'] = Orders::whereHas('payment', function ($q) {
                                                    $q->where('status', 1);
                                                })
                                                ->where('company_id', $payed_obj[$key]['company_id'])
                                                ->whereDate('date', '>=', $last_date)
                                                ->pluck('id');
        }
        return $payed_obj;
    }

    protected function getOrders($orders_ids) {

        $data = Orders::with([ 'user' => function($query) {
                            $query->select('id', 'name');
                            },
                            'company' => function($query) {
                                $query->select('id', 'name');
                            },
                            'payment' => function($query) {
                                $query->select('id', 'order_id', 'paper');
                            }
                        ])
                        ->whereIn('id', $orders_ids)
                        ->where('status', 1)
                        ->select('id', 'serves', 'date', 'total_price', 'user_id', 'company_id')
                        ->get();


        return $data;
    }

    protected function getAdditionalData($data){



        foreach ( $data as $key => $order) {

            $data[$key]['formatted_time'] = date('g:i A', strtotime($order->date));

            $day = getArDay( date('D', strtotime($order->date)) );

            $order['formatted_date'] = $day . ' ' .date('Y-m-d', strtotime($order->date));

            $new_data = $this->totalServicesIntervals($order->serves);

            $data[$key]['services_count'] = $new_data['services_count'];
            $data[$key]['total_intervals'] = $new_data['total_intervals'];
        }

        return $data;
    }

    protected function totalServicesIntervals($services_string) {

        $services_arr = (array) json_decode($services_string);
        $services_count = count($services_arr);
        $service_intervals = [];
        $services = [];
        foreach ( $services_arr as $id ) {

            $service = Service::find($id);
            $service_intervals[] = $service->interval;
            $services[] = $service;
        }

        $total_intervals = minutesToHours( array_sum($service_intervals) );

        return ['services_count' => $services_count, 'total_intervals' => $total_intervals, 'services' => $services];
    }

}
