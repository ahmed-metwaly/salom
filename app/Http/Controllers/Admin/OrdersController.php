<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Orders;
use App\Service;
use App\Payment;
use App\OrdersStatus;
use Carbon\Carbon;


class OrdersController extends Controller
{

    public function getOldOrders() {

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

        $ordersType = 'الحجوزات السابقة';
        $comparison = '<';
        $status = 1;

        $data = $this->getOrders($comparison, $status);

        return view('admin.orders.showAll', compact('data', 'ordersType'));
    }

    public function getCurrentOrders() {

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

        $ordersType = 'الحجوزات الجارية';
        $comparison = '>=';
        $status = 1;

        $data = $this->getOrders($comparison, $status);

        return view('admin.orders.showAll', compact('data', 'ordersType'));
    }

    public function getPendingOrders() {

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

        $ordersType = 'حجوزات في انتظار الموافقة';
        $comparison = '>=';
        $status = 2;

        $data = $this->getOrders($comparison, $status);

//        $data = $this->getAdditionalData($data);

        return view('admin.orders.showAll', compact('data', 'ordersType'));
    }
//
    public function getRejectedOrders() {

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

        $ordersType = 'الحجوزات المرفوضة';
        $comparison = '';
        $status = 0;

        $data = $this->getOrders($comparison, $status);

        return view('admin.orders.showAll', compact('data', 'ordersType'));
    }

    public function getOrderServices($id) {

        $services_str = Orders::where('id', $id)->pluck('serves')->first();

        if ( !$services_str ){
            return view('errors.404');
        }

        $services_arr = json_decode($services_str);

        $data =  Service::whereIn('id', $services_arr)
                            ->with([ 'company' => function($query) {
                                    $query->select('id', 'name');
                            }])
                            ->select('id', 'name', 'price', 'interval', 'photo', 'company_id')
                            ->get();
        $type = 'order';

        return view('admin.services.showAll', compact('data', 'type'));
    }

    public function acceptOrder(Request $request) {

        $id = $request->orderId;

        $payment = Payment::where('order_id', $id)->first();
        $payment->status = 1;

        if($payment->save()) {

            $orderStatus = new OrdersStatus();
            $orderStatus->payment_id = $payment->id;
            $orderStatus->company_id = $payment->order->company->id;
            $saved = $orderStatus->save();

            if($saved) {

                $user       = $payment->order->user;
                $company    = $payment->order->company;
                $subject    = 'رد الإدارة على حجزك لدى ' . $company->name;
                $body       = 'لقد تم قبول طلب الحجز الخاص بك ';
                $subject2   = 'رد الإدارة على طلب حجز لديك ';
                $body2      = 'لقد تم قبول طلب الحجز الخاص ب ' . $user->name . ' من قبل الإدارة ';

                $send2User      = $this->senEmail($user->email, $subject, $body);
                $send2Company   = $this->senEmail($company->email, $subject2, $body2);

                return $send2User && $send2Company
                    ? json_encode(['code' => '1', 'url' => route('pending-orders')])
                    : json_encode(['code' => '2', 'url' => route('pending-orders')]);

//            return json_encode(['code' => true, 'url' => route('pending-orders')]);
            }
        }
        return json_encode(['code' => '0']);
    }

    public function rejectOrder(Request $request) {

        $order_id = $request->orderId;

        $payment = Payment::where('order_id', $order_id)->first();
        $payment->status = 0;
        $payment->message = $request->message;
        $saved = $payment->save();

        if($saved) {

            $userEmail = $payment->order->user->email;
            $companyName = $payment->order->company->name;
            $subject = 'رد الإدارة على حجزك لدى ' . $companyName;
            $body = 'لقد تم رفض الحجز الخاص بك وذلك للاسباب الآتية: ' . $request->message;

            $send = $this->senEmail($userEmail, $subject, $body);

            return $send
                ? json_encode(['code' => '1', 'url' => route('pending-orders')])
                : json_encode(['code' => '2', 'url' => route('pending-orders')]);

//            return json_encode(['code' => true, 'url' => route('pending-orders')]);
        }

        return json_encode(['code' => '0']);
    }

    public function paymentDetails($id) {

        $payment = Payment::findOrFail($id);

        return view('admin.orders.payment_details', compact('payment'));
    }

    protected function senEmail($user_email, $subject, $body) {

        $siteEmail = Controller::getSiteData()['site_email'];
        $siteName = Controller::getSiteData()['site_name'];

        $vars = [
            'from' => $siteEmail,
            'messagesTitle' => 'موقع '. $siteName,
            'to' => $user_email,
            'fromName' => $siteName,
            'subject' => $subject,
            'body' => $body
        ];

        $mailed = sendEmailNew('web.emails.orders_reply', $vars);

        if( !$mailed ) {
            return false;
        }

        return true;
    }

    protected function getOrders($comparison, $status) {

        if ($comparison != '') {
            $data = Orders::whereDate('date', $comparison, Carbon::today()->toDateString())
                            ->whereHas('payment', function ($q) use($status){
                                $q->where('status', $status);
                            })
                            ->orderBy('date')
                            ->get();
            return $data;
        }
        $data = Orders::whereHas('payment', function ($q) use($status) {
                            $q->where('status', $status);
                        })
                        ->orderBy('date')
                        ->get();
        return $data;
    }

    protected function getAdditionalData($data){

        foreach ( $data as $key => $order) {

        //format_date.....
            $data[$key]['formatted_time'] = date('g:i A', strtotime($order->date));

            $day = getArDay( date('D', strtotime($order->date)) );

            $data[$key]['formatted_date'] = $day . ' ' .date('Y-m-d', strtotime($order->date));

        //services_obj_and_services_count_and_intervals.....
//            $data[$key]['services_obj'] = $this->getOrderServices($order->serves);

//            $new_data = $this->totalServicesIntervals($order->serves);
//            $data[$key]['services_count'] = $new_data['services_count'];
//            $data[$key]['total_intervals'] = $new_data['total_intervals'];
        }

        return $data;
    }

//    protected function totalServicesIntervals($services_string) {
//
//        $services_arr = json_decode($services_string);
//        $services_count = count($services_arr);
//        $service_intervals = [];
//
//        foreach ( $services_arr as $id ) {
//
//            $service = Service::find($id);
//            $service_intervals[] = $service->interval;
//        }
//
//        $total_intervals = minutesToHours( array_sum($service_intervals) );
//
//        return ['services_count' => $services_count, 'total_intervals' => $total_intervals];
//    }

}