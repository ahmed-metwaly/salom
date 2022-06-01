@extends('admin.master')

@section('title')
    @if( $data->type == 1 )
        {!! trans('admin.aboutDetails') . ' ' . $data->title  !!}
    @else
        {!! trans('admin.advantagesDetails') . ' ' . $data->title  !!}
    @endif
@endsection

@section('sectionName')
    {{ trans('admin.aboutTitleShow') }}
@endsection

@section('pageName')
    @if( $data->type == 1 )
        {!!  trans('admin.aboutDetails') . ' : <span class="text-success">' . $data->title . '</span>' !!}
    @else
        {!!  trans('admin.advantagesDetails') . ' : <span class="text-success">' . $data->title . '</span>' !!}
    @endif
@endsection

@section('content')
    <div class="col-md-12">
        <form action="#" method="post">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> {{ trans('admin.dataDetails') }} </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        @if( $data->type == 1 )
                            <div class="form-group">
                                <img class="img-header img-preview img-thumbnail pull-left" src="{{ url('uploads/site_data/' . $data->icon) }}">
                            </div>
                            <div class="clear-fix" style="display: block; clear: both;"></div>
                            <br>
                            <br>
                        @endif
                        <div class="collapse in" id="demo1">
                            <div class="form-group">
                                <label> {{ trans('admin.adminsADLocationText') }} </label>
                                <input readonly type="text" name="title" value="{{ $data->title }}" class="form-control" placeholder=" {{ trans('admin.adminsADLocationText') }} ">
                            </div>

                            <div class="form-group">
                                <label> {{ trans('admin.aboutText') }} </label>
                                <textarea readonly rows="12" name="text" class="form-control" placeholder=" {{ trans('admin.aboutText') }} ">
                                    {{ $data->description }}
                                </textarea>
                            </div>

                        </div>
                    </fieldset>

                    <div class="text-right">

                    </div>
                </div>
            </div>
        </form>
        <!-- /a legend -->
    </div>
@endsection
