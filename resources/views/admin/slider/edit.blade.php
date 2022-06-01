@extends('admin.master')

@section('title')
    {{ trans('admin.sliderImagesEdit') }}
@endsection

@section('sectionName')
    {{ trans('admin.sliderShow') }}
@endsection

@section('pageName')
    {{ trans('admin.sliderImagesEdit') }}
@endsection

@section('content')

    <div class="col-md-12">
        <form action="{{ route('sliders-update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> {{ trans('admin.rowData') }} </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">

                            <div class="form-group">
                                <label>{{ trans('admin.sliderMainImage') }}</label>
                                <img class="img-preview img-responsive" src="{{ url('/public/uploads/slider/' . $data->image) }}">
                            </div>

                            <div class="form-group">
                                <label>{{ trans('admin.sliderMainImageChange') }}</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> الرابط </label>
                                <input type="text" name="url" class="form-control">
                            </div>

                        </div>
                    </fieldset>

                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"> {{ trans('admin.save') }} <i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

