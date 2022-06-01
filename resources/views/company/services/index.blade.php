@extends('company.layouts.master')

@section('title')
    {{ trans('admin.servicesIndex') }}
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
                <a href="{{ route('services.index') }}">{{ trans('admin.servicesIndex') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ trans('admin.servicesShow') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.servicesShow') }}
        <small>عرض جميع الخدمات</small>
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
                                    <a class="btn sbold green" href="{{ route('services.create') }}"> إضافة جديد
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
                            {{--<th> # </th>--}}
                            <th> الصورة </th>
                            <th> الخدمة </th>
                            <th> السعر </th>
                            <th> المدة </th>
                            {{--<th> أقصى عدد حجوزات </th>--}}
                            <th> إيقاف من قبل الإدرارة </th>
                            <th> حالة التفعيل </th>
                            {{--<th> أيام العمل </th>--}}
                            <th> ساعات العمل </th>
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
                                    {{--<td> {{ $value->id }} </td>--}}
                                    <td>
                                        <img class="table_img img-preview img-responsive" src="{{ URL::asset('public/uploads/services/'.$value->photo) }}">
                                    </td>
                                    <td class="no_dec"> <a href="{{ route('services.show', $value->id) }}">{{ $value->name }} </a></td>
                                    <td> <span class="badge badge-danger badge-roundless"> {{ $value->price }} ر.س </span> </td>
                                    <td> <span class="badge badge-primary badge-roundless"> {{ $value->interval }} دقيقة </span></td>
{{--                                    <td> <span class="badge badge-warning badge-roundless"> {{ $value->orders_count_per_day }} </span></td>--}}
                                    <td> <span class="badge {{ !$value->has_blocked ? 'badge-flat' : 'badge-default' }} badge-roundless"> {{ !$value->has_blocked ? 'مفعلة' : 'موقوفة من قبل الإدارة' }} </span></td>
                                    <td> <span class="badge {{ $value->is_active ? 'badge-flat' : 'badge-default' }} badge-roundless"> {{ $value->is_active ? 'مفعلة' : 'معطلة' }} </span></td>

                                    {{--<td>--}}
                                        {{--<a href="{{ route('services.days.create', $value->id) }}" class="btn btn-xs green btn-outline">--}}
                                            {{--<i class="fa fa-eye"></i> عرض--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                    <td>
                                        <a href="{{ route('works.services.create', $value->id) }}" class="btn btn-xs green btn-outline">
                                            <i class="fa fa-eye"></i> عرض
                                        </a>
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> العمليات
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <li>
                                                    <a class="deactivate_data" s_name="{{ $value->name }}" data="{{ $value->id }}" status="{{ $value->is_active ? '0' : '1' }}">
                                                        <i class="fa fa-check-square"></i> {{ $value->is_active ? 'تعطيل' : 'تفعيل' }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('services.show', $value->id) }}">
                                                        <i class="icon-eye"></i> عرض
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('services.edit', $value->id) }}">
                                                        <i class="icon-pencil"></i> تعديل
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="delete_data" s_name="{{ $value->name }}" data="{{ $value->id }}">
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

            $('body').on('click', '.delete_data', function() {

                var id = $(this).attr('data');
                var swal_text = 'خدمة ' + $(this).attr('s_name');
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
                        url: "{{ url('/') }}" + "/companyDashboard/services/check_reserved" ,
                        type: "POST",
                        data: {_token: CSRF_TOKEN, 'id' : id},
                    })
                    .done(function(reseived_data) {
                        var parsed_data = $.parseJSON(reseived_data);
                       // console.log(parsed_data)

                        if(parsed_data.code === '1'){

                            swal({
                                title: parsed_data.title,
                                text: parsed_data.message,
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-warning",
                                confirmButtonText: "تأكيد",
                                cancelButtonText: "إغلاق"
                            }, function() {

                                $.ajax({
                                    url: "{{ url('/') }}" + "/companyDashboard/services/delete" ,
                                    type: "POST",
                                    data: {_token: CSRF_TOKEN, 'id' : id},
                                })
                                .done(function(reseived_data) {
                                    var parsed_data = $.parseJSON(reseived_data);
                                    // console.log(parsed_data)

                                    if(parsed_data.code === true){

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
                        }
                        else{
                            swal(
                                parsed_data.title,
                                parsed_data.message,
                                "error"
                            );
                        }
                    });
                });
            });

            $('body').on('click', '.deactivate_data', function() {

                var id = $(this).attr('data');
                var status = $(this).attr('status');
                var swal_text = 'خدمة ' + $(this).attr('s_name');
                var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');
                var swal_title = 'هل أنت متأكد من تغيير حالة الخدمة ؟';

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
                        url: "{{ url('/') }}" + "/companyDashboard/services/change-status" ,
                        type: "POST",
                        data: {_token: CSRF_TOKEN, 'id': id, 'status': status},
                    })
                    .done(function(reseived_data) {
                        var parsed_data = $.parseJSON(reseived_data);
                        // console.log(parsed_data)

                        if(parsed_data.code === true){
                            swal({
                                type: 'success',
                                title: 'تم تغيير حالة الخدمة بنجاح',
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