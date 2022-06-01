@extends('company.auth.master')

@section('title')
    تسجيل الدخول
@endsection

@section('content')
    <form class="login-form" action="{{ route('company-login-post') }}" method="post">
        <h3 class="form-title font-green">تسجيل الدخول</h3>

        @include('company.layouts.alerts')

        <div class="alert alert-danger hide">
            <button class="close" data-close="alert"></button>
            <span class="error_span"> أدخل البريد الإلكتروني أو كلمة المرور </span>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">البريد الإلكتروني</label>
            <input required class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="البريد الإلكتروني" name="email" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>
            <input required class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="كلمة المرور" name="password" />
        </div>
        <div class="form-actions">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <button type="submit" class="btn green uppercase submit_btn">تسجيل الدخول</button>
            <a href="{{ route('get-forget-password') }}" class="forget-password">نسيت كلمة المرور ؟</a>
        </div>
        <div class="create-account">
            <p>
                <a href="#" class="uppercase">إنشاء حساب</a>
            </p>
        </div>
    </form>
@endsection



