<?php

namespace App\Http\Controllers\Company;

use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CommissionPayment;
use App\Orders;

class CommissionController extends Controller
{

    public function siteCommission() {

        $company_id = \Auth::user()->id;

    //هل المركز له حجوزات تمت بالفعل....
        $orders = Orders::whereHas('payment', function ($q) {
                                    $q->where('status', 1);
                                })
                                ->where('company_id', $company_id)
                                ->where('status', 1)
                                ->count();

        if(!$orders) {

            $msg = 'لا يوجد لديك طلبات بعد ..';

            return view('company.commissions.site_commission', compact('msg'));
        }


    //هل دفع قبل كده ولا ﻷ .......
        $sum_payed_commission = CommissionPayment::where('company_id', $company_id)->sum('payed');

        // $all_commission = Payment::where('status', 1)
        //                             ->whereHas('order.company', function ($q) use($company_id) {
        //                                 $q->where('id', $company_id);
        //                             })
        //                             ->sum('commission');

        $all_commission = Payment::where('payments.status', 1)->join('orders', 'payments.order_id', '=', 'orders.id')->where('orders.company_id', $company_id)->where('orders.status', 1)->sum('payments.commission');


        if ($sum_payed_commission != 0) {

            $commission = $all_commission - $sum_payed_commission;
        }
        else{

            $commission = $all_commission;
        }

        $msg = '';

        return view('company.commissions.site_commission', compact('commission', 'msg'));
    }
    
    public function invoice()
    {
        $company_id = \Auth::user()->id;

    //هل المركز له حجوزات تمت بالفعل....
        $orders = Orders::whereHas('payment', function ($q) {
                                    $q->where('status', 1);
                                })
                                ->where('company_id', $company_id)
                                ->where('status', 1)
                                ->count();

        if(!$orders) {

            $msg = 'لا يوجد لديك طلبات بعد ..';

            return view('company.commissions.site_commission', compact('msg'));
        }


    //هل دفع قبل كده ولا ﻷ .......
        $sum_payed_commission = CommissionPayment::where('company_id', $company_id)->sum('payed');


        $all_commission = Payment::where('payments.status', 1)->join('orders', 'payments.order_id', '=', 'orders.id')->where('orders.company_id', $company_id)->where('orders.status', 1)->sum('payments.commission');


        if ($sum_payed_commission != 0) {

            $commission = $all_commission - $sum_payed_commission;
        }
        else{

            $commission = $all_commission;
        }

        $msg = '';
        
        $data = CommissionPayment::where('company_id', $company_id)->first();

        return view('company.commissions.allCommissions', compact('commission','data'));
        
    }


}