<?php Route::get( '/resetPassword/{active}', [
    'uses' => 'Web\UserController@getRestPassword',
    'as'   => 'reset-password'
] );

Route::post( '/postRestPassword', [
    'uses' => 'Web\UserController@postRestPassword',
    'as'   => 'post-reset-password'
] );

// OAuth Routes
Route::get( '/auth/{provider}', [
    'uses' => 'Auth\LoginController@redirectToProvider',
    'as'   => 'auth-provider'
] );
Route::get( '/auth/{provider}/callback', [
    'uses' => 'Auth\LoginController@handleProviderCallback',
    'as'   => 'auth-provider-callback'
] );

//Route::get( '/login', function (){
//    abort('404');
//});

Route::get( '/login', [
    'uses' => 'Auth\LoginController@showLoginForm',
    'as'   => 'get-login'
] );

Route::post( '/do-login', [
    'uses' => 'Auth\LoginController@login',
    'as'   => 'login'
] );


Route::get( '/register', [
    'uses' => 'Auth\RegisterController@chooseRegistrationType',
    'as'   => 'register'
] );

Route::get( '/register-user', [
    'uses' => 'Auth\RegisterController@showRegistrationForm',
    'as'   => 'show-register-user'
] );

Route::get( '/register-company', [
    'uses' => 'Auth\RegisterController@showCompanyRegistrationForm',
    'as'   => 'show-register-company'
] );

Route::post( '/register-user', [
    'uses' => 'Auth\RegisterController@register',
    'as'   => 'register-user'
] );

Route::post( '/register-company', [
    'uses' => 'Auth\RegisterController@registerCompany',
    'as'   => 'register-company'
] );

Route::post( '/find-user-by-idNum', [
    'uses' => 'Web\UserController@findUserByIdNum',
    'as'   => 'find-user-by-idNum'
] );


Route::group( [ 'middleware' => 'auth', 'namespace' => 'Web' ], function() {

    Route::get( '/profile', [
        'uses' => 'UserController@getUserData',
        'as'   => 'create-profile'
    ] );

    Route::post( '/profile', [
        'uses' => 'UserController@storeUserData',
        'as'   => 'store-profile'
    ] );

    Route::get( '/change-password', [
        'uses' => 'UserController@showChangePasswordForm',
        'as'   => 'change-password-form'
    ] );

    Route::post( '/change-password', [
        'uses' => 'UserController@changePassword',
        'as'   => 'change-password'
    ] );

//    Route::get( '/orders', [
//        'uses' => 'OrderController@index',
//        'as'   => 'web.orders.index'
//    ] );


//    Route::get( '/orders/confirm/{serviceId}', [
//        'uses' => 'OrderController@getConfirm',
//        'as'   => 'web.orders.get_confirm'
//    ] );
//
//    Route::post( '/orders/confirm/{serviceId}', [
//        'uses' => 'OrderController@postConfirm',
//        'as'   => 'web.orders.post_confirm'
//    ] );

});

Route::group( [ 'middleware' => 'user', 'namespace' => 'Web' ], function() {

    Route::get( '/orders', [
        'uses' => 'OrderController@index',
        'as'   => 'web.orders.index'
    ] );

    Route::get( '/orders/invoice/{orderId}', [
        'uses' => 'OrderController@showInvoice',
        'as'   => 'web.orders.invoice'
    ] );

    Route::get( '/orders/create/{serviceId}', [
        'uses' => 'OrderController@create',
        'as'   => 'web.orders.create'
    ] );

    Route::post( '/orders/validate-date', [
        'uses' => 'OrderController@validateDate',
        'as'   => 'web.orders.validate-date'
    ] );

    Route::post( '/orders/store-session-date', [
        'uses' => 'OrderController@storeDateInSession',
        'as'   => 'web.orders.store-session-date'
    ] );


    Route::post( '/orders/store/{serviceId}', [
        'uses' => 'OrderController@store',
        'as'   => 'web.orders.store'
    ] );

    Route::post( '/services/rate', [
        'uses' => 'ServiceController@rate',
        'as'   => 'web.services.rate'
    ] );

    Route::get( '/payment/method', [
        'uses' => 'PaymentController@chooseMethod',
        'as'   => 'payment.method'
    ] );

    Route::get( '/payment/{method}/create', [
        'uses' => 'PaymentController@create',
        'as'   => 'payment.method.create'
    ] );

    Route::post( '/payment/{method}/store', [
        'uses' => 'PaymentController@store',
        'as'   => 'payment.method.store'
    ] );

    Route::post( '/payment/{method}/storeReceipt', [
        'uses' => 'PaymentController@storeReceipt',
        'as'   => 'payment.method.storeReceipt'
    ] );


});

Route::group( [ 'namespace' => 'Web' ], function() {


    Route::get( '/activate-account/{token}', [
        'uses' => 'UserController@activateAccount',
        'as'   => 'activate-account'
    ] );


    Route::get( '/', [
        'uses' => 'HomeController@index',
        'as'   => 'home'
    ] );

    Route::resource('companies', 'CompanyController', ['as' => 'web', 'only' => ['index', 'show'] ]);

    Route::get( '/companies/services/{companyId}', [
        'uses' => 'CompanyController@companiesServices',
        'as'   => 'companies.services'
    ] );


    Route::resource('services', 'ServiceController', ['as' => 'web', 'only' => ['show']]);

    Route::post( '/services/findByName', [
        'uses' => 'ServiceController@findByName',
        'as'   => 'web.services.findByName'
    ] );

    Route::get( '/contact-us', [
        'uses' => 'ContactUsController@create',
        'as'   => 'create.contact.us'
    ] );

    Route::post( '/contact-us', [
        'uses' => 'ContactUsController@store',
        'as'   => 'store.contact.us'
    ] );

    Route::get( '/search', [
        'uses' => 'SearchController@search',
        'as'   => 'search'
    ] );

    Route::get( '/one_day', [
        'uses' => 'ServiceController@oneDay',
        'as'   => 'oneDay'
    ] );

    Route::get( '/nearBy', [
        'uses' => 'NearByController@index',
        'as'   => 'nearBy'
    ] );


//    Route::get( '/calcPrice/{late}/{long}', [
//        'uses' => 'NearByController@calcPrice',
//        'as'   => 'calcPrice'
//    ] );

    Route::post( '/near-locations', [
        'uses' => 'NearByController@nearLocations',
        'as'   => 'near-locations'
    ] );

    Route::get( '/site-conditions', [
        'uses' => 'SettingController@getSiteConditions',
        'as'   => 'site-conditions'
    ] );

    Route::get( '/bank-transfer-conditions', [
        'uses' => 'SettingController@getBankConditions',
        'as'   => 'bank-transfer-conditions'
    ] );

    Route::get( '/orders-conditions', [
        'uses' => 'SettingController@getOrdersConditions',
        'as'   => 'orders-conditions'
    ] );

    Route::get( '/after-selling-conditions', [
        'uses' => 'SettingController@getAfterSellingConditions',
        'as'   => 'after-selling-conditions'
    ] );

  Route::get( '/who-are', [
        'uses' => 'SettingController@whoAre',
        'as'   => 'who-are'
    ] );

    Route::get( '/delivery-conditions', [
        'uses' => 'SettingController@getDeliveryConditions',
        'as'   => 'delivery-conditions'
    ] );

    Route::get( '/payment-methods-conditions', [
        'uses' => 'SettingController@getPaymentMethodsConditions',
        'as'   => 'payment-methods-conditions'
    ] );
});



// admin login

Route::get( '/admin-login', 'Admin\AdminController@getLogin' )->name( 'admin-login' );
Route::post( '/login-admin', 'Admin\AdminController@postLogin' );

Route::get( '/login-admin-forget', 'Admin\AdminController@getForgetPassword' );
Route::post( '/login-admin-do-forget', 'Admin\AdminController@postForgetPassword' );

Route::get( '/login-user-forget', 'Web\UserController@getForgetPassword' )->name('forgetPassword');
Route::post( '/login-user-do-forget', 'Web\UserController@postForgetPassword' )->name('forget-password');

Route::get('/logout', 'Admin\AdminController@getLogout')->name('logout');



// admin_dashboard...

Route::group( [ 'middleware' => 'dashboard', 'prefix' => 'dashboard' ], function() {

	// get dashboard
	Route::get( '/', [
		'uses' => 'Admin\SettingsController@getDashboard',
		'as'   => 'dashboard'
	] );

    Route::get('/statistics', [
        'uses' => 'Admin\SettingsController@statistics',
        'as' => 'admin-statistics'
    ]);

	Route::group( [ 'prefix' => 'settings' ], function() {

        Route::get( '/', [
            'uses' => 'Admin\SettingsController@getSettingsData',
            'as'   => 'settings'
        ] );

        Route::post( '/settings-do-edit', [
            'uses' => 'Admin\SettingsController@postSaveSettings',
            'as'   => 'settings-do-edit'
        ] );

        Route::get( '/order-settings', [
            'uses' => 'Admin\SettingsController@getOrderSettings',
            'as'   => 'settings.order_settings.edit'
        ] );

        Route::post( '/order-settings', [
            'uses' => 'Admin\SettingsController@postOrderSettings',
            'as'   => 'settings.order_settings.update'
        ] );

	} );

    // Admins
    Route::group( [ 'prefix' => 'admins' ], function() {

        // show all admins
        Route::get( '/', [
            'uses' => 'Admin\AdminController@getAdmins',
            'as'   => 'admins'
        ] );

        Route::get( '/users', [
            'uses' => 'Admin\AdminController@getUsers',
            'as'   => 'users'
        ] );

        // show add form
        Route::get( 'add', [
            'uses' => 'Admin\AdminController@getAddAdmin',
            'as'   => 'admin-add'
        ] );

        // send form request
        Route::post( 'do-add', [
            'uses' => 'Admin\AdminController@postAddAdmin',
            'as'   => 'admin-do-add'
        ] );

        // show admin details
        Route::get( 'details/{id}', [
            'uses' => 'Admin\AdminController@getAdminDetails',
            'as'   => 'admin-details'
        ] );

        // show admin data in edit view
        Route::get( 'edit/{id}', [
            'uses' => 'Admin\AdminController@getEditAdmin',
            'as'   => 'admin-edit'
        ] );

        // send new admin data from form request to update
        Route::post( 'do-edit/{id}', [
            'uses' => 'Admin\AdminController@postEditAdmin',
            'as'   => 'admin-do-edit'
        ] );

        // delete admin
        Route::get( 'delete/{id}', [
            'uses' => 'Admin\AdminController@getDeleteAdmin',
            'as'   => 'admin-delete'
        ] );


    } );

//    Route::group( [ 'prefix' => 'banks' ], function() {
//
//        Route::get( '/', [
//            'uses' => 'Admin\BankAccountsController@index',
//            'as'   => 'admin.banks.index'
//        ] );
//
//        Route::get( '/create', [
//            'uses' => 'Admin\BankAccountsController@create',
//            'as'   => 'admin.banks.create'
//        ] );
//
//        Route::post( '/', [
//            'uses' => 'Admin\BankAccountsController@store',
//            'as'   => 'admin.banks.store'
//        ] );
//
//    } );

    Route::resource('banks', 'Admin\BankAccountsController', ['as' => 'admin', 'except' => 'show', 'destroy']);

    Route::get( '/banks/delete/{id}', [
        'uses' => 'Admin\BankAccountsController@destroy',
        'as'   => 'admin.banks.delete'
    ] );


    //centers
    Route::group( [ 'prefix' => 'centers' ], function() {

        // show all centers
        Route::get( '/', [
            'uses' => 'Admin\AdminController@getCenters',
            'as'   => 'centers'
        ] );

        Route::get( '/deactive', [
            'uses' => 'Admin\AdminController@getDeActiveCenters',
            'as'   => 'deactive-centers'
        ] );


       Route::get( '/active/{id}', [
            'uses' => 'Admin\AdminController@getActiveCenter',
            'as'   => 'active-center'
        ] );


	 Route::post( '/do-active/{id}', [
            'uses' => 'Admin\AdminController@postActiveCenter',
            'as'   => 'do-active-center'
        ] );



        // show add form
//        Route::get( 'add', [
//            'uses' => 'Admin\AdminController@getAddCenter',
//            'as'   => 'center-add'
//        ] );

        // send form request
//        Route::post( 'do-add', [
//            'uses' => 'Admin\AdminController@postAddCenter',
//            'as'   => 'center-do-add'
//        ] );

        // show center details
        Route::get( 'details/{id}', [
            'uses' => 'Admin\AdminController@getCenterDetails',
            'as'   => 'center-details'
        ] );

        // show centers data in edit view
        Route::get( 'edit/{id}', [
            'uses' => 'Admin\AdminController@getEditCenter',
            'as'   => 'center-edit'
        ] );

        // send new centers data from form request to update
        Route::post( 'do-edit/{id}', [
            'uses' => 'Admin\AdminController@postEditCenter',
            'as'   => 'center-do-edit'
        ] );

        // delete centers
        Route::get( 'delete/{id}', [
            'uses' => 'Admin\AdminController@getDeleteCenter',
            'as'   => 'center-delete'
        ] );


    } );

    //services
    Route::group( [ 'prefix' => 'services' ], function() {

        Route::get( '/', [
            'uses' => 'Admin\ServicesController@getServices',
            'as'   => 'services'
        ] );

        Route::get( 'details/{id}', [
          'uses' => 'Admin\ServicesController@getServiceDetails',
          'as'   => 'service-details'
        ] );

    } );

    Route::resource('operations', 'Admin\OperationController', ['except' => 'show', 'destroy']);

    Route::get( '/operations/delete/{id}', [
        'uses' => 'Admin\OperationController@destroy',
        'as'   => 'operations.delete'
    ] );


    //Admin messages
    Route::group( [ 'prefix' => 'admin-messages' ], function() {

        Route::get( '/', [
            'uses' => 'Admin\AdminMessagesController@getIndex',
            'as'   => 'admin-messages'
        ] );


        Route::get( 'admin-message-delete/{id}', [
            'uses' => 'Admin\AdminMessagesController@getDelete',
            'as'   => 'admin-message-delete'
        ] );


        Route::get( 'admin-message-details/{id}', [
            'uses' => 'Admin\AdminMessagesController@getDetails',
            'as'   => 'admin-message-details'
        ] );

    } );

    // bank_accounts
    Route::group( [ 'prefix' => 'bank-accounts' ], function() {

        Route::get( '/', [
            'uses' => 'Admin\BankAccountsController@companiesBanks',
            'as'   => 'bank-accounts'
        ] );

    } );

    //orders
    Route::group( [ 'prefix' => 'orders' ], function() {


		Route::get( 'old', [
			'uses' => 'Admin\OrdersController@getOldOrders',
			'as'   => 'old-orders'
		] );

        Route::get( 'rejected', [
            'uses' => 'Admin\OrdersController@getRejectedOrders',
            'as'   => 'rejected-orders'
        ] );

        Route::get( 'current', [
            'uses' => 'Admin\OrdersController@getCurrentOrders',
            'as'   => 'current-orders'
        ] );

        Route::get( 'pending', [
            'uses' => 'Admin\OrdersController@getPendingOrders',
            'as'   => 'pending-orders'
        ] );

        Route::get( '{id}/services', [
            'uses' => 'Admin\OrdersController@getOrderServices',
            'as'   => 'order-services'
        ] );

        Route::post( 'accept', [
            'uses' => 'Admin\OrdersController@acceptOrder',
            'as'   => 'accept-order'
        ] );

        Route::post( 'reject', [
            'uses' => 'Admin\OrdersController@rejectOrder',
            'as'   => 'reject-order'
        ] );

    } );


    //order-payment-details

    Route::get( 'payment/{id}', [
        'uses' => 'Admin\OrdersController@paymentDetails',
        'as'   => 'payment-details'
    ] );


    // groups
    Route::group( [ 'prefix' => 'levels' ], function() {

        Route::get( '/', [
            'uses' => 'Admin\GroupController@getIndex',
            'as'   => 'levels'
        ] );

        Route::get( 'level-add', [
            'uses' => 'Admin\GroupController@getAdd',
            'as'   => 'level-add'
        ] );

        Route::post( 'level-do-add', [
            'uses' => 'Admin\GroupController@postAdd',
            'as'   => 'level-do-add'
        ] );

        Route::get( 'level-edit/{id}', [
            'uses' => 'Admin\GroupController@getEdit',
            'as'   => 'level-edit'
        ] );

        Route::post( 'level-do-edit/{id}', [
            'uses' => 'Admin\GroupController@postEdit',
            'as'   => 'level-do-edit'
        ] );

        Route::get( 'level-delete/{id}', [
            'uses' => 'Admin\GroupController@getDelete',
            'as'   => 'level-delete'
        ] );

        Route::get( 'level-details/{id}', [
            'uses' => 'Admin\GroupController@getDetails',
            'as'   => 'level-details'
        ] );

    } );
//commission
   Route::group( [ 'prefix' => 'commission' ], function() {

       Route::get( 'percentage', [
           'uses' => 'Admin\CommissionController@getAdd',
           'as'   => 'commission-percentage'
       ] );

       Route::post( 'percentage', [
           'uses' => 'Admin\CommissionController@postAdd',
           'as'   => 'post-commission-percentage'
       ] );

       Route::get( 'owed-balances', [
           'uses' => 'Admin\CommissionController@owedBalances',
           'as'   => 'commission-owedBalances'
       ] );

       Route::get( 'owed-balances-show/{ids}', [
           'uses' => 'Admin\CommissionController@owedBalancesShow',
           'as'   => 'owed-balances-show'
       ] );

       Route::post( 'session-save-payment', [
           'uses' => 'Admin\CommissionController@sessionSavePayment',
           'as'   => 'session-save-payment'
       ] );

       Route::get( 'commission-paying/{company_id}', [
           'uses' => 'Admin\CommissionController@getPaying',
           'as'   => 'commission-commissionPaying'
       ] );

       Route::get( 'commission-paying-confirm/{company_id}', [
           'uses' => 'Admin\CommissionController@confirmPaying',
           'as'   => 'commission-confirmCommissionPaying'
       ] );

       Route::get( 'commission-paying-print/{company_id}', [
        'uses' => 'Admin\CommissionController@payingPrint',
        'as'   => 'commission-printCommissionPaying'
    ] );

       Route::post( 'commission-paying', [
           'uses' => 'Admin\CommissionController@postPaying',
           'as'   => 'commission-postCommissionPaying'
       ] );

       Route::get( 'payed-balances', [
           'uses' => 'Admin\CommissionController@payedBalances',
           'as'   => 'commission-payedBalances'
       ] );
   } );

    // slider...
    Route::group( [ 'prefix' => 'sliders' ], function() {

        Route::get( '/', [
            'uses' => 'Admin\SlidersController@index',
            'as'   => 'sliders'
        ] );

        Route::get( 'add', [
            'uses' => 'Admin\SlidersController@add',
            'as'   => 'sliders-add'
        ] );

        Route::post( 'create', [
            'uses' => 'Admin\SlidersController@create',
            'as'   => 'sliders-create'
        ] );

        Route::get( 'edit/{id}', [
            'uses' => 'Admin\SlidersController@edit',
            'as'   => 'sliders-edit'
        ] );

        Route::post( 'update/{id}', [
            'uses' => 'Admin\SlidersController@update',
            'as'   => 'sliders-update'
        ] );

//        Route::get( 'show/{id}', [
//            'uses' => 'Admin\SlidersController@show',
//            'as'   => 'sliders-show'
//        ] );

        Route::get( 'delete/{id}', [
            'uses' => 'Admin\SlidersController@delete',
            'as'   => 'sliders-delete'
        ] );

    } );

    Route::group( [ 'prefix' => 'promotions' ], function() {

        Route::get( '/service', [
            'uses' => 'Admin\PromotionController@serviceIndex',
            'as'   => 'promotions.service'
        ] );

        Route::get( '/add', [
            'uses' => 'Admin\PromotionController@serviceAdd',
            'as'   => 'promotions.service.add'
        ]);

        Route::post( '/add', [
            'uses' => 'Admin\PromotionController@serviceDoAdd',
            'as'   => 'promotions.service.doAdd'
        ]);

        Route::get( '/service/edit/{id}', [
            'uses' => 'Admin\PromotionController@serviceEdit',
            'as'   => 'promotions.service.edit'
        ] );



        Route::post( '/service/edit/{id}', [
            'uses' => 'Admin\PromotionController@serviceUpdate',
            'as'   => 'promotions.service.update'
        ] );

        Route::get( '/service/delete/{id}', [
            'uses' => 'Admin\PromotionController@serviceDelete',
            'as'   => 'promotions.service.delete'
        ] );

        Route::post( '/service/findByName', [
            'uses' => 'Admin\PromotionController@findServiceByName',
            'as'   => 'promotions.service.findByName'
        ] );


        Route::get( '/services', [
            'uses' => 'Admin\PromotionController@servicesIndex',
            'as'   => 'promotions.services'
        ] );

        Route::get( '/services/create', [
            'uses' => 'Admin\PromotionController@servicesCreate',
            'as'   => 'promotions.services.create'
        ] );

        Route::post( '/services/store', [
            'uses' => 'Admin\PromotionController@servicesStore',
            'as'   => 'promotions.services.store'
        ] );

        Route::get( '/services/edit/{promotion}', [
            'uses' => 'Admin\PromotionController@servicesEdit',
            'as'   => 'promotions.services.edit'
        ] );

        Route::post( '/services/update/{promotion}', [
            'uses' => 'Admin\PromotionController@servicesUpdate',
            'as'   => 'promotions.services.update'
        ] );

        Route::get( '/delete/{id}', [
            'uses' => 'Admin\PromotionController@destroy',
            'as'   => 'promotions.delete'
        ] );

        Route::get( 'companies', [
            'uses' => 'Admin\PromotionController@companiesIndex',
            'as'   => 'promotions.companies'
        ] );

        Route::get( '/companies/create', [
            'uses' => 'Admin\PromotionController@companiesCreate',
            'as'   => 'promotions.companies.create'
        ] );

        Route::post( '/companies/store', [
            'uses' => 'Admin\PromotionController@companiesStore',
            'as'   => 'promotions.companies.store'
        ] );
//
        Route::get( '/companies/edit/{promotion}', [
            'uses' => 'Admin\PromotionController@companiesEdit',
            'as'   => 'promotions.companies.edit'
        ] );

        Route::post( '/companies/update/{promotion}', [
            'uses' => 'Admin\PromotionController@companiesUpdate',
            'as'   => 'promotions.companies.update'
        ] );

        Route::post( '/companies/findByName', [
            'uses' => 'Admin\PromotionController@findCompanyByName',
            'as'   => 'promotions.companies.findByName'
        ] );

    } );

    Route::resource('cities', 'Admin\CitiesController', ['except' => 'show', 'destroy']);

    Route::get( '/cities/delete/{id}', [
        'uses' => 'Admin\CitiesController@destroy',
        'as'   => 'cities.delete'
    ] );


    Route::get( '/site-conditions', [
        'uses' => 'Admin\SettingsController@getSiteConditions',
        'as'   => 'site-conditions-get'
    ] );

    Route::post( '/site-conditions', [
        'uses' => 'Admin\SettingsController@postSiteConditions',
        'as'   => 'site-conditions-post'
    ] );

    Route::get( '/bank-transfer-conditions', [
        'uses' => 'Admin\SettingsController@getBankConditions',
        'as'   => 'bank-transfer-conditions-get'
    ] );

    Route::post( '/bank-transfer-conditions', [
        'uses' => 'Admin\SettingsController@postBankConditions',
        'as'   => 'bank-transfer-conditions-post'
    ] );

    Route::get( '/orders-conditions', [
        'uses' => 'Admin\SettingsController@getOrdersConditions',
        'as'   => 'orders-conditions-get'
    ] );

    Route::post( '/orders-conditions', [
        'uses' => 'Admin\SettingsController@postOrdersConditions',
        'as'   => 'orders-conditions-post'
    ] );

    Route::get( '/after-selling-conditions', [
        'uses' => 'Admin\SettingsController@getAfterSellingConditions',
        'as'   => 'after-selling-conditions-get'
    ] );

    Route::post( '/after-selling-conditions', [
        'uses' => 'Admin\SettingsController@postAfterSellingConditions',
        'as'   => 'after-selling-conditions-post'
    ] );

    Route::get( '/delivery-conditions', [
        'uses' => 'Admin\SettingsController@getDeliveryConditions',
        'as'   => 'delivery-conditions-get'
    ] );

    Route::post( '/delivery-conditions', [
        'uses' => 'Admin\SettingsController@postDeliveryConditions',
        'as'   => 'delivery-conditions-post'
    ] );




       Route::get( '/who-are', [
        'uses' => 'Admin\SettingsController@getWhoAre',
        'as'   => 'who-are-get'
    ] );

    Route::post( '/who-are', [
        'uses' => 'Admin\SettingsController@postWhoAre',
        'as'   => 'who-are-post'
    ] );




    Route::get( '/payment-methods', [
        'uses' => 'Admin\SettingsController@getPaymentMethodsConditions',
        'as'   => 'payment-methods-get'
    ] );

    Route::post( '/payment-methods', [
        'uses' => 'Admin\SettingsController@postPaymentMethodsConditions',
        'as'   => 'payment-methods-post'
    ] );

} );


// company_dashboard.....

Route::get( '/company-login', [
    'uses' => 'Company\AuthController@getLogin',
    'as'   => 'company-login-get'
] );

Route::post( '/company-login', [
    'uses' => 'Company\AuthController@postLogin',
    'as'   => 'company-login-post'
] );

Route::get( '/company-logout', [
    'uses' => 'Company\AuthController@logout',
    'as'   => 'company-logout'
] );

Route::get( '/company-forget-password', [
    'uses' => 'Company\AuthController@getForgetPassword',
    'as'   => 'get-forget-password'
] );

Route::post( '/company-forget-password', [
    'uses' => 'Company\AuthController@postForgetPassword',
    'as'   => 'post-forget-password'
] );

Route::get( '/company-reset-password/{active}', [
    'uses' => 'Company\AuthController@getRestPassword',
    'as'   => 'company-reset-password'
] );

Route::post( '/post-reset-password', [
    'uses' => 'Company\AuthController@postResetPassword',
    'as'   => 'post-reset-password'
] );



Route::group( [ 'middleware' => 'companyDashboard', 'prefix' => 'companyDashboard' ], function() {

    Route::get( '/', [
        'uses' => 'Company\SettingsController@getDashboard',
        'as'   => 'companyDashboard'
    ] );

    Route::get('/statistics', [
        'uses' => 'Company\SettingsController@statistics',
        'as' => 'dashboard-statistics'
    ]);

    Route::get( '/works/companies/create', [
        'uses' => 'Company\CompanyWorkController@create',
        'as'   => 'works.companies.create'
    ] );

    Route::post( '/works/companies/store', [
        'uses' => 'Company\CompanyWorkController@store',
        'as'   => 'works.companies.store'
    ] );

    Route::patch( '/works/companies/update', [
        'uses' => 'Company\CompanyWorkController@update',
        'as'   => 'works.companies.update'
    ] );

    Route::post( '/works/companies/delete', [
        'uses' => 'Company\CompanyWorkController@delete',
        'as'   => 'works.companies.delete'
    ] );


    Route::get( '/works/services/create/{serviceId}', [
        'uses' => 'Company\ServiceWorkController@create',
        'as'   => 'works.services.create'
    ] );

    Route::post( '/works/services/store/{serviceId}', [
        'uses' => 'Company\ServiceWorkController@store',
        'as'   => 'works.services.store'
    ] );

    Route::patch( '/works/services/update/{serviceId}', [
        'uses' => 'Company\ServiceWorkController@update',
        'as'   => 'works.services.update'
    ] );



//    Route::get( '/work_intervals', [
//        'uses' => 'Company\WorkIntervalsController@index',
//        'as'   => 'work_intervals.index'
//    ] );
//
//    Route::post( '/work_intervals', [
//        'uses' => 'Company\WorkIntervalsController@updateOrCreate',
//        'as'   => 'work_intervals.update'
//    ] );
//
//    Route::post( '/work_intervals/delete', [
//        'uses' => 'Company\WorkIntervalsController@destroy',
//        'as'   => 'work_intervals.delete'
//    ] );

//    Route::resource('work_times', 'Company\WorkTimesController', ['except' => 'show', 'delete']);
//
//    Route::post( '/work_times/delete', [
//        'uses' => 'Company\WorkTimesController@destroy',
//        'as'   => 'work_times.delete'
//    ] );

    Route::resource('banks', 'Company\BanksController', ['except' => 'show', 'delete']);

    Route::post( '/banks/delete', [
        'uses' => 'Company\BanksController@destroy',
        'as'   => 'banks.delete'
    ] );

    Route::resource('services', 'Company\ServicesController', ['except' => 'delete']);

    Route::post( '/services/delete', [
        'uses' => 'Company\ServicesController@destroy',
        'as'   => 'services.delete'
    ] );

    Route::post( '/services/check_reserved', [
        'uses' => 'Company\ServicesController@checkReserved',
        'as'   => 'services.check_reserved'
    ] );

//    Route::get( '/services/work_times/{service}', [
//        'uses' => 'Company\ServicesController@getServiceWorkTimes',
//        'as'   => 'services.work_times.create'
//    ] );
//
//    Route::post( '/services/work_times/{serviceId}', [
//        'uses' => 'Company\ServicesController@postServiceWorkTimes',
//        'as'   => 'services.work_times.store'
//    ] );
//
//    Route::patch( '/services/work_times/{serviceId}', [
//        'uses' => 'Company\ServicesController@updateServiceWorkTimes',
//        'as'   => 'services.work_times.update'
//    ] );
//
//    Route::get( '/services/days/{service}', [
//        'uses' => 'Company\ServicesController@getServiceWorkDays',
//        'as'   => 'services.days.create'
//    ] );
//
//    Route::post( '/services/days/{service}', [
//        'uses' => 'Company\ServicesController@postServiceWorkDays',
//        'as'   => 'services.days.store'
//    ] );

    Route::post( '/services/change-status', [
        'uses' => 'Company\ServicesController@changeStatus',
        'as'   => 'services.change-status'
    ] );


    Route::group( [ 'prefix' => 'orders' ], function() {

        Route::get( 'new', [
            'uses' => 'Company\OrdersController@getNewOrders',
            'as'   => 'company-new-orders'
        ] );

        Route::get( 'done', [
            'uses' => 'Company\OrdersController@getDoneOrders',
            'as'   => 'company-done-orders'
        ] );

        Route::get( 'waiting', [
            'uses' => 'Company\OrdersController@getWaitingOrders',
            'as'   => 'company-waiting-orders'
        ] );

    Route::get( 'approve/{id}', [
            'uses' => 'Company\OrdersController@approveOrder',
            'as'   => 'company-approve-orders'
        ] );

        Route::get( 'rejected', [
            'uses' => 'Company\OrdersController@getNotDoneOrders',
            'as'   => 'company-rejected-orders'
        ] );

        Route::get( 'suspended', [
            'uses' => 'Company\OrdersController@getSuspendedOrders',
            'as'   => 'company-suspended-orders'
        ] );

        Route::get( 'show/{order}', [
            'uses' => 'Company\OrdersController@show',
            'as'   => 'company-orders-show'
        ] );

        Route::get( 'invoice/{order}', [
            'uses' => 'Company\OrdersController@showInvoice',
            'as'   => 'company-orders-invoice'
        ] );

        Route::post( 'accept', [
            'uses' => 'Company\OrdersController@acceptOrder',
            'as'   => 'accept-order'
        ] );

        Route::post( 'reject', [
            'uses' => 'Company\OrdersController@rejectOrder',
            'as'   => 'reject-order'
        ] );

//        Route::get( 'old', [
//            'uses' => 'Company\OrdersController@getOldOrders',
//            'as'   => 'company-old-orders'
//        ] );
//
//        Route::get( 'pending', [
//            'uses' => 'Company\OrdersController@getPendingOrders',
//            'as'   => 'company-pending-orders'
//        ] );

    } );


    Route::get( 'site-commission', [
        'uses' => 'Company\CommissionController@siteCommission',
        'as'   => 'site-commission'
    ] );

    Route::get( 'site-invoice', [
        'uses' => 'Company\CommissionController@invoice',
        'as'   => 'site-invoice'
    ] );


} );




Route::post( '/change-status', [
    'uses' => 'Admin\AdminController@changeStatus',
    'as'   => 'change-status'
] );

Route::post( '/service-change-status', [
    'uses' => 'Admin\ServicesController@changeStatus',
    'as'   => 'service-change-status'
] );

Route::get( '/ActivateAdmin/{active}', [
    'uses' => 'Admin\AdminController@getActiveEmail',
    'as'   => 'AdminActiveEmail'
] );


