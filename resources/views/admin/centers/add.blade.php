@extends('admin.master')

@section('title')
	{{ trans('admin.sideCentersAdd') }}
@endsection

@section('sectionName')
	{{ trans('admin.sideCentersTitle') }}
@endsection

@section('pageName')
	{{ trans('admin.sideCentersAdd') }}
@endsection

@section('content')

	<div class="col-md-12">
		<form action="{{ route('company-add') }}" method="post" enctype="multipart/form-data">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"> {{ trans('admin.adminNewCenterTitle') }} </h5>
				</div>
				<div class="panel-body">
					<fieldset>
						<div class="collapse in" id="demo1">
							<div class="form-group">
								<label> {{ trans('admin.adminsADName') }} </label>
								<input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder=" {{ trans('admin.adminsADName') }} ">
							</div>

							<div class="form-group">
								<label> {{ trans('admin.adminsADEmail') }} </label>
								<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder=" {{ trans('admin.adminsADEmail') }} ">
							</div>

							<div class="form-group">
								<label> {{ trans('admin.adminsADPhone') }} </label>
								<input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder=" {{ trans('admin.adminsADPhone') }} ">
							</div>

							<div class="form-group">
								<label>{{ trans('admin.adminsADPassword') }}</label>
								<input type="password" name="password" class="form-control" placeholder="****">
							</div>

							<div class="form-group">
								<label>{{ trans('admin.adminsADRePassword') }}</label>
								<input type="password" name="password_con" class="form-control" placeholder="****">
							</div>

							<div class="form-group">
								<label>{{ trans('admin.adminsADPhoto') }}</label>
								<input type="file" name="photo" class="form-control">
							</div>

							<div class="form-group" id="level">
								<label> {{ trans('admin.adminsADLevel') }} </label>
								<select data-placeholder="-- {{ trans('admin.SettingsSelect') }} --"  name="group_id" class="form-control" >
									<option value="0">-- {{ trans('admin.SettingsSelect') }} --</option>
									@if(count($groups) > 0)
										@foreach($groups as $group)
											<option value="{{ $group->id }}"> {{ $group->name }} </option>
										@endforeach
									@endif
								</select>
							</div>

							<div class="form-group">
								<label> {{ trans('admin.adminsADStatus') }} </label>
								<select data-placeholder="-- {{ trans('admin.SettingsSelect') }} --" name="status" class="select">
									<option value="1"> {{ trans('admin.settingsOpen') }} </option>
									<option value="0"> {{ trans('admin.settingsClose') }} </option>
								</select>
							</div>

							<div class="form-group">
								<label> {{ trans('admin.adminsADLocationText') }} </label>
								<input type="text" name="location_text" value="{{ old('location_text') }}" class="form-control" placeholder=" {{ trans('admin.adminsADLocationText') }} ">
							</div>

							<div class="row" style="margin-top: 35px;">
								<div class="col-lg-6">
									<div class="form-group">
										<label> {{ trans('admin.adminsADLat') }} </label>
										<input id="map_lat" readonly type="text" name="lat" value="{{ old('lat') }}" class="form-control" placeholder=" {{ trans('admin.adminsADLat') }} ">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label> {{ trans('admin.adminsADLong') }} </label>
										<input id="map_long" readonly type="text" name="long" value="{{ old('long') }}" class="form-control" placeholder=" {{ trans('admin.adminsADLong') }} ">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-8 col-lg-offset-2" >
									<div class="mb-30" id="div_map" style="width: 100%;height:400px;"></div>
								</div>
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

@section('script')
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJve7ZMt3PvwUzwmJlvHaItGO5uVhEUIg&v=3.exp&language=ar&amp;libraries=places"></script>

	<script>
        $(document).ready(function() {
            var latlng;
            var marker;
            var map;

            var lat = $('#map_lat').val();
            var long = $('#map_long').val();

            var lat_val;
            var long_val;

            if(lat !== '' && long !== ''){
                lat_val = parseFloat(lat);
                long_val = parseFloat(long);
            }
            else{
                lat_val = 24.710374406523634;
                long_val = 46.682441104815666;
            }

            var pos = {lat: lat_val, lng: long_val};
            var geocoder = new google.maps.Geocoder;


            map = new google.maps.Map(document.getElementById('div_map'), {
                zoom: 14,
                center: pos
            });
            marker = new google.maps.Marker({
                draggable: true,
                position: pos,
                map: map
            });

            $("#map_address").geocomplete({});
            $("#map_address").change(function() {
                if(marker){
                    marker.setMap(null);
                }
            });

            $('a[href=#four]').on('click', function() {
                setTimeout(function(){
                    google.maps.event.trigger(map, 'resize');
                    map.setCenter(new google.maps.LatLng(lat_val, long_val));
                    map.setZoom(14);
                }, 50);
            });

            $("body").on('change', '#map_address', function () {
                var address=$(this).val();
                if(address!=''){
                    geocoder.geocode({'address': address}, function (results, status) {
                        if (status === 'OK') {
                            if(marker){
                                marker.setMap(null);
                            }
                            lat = results[0].geometry.location.lat();
                            lng = results[0].geometry.location.lng();
                            var latlng = {lat: lat, lng: lng};
                            $("#map_lat").val(lat);
                            $("#map_long").val(lng);
                            map.setCenter(new google.maps.LatLng(lat, lng));
                            map.setZoom(14);
                            marker = new google.maps.Marker({
                                draggable: true,
                                position: latlng,
                                map: map
                            });
                            google.maps.event.addListener(marker, 'dragend', function (event) {
                                $("#map_lat").val(this.getPosition().lat());
                                $("#map_long").val(this.getPosition().lng());
                                latlng = {lat: this.getPosition().lat(), lng: this.getPosition().lng()};
                                geocoder.geocode({'location': latlng}, function (results, status) {
                                    if (status === 'OK') {
                                        if (results[1]) {
                                            $("#map_address").val(results[1].formatted_address);
                                        }
                                    }
                                });
                            });
                        }
                    });
                }
            });

            google.maps.event.addListener(marker, 'dragend', function (event) {
                $("#map_lat").val(this.getPosition().lat());
                $("#map_long").val(this.getPosition().lng());
                latlng = {lat: this.getPosition().lat(), lng: this.getPosition().lng()};
                geocoder.geocode({'location': latlng}, function (results, status) {
                    if (status === 'OK') {
//                console.log(results)
                        if (results[1]) {
                            $("#map_address").val(results[1].formatted_address);
                        }
                    }
//                map.setZoom(14);
                });
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (positions) {
                    lat = positions.coords.latitude;
                    lng = positions.coords.longitude;
                    $("#map_lat").val(lat);
                    $("#map_long").val(lng);
                    if(marker){
                        marker.setMap(null);
                    }
                    var latlng = {lat: lat, lng: lng};
                    geocoder.geocode({'location': latlng}, function (results, status) {
                        if (status === 'OK') {
                            if (results[1]) {
                                $("#map_address").val(results[1].formatted_address);
                                map.setCenter(new google.maps.LatLng(lat, lng));
                                marker = new google.maps.Marker({
                                    draggable: true,
                                    position: latlng,
                                    map: map
                                });
                                map.setZoom(14);
                                google.maps.event.addListener(marker, 'dragend', function (event) {
                                    $("#map_lat").val(this.getPosition().lat());
                                    $("#map_long").val(this.getPosition().lng());
                                    latlng = {lat: this.getPosition().lat(), lng: this.getPosition().lng()};
                                    geocoder.geocode({'location': latlng}, function (results, status) {
                                        if (status === 'OK') {
                                            if (results[1]) {
                                                $("#map_address").val(results[1].formatted_address);
                                            }
                                        }
                                    });
                                });
                            }
                        }
                    });
                });
            }

        });
	</script>
@endsection
