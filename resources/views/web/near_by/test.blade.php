@extends('web.layout.master')

@section('title')
    بالقرب منى
@endsection

@section('content')
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h2 color-c5 font-weight-bold ">بالقرب منى</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h4 color-c5 font-weight-bold" href="{{ route('home') }}">الرئيسية / </a>
                        <span class="h4 color-c5 font-weight-bold">بالقرب منى</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="near-to-me">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown" data-wow-duration="2s">
                <h2 class="color-c5">الاماكن القريبة منى</h2>
                <img class="img-fluid" src="{{ URL::asset('public/web/img/line.png') }}" alt="">
            </div>

            <input type="hidden" id="map_lat" value="">
            <input type="hidden" id="map_long" value="">

            <div class="map my-5 wow fadeIn" data-wow-duration="4s" >
                <div id="div_map" style="width: 100%;height:500px;"></div>
            </div>
        </div>
    </div>

    <section class="img position-relative bg-cover">
        <div class="overlay position-absolute">
        </div>
    </section>

@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJve7ZMt3PvwUzwmJlvHaItGO5uVhEUIg&v=3.exp&language=ar&amp;libraries=places"></script>

    <script>

        var locations = [
            ['اسم المركز', '31.034627500000006','31.365691406250008'],
            ['اسم المركز', '31.034627500000009','31.365691406250009'],
            ['اسم المركز', '24.71053034919989','46.689994205401604']
        ];

        var geocoder;
        var map;
        var bounds = new google.maps.LatLngBounds();

        function initialize() {
            map = new google.maps.Map(
                document.getElementById("div_map"), {
                    center: new google.maps.LatLng(24.710374406523634, 46.682441104815666),
                    zoom: 13,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
            geocoder = new google.maps.Geocoder();

            for (i = 0; i < locations.length; i++) {


                geocodeAddress(locations, i);
            }
        }
        google.maps.event.addDomListener(window, "load", initialize);

        function geocodeAddress(locations, i) {
            var title = locations[i][0];
            // var address = locations[i][1];
            var address;
            var url = locations[i][1] + locations[i][2];
            var latlng = {lat: parseFloat(locations[i][1]), lng: parseFloat(locations[i][2])};

            geocoder.geocode({
                    // 'address': locations[i][1]
                    'location': latlng
                },

                function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {

                        console.log(results)
                        address = results[1].formatted_address;

                        var marker = new google.maps.Marker({
                            icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                            map: map,
                            position: results[0].geometry.location,
                            title: title,
                            animation: google.maps.Animation.DROP,
                            address: address,
                            url: url
                        })
                        infoWindow(marker, map, title, address, url);
                        bounds.extend(marker.getPosition());
                        map.fitBounds(bounds);
                    } else {
                        alert("geocode of " + address + " failed:" + status);
                    }
                });
        }

        function infoWindow(marker, map, title, address, url) {
            google.maps.event.addListener(marker, 'click', function() {
                var html = "<div><h3>" + title + "</h3><p>" + address + "<br></div></p></div>";
                // var html = "<div><h3>" + title + "</h3><p>" + address + "<br></div><a href='" + url + "'>View location</a></p></div>";
                iw = new google.maps.InfoWindow({
                    content: html,
                    maxWidth: 350
                });
                iw.open(map, marker);
            });
        }

        function createMarker(results) {
            var marker = new google.maps.Marker({
                icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                map: map,
                position: results[0].geometry.location,
                title: title,
                animation: google.maps.Animation.DROP,
                address: address,
                url: url
            })
            bounds.extend(marker.getPosition());
            map.fitBounds(bounds);
            infoWindow(marker, map, title, address, url);
            return marker;
        }
    </script>
@endsection
