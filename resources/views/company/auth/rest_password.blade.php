@extends('company.auth.master')

@section('title')
    إعادة تعيين كلمة المرور
@endsection

@section('content')

    <form class="" action="{{ route('post-reset-password')}}" method="post">
        <input type="hidden" name="user_token" value="{{$token}}" />
        {{csrf_field()}}
        <h3 class="font-green">إعادة تعيين كلمة المرور </h3>
        <p>سيتم إرسال التعليمات عبر البريد الإلكتروني</p>

        @include('company.layouts.alerts')

        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="password" placeholder="كلمة المرور" name="password" />
        </div>

        <div class="form-group">
            <input name="password_con" type="password" class="form-control placeholder-no-fix" placeholder="تأكيد كلمة المرور ">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase pull-left">إرسال</button>
            <button type="button" class="btn green btn-outline" style="visibility: hidden">عودة</button>
        </div>
    </form>
@endsection