@extends('admin.master')

@section('title')
    {!! trans('admin.sideCentersDetails') . ' ' . $data->name  !!}
@endsection

@section('sectionName')
    {{ trans('admin.sideCentersTitle') }}
@endsection

@section('pageName')
    {!!  trans('admin.sideCentersDetails') . ' : <span class="text-success">' . $data->name . '</span>' !!}
@endsection

@section('content')
    <div class="col-md-12">
        <form action="#" method="post">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> {{ trans('admin.centerDet') }} </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="form-group">
                            <img class="img-header img-preview img-thumbnail pull-left" src="{{ url('public/uploads/users/' . $data->photo) }}">
                        </div>
                        <div class="clear-fix" style="display: block; clear: both;"></div>
                        <br>
                        <br>
                        <div class="collapse in" id="demo1">
                            <div class="form-group">
                                <label> {{ trans('admin.sideAdminsName') }} </label>
                                <input readonly type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder=" {{ trans('admin.sideAdminsName') }} ">
                            </div>

                            <div class="form-group">
                                <label> {{ trans('admin.adminsADEmail') }} </label>
                                <input readonly type="email" name="email" value="{{ $data->email }}" class="form-control" placeholder=" {{ trans('admin.adminsADEmail') }} ">
                            </div>

                            <div class="form-group">
                                <label> {{ trans('admin.adminsADPhone') }} </label>
                                <input readonly type="text" name="phone" value="{{ $data->phone }}" class="form-control" placeholder=" {{ trans('admin.adminsADPhone') }} ">
                            </div>

                            <div class="form-group">
                                <label> {{ trans('admin.adminsADStatus') }} </label>
                                <input type="text" class="form-control" readonly value="{{  $data->status == 1 ?  trans('admin.settingsOpen') : trans('admin.settingsClose')  }}">
                            </div>

                            <div class="form-group">
                                <label> {{ trans('admin.activeDuration') }} </label>
                                <input type="text" class="form-control" readonly value="{{  $data->duration }} شهر">
                            </div>

                            <div class="form-group">
                                <label> {{ trans('admin.adminsADLocationText') }} </label>
                                <input readonly type="text" name="location_text" value="{{ $data->location_text }}" class="form-control" placeholder=" {{ trans('admin.adminsADLocationText') }} ">
                            </div>
                           
                            {{--<div class="row" style="margin-top: 35px;">--}}
                                {{--<div class="col-lg-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label> {{ trans('admin.adminsADLat') }} </label>--}}
                                        {{--<input id="map_lat" readonly type="text" name="phone" value="{{ $data->lat }}" class="form-control" placeholder=" {{ trans('admin.adminsADLat') }} ">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-lg-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label> {{ trans('admin.adminsADLong') }} </label>--}}
                                        {{--<input id="map_long" readonly type="text" name="phone" value="{{ $data->long }}" class="form-control" placeholder=" {{ trans('admin.adminsADLong') }} ">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="row">
                                <div class="col-md-8 col-lg-offset-2" >
                                    <div class="mb-30" id="div_map" style="width: 100%;height:400px;"></div>
                                </div>
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

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJve7ZMt3PvwUzwmJlvHaItGO5uVhEUIg&v=3.exp&language=ar&amp;libraries=places"></script>

    <script>
        $(document).ready(function() {
            var marker;
            var map;

            // var lat = $('#map_lat').val();
            var lat = "{{ $data->lat }}";
            // var long = $('#map_long').val();
            var long = "{{ $data->long }}";

            var lat_val;
            var long_val;

            lat_val = parseFloat(lat);
            long_val = parseFloat(long);

            var pos = {lat: lat_val, lng: long_val};

            map = new google.maps.Map(document.getElementById('div_map'), {
                zoom: 14,
                center: pos
            });
            marker = new google.maps.Marker({
                position: pos,
                map: map
            });
        });
    </script>
@endsection