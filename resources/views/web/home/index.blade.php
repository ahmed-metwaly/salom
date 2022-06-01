@extends('web.layout.master')

@section('title')
    {{ settings()['name'] }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/web/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('content')

    @include('web.home.slider')

    @include('web.home.search')

    @include('web.home.special_service')

    @include('web.home.best_services')

    @include('web.home.best_companies')

    <section class="img position-relative bg-cover">
        <div class="overlay position-absolute">
        </div>
    </section>

    <section class="map zoomIn" data-wow-duration="1s" id="map">
    </section>

@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJve7ZMt3PvwUzwmJlvHaItGO5uVhEUIg&v=3.exp&language=ar&amp;libraries=places"></script>

    <script src="{{ URL::asset('public/web/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('public/web/js/carousel-load.js') }}"></script>
    <script src="{{ URL::asset('public/web/js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('public/web/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script>
        $(document).ready(function () {

            $('#datetimepicker1').datetimepicker({
                format: 'yyyy-mm-dd D hh:ii',
                autoclose: true
            });

            $('#datetimepicker2').datetimepicker({
                format: 'yyyy-mm-dd D hh:ii',
                autoclose: true
            });
            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $( "#service" ).select2({
                tags: true,
                dir: "rtl",
                ajax: {
                    url: "{{ url('/') }}" + "/services/findByName",
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

            $(".search-form").bind( "submit", function( e ) {
                e.preventDefault();

                var date = $('#date').val();
                var individual_num = $('#individual_num').val();

                if ( $('#is_home').is( ":checked" ) )
                    localStorage.setItem('is_home', true);

                if (date !== '')
                    localStorage.setItem('date', date);

                if (individual_num !== '')
                    localStorage.setItem('individual_num', individual_num);


                $('.search-form')[0].submit();

            });

            var latlng;
            var marker;
            var map;

            var latlng;
            var marker;
            var map;

            var lat_val = 24.710374406523634;
            var long_val = 46.682441104815666;

            var pos = {lat: lat_val, lng: long_val};
            var geocoder = new google.maps.Geocoder;


            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: pos
            });
            marker = new google.maps.Marker({
                draggable: false,
                position: pos,
                map: map
            });

            if (navigator.geolocation) {

                navigator.geolocation.getCurrentPosition(function (positions) {
                    lat = positions.coords.latitude;
                    lng = positions.coords.longitude;

                    // $("#map_lat").val(lat);
                    // $("#map_long").val(lng);

                    if (marker) {
                        marker.setMap(null);
                    }
                    latlng = {lat: lat, lng: lng};

                    geocoder.geocode({'location': latlng}, function (results, status) {
                        if (status === 'OK') {
                            if (results[1]) {
                                map.setCenter(new google.maps.LatLng(lat, lng));
                                marker = new google.maps.Marker({
                                    draggable: false,
                                    position: latlng,
                                    map: map
                                });
                                map.setZoom(13);
                            }

                            getNearLocations(latlng);
                        }
                    });
                });
            }

            function getNearLocations(latlng) {
                // console.log(latlng['lat'])
                // console.log(latlng.lat)
                // {lat: 31.034474299999996, lng: 31.3655826}

                var lat = latlng.lat;
                var long = latlng.lng;
                var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

                $.ajax({
                    url: "{{ url('/') }}" + "/near-locations" ,
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'lat': lat, 'long': long},
                })
                    .done(function(reseived_data) {
                        var parsed_data = $.parseJSON(reseived_data);

                        if(parsed_data.code > 0) {

                            // console.log(parsed_data.data[0].name)
                            var locations = parsed_data.data;

                            var geocoder;
                            // var map;
                            var bounds = new google.maps.LatLngBounds();

                            map = new google.maps.Map(
                                document.getElementById("map"), {
                                    // center: new google.maps.LatLng(24.710374406523634, 46.682441104815666),
                                    // zoom: 13,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                });
                            geocoder = new google.maps.Geocoder();

                            for (i = 0; i < locations.length; i++) {


                                geocodeAddress(locations, i);
                            }

                            function geocodeAddress(locations, i) {
                                var title = locations[i].name;
                                var company_url = locations[i].url;
                                // var address = locations[i][1];
                                var address;
                                var url = locations[i].lat + locations[i].long;
                                var latlng = {lat: parseFloat(locations[i].lat), lng: parseFloat(locations[i].long)};

                                geocoder.geocode({
                                        // 'address': locations[i][1]
                                        'location': latlng
                                    },

                                    function(results, status) {
                                        if (status == google.maps.GeocoderStatus.OK) {

                                            // console.log(results)
                                            address = results[1].formatted_address;

                                            var marker = new google.maps.Marker({
                                                icon: 'http://maps.google.com/mapfiles/ms/icons/red.png',
                                                map: map,
                                                position: results[0].geometry.location,
                                                title: title,
                                                animation: google.maps.Animation.DROP,
                                                address: address,
                                                url: url
                                            })
                                            infoWindow(marker, map, title, address, url, company_url);
                                            bounds.extend(marker.getPosition());
                                            map.fitBounds(bounds);
                                        } else {
                                            // alert("geocode of " + address + " failed:" + status);
                                        }
                                    });
                            }

                            function infoWindow(marker, map, title, address, url, company_url) {
                                google.maps.event.addListener(marker, 'click', function() {
                                    var html = '<div><h3><a href='+company_url+'>' + title + '</a></h3><p>' + address + '<br></div></p></div>';
                                    // var html = "<div><h3>" + title + "</h3><p>" + address + "<br></div><a href='" + url + "'>View location</a></p></div>";
                                    iw = new google.maps.InfoWindow({
                                        content: html,
                                        maxWidth: 350
                                    });
                                    iw.open(map, marker);
                                });
                            }

                            // function createMarker(results) {
                            //     var marker = new google.maps.Marker({
                            //         icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                            //         map: map,
                            //         position: results[0].geometry.location,
                            //         title: title,
                            //         animation: google.maps.Animation.DROP,
                            //         address: address,
                            //         url: url
                            //     })
                            //     bounds.extend(marker.getPosition());
                            //     map.fitBounds(bounds);
                            //     infoWindow(marker, map, title, address, url);
                            //     return marker;
                            // }
                        }
                    });
            }
        });
    </script>
@endsection

