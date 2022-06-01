@extends('admin.master')

@section('title')
{{ trans('admin.citiesDisplay') }}
@endsection

@section('sectionName')
{{ trans('admin.citiesTitle') }}
@endsection

@section('pageName')
{{ trans('admin.citiesDisplay') }}
@endsection


@section('content')


        <!-- Highlighting rows and columns -->
<div class="panel panel-flat">


    <table class="table table-bordered table-hover datatable-highlight">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ trans('admin.cityName') }}</th>
            <th>{{ trans('admin.edit') }}</th>
            <th>{{ trans('admin.delete') }}</th>
        </tr>
        </thead>
        <tbody>
        @if(count($data) > 0)
            @foreach($data as $value)

                <tr>
                    <td>{{ $value->id }}</td>
                    <td> {{ $value->city }} </td>

                    <td>
                        <a href="{{ route('cities.edit', ['id' => $value->id]) }}"><i class="icon-pencil" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <a class="do-delete" href="{{ route('cities.delete', ['id' => $value->id]) }}"><i class="icon-database-remove"></i>
                        </a>
                    </td>
                </tr>

            @endforeach
        @endif
        </tbody>
    </table>
</div>


@endsection