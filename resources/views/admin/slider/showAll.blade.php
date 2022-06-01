@extends('admin.master')

@section('title')
    {{ trans('admin.sliderImagesShow') }}
@endsection

@section('sectionName')
    {{ trans('admin.sideSiteTitle') }}
@endsection

@section('pageName')
    {{ trans('admin.sliderImagesShow') }}
@endsection

@section('content')
    <div class="panel panel-flat">

        <div class="col-lg-2">
            <a href="{{ route('sliders-add') }}" class="btn btn-primary" style="margin: 20px 10px 20px 0;">اضافة جديد
                <i class="icon-plus-circle2" style="top: 2px;"></i>
            </a>
        </div>

        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ trans('admin.sliderMainImage') }}</th>
                <th>{{ trans('admin.edit') }}</th>
                <th>{{ trans('admin.delete') }}</th>
            </tr>
            </thead>
            <tbody>

            @foreach($data as $value)
                <tr>
                    <td> {{ $value->id }} </td>

                    <td>
                        <a href="{{'/public/uploads/slider/'. $value->image }}" target="_blank">
                            <img class="img-preview img-responsive" src="{{ url('/public/uploads/slider/' . $value->image) }}">
                        </a>
                    </td>

                    <td>
                        <a href="{{ route('sliders-edit', ['id' => $value->id]) }}">
                            <i class="icon-pencil"></i>
                        </a>
                    </td>

                    <td>
                        <a class="do-delete" href="{{ route('sliders-delete', ['id' => $value->id]) }}">
                            <i class="icon-database-remove"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
