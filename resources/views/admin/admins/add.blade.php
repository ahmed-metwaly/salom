@extends('admin.master')

@section('title')
	{{ trans('admin.sideAdminsAdd') }}
@endsection

@section('sectionName')
	{{ trans('admin.sideAdminsTitle') }}
@endsection

@section('pageName')
	{{ trans('admin.sideAdminsAdd') }}
@endsection

@section('content')

	<div class="col-md-12">
		<form action="{{ route('admin-do-add') }}" method="post" enctype="multipart/form-data">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"> {{ trans('admin.adminNewAdminTitle') }} </h5>
				</div>
				<div class="panel-body">
					<fieldset>
						<div class="collapse in" id="demo1">

							<div class="form-group">
								<label>الصورة الشخصية</label>
								<input type="file" name="photo" class="form-control" required>
							</div>

							<div class="form-group">
								<label> {{ trans('admin.sideAdminsName') }} </label>
								<input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder=" {{ trans('admin.sideAdminsName') }} ">
							</div>

							<div class="form-group">
								<label> {{ trans('admin.adminsADEmail') }} </label>
								<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder=" {{ trans('admin.adminsADEmail') }} ">
							</div>

							<div class="form-group">
								<label> {{ trans('admin.adminsADPhone') }} </label>
								<input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder=" {{ trans('admin.adminsADPhone') }} ">
							</div>

							<div class="form-group">
								<label>{{ trans('admin.adminsADPassword') }}</label>
								<input type="password" name="password" class="form-control" placeholder="****">
							</div>

							<div class="form-group">
								<label>{{ trans('admin.adminsADRePassword') }}</label>
								<input type="password" name="password_con" class="form-control" placeholder="****">
							</div>

							<div class="form-group">
								<label> {{ trans('admin.adminsADIsAdmin') }} </label>
								<select id="is-admin" data-placeholder="-- {{ trans('admin.SettingsSelect') }} --" name="is_admin" class="select">
									<option value="0">-- {{ trans('admin.SettingsSelect') }} --</option>
									<option value="1"> {{ trans('admin.sAdmin') }} </option>
									<option value="0"> {{ trans('admin.lAdmin') }} </option>
								</select>
							</div>

							<div class="form-group" id="level">
								<label> {{ trans('admin.adminsADLevel') }} </label>
								<select data-placeholder="-- {{ trans('admin.SettingsSelect') }} --"  name="group_id" class="form-control" >
									<option value="0">-- {{ trans('admin.SettingsSelect') }} --</option>
									@if(count($groups) > 0)
										@foreach($groups as $group)
											<option value="{{ $group->id }}"> {{ $group->name }} </option>
										@endforeach
									@endif
								</select>
								<label> الكود التعريفي </label>
								<input type="text" name="id_number" class="form-control" placeholder="#1234">

							</div>

							<div class="form-group">
								<label> {{ trans('admin.adminsADStatus') }} </label>
								<select data-placeholder="-- {{ trans('admin.SettingsSelect') }} --" name="status" class="select">
									<option value="1"> {{ trans('admin.settingsOpen') }} </option>
									<option value="0"> {{ trans('admin.settingsClose') }} </option>
								</select>
							</div>

						</div>
					</fieldset>
					<input type="hidden" name="_token" value="{{ Session::token() }}">
					<div class="text-right">
						<button type="submit" class="btn btn-primary"> {{ trans('admin.save') }} <i class="icon-arrow-left13 position-right"></i></button>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection

@section('script')
	<script>

        $("#level").hide();

        //		$('#is_admin').change(function(){
//			var id = $(this).val();
//			if(id==1){
////				$('#group_id').html('<option> جارى التحميل ...</option>');
//				$('#group_id').removeAttr('style');
//			}
//		});
	</script>
@endsection('script');
