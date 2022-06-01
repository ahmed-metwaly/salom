@extends('web.layout.master')

@section('title')
    عرض فاتورة حجز
@endsection

@section('content')
    <div class="page-head bg-cover position-relative d-print-none">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h3 color-c5 font-weight-bold ">عرض فاتورة حجز</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h5 color-c5 font-weight-bold" href="{{ route('home') }}">الرئيسية / </a>
                        <span class="h5 color-c5 font-weight-bold">عرض فاتورة حجز</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="reservation pb-5 bg-f6">
        <div class="container">
            <!-- Reservation Now -->
            <div class="now">
                <div class="text-center py-5 wow fadeInDown d-print-none" data-wow-duration="2s">
                    <h2 class="color-c5">عرض فاتورة حجز</h2>
                    <img class="img-fluid" src="{{ URL::asset('public/web/img/line.png') }}" alt="">
                </div>
                <div class="text-center d-print-block">
                    <h2 class="color-c5 mb-4">فاتورة حجز موقع صالون</h2>
                </div>
                <div class="invoice">
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <h4 class="color-c5 font-weight-bold"> اسم المشغل :
                                <span class="text-dark font-weight-normal">{{ $order->company->name }}</span>
                                {{--<span class="muted"> Consectetuer adipiscing elit </span>--}}
                            </h4>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <h4 class="color-c5 text-md-left text-right font-weight-bold"> جوال المشغل :
                                 <span class="text-dark font-weight-normal">{{ $order->company->phone }}</span>
                            </h4>
                        </div>
                        <div class="col-12 mb-3">
                            <h4 class="color-c5 font-weight-bold"> العنوان :
                                <span class="text-dark font-weight-normal"> {{ $order->company->name }} {{ $order->company->city->city }} ,{{ $order->company->location_text }} </span>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <h4 class="color-c5 font-weight-bold"> اسم العميل :
                                <span class="text-dark font-weight-normal"> {{ $order->user->name }} </span>
                            </h4>
                        </div>
                        <div class="col-md-6 col-12 text-md-left text-right mb-3">
                            <h4 class="color-c5 font-weight-bold"> جوال العميل :
                                 <span class="text-dark font-weight-normal"> {{ $order->user->phone }} </span>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-dark text-white">
                                <tr>
                                    {{--<th> # </th>--}}
                                    <th class="font-weight-normal"> الخدمة المحجوزة </th>
                                    <th class="font-weight-normal"> المدة </th>
                                    <th class="font-weight-normal"> سعر الخدمة </th>
                                    {{--<th> Total </th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    {{--<td> 1 </td>--}}
                                    <td>  {{ $order->service->name }}  </td>
                                    <td> {{ minutesToHours($order->service->interval) }} </td>
                                    <td> {{ $order->service->price }} ر.س  </td>
                                </tr>
                                <tr>
                                    <td class="" colspan="2">
                                            إجمالي المبلغ بعد إضافة نسبة حجوزاتي
                                    </td>
                                    <td class=""> {{ $order->total_price }} ر.س </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-print invoice-payment">
                            <h4 class="color-c5 font-weight-bold mb-3 mt-4">تفاصيل الحجز:</h4>
                            <ul class="list-unstyled p-0">
                                <li class="mb-3"> <span class="font-weight-bold">رقم الحجز #:</span> {{ $order->id }} </li>
                                <li class="mb-3"> <span class="font-weight-bold">وقت الحجز:</span> {{ $order->created_at->format('Y-m-d') }} </li>
                                <li class="mb-3"> <span class="font-weight-bold">تاريخ التنفيذ:</span> {{ $order->formatted_date .' '. $order->formatted_time }} </li>
                                <li class="mb-3"> <span class="font-weight-bold">عدد الأفراد:</span> {{ $order->individual_count }} أفراد  </li>
                                <li class="mb-3"> <span class="font-weight-bold">خدمة منزلية:</span> {{ $order->is_home ? 'نعم' : 'لا' }}
                            </ul>
                        </div>
                        <div class="col-md-6 col-print">
                            <h4 class="color-c5 font-weight-bold mb-3 mt-4">تفاصيل الدفع:</h4>
                            <ul class="list-unstyled p-0">
                                <li class="mb-3">
                                    <span class="font-weight-bold"> المبلغ المدفوع:</span> {{ $order->payment->price }} ر.س
                                    <span class="font-weight-bold">( {{ $order->payment->method == 'bank' ? 'تحويل بنكي' : $order->payment->method }} )</span>
                                </li>
                                <li class="mb-3">
                                    <span class="font-weight-bold"> المبلغ المتبقي:</span> {{ $order->total_price - $order->payment->price }} ر.س
                                </li>
                                <li class="mb-3">
                                    <span class="font-weight-bold"> المبلغ الكلي:</span> {{ $order->total_price }} ر.س
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-lg bg-c5 text-white rounded-0 btn-hover blue d-print-none margin-bottom-5" onclick="javascript:window.print();"> طباعة
                <i class="fa fa-print"></i>
            </a>
        </div>
    </div>

@endsection