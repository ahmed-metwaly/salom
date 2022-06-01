<?php

namespace App\Http\Controllers\company;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Orders;
use App\Payment;
use App\OrdersStatus;
use Carbon\Carbon;

class OrdersController extends Controller
{

    public function getWaitingOrders() {

        $ordersType = 'حجوزات في انتظار الموافقة';
        $status = 5;

        $data = $this->getOrders($status, \Auth::user()->id);

        return view('company.orders.waiting', compact('data', 'ordersType'));
    }

    public function getNewOrders() {

        $ordersType = 'حجوزات جديدة';
        $status = 3;

        $data = $this->getOrders($status, \Auth::user()->id);

        return view('company.orders.index', compact('data', 'ordersType'));
    }

    public function getDoneOrders() {

        $ordersType = 'حجوزات منتهية';
        $status = 1;

        $data = $this->getOrders($status, \Auth::user()->id);

        return view('company.orders.index', compact('data', 'ordersType'));
    }

    public function getNotDoneOrders() {

        $ordersType = 'حجوزات لم تتم';
        $status = 0;

        $data = $this->getOrders($status, \Auth::user()->id);

        return view('company.orders.index', compact('data', 'ordersType'));
    }

    public function getSuspendedOrders() {

        $ordersType = 'حجوزات معلقة';
        $status = 2;

        $data = $this->getOrders($status, \Auth::user()->id);

        return view('company.orders.index', compact('data', 'ordersType'));
    }

    public function show(Orders $order) {

        if ( !$order || !$order->payment->status == 1 ){
            return view('errors.404');
        }

//        $order['formatted_time'] = date('g:i A', strtotime($order->date));

        $order['formatted_time'] = date('H:i:s', strtotime($order->date)) != '00:00:00' ? date('g:i A', strtotime($order->date)) : NULL;

        $day = getArDay( date('D', strtotime($order->date)) );

        $order['formatted_date'] = $day . ' ' .date('Y-m-d', strtotime($order->date));

//        $new_data = $this->totalServicesIntervals($order->serves);
//        $order['services_count'] = $new_data['services_count'];
//        $order['total_intervals'] = $new_data['total_intervals'];
//        $order['services'] = $new_data['services'];
//
//        $order->load('user', 'payment');

        return view('company.orders.show', compact('order'));
    }

    public function showInvoice(Orders $order) {

        if ( !$order || !$order->payment->status == 1 )
            abort('404');

        $order['formatted_time'] = date('H:i:s', strtotime($order->date)) != '00:00:00' ? date('g:i A', strtotime($order->date)) : NULL;

        $day = getArDay( date('D', strtotime($order->date)) );

        $order['formatted_date'] = $day . ' ' .date('Y-m-d', strtotime($order->date));

        return view('company.orders.invoice', compact('order'));
    }

    public function approveOrder($id) {

        $id = (int) $id;

        $orderStatus = Orders::where('id', $id)->first();
        $orderStatus->status = 3;


        $siteEmail = Controller::getSiteData()['site_email'];
        $siteName = Controller::getSiteData()['site_name'];

        $vars = [
            'from' => $siteEmail,
            'messagesTitle' => 'موقع '. $siteName,
            'to' => $orderStatus->user->email,
            'fromName' => $siteName,
            'subject' => 'تمت الموافقه علي الحجز في موقع '. $siteName,
            'token' => $id
        ];

        sendEmail('web.emails.approve_order', $vars);

        return $orderStatus->save() ?
            redirect()->route('company-new-orders')->with('mOk', 'تمت الموافقه علي الطلب'):
            redirect()->route('company-new-orders')->with('mNo', 'حدث خطاء ما يرجي المحاولة مره اخري');
    }

    public function acceptOrder(Request $request) {

        $id = (int) $request->id;

        $orderStatus = Orders::where('id', $id)->first();
        $orderStatus->status = 1;

        return $orderStatus->save() ?
            json_encode(['code' => true, 'url' => route('company-new-orders')]):
            json_encode(['code' => false]);
    }

    public function rejectOrder(Request $request) {

        $id = (int) $request->id;

        $orderStatus = Orders::where('id', $id)->first();
        $orderStatus->status = 0;
        $orderStatus->message = $request->message;

        return $orderStatus->save() ?
            json_encode(['code' => true, 'url' => route('company-new-orders')]):
            json_encode(['code' => false]);
    }


    protected function getOrders($status, $company_id) {

        $data = Orders::where('company_id', $company_id)->where('status', $status)
                        ->whereHas('payment', function ($q) {
                            $q->where('status', 1);
                        })
                        ->get();


        
        return $data;
    }

//    protected function getAdditionalData($data){
//
//        foreach ( $data as $key => $order) {
//
//        //format_date.....
////            $data[$key]['formatted_date'] = date('l, jS F Y', strtotime($order->date));
//            $data[$key]['formatted_time'] = date('g:i A', strtotime($order->date));
//
//            $day = getArDay( date('D', strtotime($order->date)) );
//
//            $data[$key]['formatted_date'] = $day . ' ' .date('Y-m-d', strtotime($order->date));
//
//            //services_obj_and_services_count_and_intervals.....
////            $data[$key]['services_obj'] = $this->getOrderServices($order->serves);
//
////            $new_data = $this->totalServicesIntervals($order->serves);
////            $data[$key]['services_count'] = $new_data['services_count'];
////            $data[$key]['total_intervals'] = $new_data['total_intervals'];
//        }
//
//        return $data;
//    }

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
//            $services[] = $service;
//        }
//
//        $total_intervals = minutesToHours( array_sum($service_intervals) );
////        $total_intervals = array_sum($service_intervals);
//
//        return ['services_count' => $services_count, 'total_intervals' => $total_intervals, 'services' => $services];
//    }
}
