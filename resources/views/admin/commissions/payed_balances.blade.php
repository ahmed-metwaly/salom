@extends('admin.master')

@section('title')
    {{ trans('admin.payedBalances') }}
@endsection

@section('sectionName')
    {{ trans('admin.sideCommission') }}
@endsection

@section('pageName')
    {{ trans('admin.payedBalances') }}
@endsection


@section('content')
    <div class="panel panel-flat">
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th> # </th>
                <th> المركز </th>
                <th> المبلغ المدفوع </th>
                <th> من أصل </th>
                <th>تاريخ السداد </th>
                <th>طباعة الفاتوره</th>
            </tr>
            </thead> 
            <tbody> 
            @if(count($data) > 0)
                @foreach($data as $value)
                    <tr>
                        <td> {{ $value->id }} </td>
                        <td> <a href="{{ route('center-details', ['id' => $value->company->id]) }}"> {{ $value->company->name }} </a></td>
                        <td> {{ $value->payed }} ر.س </td>
                        <td> {{ $value->base }} ر.س </td>
                        <td> {{ $value->created_at->format('Y-m-d') }} </td>
                        <td> <a href="{{ route('commission-printCommissionPaying', $value->id) }}" > <i class="icon-printer"></i> </a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
