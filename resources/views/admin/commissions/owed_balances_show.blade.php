@extends('admin.master')

@section('title')
    {{ trans('admin.ordersDetailsShow') }}
@endsection

@section('sectionName')
    {{ trans('admin.owedBalances') }}
@endsection

@section('pageName')
    {{ trans('admin.ordersDetailsShow') }}
@endsection


@section('content')
    <div class="panel panel-flat">
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th> رقم الحجز </th>
                <th> مركز التجميل</th>
                <th> تاريخ الحجز</th>
                <th> وقت الحجز</th>
                <th>سعر الحجز </th>
                <th>عدد الخدمات المحجوزة</th>
                <th>صاحب الحجز</th>
                <th>صورة إيصال الدفع</th>
                <th>عرض تفاصيل الخدمات المحجوزة</th>
            </tr>
            </thead>
            <tbody>
            @if(count($data) > 0)
                @foreach($data as $value)
                    <tr>
                        <td> {{ $value->id }} </td>
                        <td> <a href="{{ route('center-details', ['id' => $value->company->id]) }}"> {{ $value->company->name }} </a></td>
                        <td> {{ $value->formatted_date }} </td>
                        <td> {{ $value->formatted_time }} </td>
                        <td> {{ $value->total_price }} ر.س </td>
                        <td>( {{ $value->services_count }} )  خدمات</td>
                        <td> <a href="{{ route('admin-details', ['id' => $value->user->id]) }}"> {{ $value->user->name }} </a></td>
                        <td>
                            <a href="{{ url('/'). '/public/uploads/orders/'. $value->payment->paper }}" target="_blank">
                                <img class="img-preview img-responsive" src="{{ url('public/uploads/orders/' . $value->payment->paper) }}">
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('order-services', ['id' => $value->id]) }}">
                                <i class="icon-tv"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection