@extends('web.layout.master')

@section('title')
    استعادة كلمة المرور
@endsection

@section('content')
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h3 color-c5 font-weight-bold ">استعادة كلمة المرور</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h5 color-c5 font-weight-bold" href="{{ route('home') }}">الرئيسية / </a>
                        <span class="h5 color-c5 font-weight-bold">استعادة كلمة المرور</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown">
                <h2 class="color-c5">استعادة كلمة المرور</h2>
                <img class="img-fluid" src="{{ URL::asset('public/web/img/line.png') }}" alt="">
            </div>

            <form action="{{url('/login-user-do-forget')}}" method="post" class='row bg-f6 p-5 p-5'>
                {{csrf_field()}}

                <div class="form-group col-sm-12 col-xs-12 mb-4 wow zoomIn {{ $errors->has('email') ? ' has-error' : '' }}">

                    <input name="email" value="{{ old('email') }}" type="text" class="form-control rounded-0" aria-describedby="emailHelp" placeholder="الإميل" required="required">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col mt-4 wow zoomIn">
                    <button type="submit" class="btn bg-c5 font-18 py-2 px-5 text-white btn-hover rounded-0">استعادة كلمة المرور</button>
                </div>
            </form>
        </div>
    </div>

@endsection