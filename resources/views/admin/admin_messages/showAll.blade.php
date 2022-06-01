@extends('admin.master')

@section('title')
    {{ trans('admin.adminMessageShow') }}
@endsection

@section('sectionName')
    {{ trans('admin.adminMessages') }}
@endsection

@section('pageName')
    {{ trans('admin.adminMessageShow') }}
@endsection

@section('content')

<div class="panel panel-flat">
    <table class="table table-bordered table-hover datatable-highlight">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ trans('admin.userName') }}</th>
            <th>{{ trans('admin.adminsADEmail') }}</th>
            <th>{{ trans('admin.titleMessage') }}</th>
            <th>{{ trans('admin.dateMessage') }}</th>
            <th>{{ trans('admin.show') }}</th>
{{--            <th>{{ trans('admin.replay') }}</th>--}}
            <th>{{ trans('admin.delete') }}</th>
        </tr>
        </thead>
        <tbody>
        @if(count($data) > 0)
            @foreach($data as $value)
                <tr>
                    <td> {{ $value->id }} </td>
                    @if( $value->user )
                        <td>
                            <a href="{{ route($value->user->user_type == 2 ? 'center-details' : 'admin-details', ['id' => $value->user->id]) }}">
                                {{ $value->user->name }}
                            </a>
                        </td>
                    @else
                        <td> {{ $value->name }} </td>
                    @endif
                    <td> {{ $value->email ? $value->email : '------' }} </td>
                    <td> {{ $value->subject }} </td>
                    <td style="direction: rtl; text-align: right;"> {{ $value->created_at->format('Y-m-d g:i A') }}</td>

                    <td>
                        <a href="{{ route('admin-message-details', ['id' => $value->id]) }}">
                            <i class="icon-tv" aria-hidden="true"></i>
                        </a>
                    </td>
                    {{--<td>--}}
                        {{--<a href="mailto:{{ $value->user->email }}">--}}
                            {{--<i class="icon-reply" aria-hidden="true"></i>--}}
                        {{--</a>--}}
                    {{--</td>--}}
                    <td>
                        <a class="do-delete" href="{{ route('admin-message-delete', ['id' => $value->id]) }}">
                            <i class="icon-database-remove"></i>
                        </a>
                    </td>
                </tr>

            @endforeach
        @endif
        </tbody>
    </table>
</div>


@endsection