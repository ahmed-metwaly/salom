@extends('admin.master')



@section('title')

    {!!  trans('admin.cityDet') . ' ' . $data->name  !!}

@endsection



@section('sectionName')

    <a href="{{ route('cities') }}"> {{ trans('admin.citiesTitle') }} </a>

@endsection



@section('pageName')

      {!!  trans('admin.cityDet')  . ' : <span class="text-success">' . $data->name . '</span>' !!}

@endsection


@section('content')



    <div class="col-md-12">


        <!-- Advanced legend -->

        <form action="#" method="post">

            <div class="panel panel-flat">

                <div class="panel-heading">

                    <h5 class="panel-title"> {{ trans('admin.cityData') }} </h5>



                </div>

                <div class="panel-body">

                    <fieldset>

                        <div class="collapse in" id="demo1">

                            <div class="form-group">

                                <label> {{ trans('admin.cityName') }} </label>

                                <input readonly type="text" value="{{ $data->name }}"  class="form-control"

                                       placeholder=" {{ trans('admin.cityName') }} ">

                            </div>

                            <div class="form-group">

                                <label> {{ trans('admin.adminsADCount') }} </label>

                                <input readonly type="text" value="{{ $country->name }}"  class="form-control"

                                       placeholder=" {{ trans('admin.adminsADCount') }} ">

                            </div>



                            <div class="form-group">

                                <label> {{ trans('admin.addedBy') }} </label>

                                <input type="text" class="form-control" readonly value="{{ $user->name }}">

                            </div>



                            <div class="form-group">

                                <label> {{ trans('admin.adminsADStatus') }} </label>

                                <input type="text" class="form-control" readonly value="{{  $data->status == 1 ?  trans('admin.settingsOpen') : trans('admin.settingsClose')  }}">



                            </div>



                            <div class="form-group">

                                <label> {{ trans('admin.adminsADDate') }} </label>

                                <input type="text" class="form-control" readonly value="{{  $data->created_at }}">



                            </div>



                            <div class="form-group">

                                <label> {{ trans('admin.lastUpdate') }} </label>

                                <input type="text" class="form-control" readonly value="{{  $data->updated_at }}">



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