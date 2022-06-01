@extends('company.layouts.master')

@section('title')
    {{ trans('admin.workTimeDays') }}
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
                <span>{{ trans('admin.workTimeDays') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.workTimeDays') }}
        <small>أيام عمل الخدمة </small>
    </h1>
@endsection

@section('content')
    {!! Form::open(['method' => 'POST', 'url' => route('services.days.store', $service->id),'class' => 'form-horizontal' ]) !!}

    <div class="row">

        <div class="col-lg-6">
            <div class="row">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="icon-settings font-green-sharp"></i>
                            <span class="caption-subject bold uppercase"> أيام الخدمة</span>
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <div class="form-body">
                            <div class="form-group form-md-checkboxes margin-bottom-30 row">
                                <label class="col-md-12">أيام الخدمة</label>
                                <div class="md-checkbox-inline col-md-12">
                                    @foreach( $days as $day )
                                        <div class="md-checkbox col-md-3" style="margin-bottom: 10px;">
                                            <input name="days[]" type="checkbox" value="{{ $day->id }}" id="{{ $day->id }}" class="md-check" {{ checkDayExists($service, $day->id) ? "checked" : " " }}>
                                            <label for="{{ $day->id }}">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> {{ $day->day }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <button type="submit" class="btn green btn-block">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection