@extends('company.layouts.master')

@section('title')
    {{ trans('admin.workTimeHours') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/bootstrap-timepicker.min.css') }}">
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
                <span>{{ trans('admin.workTimeHours') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.workTimeHours') }}
        <small>ساعات عمل الخدمة في أيام توافرها </small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                @if($hasWorkHours > 0)
                    {!! Form::open( ['method' => 'PATCH', 'url' => route('services.work_times.update', $service->id),'class' => 'form-horizontal']) !!}
                @else
                    {!! Form::open( ['method' => 'POST', 'url' => route('services.work_times.store', $service->id),'class' => 'form-horizontal']) !!}
                @endif

                    <div class="form-body">

                        @foreach( $days as $day )
                            <div class="row" style="margin-bottom: 30px">
                                <div class="col-lg-4">
                                    <label class="col-lg-12">اليوم</label>
                                    <div class="md-checkbox-inline col-lg-12">
                                        <div class="md-checkbox col-md-3" style="margin-bottom: 10px;">
                                            @if($hasWorkHours > 0)
                                                <input name="days[]" type="checkbox" value="{{ $day->id }}" id="{{ $day->id }}" class="md-check" {{ checkWorkDayExists($service->id, $day->id) ? "checked" : " " }}>
                                            @else
                                                <input name="days[]" type="checkbox" value="{{ $day->id }}" id="{{ $day->id }}" class="md-check" {{ checkDayExists($service, $day->id) ? "checked" : " " }}>
                                            @endif
                                            <label for="{{ $day->id }}">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> {{ $day->day }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="time_from" class="col-lg-12 ">من الساعة</label>
                                    <div class="col-lg-12 input-group" style="padding-right: 15px;">

                                        @if($hasWorkHours > 0 && checkWorkDayExists($service->id, $day->id))
                                            <input value="{{ getWorkFrom($service->id, $day->id) }}" name="time_from[]" id="time_from" type="text" class="form-control timepicker timepicker-24">
                                        @else
                                            <input value=" " name="time_from[]" id="time_from" type="text" class="form-control timepicker timepicker-24">
                                        @endif
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button">
                                                <i class="fa fa-clock-o"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="time_to" class="col-lg-12">إلى الساعة</label>
                                    <div class="col-lg-12 input-group" style="padding-right: 15px;">

                                        @if($hasWorkHours > 0 && checkWorkDayExists($service->id, $day->id))
                                            <input value="{{ getWorkTo($service->id, $day->id) }}" name="time_to[]" id="time_to" type="text" class="form-control timepicker timepicker-24">
                                        @else
                                            <input value=" " name="time_to[]" id="time_to" type="text" class="form-control timepicker timepicker-24">
                                        @endif
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button">
                                                <i class="fa fa-clock-o"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <button type="submit" class="btn green btn-block">حفظ</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('public/company/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/components-select2.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/components-date-time-pickers.min.js') }}"></script>

@endsection