@extends('admin.master')

@section('title')
    {!!  trans('admin.adminMDet') . ' ' . $data->subject !!}
@endsection

@section('sectionName')
    <a href="{{ route('admin-messages') }}"> {{ trans('admin.adminMessages') }} </a>
@endsection

@section('pageName')
    {!!  trans('admin.adminMDet')  . ' : <span class="text-success">' . $data->subject . '</span>' !!}
@endsection



@section('content')

    <div class="col-md-12">
        <div class="panel panel-flat">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <fieldset>
                    <div class="collapse in" id="demo1">

                        <div class="form-group">
                            <label> {{ trans('admin.userName') }} </label>
                            <input type="text" class="form-control" readonly value="{{ $data->user ? $data->user->name : $data->name }}">
                        </div>

                        @if( $data->email )
                            <div class="form-group">
                                <label> {{ trans('admin.adminsADEmail') }} </label>
                                <input type="text" class="form-control" readonly value="{{ $data->email }}">
                            </div>
                        @endif

                        <div class="form-group">
                            <label> {{ trans('admin.titleMessage') }} </label>
                            <input type="text" class="form-control" readonly value="{{  $data->subject }}">
                        </div>


                        <div class="form-group">
                            <label> {{ trans('admin.message') }} </label>
                            <textarea id="editor1" rows="8" readonly class="form-control" placeholder=""> {{ $data->body }} </textarea>
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.dateMessage') }} </label>
                            <input type="text" class="form-control" readonly value="{{  $data->created_at->format('Y-m-d g:i A') }}">

                        </div>
                    </div>
                </fieldset>
                {{--<div class="text-right">--}}
                    {{--<a href="mailto:{{ $data->email }}" class="btn btn-primary">--}}
                        {{--{{ trans('admin.replayToMessage') }}--}}
                        {{--<i class="icon-arrow-left13 position-right"></i>--}}
                    {{--</a>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>

@endsection