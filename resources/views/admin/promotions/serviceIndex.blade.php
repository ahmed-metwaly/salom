@extends('admin.master')

@section('title')
    الخدمة المميزة
@endsection

@section('sectionName')
    الخدمات والمراكز المميزة
@endsection

@section('pageName')
    الخدمة المميزة
@endsection

@section('content')
    <div class="panel panel-flat">

    
        <div class="col-lg-2">
            <a href="{{ route('promotions.service.add') }}" class="btn btn-primary" style="margin: 20px 10px 20px 0;">اضافة خدمة مميزة
                <i class="icon-plus-circle2" style="top: 2px;"></i>
            </a>
        </div>
       

        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th> صورة الخدمة</th>
                <th> الخدمة </th>
                <th> السعر</th>
                <th> مركز التجميل </th>
                <th> تاريخ البدء </th>
                <th> تاريخ الانتهاء </th>
                <th>تغيير</th>
                <th>{{ trans('admin.delete') }}</th>
            </tr>
            </thead>
            <tbody>

           
            @if($promotions)
                @foreach($promotions as $promotion)
                    <tr>
                        <td>
                            <img class="img-preview img-responsive" src="{{ url('public/uploads/services/' . $promotion->promotionable->photo) }}">
                        </td>
                        <td>
                            <a href="{{ route('service-details', ['id' => $promotion->promotionable->id]) }}"> {{ $promotion->promotionable->name }} </a>
                        </td>
                        <td>{{ $promotion->promotionable->price }}</td>
                      
                        <td>
                            <a href="{{ route('center-details', ['id' => $promotion->promotionable->company->id]) }}"> {{ $promotion->promotionable->company->name }} </a>
                        </td>
                        <td>{{ $promotion->start_at }}</td>
                        <td>{{ $promotion->end_at }}</td>
                        <td>
                            <a href="{{ route('promotions.service.edit', ['id' => $promotion->id] ) }}">
                                <i class="icon-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a class="do-delete" href="{{ route('promotions.service.delete', $promotion->id) }}">
                                <i class="icon-database-remove"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection