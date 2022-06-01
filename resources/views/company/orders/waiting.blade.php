@extends('company.layouts.master')

@section('title')
    {{ $ordersType }}
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
                <span> {{ $ordersType }} </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.ordersIndex') }}
        <small> عرض {{ $ordersType }} </small>
    </h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                        <tr>
                            <th>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                    <span></span>
                                </label>
                            </th>
                            <th> رقم الحجز </th>
                            <th> وقت الحجز </th>
                            <th> تاريخ التنفيذ </th>
                            <th>المبلغ الكلي </th>
                            <th>المبلغ المدفوع </th>
                            <th>المبلغ المتبقي </th>
                            <th>طريقة الدفع </th>
                            @if($ordersType == 'حجوزات منتهية')
                            <th>تقييم صاحب الحجز للخدمة </th>
                            @endif
                            <th colspan="2"> العمليات </th>
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
                                <td class="no_dec"><a href="{{ route('company-orders-show', $value->id) }}"> {{ $value->id }} </a></td>
                                <td> {{ $value->created_at->format('Y-m-d') }} </td>

                                <td>
{{--                                    {{ getArDay( date('D', strtotime($value->date)) ) . ' ' . date('Y-m-d', strtotime($value->date)) . ' ' .  date('g:i A', strtotime($value->date)) }}--}}
                                    {{ getArDay( date('D', strtotime($value->date)) ) }}
                                    {{ date('Y-m-d', strtotime($value->date)) }}
                                    {{ date('H:i:s', strtotime($value->date)) != '00:00:00' ? date('g:i A', strtotime($value->date)) : '' }}
                                </td>

                                <td><span class="badge badge-primary badge-roundless"> {{ $value->total_price }} ر.س </span></td>
                                <td><span class="badge badge-flat badge-roundless"> 
                                @if($value->payment->method == 'receipt') 
                                0
                                @else
                                {{ $value->payment->price }} 
                                @endif
                                ر.س 
                                </span></td>
                                <td><span class="badge badge-danger badge-roundless"> 
                                @if($value->payment->method == 'receipt')
                                {{ $value->total_price }}
                                @else
                                
                                {{ $value->total_price - $value->payment->price }}  
                                @endif
                                ر.س
                                </span></td>
                                <td> <?php
                                    
                                     if($value->payment->method == 'bank') {

                                     echo 'تحويل بنكي';
                                     
                                     } elseif( $value->payment->method == 'receipt') {
                                        echo ' عند المشغل '; 
                                     } else {
                                       echo $value->payment->method;
                                     }

                                     ?>

                                      </td>
                                @if($value->payment->status == 1)
                                <td>
                                    <span class="badge badge-warning badge-roundless"> {{ userServiceRating($value->user->id, $value->service->id ) > 0 ? userServiceRating($value->user->id, $value->service->id ).' نجوم ' : 'لا يوجد' }} </span>
                                </td>
                                @endif

                                <td>
                                    
                                   


                                        <a class="btn btn-xs green" href="{{ route('company-orders-show', $value->id) }}">
                                            <i class="fa fa-eye"></i>  عرض التفاصيل
                                        </a>


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
    <!-- <script src="{{ URL::asset('public/company/js/datatables.min.js') }}"></script> -->
    <!-- <script src="{{ URL::asset('public/company/js/datatables.bootstrap.js') }}"></script> -->
    <script src="{{ URL::asset('public/company/js/table-datatables-managed.min.js') }}"></script>
{{--    <script src="{{ URL::asset('public/company/js/bootstrap-datepicker.min.js') }}"></script>--}}

{{--    <script src="{{ URL::asset('public/company/js/table-datatables-buttons.min.js') }}"></script>--}}

    <script src="{{ URL::asset('public/company/js/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/ui-sweetalert.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $('body').on('click', '.accept_order', function() {

                var id = $(this).attr('order_data');
                var swal_text = ' رقم ' + $(this).attr('order_data');
                var swal_title = 'هل أنت متأكد من تحديد هذا الحجز كحجز منتهي ؟';

                swal({
                    title: swal_title,
                    text: swal_text,
                    type: "info",
                    showCancelButton: true,
                    confirmButtonClass: "btn-info",
                    confirmButtonText: "تأكيد",
                    cancelButtonText: "إغلاق"
                }, function() {

                    $.ajax({
                        url: "{{ url('/') }}" + "/companyDashboard/orders/accept" ,
                        type: "POST",
                        data: {_token: CSRF_TOKEN, 'id' : id},
                    })
                    .done(function(reseived_data) {
                        var parsed_data = $.parseJSON(reseived_data);
//                        console.log(parsed_data)

                        if(parsed_data.code == true){
                            swal({
                                type: 'success',
                                title: "لقد تم تحديد الحجز " + swal_text + " " + "كحجز منتهي",
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

            $('body').on('click', '.reject_order', function() {

                var id = $(this).attr('order_data');
                var swal_text = ' رقم ' + $(this).attr('order_data');
                var swal_title = 'هل أنت متأكد من تحديد هذا الحجز كحجز لم يتم ؟';

                swal({
                        title: swal_title,
                        text: swal_text,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-warning",
                        confirmButtonText: "تأكيد",
                        cancelButtonText: "إغلاق",
                        closeOnConfirm: false
                }, function(){
                    swal({
                        title: 'اذكر سبب عدم إتمام هذا الحجز ليتم إعلام صاحب الحجز والأدمن',
                        type: "input",
                        showCancelButton: true,
                        confirmButtonText: 'حفظ',
                        cancelButtonText: "إغلاق",
                        inputPlaceholder: "اكتب سبب عدم إتمام الحجز",
                        closeOnConfirm: false
                    },function(inputValue){

                        if (inputValue === false) return false;

                        if (inputValue === '') {
                            swal.showInputError("اكتب سبب عدم إتمام الحجز!");
                            return false
                        }
                        //else...
                        $.ajax({
                            url: "{{ url('/') }}" + "/companyDashboard/orders/reject" ,
                            type: "POST",
                            data: {_token: CSRF_TOKEN, 'id': id, 'message': inputValue},
                        })
                        .done(function(reseived_data) {
                            var parsed_data = $.parseJSON(reseived_data);

                            if(parsed_data.code == true){
                                swal({
                                    type: 'success',
                                    title: "لقد تم تحديد الحجز  " + swal_text + " " + "كحجز لم يتم",
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

        });
    </script>

@endsection