@extends('company.layouts.master')

@section('title')
    عرض فاتورة حجز
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/invoice-rtl.min.css') }}">
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('companyDashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> عرض فاتورة حجز </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.ordersIndex') }}
        <small> عرض فاتورة حجز رقم # {{ $order->id }} </small>
    </h1>
@endsection

@section('content')

    <div class="invoice">
        <div class="row invoice-logo">
            <div class="col-xs-6 invoice-logo-space">
                <img src="{{ url('public/uploads/users/' . $order->company->photo) }}" style="max-height: 150px;" class="img-responsive" alt="{{ $order->company->name }}" />
            </div>
            <div class="col-xs-6">
                <p> {{ $order->company->name }}
                    {{--<span class="muted"> Consectetuer adipiscing elit </span>--}}
                </p>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-xs-4">
                <h3>العميل:</h3>
                <ul class="list-unstyled">
                    <li> {{ $order->user->name }} </li>
                    <li> <strong> {{ $order->user->email }} </strong> </li>
                    <li> <strong> {{ $order->user->phone }} </strong> </li>
                </ul>
            </div>
            <div class="col-xs-4 col-xs-offset-4 invoice-payment">
                <h3>تفاصيل الحجز:</h3>
                <ul class="list-unstyled">
                    <li> <strong>رقم الحجز #:</strong> {{ $order->id }} </li>
                    <li> <strong>وقت الحجز:</strong> {{ $order->created_at->format('Y-m-d') }} </li>
                    <li> <strong>تاريخ التنفيذ:</strong> {{ $order->formatted_date .' '. $order->formatted_time }} </li>
                    <li> <strong>طريقة الدفع:</strong> {{ $order->payment->method == 'bank' ? 'تحويل بنكي' : $order->payment->method }} </li>
                    <li> <strong>عدد الأفراد:</strong> {{ $order->individual_count }} أفراد  </li>
                    <li> <strong>خدمة منزلية:</strong> {{ $order->is_home ? 'نعم' : 'لا' }}
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        {{--<th> # </th>--}}
                        <th> الخدمة المحجوزة </th>
                        <th > الوصف </th>
                        <th > المدة </th>
                        <th > سعر الخدمة </th>
                        {{--<th> Total </th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        {{--<td> 1 </td>--}}
                        <td>  {{ $order->service->name }}  </td>
                        <td > {{ str_limit($order->service->description, 70) }} </td>
                        <td > {{ minutesToHours($order->service->interval) }} </td>
                        <td > {{ $order->service->price }} ر.س  </td>
                    </tr>
                    <tr>
                        <td  colspan="3">
                            <strong>
                            إجمالي المبلغ بعد إضافة نسبة حجوزاتي
                            </strong>
                        </td>
                        <td > <strong> {{ $order->total_price }} ر.س  </strong> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <div class="well">
                    <address>
                        <strong> {{ $order->company->name }} </strong>
                        <br/> {{ $order->company->city->city }} ,
                        <br/> {{ $order->company->location_text }}
                        <br/>
                        <abbr title="Phone">هاتف:</abbr> {{ $order->company->phone }} </address>
                    <address>
                        <strong>البريد الإلكتروني</strong>
                        <br/>
                        <a href="mailto:#"> {{ $order->company->email }} </a>
                    </address>
                </div>
            </div>
            <div class="col-xs-8 invoice-block">
                <ul class="list-unstyled amounts">
                    <li>
                        <strong>المبلغ المدفوع:</strong> {{ $order->payment->price }} ر.س
                    </li>
                    <li>
                        <strong>المبلغ المتبقي:</strong> {{ $order->total_price - $order->payment->price }} ر.س
                    </li>
                    <li>
                        <strong>المبلغ الكلي:</strong> {{ $order->total_price }} ر.س
                    </li>
                </ul>
                <br/>
                <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> طباعة
                    <i class="fa fa-print"></i>
                </a>
            </div>
        </div>
    </div>

@endsection
