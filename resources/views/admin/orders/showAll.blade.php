@extends('admin.master')

@section('title')
    {{ trans('admin.companyOrdersShow') . ' ' . $ordersType }}
@endsection

@section('sectionName')
    {{ trans('admin.companyOrders') }}
@endsection

@section('pageName')
    {!! trans('admin.companyOrdersShow') . ' : <span class="text-success">' . $ordersType. '</span>' !!}
@endsection

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/sweetalert.css') }}">
@endsection

@section('content')
    <div class="panel panel-flat">
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th> رقم الحجز </th>
                <th> مركز التجميل</th>
                <th>صاحب الحجز</th>
                {{--<th> تاريخ الحجز</th>--}}
                {{--<th> وقت الحجز</th>--}}
                <th> وقت الحجز </th>
                <th> تاريخ التنفيذ </th>
                <th>المبلغ الكلي </th>
                <th>المبلغ المدفوع </th>
                <th>المبلغ المتبقي </th>
                <th>طريقة الدفع </th>
                <th>صورة التحويل البنكي </th>
                <th>تفاصيل الدفع</th>
                <th>الخدمة المحجوزة</th>
                @if( $ordersType == 'الحجوزات المرفوضة' )
                    <th>سبب الرفض</th>
                @endif
                @if( $ordersType == 'حجوزات في انتظار الموافقة' )
                    <th>قبول الحجز</th>
                    <th>رفض الحجز</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @if(count($data) > 0)
                @foreach($data as $value)
                    <tr>
                        <td> {{ $value->id }} </td>
                        <td> <a href="{{ route('center-details', ['id' => $value->company->id]) }}"> {{ $value->company->name }} </a></td>
                        <td> <a href="{{ route('admin-details', ['id' => $value->user->id]) }}"> {{ $value->user->name }} </a></td>

                        <td> {{ $value->created_at->format('Y-m-d') }} </td>
                        <td>
                            {{ getArDay( date('D', strtotime($value->date)) ) }}
                            {{ date('Y-m-d', strtotime($value->date)) }}
                            {{ date('H:i:s', strtotime($value->date)) != '00:00:00' ? date('g:i A', strtotime($value->date)) : '' }}
                        </td>

                        <td> {{ $value->total_price }} ر.س </td>
                        <td> {{ $value->payment->price }} ر.س </td>
                        <td> {{ $value->total_price - $value->payment->price }} ر.س </td>
                        <td> {{ $value->payment->method == 'bank' ? 'تحويل بنكي' : $value->payment->method }} </td>

                        @if($value->payment->method == 'bank')
                        <td>
                            <a href="{{ URL::to('/'). '/public/uploads/orders/' . $value->payment->paper }}" target="_blank">
                                <img style="width: 100px; display: block;margin: auto auto;" src="{{ url('public/uploads/orders/' . $value->payment->paper) }}">
                            </a>
                        </td>
                        @else
                        <td>
                            ___
                        </td>
                        @endif

                        <td>
                            <a href="{{ route('payment-details', ['id' => $value->payment->id]) }}">
                                <i class="icon-tv"></i>
                            </a>
                        </td>

                        <td><a href="{{ route('service-details', ['id' => $value->service->id]) }}"> {{ $value->service->name }} </a></td>
{{--                        <td> {{ explodeByColon(minutesToHours($value->service->interval))[1] }} </td>--}}
                        @if( $ordersType == 'الحجوزات المرفوضة' )
                            <td> {{ $value->payment->message }} </td>
                        @endif
                        @if( $ordersType == 'حجوزات في انتظار الموافقة' )
                            <td>
                                <a class="accept_order" data="{{ $value->id }}">
                                    <i class="icon-check"></i>
                                </a>
                            </td>
                            <td>
                                <a class="reject_order" data="{{ $value->id }}">
                                    <i class="icon-x"></i>
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection

@section('script')
        <script src="{{ URL::asset('public/company/js/sweetalert.min.js') }}"></script>
        <script src="{{ URL::asset('public/company/js/ui-sweetalert.min.js') }}"></script>

        <script>
            $(document).ready(function() {

                $('body').on('click', '.accept_order', function() {

                    var orderId = $(this).attr('data');
                    var swal_text = ' رقم ' + $(this).attr('data');
                    var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');
                    var swal_title = 'هل أنت متأكد من قبول الطلب ؟';

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
                            url: "{{ url('/') }}" + "/dashboard/orders/accept" ,
                            type: "POST",
                            data: {_token: CSRF_TOKEN, 'orderId' : orderId},
                        })
                        .done(function(reseived_data) {
                            var parsed_data = $.parseJSON(reseived_data);

                            if(parsed_data.code == '0'){

                                swal(
                                    "حدث خطأ ما",
                                    "نأسف لحدوث هذا الخطأ, برجاء المحاولة لاحقًا",
                                    "error"
                                );
                            }
                            else if(parsed_data.code == '1') {

                                var title = "لقد تم قبول طلب حجز  " + swal_text + " " + "بنجاح, وتم إخطار صاحب الحجز ومركز التجميل بإرسال بريد إلكتروني إليهم";


                            }
                            else if(parsed_data.code == '2') {

                                var title = "لقد تم قبول طلب حجز  " + swal_text + " " + "بنجاح, ولكن حدث خطأ اثناء إرسال بريد إلكتروني لصاحب الحجز أو مركز التجميل";
                            }

                            swal({
                                type: 'success',
                                title: title,
                                confirmButtonClass: 'btn-success'
                            }, function() {
                                window.location.href = parsed_data.url;
                            });
                        });
                    });
                });

                $('body').on('click', '.reject_order', function() {

                    var orderId = $(this).attr('data');
                    var swal_text = ' رقم ' + $(this).attr('data');
                    var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');
                    var swal_title = 'هل أنت متأكد من رفض الطلب ؟';

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
                            title: 'اذكر سبب الرفض ليتم إعلام المستخدم صاحب الطلب',
                            type: "input",
                            showCancelButton: true,
                            confirmButtonText: 'حفظ',
                            cancelButtonText: "إغلاق",
                            inputPlaceholder: "اكتب سبب الرفض",
                            closeOnConfirm: false
                        },function(inputValue){

                            if (inputValue === false) return false;

                            if (inputValue === '') {
                                swal.showInputError("اكتب سبب الرفض!");
                                return false
                            }
                            //else...
                            $.ajax({
                                url: "{{ url('/') }}" + "/dashboard/orders/reject" ,
                                type: "POST",
                                data: {_token: CSRF_TOKEN, 'orderId': orderId, 'message': inputValue},
                            })
                                .done(function(reseived_data) {
                                    var parsed_data = $.parseJSON(reseived_data);
//                                    console.log(parsed_data);

                                    if(parsed_data.code == '0'){

                                        swal(
                                            "حدث خطأ ما",
                                            "نأسف لحدوث هذا الخطأ, برجاء المحاولة لاحقًا",
                                            "error"
                                        );
                                    }
                                    else if(parsed_data.code == '1') {

                                        var title = "لقد تم رفض طلب حجز  " + swal_text + " " + "بنجاح, وتم إخطار صاحب الحجز بإرسال بريد إلكتروني له";


                                    }
                                    else if(parsed_data.code == '2') {

                                        var title = "لقد تم رفض طلب حجز  " + swal_text + " " + "بنجاح, ولكن حدث خطأ اثناء إرسال بريد إلكتروني لصاحب الحجز";
                                    }

                                    swal({
                                        type: 'success',
                                        title: title,
                                        confirmButtonClass: 'btn-success'
                                    }, function() {
                                        window.location.href = parsed_data.url;
                                    });
                                });
                        });
                    });
                });

            });
        </script>

@endsection

