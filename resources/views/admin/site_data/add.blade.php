@extends('admin.master')

@section('title')
	@if( $type == 1 )
		{{ trans('admin.aboutAdd') }}
	@else
		{{ trans('admin.advantagesAdd') }}
	@endif
@endsection

@section('sectionName')
	{{ trans('admin.sideSiteTitle') }}
@endsection

@section('pageName')
	@if( $type == 1 )
		{{ trans('admin.aboutAdd') }}
	@else
		{{ trans('admin.advantagesAdd') }}
	@endif
@endsection

@section('content')

	<div class="col-md-12">
		<form action="{{ route($type == 1 ? 'about-create' : 'advantages-create') }}" method="post" enctype="multipart/form-data">

			<input type="hidden" name="type" value="{{ $type }}">

			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"> {{ trans('admin.rowData') }} </h5>
				</div>
				<div class="panel-body">
					<fieldset>
						<div class="collapse in" id="demo1">

							@if( $type == 1 )
								<div class="form-group">
									<label>{{ trans('admin.adminsADAppPhoto') }}</label>
									<input type="file" name="icon" class="form-control">
								</div>
							@endif

							<div class="form-group">
								<label> {{ trans('admin.adminsADLocationText') }} </label>
								<input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder=" {{ trans('admin.adminsADLocationText') }} ">
							</div>

							<div class="form-group">
								<label> {{ trans('admin.aboutText') }} </label>
								<textarea name="description" rows="12" class="form-control" placeholder=" {{ trans('admin.aboutText') }} ">
									{{ old('description') }}
								</textarea>
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