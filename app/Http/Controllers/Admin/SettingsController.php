<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\City;
use App\ContactUsMessage;
use App\Orders;
use App\Promotion;
use App\Settings;
use App\Condition;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Charts;

class SettingsController extends Controller {

	public function getSettingsData() {

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

		$data = getById( 1, 'App\Settings' );

		return view( 'admin.settings.showAData', [ 'data' => $data ] );
	}

	public function getOrderSettings() {

        $checked =  Controller::checkAuthorization();

        if( !$checked )
            abort('403');

        $data = Settings::where('id', 1)->select('commission', 'order_deadline')->first();

        return view( 'admin.settings.order_settings', compact('data'));
    }

    public function postOrderSettings(Request $request) {

        $rules = [
            'commission' => 'required|numeric',
            'order_deadline' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('settings.order_settings.edit')->withErrors($validator)->withInput();
        }

        $saveData = Settings::find( 1 );
        if ( ! isset( $saveData ) ) {
            return back()->withErrors( [ 'Err' => 'خطأ فى قاعده البيانات برجاء التواصل مع فريق وسائل الشبكة' ] );
        }

        $saveData->commission = $request->commission;
        $saveData->order_deadline = $request->order_deadline;

        return $saveData->save()
            ? redirect()->route( 'settings.order_settings.edit' )->with( 'mOk', trans( 'messages.updateTrue' ) )
            : redirect()->route( 'settings.order_settings.edit' )->with( 'mNo', trans( 'messages.updateFalse' ) );
    }

	public function postSaveSettings( Request $request ) {

		$rules = [
			'name'         => 'required|max:255',
            'phone'           => 'required|max:255',
            'email' => 'required'
		];

		collValidation( $request, $rules);

		$saveData = Settings::find( 1 );
		if ( ! isset( $saveData ) ) {
			return back()->withErrors( [ 'Err' => 'خطأ فى قاعده البيانات برجاء التواصل مع فريق وسائل الشبكة' ] );
		}

		$saveData->name                 = $request->name;
        $saveData->phone                = $request->phone;
        $saveData->email                = $request->email;
        $saveData->fax                  = $request->fax;
        $saveData->address              = $request->address;
		$saveData->facebook             = $request->facebook;
        $saveData->twitter              = $request->twitter;
        $saveData->google_plus          = $request->google_plus;
        $saveData->instagram            = $request->instagram;
        $saveData->youtube              = $request->youtube;
        $saveData->pinterest            = $request->pinterest;
        $saveData->snapchat             = $request->snapchat;
		$saveData->last_update_by       = Auth::user()->id;
		$saveData->status               = $request->status;

		return $saveData->save() ? redirect()->route( 'settings' )->with( 'mOk', trans( 'messages.updateTrue' ) ) : redirect()->route( 'settings' )->with( 'mNo', trans( 'messages.updateFalse' ) );

	}

	public function getDashboard() {

        $data = $this->getStatisticsData();

        return view('admin.settings.dashboard', compact('data'));
	}

    public function statistics() {

        $adminsChart = Charts::database(User::where('user_type', 1)->get(), 'bar', 'highcharts')
                            ->elementLabel("المديرين")
                            ->title('مخطط المديرين')
                            ->dimensions(0, 200)
                            ->groupByMonth();

        $usersChart = Charts::database(User::where('user_type', 3)->get(), 'bar', 'highcharts')
                            ->elementLabel("المستخدمين")
                            ->title('مخطط المستخدمين')
                            ->dimensions(0, 200)
                            ->groupByMonth();

        $centersChart = Charts::database(User::where('user_type', 2)->get(), 'bar', 'highcharts')
                            ->elementLabel("مراكز التجميل")
                            ->title('مخطط مراكز التجميل')
                            ->dimensions(0, 200)
                            ->groupByMonth();

        $pendingOrdersChart = Charts::database(Orders::PendingOrders()->get(), 'bar', 'highcharts')
                                    ->elementLabel("حجوزات في انتظار الموافقة")
                                    ->title('مخطط حجوزات في انتظار الموافقة')
                                    ->dimensions(0, 200)
                                    ->groupByMonth();

        $rejectedOrdersChart = Charts::database(Orders::RejectedOrders()->get(), 'bar', 'highcharts')
                                    ->elementLabel("حجوزات مرفوضة")
                                    ->title('مخطط حجوزات مرفوضة')
                                    ->dimensions(0, 200)
                                    ->groupByMonth();

        $banksChart = Charts::database(Bank::where('type', 1)->get(), 'bar', 'highcharts')
                            ->elementLabel("الحسابات البنكية")
                            ->title('مخطط الحسابات البنكية')
                            ->dimensions(0, 200)
                            ->groupByMonth();

        $citiesChart = Charts::database(City::get(), 'bar', 'highcharts')
                            ->elementLabel("المدن")
                            ->title('مخطط المدن')
                            ->dimensions(0, 200)
                            ->groupByMonth();

        $adminMessagesChart = Charts::database(ContactUsMessage::get(), 'bar', 'highcharts')
                                    ->elementLabel("رسائل الإدارة")
                                    ->title('مخطط رسائل الإدارة')
                                    ->dimensions(0, 200)
                                    ->groupByMonth();

        $data = $this->getStatisticsData();

        return view('admin.settings.statistics',compact('data', 'adminsChart', 'usersChart', 'centersChart',
                    'banksChart', 'adminMessagesChart', 'rejectedOrdersChart', 'pendingOrdersChart', 'citiesChart'));
    }

	public function getSiteConditions() {

        $checked =  Controller::checkAuthorization();

        if( !$checked )
            abort('403');

//	    $data = Settings::where('id', 1)->select('site_conditions')->first();
        $data = Condition::where('id', 1)->pluck('site_conditions')->first();
        $title = 'الشروط والأحكام';
        $name = 'site_conditions';

        return view('admin.settings.site_conditions', compact('data', 'title', 'name'));
    }

    public function postSiteConditions( Request $request ) {

        $request->validate([
            'site_conditions' => 'required',
        ]);

        $saveData = Condition::findOrFail(1);

        $saveData->site_conditions = $request->site_conditions;

        return $saveData->save()
            ? redirect()->route( 'site-conditions-get' )->with( 'mOk', trans( 'messages.updateTrue' ) )
            : redirect()->route( 'site-conditions-get' )->with( 'mNo', trans( 'messages.updateFalse' ) );
    }

    public function getBankConditions() {

        $checked =  Controller::checkAuthorization();

        if( !$checked )
            abort('403');

        $data = Condition::where('id', 1)->pluck('bank_transfer_conditions')->first();
        $title = 'شروط التحويل البنكي';
        $name = 'bank_transfer_conditions';

        return view('admin.settings.site_conditions', compact('data', 'title', 'name'));
    }

    public function postBankConditions( Request $request ) {

        $request->validate([
            'bank_transfer_conditions' => 'required',
        ]);

        $saveData = Condition::findOrFail(1);

        $saveData->bank_transfer_conditions = $request->bank_transfer_conditions;

        return $saveData->save()
            ? redirect()->route( 'bank-transfer-conditions-get' )->with( 'mOk', trans( 'messages.updateTrue' ) )
            : redirect()->route( 'bank-transfer-conditions-get' )->with( 'mNo', trans( 'messages.updateFalse' ) );
    }


    public function getOrdersConditions() {

        $checked =  Controller::checkAuthorization();

        if( !$checked )
            abort('403');

        $data = Condition::where('id', 1)->pluck('orders_conditions')->first();
        $title = 'سياسة الحجز';
        $name = 'orders_conditions';

        return view('admin.settings.site_conditions', compact('data', 'title', 'name'));
    }

    public function postOrdersConditions( Request $request ) {

        $request->validate([
            'orders_conditions' => 'required',
        ]);

        $saveData = Condition::findOrFail(1);

        $saveData->orders_conditions = $request->orders_conditions;

        return $saveData->save()
            ? redirect()->route( 'orders-conditions-get' )->with( 'mOk', trans( 'messages.updateTrue' ) )
            : redirect()->route( 'orders-conditions-get' )->with( 'mNo', trans( 'messages.updateFalse' ) );
    }


    public function getAfterSellingConditions() {

        $checked =  Controller::checkAuthorization();

        if( !$checked )
            abort('403');

        $data = Condition::where('id', 1)->pluck('after_selling_conditions')->first();
        $title = 'سياسة ما بعد البيع';
        $name = 'after_selling_conditions';

        return view('admin.settings.site_conditions', compact('data', 'title', 'name'));
    }

    public function postAfterSellingConditions( Request $request ) {

        $request->validate([
            'after_selling_conditions' => 'required',
        ]);

        $saveData = Condition::findOrFail(1);

        $saveData->after_selling_conditions = $request->after_selling_conditions;

        return $saveData->save()
            ? redirect()->route( 'after-selling-conditions-get' )->with( 'mOk', trans( 'messages.updateTrue' ) )
            : redirect()->route( 'after-selling-conditions-get' )->with( 'mNo', trans( 'messages.updateFalse' ) );
    }

    public function getDeliveryConditions() {

        $checked =  Controller::checkAuthorization();

        if( !$checked )
            abort('403');

        $data = Condition::where('id', 1)->pluck('delivery_conditions')->first();
        $title = 'سياسة الشحن';
        $name = 'delivery_conditions';

        return view('admin.settings.site_conditions', compact('data', 'title', 'name'));
    }

    public function postDeliveryConditions( Request $request ) {

        $request->validate([
            'delivery_conditions' => 'required',
        ]);

        $saveData = Condition::findOrFail(1);

        $saveData->delivery_conditions = $request->delivery_conditions;

        return $saveData->save()
            ? redirect()->route( 'delivery-conditions-get' )->with( 'mOk', trans( 'messages.updateTrue' ) )
            : redirect()->route( 'delivery-conditions-get' )->with( 'mNo', trans( 'messages.updateFalse' ) );
    }






    public function getWhoAre() {

        $checked =  Controller::checkAuthorization();

        if( !$checked )
            abort('403');

        $data = Condition::where('id', 1)->select('who_are', 'footer_who_are')->first();
        $title = 'من نحن';
        $name = 'who_are';

        return view('admin.settings.site_conditions', compact('data', 'title', 'name'));
    }

    public function postWhoAre( Request $request ) {

        $request->validate([
            'who_are' => 'required',
        ]);

        $saveData = Condition::findOrFail(1);

        $saveData->who_are = $request->who_are;
        $saveData->footer_who_are = $request->footer_who_are;

        return $saveData->save()
            ? redirect()->route( 'who-are-get' )->with( 'mOk', trans( 'messages.updateTrue' ) )
            : redirect()->route( 'who-are-get' )->with( 'mNo', trans( 'messages.updateFalse' ) );
    }








    public function getPaymentMethodsConditions() {

        $checked =  Controller::checkAuthorization();

        if( !$checked )
            abort('403');

        $data = Condition::where('id', 1)->pluck('payment_methods')->first();
        $title = 'وسائل الدفع';
        $name = 'payment_methods';

        return view('admin.settings.site_conditions', compact('data', 'title', 'name'));
    }

    public function postPaymentMethodsConditions( Request $request ) {

        $request->validate([
            'payment_methods' => 'required',
        ]);

        $saveData = Condition::findOrFail(1);

        $saveData->payment_methods = $request->payment_methods;

        return $saveData->save()
            ? redirect()->route( 'payment-methods-get' )->with( 'mOk', trans( 'messages.updateTrue' ) )
            : redirect()->route( 'payment-methods-get' )->with( 'mNo', trans( 'messages.updateFalse' ) );
    }



    protected function getStatisticsData() {

        $adminsCount            = usersTypeCount('1');
        $centersCount           = usersTypeCount('2');
        $usersCount             = usersTypeCount('3');
        $pendingOrdersCount     = Orders::PendingOrders()->count();
        $rejectedOrdersCount    = Orders::RejectedOrders()->count();
        $banksCount             = Bank::where('type', 1)->count();
        $citiesCount            = City::count();
        $adminMessagesCount     = ContactUsMessage::count();

        return ['adminsCount'       => $adminsCount,
                'centersCount'      => $centersCount,
                'usersCount'        => $usersCount,
                'pendingOrdersCount' => $pendingOrdersCount,
                'rejectedOrdersCount' => $rejectedOrdersCount,
                'banksCount'        => $banksCount,
                'citiesCount'       => $citiesCount,
                'adminMessagesCount' => $adminMessagesCount
            ];
    }
}
