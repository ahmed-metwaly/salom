@extends('admin.master')

@section('title')
	@if(Request::url() == route('users'))
		{{ trans('admin.sideUsersShow') }}
	@else
		{{ trans('admin.sideAdminsShow') }}
	@endif

@endsection

@section('sectionName')
	{{ trans('admin.sideAdminsTitle') }}
@endsection

@section('pageName')
	@if(Request::url() == route('users'))
		{{ trans('admin.sideUsersShow') }}
	@else
		{{ trans('admin.sideAdminsShow') }}
	@endif
@endsection

@section('content')
	<div class="panel panel-flat">
		<table class="table table-bordered table-hover datatable-highlight">
			<thead>
			<tr>
				<th>#</th>
				<th>{{ trans('admin.adminsADName') }}</th>
				<th> {{ Request::url() == route('users') ? 'تسجيل بواسطة' : 'الرقم التعريفي' }} </th>
				<th>{{ trans('admin.adminsADPhone') }}</th>
				<th>{{ trans('admin.adminsADEmail') }}</th>
				@if( $type == 'admin' )
					<th>{{ trans('admin.adminsADLevel') }}</th>
				@endif
				<th>{{ trans('admin.adminsADDate') }}</th>
				<th>{{ trans('admin.adminsADStatus') }}</th>
				<th>{{ trans('admin.adminChangeStatus') }}</th>
				{{--				<th>{{ trans('admin.show') }}</th>--}}
				<th>{{ trans('admin.edit') }}</th>
				<th>{{ trans('admin.delete') }}</th>
			</tr>
			</thead>
			<tbody>

			@foreach($data as $value)
				<tr>
					<td> {{ $value->id }} </td>
					<td><a href="{{ route('admin-details', ['id' => $value->id]) }}">{{ $value->name }}</a></td>
					<td>
						@if(Request::url() == route('users'))
							@if($value->invited_by)
								<a href="{{ route(getUserById($value->invited_by)->user_type == '2' ? 'center-details' : 'admin-details', ['id' => $value->invited_by]) }}">
									{{ getUserById($value->invited_by)->name }}
								</a>
							@else
								-------
							@endif
						@else
							{{ $value->id_number }}
						@endif
					</td>
					<td> {{ $value->phone }} </td>
					<td> {{ $value->email }} </td>
					@if( $type == 'admin' )
						<td> {{ $value->group->name }} </td>
					@endif
					<td style="direction: ltr; text-align: right;"> {{ $value->created_at->format('Y-m-d g:i A') }} </td>
					<td> {{ $value->status ? trans('admin.settingsOpen') :  trans('admin.settingsClose') }} </td>
					<td>
						@if( auth()->user()->id != $value->id )
							<a class="changeStatus">
								@if( $value->status )
									<i class="icon-x" status="0" data="{{ $value->id }}"></i>
								@else
									<i class="icon-check" status="1" data="{{ $value->id }}"></i>
								@endif
							</a>
						@endif
					</td>

					{{--<td>--}}
					{{--<a href="{{ route('admin-details', ['id' => $value->id]) }}">--}}
					{{--<i class="icon-tv"></i>--}}
					{{--</a>--}}
					{{--</td>--}}
					<td>
						<a href="{{ route('admin-edit', ['id' => $value->id]) }}">
							<i class="icon-pencil"></i>
						</a>
					</td>
					<td>
						<a class="do-delete" href="{{ auth()->user()->id == $value->id ?  '#' : route('admin-delete', ['id' => $value->id]) }}">
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

//                console.log(thisBtn.parent().parent().prev());

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
