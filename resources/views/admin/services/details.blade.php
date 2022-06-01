@extends('admin.master')

@section('title')
    {!!  trans('admin.sideServiceDetails') . ' ' . $data->name  !!}
@endsection

@section('sectionName')
    {{ trans('admin.companyServices') }}
@endsection

@section('pageName')
    {!!  trans('admin.sideServiceDetails')  . ' : <span class="text-success">' . $data->name . '</span>' !!}
@endsection



@section('content')

    <div class="col-md-12">
        <div class="panel panel-flat">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <fieldset>
                    <div class="form-group">
                        <img class="img-header img-preview img-thumbnail pull-left" src="{{ url('public/uploads/services/' . $data->photo) }}">
                    </div>
                    <div class="clear-fix" style="display: block; clear: both;"></div>
                    <br>
                    <br>

                    <div class="collapse in" id="demo1">

                        <div class="form-group">
                            <label> {{ trans('admin.serviceCompany') }} </label>
                            <input type="text" class="form-control" readonly value="{{ $data->company->name }}">
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.serviceName') }} </label>
                            <input type="text" class="form-control" readonly value="{{ $data->name }}">
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.servicePrice') }} </label>
                            <input type="text" class="form-control" readonly value="{{  $data->price }}">
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.serviceInterval') }} </label>
                            <input type="text" class="form-control" readonly value="{{  explodeByColon( minutesToHours( $data->interval))[1] }}">
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.serviceDesc') }} </label>
                            <textarea id="editor1" rows="8" readonly class="form-control" placeholder=""> {{ $data->description }} </textarea>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

@endsection