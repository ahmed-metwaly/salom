@extends('admin.auth.layouts.master')

@section('top_header')
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection

@section('title')
	{{ trans('admin.loginPageTitle') }}
@endsection

@section('content')
	<!-- Simple login form -->
	<form action="{{ url('login-admin') }}" method="post">
		<div class="panel panel-body login-form">
			<div class="text-center">
				<div class="overflow-hidden">
					<img style="width: 250px;height: auto;" src="{{ url('public/images/logo.png') }}" alt="وسائل الشبكة"></div>
				<h5 class="content-group"> {{ trans('admin.loginPageTitle') }} </h5>

				@if(Session::has('mOk'))

					<div class="alert alert-success alert-styled-left">
						<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
						{{ Session::get('mOk') }}
					</div>
				@endif

				@if(Session::has('mNo'))
					<h5 class="has-error error red">
						<small style="color: red"> {{ Session::get('mNo') }} </small>
					</h5>
				@endif

			</div>

			<div class="form-group has-feedback has-feedback-left  {{  $errors->has('email') ? ' has-error' : '' }}">

				<input type="email" name="email" required class="form-control"
				       placeholder="{{ trans('admin.loginEmail') }}" value="{{ old('email') }}">

				<div class="form-control-feedback">
					<i class="icon-user text-muted"></i>
				</div>

				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif

			</div>

			<div class="form-group has-feedback has-feedback-left {{  $errors->has('password') ? ' has-error' : '' }}">

				<input type="password" name="password" required class="form-control"
				       placeholder="{{ trans('admin.loginPassword') }}">
				<div class="form-control-feedback">
					<i class="icon-lock2 text-muted"></i>
				</div>
				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</div>
			{!! csrf_field() !!}


			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block"> {{ trans('admin.loginSubmit') }} <i
							class="icon-circle-left2 position-right"></i></button>
			</div>

			<div class="text-center">
				<a href="{{ url('login-admin-forget') }}"> {{ trans('admin.loginForget') }} </a>
			</div>
		</div>
	</form>
	<!-- /simple login form -->

@endsection
