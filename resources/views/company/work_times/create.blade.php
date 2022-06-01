@extends('company.layouts.master')

@section('title')
    {{ trans('admin.workTimesAdd') }}
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
                <a href="{{ route('work_times.index') }}">{{ trans('admin.workTimesIndex') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ trans('admin.workTimesAdd') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.workTimesIndex') }}
        <small>إضافة وقت عمل جديد</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    {!! Form::open([ 'url' => route('work_times.store'), 'class' => 'form-horizontal' ]) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="day" class="col-lg-3 control-label">اليوم</label>
                                <div class="col-lg-6 input-group select2-bootstrap-append">
                                    <select id="day" name="day" class="form-control select2-allow-clear">
                                        <option value ></option>
                                        @foreach( arabicDays() as $day)
                                            <option value="{{ $day }}" >{{ $day }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-select2-open="single-append-text">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="time_from" class="col-lg-3 control-label">من الساعة</label>
                                <div class="col-lg-6 input-group">
                                    <input name="time_from" id="time_from" type="text" class="form-control timepicker timepicker-24">
                                    <span class="input-group-btn">
                                        <button class="btn default" type="button">
                                            <i class="fa fa-clock-o"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="time_to" class="col-lg-3 control-label">إلى الساعة</label>
                                <div class="col-lg-6 input-group">
                                    <input name="time_to" id="time_to" type="text" class="form-control timepicker timepicker-24">
                                    <span class="input-group-btn">
                                        <button class="btn default" type="button">
                                            <i class="fa fa-clock-o"></i>
                                        </button>
                                    </span>
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
{{--    <script src="{{ URL::asset('public/company/js/daterangepicker.min.js') }}"></script>--}}
    <script src="{{ URL::asset('public/company/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/bootstrap-timepicker.min.js') }}"></script>
{{--    <script src="{{ URL::asset('public/company/js/clockface.js') }}"></script>--}}
    <script src="{{ URL::asset('public/company/js/components-date-time-pickers.min.js') }}"></script>

@endsection