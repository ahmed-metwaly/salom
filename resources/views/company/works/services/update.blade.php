@extends('company.layouts.master')

@section('title')
    ساعات عمل الخدمة
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/sweetalert.css') }}">
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
                <span>ساعات عمل الخدمة</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> ساعات عمل الخدمة
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-10">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    {!! Form::open( ['method' => 'PATCH', 'url' => route('works.services.update', $serviceId),'class' => 'form-horizontal']) !!}

                    <div class="form-body">

                        @foreach( $days as $day )
                            <div style="margin-bottom: 40px">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="col-lg-12">اليوم</label>
                                        <div class="md-checkbox-inline col-lg-12">
                                            <div class="md-checkbox col-md-3" style="margin-bottom: 10px;">
                                                <input id="{{ $day->id }}" name="days[]" type="checkbox" value="{{ $day->id }}" class="md-check" {{ checkWorkDayExists($serviceId, $day->id, 'App\Service') ? "checked" : " " }}>
                                                <label for="{{ $day->id }}">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> {{ $day->day }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if(checkWorkDayExists($serviceId, $day->id, 'App\Service'))
                                    <div class="form-group mt-repeater">
                                        <div data-repeater-list="{{ 'old'.$day->en_day }}">
                                            @foreach(getWorkTimes($serviceId, $day->id, 'App\Service') as $workTime)

                                                <div data-repeater-item class="mt-repeater-item mt-overflow">
                                                    <div class="mt-repeater-cell">
                                                        <div class="col-lg-3">
                                                            <label for="time_from" class="col-lg-12 ">من الساعة</label>
                                                            <div class="col-lg-12 input-group" style="padding-right: 15px;">
                                                                <input value="{{ $workTime->time_from }}" name="time_from" type="text" class="form-control timepicker timepicker-24">
                                                                <span class="input-group-btn">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-clock-o"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label for="time_to" class="col-lg-12">إلى الساعة</label>
                                                            <div class="col-lg-12 input-group" style="padding-right: 15px;">
                                                                <input value="{{ $workTime->time_to }}" name="time_to"  type="text" class="form-control timepicker timepicker-24">
                                                                <span class="input-group-btn">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-clock-o"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="col-lg-12">أقصى عدد حجوزات للفترة</label>
                                                            <div class="col-lg-12 input-group" style="padding-right: 15px;">
                                                                <input value="{{ $workTime->orders_count_per_interval }}" name="orders_count_per_interval" type="number" class="form-control" step="1" min="1" max="50">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <label style="visibility: hidden" class="col-lg-12">إزالة</label>
                                                            <a data="{{ $workTime->id }}" class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline delete_work">
                                                                <i class="fa fa-close"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                             @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group mt-repeater">
                                    <div data-repeater-list="{{ $day->en_day }}">
                                        <div data-repeater-item class="mt-repeater-item mt-overflow">
                                                <div class="mt-repeater-cell">
                                                    <div class="col-lg-3">
                                                        <label for="time_from" class="col-lg-12 ">من الساعة</label>
                                                        <div class="col-lg-12 input-group" style="padding-right: 15px;">
                                                            <input value=" " name="time_from" type="text" class="form-control timepicker timepicker-24">
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-clock-o"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="time_to" class="col-lg-12">إلى الساعة</label>
                                                        <div class="col-lg-12 input-group" style="padding-right: 15px;">
                                                            <input value=" " name="time_to"  type="text" class="form-control timepicker timepicker-24">
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-clock-o"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="col-lg-12">أقصى عدد حجوزات للفترة</label>
                                                        <div class="col-lg-12 input-group" style="padding-right: 15px;">
                                                            <input name="orders_count_per_interval" type="number" class="form-control" placeholder="أقصى عدد حجوزات" step="1" min="1" max="50">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <label style="visibility: hidden" class="col-lg-12">إزالة</label>
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
                                        <i class="fa fa-plus"></i> أضف فترة دوام أخرى
                                    </a>
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
    <script src="{{ URL::asset('public/company/js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/components-date-time-pickers.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/ui-sweetalert.min.js') }}"></script>

    <script src="{{ URL::asset('public/company/js/jquery.repeater.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/form-repeater.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('body').on('click', '.delete_work', function() {

                var thisBtn = $(this);
                var id = $(this).attr('data');
                var swal_text = 'دوام عمل';
                var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');
                var swal_title = 'هل أنت متأكد من الحذف نهائيًا ؟';

                swal({
                    title: swal_title,
                    text: swal_text,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "تأكيد",
                    cancelButtonText: "إغلاق"
                }, function() {

                $.ajax({
                    url: "{{ url('/') }}" + "/companyDashboard/works/companies/delete" ,
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'id' : id},
                })
                    .done(function(reseived_data) {
                        var parsed_data = $.parseJSON(reseived_data);
//                        console.log(parsed_data);

                        if(parsed_data.code === 1){
                            swal({
                                type: 'success',
                                title: 'تم الحذف',
                                html: "لقد تم حذف " + swal_text + " " + "بنجاح",
                                confirmButtonClass: 'btn-success'
                            }, function() {
                                thisBtn.parent().prev().prev().parent().parent().remove();
                            });
                        }
                        else{
                            swal(
                                "حدث خطأ ما",
                                "نأسف لحدوث هذا الخطأ, برجاء المحاولة لاحقًا",
                                "error"
                            );
                        }
                    });
                });
            });
        });
    </script>
@endsection