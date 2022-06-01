<?php

namespace App\Http\Controllers\Web;

use App\Bank;
use App\Payment;
use App\Settings;
use App\Orders;
use Cookie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    public function chooseMethod() {

        $totalPrice = session('totalOrderPrice');
        $companyName = session('companyName');
        $individualCount = session('individualCount');
        $orderDate = strtotime(session('orderDate'));

        //formatted-order-date.......
        $day        = getArDay( date('D', $orderDate) );
        $onlyDate   = $day . ' ' .date('Y-m-d', $orderDate);
        $onlyTime   = date('H:i:s', $orderDate) != '00:00:00' ? date('g:i A', $orderDate) : NULL;

        $commissionPercentage = Settings::where('id', 1)->pluck('commission')->first();

        $commissionPrice = $totalPrice * ($commissionPercentage / 100) ;
//        session(['commissionPrice' => $commissionPrice]);

        return view('web.payment.choose_method', compact('totalPrice', 'commissionPrice', 'companyName', 'individualCount', 'onlyDate', 'onlyTime'));
    }

    public function create(Request $request ,$method) {

        $totalPrice = session('totalOrderPrice');
        $companyName = session('companyName');
        $individualCount = session('individualCount');
        $orderDate = strtotime(session('orderDate'));

        //formatted-order-date.......
        $day        = getArDay( date('D', $orderDate) );
        $onlyDate   = $day . ' ' .date('Y-m-d', $orderDate);
        $onlyTime   = date('H:i:s', $orderDate) != '00:00:00' ? date('g:i A', $orderDate) : NULL;

        $commissionPercentage = Settings::where('id', 1)->pluck('commission')->first();

        $commissionPrice = $totalPrice * ($commissionPercentage / 100) ;
        
        //session(['commissionPrice' => $commissionPrice]);


        switch ($method) {

            case 'bank':

                $banks = Bank::where('type', 1)->get();

                return view('web.payment.bank_method', compact('banks'));

            case 'visa':
                return view('web.payment.visa_method');

            case 'mastercard':
                return view('web.payment.master_method');
                
            case 'receipt':
                return view('web.payment.receipt_method',compact('totalPrice', 'commissionPrice', 'companyName', 'individualCount', 'onlyDate', 'onlyTime'));    

            default :
                return redirect()->route('payment.method');
        }
    }


    public function store(Request $request, $method) {
        
        $request->validate([
            'username' => 'required',
            'account_number' => 'required',
            'bank' => 'required',
            'price' => 'required|numeric',
            'file' => 'required|mimes:jpg,jpeg,png,tiff',
        ]);

        if ( isset($request->file) && $request->file ) {

            $request['paper'] = newUploading($request->file, '/uploads/orders');
        }

        $request['order_id'] = session('orderId');
        $request['method'] = $method;

        //if-method-bank-then-order-has-status-pending-by-default(2)..
        //otherwise-its-status-will-be-accepted(1)..

        $created = Payment::create($request->all());

        if($created->count() > 0 ) {

        $email = Orders::find(session('orderId'));
        $user_email = 'admin@admin.com';

        if($email) {
            $user_email = $email->user->email;
        }

        $siteEmail = Controller::getSiteData()['site_email'];
        $siteName = Controller::getSiteData()['site_name'];

        $vars = [
            'from' => $siteEmail,
            'messagesTitle' => 'موقع '. $siteName,
            'to' => $user_email, //...
            'fromName' => $siteName,
            'token' => csrf_token(),
            'subject' => 'حجز خدمة جديده في موقع '. $siteName,
        ];

            sendEmail('web.emails.new_order', $vars);

            return redirect()->route('home')->with('alert', 'تم حجز خدمة بنجاح, سيتم الرد عليك من قبل المركز المقدم للخدمة');

        }
        
        return redirect()->route('payment/method/create', 'bank')->with('alert', 'حدث خطأ أثناء الحجز, رجاء حاول مرة أخرى');
    
    }

    public function storeReceipt(Request $request, $method) {
        
        $data = Settings::find(1); 
        
        $request->validate([
            
            'price' => 'required|numeric',
        ]);


        // var_dump($_COOKIE);

        $request['order_id'] = session('orderId');
        $request['commission'] = ($data->commission * session('individualCount') * $request['price']) / 100;
        $request['status'] = 1;
        $request['method'] = $method;
    
        $created = Payment::create($request->all());

        return $created->count() > 0
            ? redirect()->route('home')->with('alert', 'تم حجز خدمة بنجاح, سيتم الرد عليك من قبل المركز المقدم للخدمة')
            : redirect()->route('payment/method/create', 'receipt')->with('alert', 'حدث خطأ أثناء الحجز, رجاء حاول مرة أخرى');
    }


}