@extends('web.layout.master')

@section('title')
    تسجيل الدخول
@endsection

@section('content')
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h3 color-c5 font-weight-bold ">تسجيل الدخول</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h5 color-c5 font-weight-bold" href="{{ route('home') }}">الرئيسية / </a>
                        <span class="h5 color-c5 font-weight-bold">تسجيل الدخول</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown">
                <h2 class="color-c5">تسجيل الدخول</h2>
                <img class="img-fluid" src="{{ URL::asset('public/web/img/line.png') }}" alt="">
            </div>

            {!! Form::open([ 'url' => route('login'), 'class' => 'row bg-f6 p-5 p-5', 'files' => 'true' ]) !!}

            <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn {{ $errors->has('email') ? ' has-error' : '' }}">

                <input name="email" value="{{ old('email') }}" type="text" class="form-control rounded-0" aria-describedby="emailHelp" placeholder="الإميل أو رقم الجوال" required="required">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn {{ $errors->has('password') ? ' has-error' : '' }}">

                <input name="password" type="password" class="form-control rounded-0" placeholder="كلمة المرور" required="required">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col mt-4 wow zoomIn">
                <button type="submit" class="btn bg-c5 font-18 py-2 px-5 text-white btn-hover rounded-0">دخول</button>

                <a href="{{ url('/login-user-forget') }}" style="margin-right: 20px;"> {{ trans('admin.loginForget') }} </a>
            </div>
            {!! Form::close() !!}


            <div class="text-center my-5 wow fadeInDown">
                <h2 class="color-c5">تسجيل عن طريق</h2>
                <img class="img-fluid" src="{{ URL::asset('public/web/img/line.png') }}" alt="">
            </div>
            <div class="bg-f6 log text-center px-4 mb-5">
                <ul class="list-unstyled row pr-0">
                    <!--<li class="col-md-4 col-xs-12 mb-3 wow zoomIn bg-twitter py-3 my-3">-->
                    <!--    <a class=" text-white h2 m-0 px-5" href="{{ route('auth-provider', 'twitter') }}">-->
                    <!--        Twitter-->
                    <!--        <i class="fab fa-twitter mr-lg-4 mr-2"></i>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li class="col-md-4 col-xs-12 mb-3 wow zoomIn bg-google py-3 my-3 border-right-left">
                        <a class="col-12 text-white h2 px-5" href="{{ route('auth-provider', 'google') }}">
                            Google
                            <i class="fab fa-google mr-lg-4 mr-2"></i>
                        </a>
                    </li>
                    <li class="col-md-4 col-xs-12 mb-3 wow zoomIn bg-facebook py-3 my-3">
                        <a class="col-12 text-white h2 px-md-4 px-5" href="{{ route('auth-provider', 'facebook') }}">
                            Facebook
                            <i class="fab fa-facebook-f mr-lg-4 mr-2"></i>
                        </a>
                    </li>
                    <!--<li class="col-md-4 col-xs-12 mb-3 wow zoomIn bg-yahoo py-3 my-3">-->
                    <!--    <a class="col-12 text-white h2 px-md-4 px-5" href="{{ route('auth-provider', 'yahoo') }}">-->
                    <!--        Yahoo-->
                    <!--        <i class="fab fa-yahoo mr-lg-4 mr-2"></i>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <!--<li class="col-md-4 col-xs-12 wow zoomIn bg-hotmail py-3 my-3 border-right-left">-->
                    <!--    <a class="col-12 text-white h2 px-md-4 px-5" href="{{ route('auth-provider', 'hotmail') }}">-->
                    <!--        Hotmail-->
                    <!--        <i class="fa fa-envelope mr-lg-4 mr-2"></i>-->
                    <!--    </a>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
    </div>

@endsection