@extends('admin.master')

@section('title')
	@if(Request::url() == route('about'))
		{{ trans('admin.aboutShow') }}
	@else
		{{ trans('admin.advantagesShow') }}
	@endif
@endsection

@section('sectionName')
	{{ trans('admin.sideSiteTitle') }}
@endsection

@section('pageName')
	@if(Request::url() == route('about'))
		{{ trans('admin.aboutShow') }}
	@else
		{{ trans('admin.advantagesShow') }}
	@endif
@endsection

@section('content')
	<div class="panel panel-flat">

		<div class="col-lg-2">
			<a href="{{ route($type == 1 ? 'about-add' : 'advantages-add') }}" class="btn btn-primary" style="margin: 20px 10px 20px 0;">اضافة جديد
				<i class="icon-plus-circle2" style="top: 2px;"></i></a>
		</div>

		<table class="table table-bordered table-hover datatable-highlight">
			<thead>
			<tr>
				<th>#</th>
				@if( $type == 1 )
					<th>{{ trans('admin.adminsADAppPhoto') }}</th>
				@endif
				<th>{{ trans('admin.adminsADLocationText') }}</th>
				<th>{{ trans('admin.aboutText') }}</th>
				<th>{{ trans('admin.show') }}</th>
				<th>{{ trans('admin.edit') }}</th>
				<th>{{ trans('admin.delete') }}</th>
			</tr>
			</thead>
			<tbody>

			@foreach($data as $value)
				<tr>
					<td> {{ $value->id }} </td>
					@if( $type == 1 )
						<td> <img class="img-preview img-responsive" src="{{ url('uploads/site_data/' . $value->icon) }}"> </td>
					@endif
					<td> {{ $value->title }} </td>
					<td>
						<a href="{{ route($type == 1 ? 'about-show' : 'advantages-show', ['id' => $value->id]) }}">
							{{ str_limit($value->description, 30) }}
						</a>
					</td>

					<td>
						<a href="{{ route($type == 1 ? 'about-show' : 'advantages-show', ['id' => $value->id]) }}">
							<i class="icon-tv"></i>
						</a>
					</td>
					<td>
						<a href="{{ route($type == 1 ? 'about-edit' : 'advantages-edit', ['id' => $value->id]) }}">
							<i class="icon-pencil"></i>
						</a>
					</td>
					<td>
						<a class="do-delete" href="{{ route($type == 1 ? 'about-delete' : 'advantages-delete', ['id' => $value->id]) }}">
							<i class="icon-database-remove"></i>
						</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>

@endsection
