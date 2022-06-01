@extends('admin.master')

@section('title')
    @if( $data->type == 1 )
        {{ trans('admin.aboutEdit') }}
    @else
        {{ trans('admin.advantagesEdit') }}
    @endif
@endsection

@section('sectionName')
    {{ trans('admin.sideSiteTitle') }}
@endsection

@section('pageName')
    @if( $data->type == 1 )
        {{ trans('admin.aboutEdit') }}
    @else
        {{ trans('admin.advantagesEdit') }}
    @endif
@endsection

@section('content')

    <div class="col-md-12">
        <form action="{{ route($data->type == 1 ? 'about-update' : 'advantages-update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> {{ trans('admin.rowData') }} </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">

                            @if( $data->type == 1 )
                                <div class="form-group">
                                    <img class="img-header img-preview img-thumbnail pull-left" src="{{ url('uploads/site_data/' . $data->icon) }}">
                                </div>
                                <div class="clear-fix" style="display: block; clear: both;"></div>
                                <br>
                                <br>

                                <div class="form-group">
                                    <label>{{ trans('admin.photoChange') }}</label>
                                    <input type="file" name="icon" class="form-control">
                                </div>
                            @endif

                            <div class="form-group">
                                <label> {{ trans('admin.adminsADLocationText') }} </label>
                                <input type="text" name="title" value="{{ $data->title }}" class="form-control" placeholder=" {{ trans('admin.adminsADLocationText') }} ">
                            </div>

                            <div class="form-group">
                                <label> {{ trans('admin.aboutText') }} </label>
                                <textarea name="description" rows="12" class="form-control" placeholder=" {{ trans('admin.aboutText') }} ">
                                    {{ $data->description }}
                                </textarea>
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
        <!-- /a legend -->
    </div>
@endsection
