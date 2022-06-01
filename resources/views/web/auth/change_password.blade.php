@extends('web.layout.master')

@section('title')
    تغيير كلمة المرور
@endsection

@section('content')
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h2 color-c5 font-weight-bold ">تغيير كلمة المرور</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h4 color-c5 font-weight-bold" href="{{ route('home') }}">الرئيسية / </a>
                        <span class="h4 color-c5 font-weight-bold">تغيير كلمة المرور</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown">
                <h2 class="color-c5"> تغيير كلمة المرور</h2>
                <img class="img-fluid" src="{{ URL::asset('public/web/img/line.png') }}" alt="">
            </div>

            {!! Form::open([ 'url' => route('change-password'), 'class' => 'row bg-f6 p-5 p-5' ]) !!}

            <div class="col-sm-6 col-xs-12 col-sm-offset-3 col-xs-offset-3">
                <div class="form-group col-sm-12 col-xs-12 mb-4 wow zoomIn {{ $errors->has('current-password') ? ' has-error' : '' }}" data-wow-delay=".5s">
                    <input name="current-password" type="password" class="form-control rounded-0" placeholder="كلمة المرور الحالية" required>

                    @if ($errors->has('current-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('current-password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-sm-12 col-xs-12 mb-4 wow zoomIn {{ $errors->has('password') ? ' has-error' : '' }}" data-wow-delay=".6s">
                    <input name="password" type="password" class="form-control rounded-0" placeholder="كلمة المرور الجديدة" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-sm-12 col-xs-12 mb-4 wow zoomIn {{ $errors->has('password_confirmation') ? ' has-error' : '' }}" data-wow-delay=".7s">
                    <input name="password_confirmation" type="password" class="form-control rounded-0" placeholder="تأكيد كلمة المرور الجديدة" required>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col mt-4 wow zoomIn" data-wow-delay="1s">
                    <button type="submit" class="btn bg-c5 font-18 py-2 px-5 text-white btn-hover">تغيير كلمة المرور</button>
                </div>

            </div>
            {!! Form::close() !!}

        </div>
    </div>

    <!--<section class="img position-relative bg-cover">-->
    <!--    <div class="overlay position-absolute">-->
    <!--    </div>-->
    <!--</section>-->

@endsection