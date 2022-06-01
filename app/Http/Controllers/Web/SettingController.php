<?php

namespace App\Http\Controllers\Web;

//use App\Settings;
use App\Condition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller {


    public function getSiteConditions() {

//        $conditions = Settings::where('id', 1)->pluck('site_conditions')->first();
        $conditions = Condition::where('id', 1)->pluck('site_conditions')->first();
        $title = 'الشروط والأحكام';

        return view('web.conditions.conditions', compact('conditions', 'title'));
    }

    public function getBankConditions() {

//        $conditions = Settings::where('id', 1)->pluck('bank_transfer_conditions')->first();
        $conditions = Condition::where('id', 1)->pluck('bank_transfer_conditions')->first();
        $title = 'شروط التحويل البنكي';

        return view('web.conditions.conditions', compact('conditions', 'title'));
    }

    public function getOrdersConditions() {

        $conditions = Condition::where('id', 1)->pluck('orders_conditions')->first();
        $title = 'سياسة الحجز';

        return view('web.conditions.conditions', compact('conditions', 'title'));
    }

    public function getAfterSellingConditions() {

        $conditions = Condition::where('id', 1)->pluck('after_selling_conditions')->first();
        $title = 'سياسة ما بعد البيع';

        return view('web.conditions.conditions', compact('conditions', 'title'));
    }

    public function getDeliveryConditions() {

        $conditions = Condition::where('id', 1)->pluck('delivery_conditions')->first();
        $title = 'سياسة الشحن';

        return view('web.conditions.conditions', compact('conditions', 'title'));
    }


    public function whoAre() {

            $conditions = Condition::where('id', 1)->pluck('who_are')->first();
            $title = 'من نحن';

            return view('web.conditions.conditions', compact('conditions', 'title'));
        }


    

    public function getPaymentMethodsConditions() {

        $conditions = Condition::where('id', 1)->pluck('payment_methods')->first();
        $title = 'وسائل الدفع';

        return view('web.conditions.conditions', compact('conditions', 'title'));
    }
}