@extends('admin.auth.layouts.master')
		@section('title')
			تغيير كلمة المرور
		@endsection

			@section('content')

			
				<!-- Password recovery -->
				<form action="{{route('post-reset-password')}}" method="post">
				<input type="hidden" name="user_token" value="{{$token}}" />
				{{csrf_field()}}
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
							<h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>
						</div>

						<div class="form-group has-feedback">
							<input name="password" type="password" class="form-control" placeholder="كلمة المرور">
							<div class="form-control-feedback">
								<i class="icon-mail5 text-muted"></i>
							</div>
						</div>
						
						<div class="form-group has-feedback">
							<input name="password_con" type="password" class="form-control" placeholder="تأكيد كلمة المرور ">
							<div class="form-control-feedback">
								<i class="icon-mail5 text-muted"></i>
							</div>
						</div>

						<button type="submit" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-left13 position-right"></i></button>
					</div>
				</form>
				<!-- /password recovery -->
			@endsection
