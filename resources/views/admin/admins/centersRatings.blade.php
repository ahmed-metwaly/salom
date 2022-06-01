@extends('admin.master')

@section('title')
    {{ trans('admin.sideRatingsShow') }}
@endsection

@section('sectionName')
    {{ trans('admin.sideRatingsTitle') }}
@endsection

@section('pageName')
    {{ trans('admin.sideRatingsShow') }}
@endsection

@section('content')
    <div class="panel panel-flat">
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
                <tr>
                    {{--<th>#</th>--}}
                    {{--<th>#</th>--}}
                    {{--<th>#</th>--}}
                    {{--<th>#</th>--}}
                    {{--<th>#</th>--}}
                    {{--<th>#</th>--}}
                    <th>{{ trans('admin.centerADName') }}</th>
                    <th>{{ trans('admin.centerADRating') }}</th>
                </tr>
            </thead>
            <tbody>

            @foreach($data as $key => $value)
                <tr>
{{--                    <td> {{ $key }} </td>--}}
                    {{--<td> {{ $key }} </td>--}}
{{--                    <td> {{ $key }} </td>--}}
                    {{--<td> {{ $key }} </td>--}}
                    {{--<td> {{ $key }} </td>--}}
                    {{--<td> {{ $key }} </td>--}}
                    <td>
                        <a href="{{ route('center-details', ['id' => $value->id]) }}">{{ $value->name }}</a>
                    </td>
                    <td> {{ $value->rating }} نجوم </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
