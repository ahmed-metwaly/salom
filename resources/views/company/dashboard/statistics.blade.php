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

    <h1 class="page-title"> مخطط الإحصائيات
        <small>عرض مخطط الإحصائيات</small>
    </h1>

    <div class="row">

        <div class="card">
            <div class="card__header">
                <h3>الحجوزات المنتهية  ({{ $doneOrdersCount }})</h3>
                {!! $doneOrdersChart->render() !!}
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h3>الحجوزات التي لم تتم  ({{ $notDoneOrdersCount }})</h3>
                {!! $notDoneOrdersChart->render() !!}
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h3>الخدمات المفعلة  ({{ $activeServicesCount }})</h3>
                {!! $activeServicesChart->render() !!}
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h3>الخدمات الموقوفة من قبل الإدارة  ({{ $blockedServicesCount }})</h3>
                {!! $blockedServicesChart->render() !!}
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h3>الحسابات البنكية  ({{ $banksCount }})</h3>
                {!! $banksChart->render() !!}
            </div>
        </div>

    </div>

@endsection