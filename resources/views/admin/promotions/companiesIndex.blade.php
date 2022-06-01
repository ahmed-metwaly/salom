@extends('admin.master')

@section('title')
    أفضل مراكز التجميل
@endsection

@section('sectionName')
    الخدمات والمراكز المميزة
@endsection

@section('pageName')
    أفضل مراكز التجميل
@endsection

@section('content')
    <div class="panel panel-flat">

        <div class="col-lg-2">
            <a href="{{ route('promotions.companies.create') }}" class="btn btn-primary" style="margin: 20px 10px 20px 0;">إضافة 
                <i class="icon-plus-circle2" style="top: 2px;"></i>
            </a>
        </div>

        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th>{{ trans('admin.adminsADPhoto') }}</th>
                <th>{{ trans('admin.adminsADName') }}</th>
                <th>{{ trans('admin.adminsADPhone') }}</th>
                <th>{{ trans('admin.adminsADEmail') }}</th>
                <th>{{ trans('admin.centerADRating') }}</th>
                <th>{{ trans('admin.adminsADLocationText') }}</th>
                <th> عرض من </th>
                <th> ينتهى فى </th>
                <th> مكان المركز  </th>
                <th>{{ trans('admin.show') }}</th>
                <th>{{ trans('admin.edit') }}</th>
                <th>{{ trans('admin.delete') }}</th>
            </tr>
            </thead>
            <tbody>

            @foreach($promotions as $promotion)
                <tr>
                    <td> <img class="img-preview img-responsive" src="{{ url('public/uploads/users/' . $promotion->promotionable->photo) }}"> </td>
                    <td> <a href="{{ route('center-details', ['id' => $promotion->promotionable->id]) }}">{{ $promotion->promotionable->name }}</a> </td>
                    <td> {{ $promotion->promotionable->phone }} </td>
                    <td> {{ $promotion->promotionable->email }} </td>
                    <td> <span class="text-success"> {{ $promotion->promotionable->ratings->count() ? $promotion->promotionable->ratings->avg('stars_count') .'  نجوم' : '-------' }} </span></td>
                    <td> {{ $promotion->promotionable->location_text }} </td>
                    <td>{{ $promotion->start_at }}</td>
                    <td>{{ $promotion->end_at }}</td>
                    <td>
                        @if( $promotion->priority == 1)
                            على اليمين
                        @elseif( $promotion->priority == 2)
                            فى المنتصف
                        @else
                            على اليسار
                        @endif        
                    </td>
                    <td>
                        <a href="{{ route('center-details', ['id' => $promotion->promotionable->id]) }}">
                            <i class="icon-tv"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('promotions.companies.edit', ['id' => $promotion->id]) }}">
                            <i class="icon-pencil"></i>
                        </a>
                    </td>
                    <td>
						<a class="do-delete" href="{{ route('promotions.delete', ['id' => $promotion->id]) }}"><i class="icon-database-remove"></i>
                        </a>
					</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection