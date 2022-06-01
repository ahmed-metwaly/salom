<?php

use App\Orders;
use Carbon\Carbon;


function uploadPath( $url = '' ) {

	return url( '' . $url );

}


function CheckData( $data ) {

	if ( ! isset( $data ) && count($data) > 0 ) {
		return back()->withErrors( [ 'Err' => 'خطأ فى قاعده البيانات برجاء التواصل مع فريق الدعم' ] );
	} else {
		return true;
	}
}


function menu() {

	return [

        [
            'title' => trans( 'admin.sideDashboard' ),
            'icon'  => 'icon-home4',
            'route' => [
                'dashboard' => 'الإحصائيات',
                'admin-statistics' => 'مخطط الإحصائيات'
            ]

        ],

		[
			'title' => trans( 'admin.sideSettingsTitle' ),
			'icon'  => 'icon-cog3',
			'route' => [
                'settings' => trans( 'admin.settingsTitle' ),
				'settings.order_settings.edit' => trans( 'admin.ordersSettings' )
			]

		],

		[
			'title' => trans( 'admin.usersTitle' ),
			'icon'  => 'icon-user',
			'route' => [
				'admins'    => trans( 'admin.sideAdminsShow' ),
				'users'     => trans( 'admin.sideUsersShow' ),
				'admin-add' => trans( 'admin.sideUsersAdd' ),

			]

		],

        [

            'title' => 'الحسابات البنكية',
            'icon'  => 'icon-briefcase',
            'route' => [
                'admin.banks.index' => 'عرض الحسابات البنكية',
                'admin.banks.create' => trans( 'admin.bankAccountAdd' )
            ]

        ],

        [

            'title' => 'الحسابات البنكية للمراكز',
            'icon'  => 'icon-briefcase',
            'route' => [
                'bank-accounts' => 'عرض الحسابات البنكية للمراكز',
//                'bank-add' => trans( 'admin.bankAccountAdd' )
            ]

        ],

        [
            'title' => trans( 'admin.citiesTitle' ),
            'icon'  => 'icon-home4',
            'route' => [
                'cities.index'    => trans( 'admin.citiesDisplay' ),
                'cities.create' => trans( 'admin.sideCitiesAdd' ),

            ]

        ],

        [
            'title' => "مراكز التجميل",
            'icon'  => 'icon-home2',
            'route' => [
                'centers'    => 'عرض مراكز التجميل',
                'deactive-centers' => 'مراكز في انتظار التفعيل',
            ]

        ],

//        [
//            'title' => "تقييم مراكز التجميل",
//            'icon'  => 'icon-home2',
//            'route' => [
//                'ratings'    => 'عرض التقييمات',
//            ]
//
//        ],

        [
            'title' =>  trans( 'admin.companyOrders' ),
            'icon'  => 'icon-basket',
            'route' => [
                'pending-orders'   => "في انتظار الموافقة" . '<span class="count-span">' . ordersTypeCount(">=", 2) .'</span>' ,
                'current-orders'   => "الحجوزات الجارية" . '<span class="count-span">' . ordersTypeCount(">=", 1) .'</span>' ,
                'rejected-orders'  => "الحجوزات المرفوضة" . '<span class="count-span">' . ordersTypeCount("", 0) .'</span>' ,
                'old-orders'       => "الحجوزات السابقة" . '<span class="count-span">' . ordersTypeCount("<", 1) .'</span>' ,
            ]

        ],

        [

            'title' => 'خدمات مراكز التجميل',
            'icon'  => 'icon-puzzle',
            'route' => [
                'services' => 'عرض خدمات مراكز التجميل',
            ]

        ],

        [

            'title' => 'الخدمات والمراكز المميزة',
            'icon'  => 'icon-coins',
            'route' => [
                'promotions.service' => 'الخدمة المميزة',
                'promotions.services' => 'خدمات تجميلية راقية',
                'promotions.companies' => 'أفضل مراكز التجميل',
            ]

        ],

        [

            'title' => 'العمليات',
            'icon'  => 'icon-home',
            'route' => [
                'operations.index' => 'عرض جميع العمليات',
                'operations.create' => 'إضافة جديد',
            ]

        ],

        [

            'title' => trans( 'admin.adminMessages' ),
            'icon'  => 'icon-envelope',
            'route' => [
                'admin-messages' => trans( 'admin.adminMessageShow' ),
            ]

        ],

        [
            'title' => trans( 'admin.sideLevelsTitle' ),
            'icon'  => 'icon-wrench',
            'route' => [
                'levels'    => trans( 'admin.sideLevelsShow' ),
                'level-add' => trans( 'admin.sideLevelsAdd' )
            ]

        ],

        [
            'title' => trans('admin.sideSiteTitle'),
            'icon'  => 'icon-home4',
            'route' => [
                'sliders' => trans( 'admin.sliderShow' ),
                'who-are-get' => 'من نحن',
                'site-conditions-get' => 'شروط الموقع',
                'bank-transfer-conditions-get' => 'شروط التحويل البنكي',
                'orders-conditions-get' => 'سياسة الحجز',
                'after-selling-conditions-get' => 'سياسة ما بعد البيع',
                'delivery-conditions-get' => 'سياسة الشحن',
                'payment-methods-get' => 'طرق الدفع',
            ]

        ],

        [
            'title' => trans( 'admin.sideCommission' ),
            'icon'  => 'icon-home4',
            'route' => [
                'commission-percentage'      => trans( 'admin.commissionPercentage' ),
                'commission-owedBalances'    => trans( 'admin.owedBalances' ),
                'commission-payedBalances'   => trans( 'admin.payedBalances' )
            ]

        ],

//        [
//            'title' => trans('admin.sideSiteTitle'),
//            'icon'  => 'icon-home4',
//            'route' => [
//                'slider' => trans( 'admin.sliderShow' ),
//                'app-images' => trans( 'admin.appImagesShow' ),
//                'about'    => trans( 'admin.aboutTitleShow' ),
//                'advantages' => trans( 'admin.advantagesTitleShow' ),
//                'clients-opinions' => trans( 'admin.clientsOpinionsShow' ),
//                'sponcers' => "الرعاة",
//            ]
//
//        ],


//        [
//            'title' => "الحسابات البنكيه",
//            'icon'  => 'icon-home4',
//            'route' => [
//                'AdminActiveAds'    => 'عرض الحسابات البنكيه'
//            ]
//
//        ],



//		[
//
//			'title' => trans( 'admin.bankTransfers' ),
//			'icon'  => 'icon-home4',
//			'route' => [
//				'transfers-list' => trans( 'admin.bankTransfersCommission' ),
//				'subscribe-transfer-list' => trans( 'admin.bankTransfersSubscribe' )
//
//			]
//
//		],

	];

}


function uploads($folder = '') {

    return base_path('uploads') . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR;

}

// save image base 64

function countries() {

	return \App\Countries::orderBy( 'id', 'ASC' )->select( 'id','name' )->get();
}

function categories() {

	return \App\Categories::orderBy( 'id', 'ASC' )->select( 'id', 'name','photo' )->get();
}

function SubCats( $col ,$id) {

	return  \App\sub_cts::where( $col, $id )->select( 'id', 'name','img' )->limit(21)->get() ;
}

function SubCat($id) {

	return \App\sub_cts::join('users', 'sub_cts.created_by' , '=', 'users.id' )->join('categories','sub_cts.cat_id','=','categories.id')->where( 'sub_cts.cat_id', $id )->select('sub_cts.*','users.id as user_id', 'users.name as user_name','categories.id as cat_id' ,'categories.name as cat_name')->orderBy( 'sub_cts.id','ASC')->limit(21)->get();
}

function Marks() {

	return \App\Marks::orderBy( 'id', 'DESC' )->select( 'id', 'name','photo','subcat_id' )->get();
}


function Mark() {

	return \App\Marks::orderBy( 'id', 'Asc' )->select( 'id', 'name','photo','subcat_id' )->get();
}

function Years() {

	return \App\Years::orderBy( 'id', 'ASC' )->select( 'id', 'name' )->get();
}

function getNotifs(){
	return \App\Notifications::join( 'ads', 'ads.id', '=', 'notifications.ad_id' )->join( 'users', 'users.id', '=', 'notifications.by_user' )->where('notifications.to_user_id', Auth::user()->id)->where('notifications.seen', 0)->select('notifications.id as id','notifications.created_at as created_at','ads.id as ad_id','ads.title as ad_title','users.id as user_id' ,'users.name as username')->count();
}

function uploadImg64( $base64_img, $path ) {

	$image_data = base64_decode( $base64_img );
	$source     = imagecreatefromstring( $image_data );
	$angle      = 0;
	$rotate     = imagerotate( $source, $angle, 0 ); // if want to rotate the image
	$imageName  = 'ws4it-'. rand(0, 9999) . '.png';
	$path       = $path . $imageName;
	$imageSave  = imagejpeg( $rotate, $path, 100 );

	return $imageName;
}


function pages( $type ) {

	return \App\Pages::where( 'type', $type )->orderBy( 'id', 'DESC' )->select( 'id', 'name' )->get();
}


function getById( $id, $eloquentName ) {

	return $eloquentName::findOrFail( $id );

}


// get ajax request
function getAjaxCity( $col ,$id ) {

	return json_encode( \App\Cities::where( $col, $id )->select( 'id', 'name' )->get() );
}



function getAjaxGroup() {

	return json_encode(\App\Groups::orderBy( 'id', 'DESC' )->where( 'status', 1 )->get());
}

function cities() {

	return \App\Cities::orderBy( 'id', 'DESC' )->where( 'status', 1 )->select( 'id', 'name' )->get();
}

function groups() {

	return \App\Groups::orderBy( 'id', 'DESC' )->where( 'status', 1 )->get();
}

function akars() {

	return \App\Akars::orderBy( 'id', 'DESC' )->where( 'status', 1 )->select( 'id', 'name' )->get();
}

function getAjaxHay( $col , $id ) {

	return json_encode( \App\Hay::where( $col, $id )->select( 'id', 'name_' . App::getLocale() . ' as name' )->get() );
}

function getAjaxHay2(  $id,$col  ) {

	return json_encode( \App\Hay::where( $col, $id )->select( 'id', 'name' )->get() );
}

function getAjaxSubCat(  $col , $id ) {

	return json_encode( \App\sub_cts::where( $col, $id )->select( 'id', 'name' )->get() );
}

function getAjaxModel( $id, $col ) {

	return json_encode( \App\Models::where( $col, $id )->select( 'id', 'name' )->get() );
}

function countNotification() {

	if ( auth()->check() ) {

		return \App\Notifications::where( 'to_user_id', auth()->user()->id )->where( 'seen', 0 )->count();

	}
}

function collValidation( $request, $rules = [], $routeBack = 'back', $route = '' ) {


	return false;


}


function uploading( $inputRequest, $folderNam, $resize = [] ) {

//	$imageName = time() . '.' . $inputRequest->getClientOriginalExtension();
    $imageName = time() . rand(0, 99) .'.' . $inputRequest->getClientOriginalExtension();

    if ( ! empty( $resize ) ) {

		foreach ( $resize as $dimensions ) {

			$destinationPath = public_path( $folderNam . '_' . $dimensions );

			$img = Image::make( $inputRequest->getRealPath() );

			$dimension = explode( 'x', $dimensions );

			$img->resize( $dimension[0], $dimension[1], function( $constraint ) {

				$constraint->aspectRatio();

			} );

			$img->insert( 'public/Web/images/haraj-logo.png', 'bottom-right' );

			$img->save( $destinationPath . DIRECTORY_SEPARATOR . $imageName );
		}
	}

//    $destinationPath = public_path( '/' . $folderNam );

    $destinationPath = base_path('uploads/'. $folderNam);
	$inputRequest->move( $destinationPath, $imageName );

	return $imageName ? $imageName : false;
}

function newUploading( $inputRequest, $folderNam ) {

    $imageName = time() . rand(0, 99) .'.' . $inputRequest->getClientOriginalExtension();

    $destinationPath = public_path( '/' . $folderNam );

    $inputRequest->move( $destinationPath, $imageName );

    return $imageName ? $imageName : false;
}


function uploading2( $inputRequest, $folderNam, $resize = [] ) {

	$imageName = time() . rand(0, 99) .'.' . $inputRequest->getClientOriginalExtension();

	if ( ! empty( $resize ) ) {

		if(! is_dir(public_path( $folderNam))) {
				mkdir(public_path( $folderNam), 0777);
				chmod(public_path( $folderNam), 0777);
		}

		foreach ( $resize as $dimensions ) {

			$destinationPath = public_path( $folderNam . '_' . $dimensions );

			if( ! is_dir($destinationPath)) {

					mkdir($destinationPath, 0777, true);
					chmod($destinationPath, 0777);

			}
			$img = Image::make( $inputRequest->getRealPath() );

			$dimension = explode( 'x', $dimensions );

			$img->resize( $dimension[0], $dimension[1], function( $constraint ) {

				$constraint->aspectRatio();

			} );

			// $img->insert( 'public/Web/images/logo-sm.png', 'bottom-right' );

			$img->save( $destinationPath . DIRECTORY_SEPARATOR . $imageName );


		}

	}


	$destinationPath = public_path( '/' . $folderNam );
	$inputRequest->move( $destinationPath, $imageName );

	return $imageName ? $imageName : false;


}


function settings() {

	return \App\Settings::where( 'id', 1 )->first();
}



function sendEmail( $fileMessagesPath, $vars = [], $attach = '' ) {

	Mail::send( $fileMessagesPath, [
		'title' => $vars['messagesTitle'],
		'token' => $vars['token']
	], function( $message ) use ( $vars ) {

		$message->from( $vars['from'], $vars['messagesTitle'] );
		$message->to( $vars['to'] );
		$message->subject( $vars['subject'] );
	} );

	if ( Mail::failures() ) {
		return false;
	}

	return true;
}

function sendEmailNew( $fileMessagesPath, $vars = [], $attach = '' ) {

    Mail::send( $fileMessagesPath, [
        'title' => $vars['messagesTitle'],
        'subject' => $vars['subject'],
        'body' => $vars['body'],
    ], function( $message ) use ( $vars ) {

        $message->from( $vars['from'], $vars['messagesTitle'] );
        $message->to( $vars['to'] );
        $message->subject( $vars['subject'] );
    } );

    if ( Mail::failures() ) {
        return false;
    }

    return true;
}


// Api API

function SMS( $numbers, $msg ) {

    require app_path() . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR.'Mobily'. DIRECTORY_SEPARATOR .'includeSettings.php';

    $mobile   = "966561206205";
    $password = "mmnn9090";
    $sender   = "tgamelek";
    $MsgID    = rand( 1, 99999 );

    $send_sms = sendSMS( $mobile, $password, $numbers, $sender, $msg, $MsgID );

    return $send_sms;


}

function filterNumber( $number ) {


    $code = 966;

    $prospects = [
        $code,
        "00$code",
        "+$code",
        0
    ];

    foreach ($prospects as $prospect) {

        $len = strlen($prospect);

        $errCode = mb_strcut($number, 0, $len);
        $compNum = mb_substr($number, 0, $len);

        if($errCode == $prospect) {

            return "00$code" . $compNum;

        }

    }

    return FALSE;

}

function generateCode($len = 4) {

    $characters          = '0123456789';
    $charactersLength    = strlen( $characters );
    $sms_validation_code = '';
    $length              = $len;

    for ( $i = 0; $i < $length; $i ++ ) {
        $sms_validation_code .= $characters[ rand( 0, $charactersLength - 1 ) ];
    }

    return $sms_validation_code;
}


//new.......
function imgPath($folder = '') {

    return '/uploads' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR;

}

function arabicDays() {

    return ['السبت', 'الاحد', 'الاثنين', 'الثلاثاء', 'الاربعاء', 'الخميس', 'الجمعة'];
}

function arDays(){

    return [
        'السبت' => 'Sat',
        'الاحد' => 'Sun',
        'الاثنين' => 'Mon',
        'الثلاثاء' => 'Tue',
        'الاربعاء' => 'Wed',
        'الخميس' => 'Thu',
        'الجمعة' => 'Fri'
    ];
}

function getEnDay( $ar_day ){

    $days_array = arDays();
    foreach ( $days_array as $key => $value ) {
        if ( $ar_day == $key ) {
            return $value;
        }
    }
}


function explodeByColon( $str ) {
    return explode( ":", $str );
}

function explodeByComma( $str ) {
    return explode( ",", $str );
}

function explodeBySpace( $str ) {
    return explode( " ", $str );
}

function arrayToStr($obj) {

    $str = '';

    foreach ($obj as $key => $value) {

        if($key != count($obj)-1) {

            $str.= $value . ',';
        }
        else
            $str.= $value;
    }
    return $str;
}

function minutesToHours( $time ) {

    if( $time != 0 ){

        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return 'المدة: '.$hours.' ساعة و '.$minutes.' دقيقة';
    }
    return '0 ساعة';

}

function validateRules($errors, $rules) {

    $error_arr = [];

    foreach ($rules as $key => $value) {

        if( $errors->get($key) ) {

            array_push($error_arr, array('key' => $key, 'value' => $errors->first($key)));
        }
    }

    return $error_arr;
}

function ordersTypeCount($comparison, $status){

    if ($comparison != '') {

        return \App\Orders::where(function ($q) use ($comparison, $status) {
                                    $q->whereDate('date', $comparison, Carbon::today()->toDateString())
                                        ->whereHas('payment', function ($q) use($status){
                                            $q->where('status', $status);
                                        });
                                })->count();
    }
    //else...
    return \App\Orders::whereHas('payment', function ($q) use ($status) {
                                    $q->where('status', $status);
                                })
                                ->count();

}

function companyOrdersTypeCount($status, $company_id){

        return \App\Orders::where('company_id', $company_id)->where('status', $status)
                            ->whereHas('payment', function ($q) {
                                $q->where('status', 1);
                            })
                            ->count();
}

function usersTypeCount($type){

    return \App\User::where( function($q) use($type) {
                        $q->where('user_type', $type);
                    })->count();
}

function levels($id) {

    $levels = \App\Groups::where('id', $id)->first();

    $arr = json_decode($levels->items);

    $values = [];

    foreach ($arr as $key => $value) {

        $values[] = $key;
    }

    return $values;

}

function getCompanyName($company_id) {

    $company = \App\User::where('id', $company_id)->first();
    return $company->name;
}

function enDays(){

    return [
        'Sat' => 'السبت',
        'Sun' => 'الاحد',
        'Mon' => 'الاثنين',
        'Tue' => 'الثلاثاء',
        'Wed' => 'الاربعاء',
        'Thu' => 'الخميس',
        'Fri' => 'الجمعة'
    ];
}

function getArDay( $enDay ){

    $days_array = enDays();

    foreach ( $days_array as $key => $value ) {
        if ( $enDay == $key ) {
            return $value;
        }
    }
}

function shortDays(){

    return [
        '1' => 'Sat',
        '2' => 'Sun',
        '3' => 'Mon',
        '4' => 'Tue',
        '5' => 'Wed',
        '6' => 'Thu',
        '7' => 'Fri'
    ];
}

function getShortDay( $dayNumber ){

    $days_array = shortDays();

    foreach ( $days_array as $key => $value ) {
        if ( $dayNumber == $key ) {
            return $value;
        }
    }
}


function enFullDays(){

    return [
        'Sat' => 'Saturday',
        'Sun' => 'Sunday',
        'Mon' => 'Monday',
        'Tue' => 'Tuesday',
        'Wed' => 'Wednesday',
        'Thu' => 'Thursday',
        'Fri' => 'Friday'
    ];
}

function getEnFullDay( $enDay ){

    $days_array = enFullDays();

    foreach ( $days_array as $key => $value ) {
        if ( $enDay == $key ) {
            return $value;
        }
    }
}

function monthsCount($_date) {

    $today = strtotime("today");
    $date = strtotime($_date);
    $min_date = min($today, $date);
    $max_date = max($today, $date);
    $i = 0;

    while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
        $i++;
    }

    return $i;
}

function payedMonthsCount($array) {

    foreach ($array as $date) {

        $dates_arr[] = date('m', strtotime($date));
    }

    return array_unique($dates_arr);
}

function checkDayExists($service, $dayId) {

    $serviceDays = $service->days()->pluck('day_id')->toArray();

    return in_array($dayId, $serviceDays);
}

//function checkWorkDayExists($serviceId, $dayId) {
//
//    $exists = \App\WorkTime::where([ ['service_id', $serviceId], ['day_id', $dayId] ])->first();
//
//    return $exists ? true : false;
//}

function checkWorkDayExists($companyId, $dayId, $type) {

    $exists = \App\Work::where([ ['workable_id', $companyId], ['workable_type', $type], ['day_id', $dayId] ])->first();

    return $exists ? true : false;
}

function getWorkTimes($companyId, $dayId, $type) {

    $data = \App\Work::where([ ['workable_id', $companyId], ['workable_type', $type], ['day_id', $dayId] ])->get();

    return $data;
}

function getWorkFrom($serviceId, $dayId) {

    $work = \App\WorkTime::where([ ['service_id', $serviceId], ['day_id', $dayId] ])->first();

    return $work->time_from;
}

function getWorkTo($serviceId, $dayId) {

    $work = \App\WorkTime::where([ ['service_id', $serviceId], ['day_id', $dayId] ])->first();

    return $work->time_to;
}

//function randIdNumber($length) {
//
//    $seed = str_split('abcdefghijklmnopqrstuvwxyz' .'ABCDEFGHIJKLMNOPQRSTUVWXYZ' .'0123456789!@$%^&*()');
//
//    shuffle($seed);
//
//    $rand = '';
//
//    foreach (array_rand($seed, $length) as $k) $rand .= $seed[$k];
//
//    return "#$rand";
//}

function randIdNumber($userId, $length) {

    $seed = str_split('0123456789');

    shuffle($seed);

    $rand = '';

    foreach (array_rand($seed, $length) as $k) $rand .= $seed[$k];

    return "#" . $userId * $userId . $rand;
}

function individualsCount(){

    return [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
}

function getFormattedTime($date) {

    return date('g:i A', strtotime($date));
}

function getFormattedDate($date) {

    $day = getArDay( date('D', strtotime($date)) );

    return $day . ' ' .date('Y-m-d', strtotime($date));
}

function isUserServiceRating ($userId, $serviceId) {

    return \App\Rating::where([ ['user_id', $userId], ['rateable_id', $serviceId] ])->count();
}

function userServiceRating($userId, $serviceId) {

    $rating = \App\Rating::where([ ['user_id', $userId], ['rateable_id', $serviceId] ])->first();

    return $rating ? $rating->stars_count : 0 ;
}

function getUserById($id){

    return \App\User::where('id', $id)->first();
}

function getNextDate($work) {

    $day = Carbon::now();

    if(date('D', strtotime($day)) == $work->day->en_day) {

        return date("Y-m-d", strtotime($day));

    }
    //التاريخ اللي هحتاجه في الاوردر ك ديفولت
    return date("Y-m-d", strtotime("next " . getEnFullDay($work->day->en_day)));
}

function isValidReservation($work, $companyId) {

    $onlyDate = getNextDate($work);

    $completeFromDate = $onlyDate . ' ' . $work->time_from;
    $completeToDate = $onlyDate . ' ' . $work->time_to;

    $companyHasOrdersThisInterval = Orders::where('company_id', $companyId)
                                        ->whereHas('payment', function ($q){
                                            $q->where('status', 1);
                                        })
                                        ->whereBetween('date', [$completeFromDate, $completeToDate])
                                        ->count();

    return $companyHasOrdersThisInterval >= $work->orders_count_per_interval ? false : true ;
}

//function starsCount ($companyId) {
//
//    $company = \App\User::where('id', $companyId)->first();
//    $rating_count = $company->ratings->count();
//
//    if($rating_count) {
//
//        $stars_arr = [];
//
//        foreach ($company->ratings as $rating) {
//
//            $stars_arr[] = $rating->stars_count;
//        }
//
//        $rating_sum = array_sum($stars_arr);
//        $rating_count = number_format( (float)$rating_sum / $rating_count, 2, '.', '' );
//    }
//
//    return $rating_count;
//}










