@extends('admin.master')

@section('title')
    خدمات تجميلية راقية
@endsection

@section('sectionName')
    الخدمات والمراكز المميزة
@endsection

@section('pageName')
    خدمات تجميلية راقية
@endsection

@section('content')
    <div class="panel panel-flat">

        <div class="col-lg-2">
            <a href="{{ route('promotions.services.create') }}" class="btn btn-primary" style="margin: 20px 10px 20px 0;">إضافة جديد
                <i class="icon-plus-circle2" style="top: 2px;"></i>
            </a>
        </div>

        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th> صورة الخدمة</th>
                <th> الخدمة </th>
                <th> مركز التجميل </th>
                <th> عرض من </th>
                <th> ينتهى فى </th>
                <th>{{ trans('admin.show') }}</th>
                <th>{{ trans('admin.edit') }}</th>
                <th>{{ trans('admin.delete') }}</th>
            </tr>
            </thead>
            <tbody>
            @if(count($promotions) > 0)
                @foreach($promotions as $promotion)
                <tr>
                    <td>
                        <img class="img-preview img-responsive" src="{{ url('public/uploads/services/' . $promotion->promotionable->photo) }}">
                    </td>
                    <td>
                        <a href="{{ route('service-details', ['id' => $promotion->promotionable->id]) }}"> {{ $promotion->promotionable->name }} </a>
                    </td>
                    <td>
                        <a href="{{ route('center-details', ['id' => $promotion->promotionable->company->id]) }}"> {{ $promotion->promotionable->company->name }} </a>
                    </td>
                    <td>{{ $promotion->start_at }}</td>
                    <td>{{ $promotion->end_at }}</td>
                    <td>
                        <a href="{{ route('service-details', ['id' => $promotion->promotionable->id]) }}">
                            <i class="icon-tv"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('promotions.services.edit', ['id' => $promotion->id]) }}">
                            <i class="icon-pencil"></i>
                        </a>
                    </td>
                    <td>
						<a class="do-delete" href="{{ route('promotions.delete', ['id' => $promotion->id]) }}"><i class="icon-database-remove"></i>
                        </a>
					</td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
