@extends('admin.master')

@section('title')
    {{ trans('admin.bankAccountShow') }}
@endsection

@section('sectionName')
    {{ trans('admin.bankAccount') }}
@endsection

@section('pageName')
    {{ trans('admin.bankAccountShow') }}
@endsection


@section('content')
<div class="panel panel-flat">
    <table class="table table-bordered table-hover datatable-highlight">
        <thead>
        <tr>
            <th>#</th>
            <th>اسم صاحب الحساب</th>
            <th>اسم البنك</th>
            <th>رقم الحساب</th>
            <th>رقم الأيبان</th>
            <th>{{ trans('admin.edit') }}</th>
            <th>{{ trans('admin.delete') }}</th>
        </tr>
        </thead>
        <tbody>
        @if(count($data) > 0)
            @foreach($data as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->owner_name }}</td>
                    <td>{{ $value->bank_name }}</td>
                    <td>{{ $value->number }}</td>
                    <td>{{ $value->iban }}</td>

                    <td>
                        <a href="{{ route('admin.banks.edit', ['id' => $value->id]) }}"><i class="icon-pencil" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <a class="do-delete" href="{{ route('admin.banks.delete', ['id' => $value->id]) }}"><i class="icon-database-remove"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
@endsection