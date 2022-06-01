@extends('company.layouts.master')

@section('title')
    {{ trans('admin.workTimesIndex') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/datatables.bootstrap-rtl.css') }}">
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
                <a href="{{ route('work_times.index') }}">{{ trans('admin.workTimesIndex') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ trans('admin.workTimesShow') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.workTimesShow') }}
        <small>عرض جميع أوقات العمل</small>
    </h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a class="btn sbold green" href="{{ route('work_times.create') }}"> إضافة جديد
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                        <tr>
                            <th>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                    <span></span>
                                </label>
                            </th>
                            <th> # </th>
                            <th> اليوم </th>
                            <th> من الساعة </th>
                            <th> إلى الساعة </th>
                            <th> العمليات </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach( $data as $value )
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> {{ $value->id }} </td>
                                    <td> {{ $value->day }} </td>
                                    <td> {{ date("H:i", strtotime($value->time_from)) }} </td>
                                    <td> {{ date("H:i", strtotime($value->time_to)) }} </td>
                                    {{--<td>--}}
                                        {{--<span class="label label-sm label-success"> Approved </span>--}}
                                    {{--</td>--}}
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> العمليات
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <li>
                                                    <a href="{{ route('work_times.edit', $value->id) }}">
                                                        <i class="icon-pencil"></i> تعديل
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="delete_work_time" data="{{ $value->id }}">
                                                        <i class="fa fa-times"></i> حذف
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ URL::asset('public/company/js/datatable.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/datatables.bootstrap.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/table-datatables-managed.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/ui-sweetalert.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('body').on('click', '.delete_work_time', function() {

                var id = $(this).attr('data');
                var swal_text = ' وقت عمل';
                var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');
                var swal_title = 'هل أنت متأكد من الحذف ؟';

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
                        url: "{{ url('/') }}" + "/companyDashboard/work_times/delete" ,
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
                                window.location.href = parsed_data.url;
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