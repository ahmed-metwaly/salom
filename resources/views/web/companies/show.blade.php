@extends('web.layout.master')

@section('title')
    {{ $company->name }}
@endsection

@section('content')
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h3 color-c5 font-weight-bold ">{{ $company->name }}</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h5 color-c5 font-weight-bold" href="{{ route('home') }}">الرئيسية / </a>
                        <a class="h5 color-c5 font-weight-bold" href="{{ route('web.companies.index') }}">مراكز التجميل / </a>
                        <span class="h5 color-c5 font-weight-bold">{{ $company->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="center">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown" data-wow-duration="1s">
                <h2 class="color-c5">{{ $company->name }}</h2>
                <img class="img-fluid" src="{{ URL::asset('public/web/img/line.png') }}" alt="">
            </div>
            <div class="row">
                <div class="col-12 mb-5 img-center wow zoomIn" data-wow-duration="1s" style='background: url("{{ url('public/uploads/users/' . $company->photo) }}") no-repeat center center'>

                </div>
                <div class="col-md-6 col-sm-12 mb-md-0 mb-4">
                    <div class="bg-f6 p-4 font-24 wow fadeInRight" data-wow-duration="1s">
                        <h4 class="d-inline-block color-c5 mb-3"> {{ $company->name }} </h4>

                        <span class="text-left checked float-left font-weight-bold mb-3 font-18">
                            {{ $company->ratings()->count() ? $company->ratings()->avg('stars_count') : '0' }}
                            <i class="fa fa-star fa-lg"></i>
                        </span>

                        <p class="color-777 line-2 text-justify pl-3 mb-3">
                            {{ $company->description }}
                        </p>
                        <p class="color-c5 font-18 mt-1 mb-3 line-2">
                             مواعيد العمل :<br>
                            {{--<span class="color-11"> {{ $company->workInterval ? $company->workInterval->work_time : '-----' }} </span>--}}
                            @if($company->works->count())
                                @foreach($company->works as $work)
                                    <span class="color-11"> - {{ $work->day->day }} من
                                        <span class="color-c5"> {{ date('g:i A', strtotime( $work->time_from )) }} </span> إلى
                                        <span class="color-c5"> {{ date('g:i A', strtotime( $work->time_to )) }} </span>
                                    </span><br>
                                @endforeach
                            @else
                            ---------
                            @endif
                        </p>

                        {{--<p class="color-c5 font-18 mt-1 mb-3 line-2">--}}
                            {{--التوافر :--}}
                            {{--<span class="color-11"> {{ $company->workInterval ? $company->workInterval->work_day : "-----" }} </span>--}}
                        {{--</p>--}}
                        <p class="color-c5 font-18 mt-1 mb-3 line-2">
                            العنوان :
                            <span class="color-11"> {{ $company->location_text }}, {{ $company->city->city }} </span>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="bg-f6 p-4 wow fadeInLeft" data-wow-duration="1s">
                        <h4 class="d-inline-block color-c5 mb-3">الخدمات المقدمة</h4>
                        <span class="h5 mb-3 color-c5 float-sm-left d-sm-inline-block d-block">{{ $company->services->count() }}  خدمات</span>
                        <ul class="list-unstyled pr-0 mt-1 font-18 ">
                            @foreach($company->services()->take(5)->get() as $service)
                                <li class="color-777 my-4">
                                    <a class="color-777 border-hover pb-2" {{ $service->is_active && !$service->has_blocked  ? "href=" . route('web.services.show', Hashids::encode($service->id)) : '' }}>
                                        - {{ $service->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('companies.services', Hashids::encode($company->id)) }}" class="btn btn bg-c5 font-18 py-2 px-5 text-white mt-3 wow zoomIn btn-hover rounded-0" data-wow-duration="1s">عرض جميع الخدمات</a>
                    </div>
                </div>
            </div>

            <!--*========
            ==== Map ====
            =========*-->
            <section class="map my-5 wow fadeInUp" data-wow-duration="1s" id="map">
                <script>
                    function initMap() {
                        var uluru = {
                            lat: parseFloat("{{ $company->lat }}"),
                            lng: parseFloat("{{ $company->long }}")
                        };
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 14,
                            center: uluru
                        });
                        var marker = new google.maps.Marker({
                            position: uluru,
                            map: map
                        });
                    }
                </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHOF0LQPNqSwKG_0fHMM6Gb4pSBQ_TIPQ&callback=initMap"></script>
                {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5F_F681KtY6i1FIrNt0eLXm_hioNSg1w&v=3.exp&language=ar&amp;libraries=places"></script>--}}

            </section>
        </div>
    </div>
@endsection