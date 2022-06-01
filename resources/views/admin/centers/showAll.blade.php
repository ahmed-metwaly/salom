@extends('admin.master')

@section('title')
	{{ trans('admin.sideCentersShow') }}
@endsection

@section('sectionName')
	{{ trans('admin.sideAdminsTitle') }}
@endsection

@section('pageName')
	{{ trans('admin.sideCentersShow') }}
@endsection

@section('content')
	<div class="panel panel-flat">
		<table class="table table-bordered table-hover datatable-highlight">
			<thead>
			<tr>
				{{--<th>#</th>--}}
				<th>{{ trans('admin.adminsADPhoto') }}</th>
				<th>{{ trans('admin.adminsADName') }}</th>
				<th>تسجيل بواسطة</th>
				<th>{{ trans('admin.adminsADPhone') }}</th>
				<th>{{ trans('admin.adminsADEmail') }}</th>
				<th>{{ trans('admin.centerADRating') }}</th>
				<th> مدة الاشتراك </th>
				<th> تاريخ الاشتراك </th>
				<th>{{ trans('admin.adminsADStatus') }}</th>
				<th>{{ trans('admin.adminChangeStatus') }}</th>
{{--				<th>{{ trans('admin.adminsADDate') }}</th>--}}
{{--				<th>{{ trans('admin.show') }}</th>--}}
				<th>{{ trans('admin.edit') }}</th>
				<th>{{ trans('admin.delete') }}</th>
			</tr>
			</thead>
			<tbody>

			@foreach($data as $value)
				<tr>
					{{--<td> {{ $value->id }} </td>--}}
					<td> <img class="img-preview img-responsive" src="{{ url('public/uploads/users/' . $value->photo) }}"> </td>
					<td> <a href="{{ route('center-details', ['id' => $value->id]) }}">{{ $value->name }}</a> </td>

					<td>
						@if($value->invited_by)
							<a href="{{ route(getUserById($value->invited_by)->user_type == '2' ? 'center-details' : 'admin-details', ['id' => $value->invited_by]) }}">
								{{ getUserById($value->invited_by)->name }}
							</a>
						@else
							-------
						@endif
					</td>

					<td> {{ $value->phone }} </td>
					<td> {{ $value->email }} </td>
					<td> <span class="text-success"> {{ $value->ratings->count() ? $value->ratings->avg('stars_count') .'  نجوم' : '-------' }} </span></td>
					<td>  {{ $value->duration }} ( شهر ) </td>
					<td> {{ date('Y-m-d', strtotime($value->active_at)) }} </td>
					<td> {{ $value->status ? trans('admin.settingsOpen') :  trans('admin.settingsClose') }} </td>
					<td>
						<a class="changeStatus">
							@if( $value->status )
								<i class="icon-x" status="0" data="{{ $value->id }}"></i>
							@else
								<i class="icon-check" status="1" data="{{ $value->id }}"></i>
							@endif
						</a>
					</td>
					{{--<td style="direction: ltr; text-align: right;"> {{ $value->created_at->format('Y-m-d g:i A') }} </td>--}}

					{{--<td>--}}
						{{--<a href="{{ route('center-details', ['id' => $value->id]) }}">--}}
							{{--<i class="icon-tv"></i>--}}
						{{--</a>--}}
					{{--</td>--}}
					<td>
						<a href="{{ route('center-edit', ['id' => $value->id]) }}">
							<i class="icon-pencil"></i>
						</a>
					</td>
					<td>
						<a class="do-delete" href="{{ auth()->user()->id == $value->id ?  '#' : route('center-delete', ['id' => $value->id]) }}">
							<i class="{{ auth()->user()->id == $value->id ?  '' : 'icon-database-remove' }}"></i>
						</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>

@endsection

@section('script')
	<script>
        $(document).ready(function() {
            $('.changeStatus').on( "click", function( ) {

                var thisBtn = $(this).children();
                var user_id = $(this).children().attr('data');
                var status = $(this).children().attr('status');
                var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

                $.ajax({
                    url: "{{ url('/') }}" + "/change-status" ,
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'user_id': user_id, 'status': status },
                })

				.done(function(reseived_data) {

					var parsed_data = $.parseJSON(reseived_data);

					if (parsed_data == '1') {

						if( thisBtn.attr('status') == '0' ){

							thisBtn.attr('status', '1');
							thisBtn.removeClass('icon-x').addClass('icon-check');
							thisBtn.parent().parent().prev().html('غير مفعل');
						}
						else if( thisBtn.attr('status') == '1' ){

							thisBtn.attr('status', '0');
							thisBtn.removeClass('icon-check').addClass('icon-x');
							thisBtn.parent().parent().prev().html('مفعل');
						}
					}
				});
            });
        });
	</script>
@endsection