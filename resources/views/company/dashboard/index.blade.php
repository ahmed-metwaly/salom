@extends('company.layouts.master')

@section('title')
    لوحة التحكم
@endsection

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('companyDashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> الإحصائيات
        <small>عرض الإحصائيات</small>
    </h1>

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="{{ route('company-waiting-orders') }}">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span>{{ $newOrdersCount }}</span>
                    </div>
                    <div class="desc">  حجوزات في انتظار الموافقة </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('company-done-orders') }}">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span>{{ $doneOrders }}</span>
                    </div>
                    <div class="desc"> حجوزات منتهية </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 yellow-mint">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span>{{ $notDoneOrdersCount }}</span>
                    </div>
                    <div class="desc"> حجوزات لم تتم </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple">
                <div class="visual">
                    <i class="fa fa-usd"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span>{{ $sumOrders }}</span>
                    </div>
                    <div class="desc"> سعر جميع الحجوزات المنتهية </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 grey-mint" href="{{ route('services.index') }}">
                <div class="visual">
                    <i class="icon-puzzle"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span>{{ $activeServicesCount }}</span>
                    </div>
                    <div class="desc"> عدد الخدمات المفعلة </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 yellow-casablanca" href="{{ route('services.index') }}">
                <div class="visual">
                    <i class="fa fa-ban"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span>{{ $disabledServicesCount }}</span>
                    </div>
                    <div class="desc"> عدد الخدمات الموقوفة من قبل الإدارة </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red-pink" {{ $mostReservedService ? 'href='.route('services.show', $mostReservedService->id) : '' }}>
                <div class="visual">
                    <i class="fa fa-cart-plus"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span style="font-size: 14px;">{{ $mostReservedService ? $mostReservedService->name : 'لا يوجد' }}</span>
                    </div>
                    <div class="desc"> أكثر الخدمات حجزًا </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="{{ route('banks.index') }}">
                <div class="visual">
                    <i class="fa fa-bank"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span>{{ $banksCount }}</span>
                    </div>
                    <div class="desc"> عدد الحسابات البنكية </div>
                </div>
            </a>
        </div>
    </div>
@endsection