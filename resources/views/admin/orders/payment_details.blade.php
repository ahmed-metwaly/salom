@extends('admin.master')

@section('title')
    عرض تفاصيل دفع حجز
@endsection

@section('sectionName')
    {{ trans('admin.companyOrders') }}
@endsection

@section('pageName')
    عرض تفاصيل دفع حجز
@endsection

@section('content')
    <div class="panel panel-flat">
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th> رقم الحجز </th>
                <th> البنك المحول منه</th>
                <th>اسم المحول</th>
                <th> رقم الحساب المحول منه</th>
                <th>المبلغ الكلي </th>
                <th>المبلغ المدفوع </th>
                <th>المبلغ المتبقي </th>
                <th>صورة التحويل البنكي </th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $payment->order->id }} </td>
                    <td> {{ $payment->bank }} </td>
                    <td> {{ $payment->username }} </td>
                    <td> {{ $payment->account_number }} </td>
                    <td> {{ $payment->order->total_price }} ر.س </td>
                    <td> {{ $payment->price }} ر.س </td>
                    <td> {{ $payment->order->total_price - $payment->price }} ر.س </td>

                    <td>
                        <a href="{{ URL::to('/'). '/public/uploads/orders/' . $payment->paper }}" target="_blank">
                            <img style="width: 100px; display: block;margin: auto auto;" src="{{ url('public/uploads/orders/' . $payment->paper) }}">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

