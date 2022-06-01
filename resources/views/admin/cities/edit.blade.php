@extends('admin.master')

@section('title')
    {{ trans('admin.cityEdit') }}
@endsection

@section('sectionName')
    {{ trans('admin.citiesTitle') }}
@endsection

@section('pageName')
    {{ trans('admin.cityEdit') }} : {!! '<span class="text-success">' .  $city->city  . '</span>' !!}
@endsection

@section('content')
    <div class="col-md-12">

        {!! Form::model($city, ['method' => 'PATCH', 'url' => route('cities.update', $city->id),'class' => 'form-horizontal']) !!}
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> {{ trans('admin.cityData') }} </h5>
                </div>

                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">

                            <div class="form-group">
                                <label> {{ trans('admin.cityName') }} </label>
                                <input type="text"  name="city" value="{{ $city->city }}" class="form-control">
                            </div>

                        </div>
                    </fieldset>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"> {{ trans('admin.save') }} <i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>

            </div>

        {!! Form::close() !!}
    </div>

@endsection







