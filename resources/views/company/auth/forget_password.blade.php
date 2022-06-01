@extends('company.auth.master')

@section('title')
    نسيت كلمة المرور
@endsection

@section('content')

    <form class="" action="{{ route('post-forget-password')}}" method="post">
        <h3 class="font-green">نسيت كلمة المرور ؟</h3>
        <p>أدخل بريدك الإلكتروني لإعادة تعيين كلمة المرور .</p>

        @include('company.layouts.alerts')

        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="البريد الإلكتروني" name="email" /> </div>
        <div class="form-actions">
            <input type="hidden" name="_token" value="{{ Session::token() }}">

            <button type="submit" class="btn btn-success uppercase pull-left">إرسال</button>

            <button type="button" class="btn green btn-outline" style="visibility: hidden">عودة</button>
        </div>
    </form>
@endsection