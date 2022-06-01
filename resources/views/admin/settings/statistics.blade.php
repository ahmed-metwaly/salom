@extends('admin.master')

@section('title')
    {{ trans('admin.dashboardTitle') }}
@endsection

@section('sectionName')
    {{ trans('admin.home') }}
@endsection

@section('pageName')
    {{ trans('admin.dashboardTitle') }}
@endsection

@section('content')
    <div class="row">
	
        <div class="card">
            <div class="card__header">
                <h3>المديرين  ({{ $data['adminsCount'] }})</h3>
                {!! $adminsChart->render() !!}
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h3>المستخدمين  ({{ $data['usersCount'] }})</h3>
                {!! $usersChart->render() !!}
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h3>مراكز التجميل  ({{ $data['centersCount'] }})</h3>
                {!! $centersChart->render() !!}
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h3>حجوزات مرفوضة  ({{ $data['rejectedOrdersCount'] }})</h3>
                {!! $rejectedOrdersChart->render() !!}
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h3>حجوزات في انتظار الموافقة  ({{ $data['pendingOrdersCount'] }})</h3>
                {!! $pendingOrdersChart->render() !!}
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h3>الحسابات البنكية  ({{ $data['banksCount'] }})</h3>
                {!! $banksChart->render() !!}
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h3>رسائل الإدارة  ({{ $data['adminMessagesCount'] }})</h3>
                {!! $adminMessagesChart->render() !!}
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h3>المدن  ({{ $data['citiesCount'] }})</h3>
                {!! $citiesChart->render() !!}
            </div>
        </div>

    </div>
@endsection