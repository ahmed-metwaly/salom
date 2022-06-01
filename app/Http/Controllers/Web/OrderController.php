<?php

namespace App\Http\Controllers\Web;

use App\Orders;
use App\Service;
use App\Work;
use Illuminate\Http\Request;
use Cookie;
use App\Http\Controllers\Controller;
use Vinkla\Hashids\Facades\Hashids;
use Carbon\Carbon;

class OrderController extends Controller
{

    public function index() {

        $userId = \Auth::user()->id;

      $notConfirmedorders = Orders::where('user_id', $userId)
                        ->whereHas('payment', function ($q) {
                            $q->where('status', 2);
                        })
                        ->orderBy('date')
                        ->get();

        // $currentOrders = $this->getOrders('>=', $userId);

        $doneOrders = $this->getOrders(1, $userId);

        $notDoneOrders = $this->getOrders(0, $userId);

        $newOrders = $this->getOrders(3, $userId);

        $approveOrders = $this->getOrders(5, $userId);

        return view('web.orders.index', compact('doneOrders', 'notConfirmedorders' , 'notDoneOrders', 'newOrders', 'approveOrders'));
    }

    public function showInvoice($order) {

        $decodedId = Hashids::decode($order);

        $order = Orders::find($decodedId[0]);
        
        if ( !$order || !$order->payment->status == 1 )
            abort('404');

        $order['formatted_time'] = date('H:i:s', strtotime($order->date)) != '00:00:00' ? date('g:i A', strtotime($order->date)) : NULL;

        $day = getArDay( date('D', strtotime($order->date)) );

        $order['formatted_date'] = $day . ' ' .date('Y-m-d', strtotime($order->date));

        return view('web.orders.invoice', compact('order'));
    }

    public function create($serviceId) {

        $decodedId = Hashids::decode($serviceId);

        $service = Service::find($decodedId[0]);

        if (!$service->is_active || $service->has_blocked) {
            abort('404');
        }

        if( session('candidateOrderDate') ) {

            $defaultDate = session('candidateOrderDate');
            $defaultTime = session('candidateOrderTime');
        }

        else {
            $defaultDate = Carbon::now()->format('Y-m-d D');
            $defaultTime = NULL;
        }

        return view('web.orders.create', compact('service', 'defaultDate', 'defaultTime'));
    }

    public function validateDate(Request $request) {

        $date = $request->date;
        $time = $request->time.':00';

        $service = Service::find($request->serviceId);

// //check-if-old-date.......

//         $onlyDate = explodeBySpace($date)[0];

//         if ($onlyDate < Carbon::today()->toDateString()){
//             return json_encode(['code' => '0', 'message' => 'لا يمكن الحجز بتاريخ قديم']);
//         }

// //check-if-valid-day...('2018-04-06 Fri')....

//         $day = explodeBySpace($date)[1];
        
//         $isOpen = $service->works()
//                         ->whereHas('day', function ($q) use($day){
//                             $q->where('en_day', $day);
//                         })
//                         ->count();
//         if($isOpen == 0) {
//             return json_encode(['code' => '1', 'message' => 'المركز مغلق في اليوم الذي اخترته, من فضلك اختر يومًا آخر']);
//         }



// //check-if-valid-time.......
//         $rowTimeValid = Work::where('workable_id', $service->id)->join('days', 'works.day_id', '=', 'days.id')->where('days.en_day', $day)->where('works.time_from', '<=', $time)->where('works.time_to', '>=', $time)->first();



//         if(!$rowTimeValid) {
//             return json_encode(['code' => '2', 'message' => 'توقيت حجز غير متوفر, من فضلك اختر وقت آخر من أوقات الحجز المتوفرة']);
//         }

// //check-if-valid-orders-per-time-range.......
//         $ordersCountPerInterval = $rowTimeValid->orders_count_per_interval;
//         $completeFromDate = $onlyDate . ' ' . $rowTimeValid->time_from;
//         $completeToDate = $onlyDate . ' ' . $rowTimeValid->time_to;

//         $companyHasOrdersThisInterval = Orders::where('company_id', $request->companyId)
//                                         ->whereHas('payment', function ($q){
//                                             $q->where('status', 1);
//                                         })
//                                         ->whereBetween('date', [$completeFromDate, $completeToDate])
//                                         ->count();

// //        return json_encode(['ordersCountPerInterval' => $ordersCountPerInterval, 'companyHasOrdersThisInterval' => $companyHasOrdersThisInterval]);
// //        return json_encode(['$completeFromDate' => $completeFromDate, '$completeToDate' => $completeToDate]);

//         if ($companyHasOrdersThisInterval >= $ordersCountPerInterval) {
//             return json_encode(['code' => '3', 'message' => 'الحجز غير متاح للتاريخ الذي أدخلته, من فضلك اختر تاريخ آخر']);
//         }

        return json_encode(['code' => '4', 'message' => 'تاريخ الحجز متاح']);
    }

    public function storeDateInSession(Request $request) {

        session([ 'candidateOrderDate' => $request->full_date ]);
        session([ 'candidateOrderTime' => $request->full_time ]);

        return json_encode(['code' => '1']);
    }

    public function store(Request $request, $serviceId) {


        $request->validate([
            'company_id' => 'required',
            'user_id' => 'required',
            'individual_count' => 'required',
            'date' => 'required',
            'time' => 'required',
            'total_price' => 'required',
            'is_home' => 'required',
        ]);

        $request['date'] = date('Y-m-d H:i:s', strtotime($request->date . $request->time));
        $request['total_price'] = explodeBySpace($request->total_price)[0];
        $request['service_id'] = Hashids::decode($serviceId)[0];

        session([ 'totalOrderPrice' => $request['total_price'] ]);
        session([ 'companyName'     => $request->company_name ]);
        session([ 'individualCount' => $request->individual_count ]);
        session([ 'orderDate'       => $request['date'] ]);

//        dd($request->all());
        $created = Orders::create($request->all());

        if ($created) {

            session(['orderId' => $created->id]);

            return redirect()->route('payment.method');
        }

        return redirect()->route('web.orders.create', $serviceId)->with('alert', 'حدث خطأ ما, برجاء المحاولة لاحقًا');
        

//         $request->validate([
//             'company_id' => 'required',
//             'user_id' => 'required',
//             'individual_count' => 'required',
//             'date' => 'required',
//             'time' => 'required',
//             'total_price' => 'required',
//             'is_home' => 'required',
//         ]);

//         $request['date'] = date('Y-m-d H:i:s', strtotime($request->date . $request->time));
//         $request['total_price'] = explodeBySpace($request->total_price)[0];
//         $request['service_id'] = Hashids::decode($serviceId)[0];

//         session([ 'totalOrderPrice' => $request['total_price'] ]);
//         session([ 'companyName'     => $request->company_name ]);
//         session([ 'individualCount' => $request->individual_count ]);
//         session([ 'orderDate'       => $request['date'] ]);
    
// //        dd($request->all());
//         $created = Orders::create($request->all());

//         if ($created) {

//             // session(['orderId' => $created->id]);
//             setcookie('orderId', $created->id);
//             // Cookie('orderId', $created->id, 180);

//             return redirect()->route('payment.method');
//         }


//         return redirect()->route('web.orders.create', $serviceId)->with('alert', 'حدث خطأ ما, برجاء المحاولة لاحقًا');
    }


    protected function getOrders($status, $userId) {


        $orders = Orders::where('user_id', $userId)->where('status', $status)
                        ->whereHas('payment', function ($q) {
                            $q->where('status', 1);
                        })
                        ->get();

        return $orders;
    }
}
