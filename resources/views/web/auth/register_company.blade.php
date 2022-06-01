@extends('web.layout.master')

@section('title')
    مركز تجميل جديد
@endsection

@section('content')
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h3 color-c5 font-weight-bold ">مركز تجميل جديد</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h5 color-c5 font-weight-bold" href="{{ route('home') }}">الرئيسية / </a>
                        <span class="h5 color-c5 font-weight-bold">مركز تجميل جديد</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown">
                <h2 class="color-c5">تسجيل مركز تجميل جديد</h2>
                <img class="img-fluid" src="{{ URL::asset('public/web/img/line.png') }}" alt="">
            </div>

            {!! Form::open([ 'url' => route('register-company'), 'class' => 'row bg-f6 p-5 p-5', 'files' => 'true' ]) !!}

            <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn {{ $errors->has('name') ? ' has-error' : '' }}" data-wow-delay=".5s">
                <input name="name" value="{{ old('name') }}" type="text" class="form-control rounded-0" placeholder="الاسم" required>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn {{ $errors->has('image') ? ' has-error' : '' }}" data-wow-delay=".5s">
                <label class="custom-file border-0 w-100 btn-img">
                    <input name="image" type="file" id="file" class="custom-file-input btn-img" accept="image/*" required>
                    <span class="custom-file-control rounded-0 border-0 color-777">إضافة صورة</span>
                </label>
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn {{ $errors->has('phone') ? ' has-error' : '' }}" data-wow-delay=".6s">
                <input name="phone" value="{{ old('phone') }}" type="text" class="form-control rounded-0" placeholder="رقم الجوال" required>

                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn {{ $errors->has('email') ? ' has-error' : '' }}" data-wow-delay=".6s">
                <input name="email" value="{{ old('email') }}" type="email" class="form-control rounded-0" placeholder="البريد الإلكترونى" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group box col-sm-6 col-xs-12 mb-4 wow zoomIn {{ $errors->has('city_id') ? ' has-error' : '' }}" data-wow-delay=".7s">
                <i class="ico fa fa-angle-down color-777" style="top:12px"></i>
                <select id="city_id" data-placeholder="-- يرجى اختيار مدينة --" name="city_id" class="form-control rounded-0 py-0 select" required>
                    <option value default>المدينة</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->city }}</option>
                    @endforeach
                </select>

                @if ($errors->has('city_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city_id') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn {{ $errors->has('location_text') ? ' has-error' : '' }}" data-wow-delay=".7s">
                <input name="location_text" value="{{ old('location_text') }}" type="text" class="form-control rounded-0" placeholder="العنوان" required>

                @if ($errors->has('location_text'))
                    <span class="help-block">
                        <strong>{{ $errors->first('location_text') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group box col-sm-12 col-xs-12 mb-4 wow zoomIn" data-wow-delay=".8s">
                <i class="ico fa fa-angle-down color-777" style="top:12px"></i>
                <select id="invitedBy" data-placeholder="-- اكتب كود الاشتراك --" name="invitedBy" class="form-control rounded-0 py-0 select"></select>
            </div>

            <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn {{ $errors->has('password') ? ' has-error' : '' }}" data-wow-delay=".9s">
                <input name="password" type="password" class="form-control rounded-0" placeholder="كلمة المرور" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn" data-wow-delay=".9s">
                <input name="password_confirmation" type="password" class="form-control rounded-0" placeholder="أعد كلمة المرور" required>
            </div>

            <div class="text-center mx-auto mt-5 wow fadeInDown">
                <h2 class="color-c5">موقعك على الخريطة</h2>
                <img class="img-fluid" src="{{ URL::asset('public/web/img/line.png') }}" alt="">
            </div>
            <div class="bg-f6 log text-center px-4 py-5 mb-5">

                <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn {{ $errors->has('lat') ? ' has-error' : '' }}" data-wow-delay=".10s">
                    <!--<input id="map_lat" name="lat" value="{{ old('lat') }}" type="text" class="form-control rounded-0" placeholder="دائرة العرض" required>-->
                    <input id="map_lat" name="lat" value="" type="hidden" >

                    @if ($errors->has('lat'))
                        <span class="help-block">
                        <strong>{{ $errors->first('lat') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn {{ $errors->has('long') ? ' has-error' : '' }}" data-wow-delay=".10s">
                    <!--<input id="map_long" name="long" value="{{ old('long') }}" type="text" class="form-control rounded-0" placeholder="خط الطول" required>-->
                    <input id="map_long" name="long" value="" type="hidden" >

                    @if ($errors->has('long'))
                        <span class="help-block">
                        <strong>{{ $errors->first('long') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group col-sm-12 col-xs-12 mb-4 wow zoomIn" data-wow-delay=".1s">
                    <div id="div_map" style="width: 100%;height:400px;"></div>
                </div>

                <p class="px-3 color-777 font-14 text-justify wow zoomIn" data-wow-delay=".8s">
                    بالنقر على إنشاء حساب جديد أنت توافق على
                    <a class="color-af" href="{{ route('site-conditions') }}">الشروط</a>
                    التى نتبعها وأنك قرأت
                    <a class="color-af" href="#">سياسة الاستخدام</a>
                    بما فى ذلك
                    <a class="color-af" href="#">استخدام ملفات التعريف الارتباط</a>
                    يمكنك تلقي إشعارات رسائل SMS من فيسبوك ويمكنك إلغاء الإشتراك فى أى وقت
                </p>
                <div class="col mt-4 wow zoomIn" data-wow-delay="1s">
                    <button type="submit" class="btn bg-c5 font-18 py-2 px-5 text-white btn-hover rounded-0">إنشاء حساب</button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

    {{--<section class="img position-relative bg-cover">--}}
        {{--<div class="overlay position-absolute">--}}
        {{--</div>--}}
    {{--</section>--}}

@endsection


@section('scripts')
    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJve7ZMt3PvwUzwmJlvHaItGO5uVhEUIg&v=3.exp&language=ar&amp;libraries=places"></script>--}}

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5F_F681KtY6i1FIrNt0eLXm_hioNSg1w&v=3.exp&language=ar&amp;libraries=places"></script>

    <script>

        $(document).ready(function () {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $( "#invitedBy" ).select2({
                ajax: {
                    url: "{{ url('/') }}" + "/find-user-by-idNum",
                    dataType: 'json',
                    type: 'POST',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            _token: CSRF_TOKEN
                        };
                    },

                    processResults: function (data) {

                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1
            });

    //------map----------
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

            google.maps.event.addListener(marker, 'dragend', function (event) {

                $("#map_lat").val(this.getPosition().lat());
                $("#map_long").val(this.getPosition().lng());

                latlng = {lat: this.getPosition().lat(), lng: this.getPosition().lng()};

                geocoder.geocode({'location': latlng}, function (results, status) {
                    if (status === 'OK') {
                console.log(results)
//                        if (results[1]) {
//                            $("#map_address").val(results[1].formatted_address);
//                        }
                    }
                map.setZoom(14);
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
//                                $("#map_address").val(results[1].formatted_address);
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
//                                        if (status === 'OK') {
//                                            if (results[1]) {
//                                                $("#map_address").val(results[1].formatted_address);
//                                            }
//                                        }
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