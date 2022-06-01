@extends('web.layout.master')

@section('title')
     {{ $title }}
@endsection

@section('content')
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h2 color-c5 font-weight-bold "> {{ $title }} </h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h4 color-c5 font-weight-bold" href="{{ route('home') }}">الرئيسية / </a>
                        <span class="h4 color-c5 font-weight-bold"> {{ $title }} </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown" data-wow-duration="2s">
                <h2 class="color-c5"> {{ $title }} </h2>
                <img class="img-fluid" src="{{ URL::asset('public/web/img/line.png') }}" alt="">
            </div>

            <div class="row mb-5 wow fadeInUp" data-wow-duration= '1s'>
                <div class="col-sm-12  border bg-f6 font-14 font-weight-bold rounded pt-5 pb-4">

                    {!! $conditions !!}
                </div>
            </div>
        </div>
    </div>

@endsection




