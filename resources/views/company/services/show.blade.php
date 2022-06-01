@extends('company.layouts.master')

@section('title')
    {{ trans('admin.servicesOneShow') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/blog-rtl.min.css') }}">
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('companyDashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('services.index') }}">{{ trans('admin.servicesIndex') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ trans('admin.servicesOneShow') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.servicesShow') }}
        <small>{{ trans('admin.servicesOneShow') }}</small>
    </h1>
@endsection

@section('content')

    <div class="blog-page blog-content-2">
        <div class="row">
            <div class="col-lg-9">
                <div class="blog-single-content bordered blog-container">
                    <div class="blog-single-head">
                        <h1 class="blog-single-head-title">{{ $service->name }}</h1>
                        <div class="blog-single-head-date mb-10" style="margin-bottom: 20px;">
                            <span class="label label-sm label-danger" style="margin-left: 5px;"> السعر: {{ $service->price }} ر.س </span>
                            <span class="label label-sm label-primary" >المدة: {{ $service->interval }} دقيقة</span>
                            {{--<span class="label label-sm label-warning" style="margin-left: 5px;">أقصى حجوزات في اليوم: {{ $service->orders_count_per_day }} </span>--}}
                            @if($service->is_home)
                                <span  style="margin-left: 5px;" class="label label-sm label-success"  > متوفر خدمة منزلية </span>
                            @endif
                            @if($service->one_day == 1)
                                <span class="label label-sm label-info">خدمة اليوم الواحد</span>
                            @endif
                        </div>
                    </div>
                    <div class="blog-single-img">
                        <img style="width: 40%; display: block;margin: auto auto;" src="{{ $url = URL::to('/'). '/public/uploads/services/' . $service->photo }}"> </div>
                    <div class="blog-single-desc">
                        <p> {{ $service->description }} </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="blog-single-sidebar bordered blog-container">
                    <div class="blog-single-sidebar-tags">
                        <h3 class="blog-sidebar-title uppercase">أيام عمل الخدمة</h3>
                        <ul class="blog-post-tags">
                            @if( $workHours )
                                @foreach($workHours as $workHour)
                                    <li class="uppercase" style="margin: 0 0 25px 5px;">
                                        <a> {{ $workHour->day->day }}
                                            : {{ date('g:i A', strtotime( $workHour->time_from )) }}
                                            إلى {{ date('g:i A', strtotime( $workHour->time_to )) }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection