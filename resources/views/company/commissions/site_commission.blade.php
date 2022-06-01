@extends('company.layouts.master')

@section('title')
   {{ trans('admin.siteCommission') }}
@endsection

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('companyDashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ trans('admin.siteCommissionShow') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title">
        {{ trans('admin.siteCommission') }}
    </h1>

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-lg-offset-4">
            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                <div class="visual">
                    <i class="fa fa-usd"></i>
                </div>
                <div class="details">
                    @if($msg == '')
                        <div class="number">
                            <span>{{ $commission }}</span>
                        </div>
                        <div class="desc"> ر.س </div>
                    @else
                        <div class="number">
                            <div class="desc"> {{ $msg }} </div>
                        </div>
                    @endif
                </div>
            </a>
        </div>
    </div>
@endsection