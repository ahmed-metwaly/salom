@extends('admin.master')

@section('title')
    عرض جميع العمليات
@endsection

@section('sectionName')
    العمليات
@endsection

@section('pageName')
    عرض جميع العمليات
@endsection


@section('content')
    <div class="panel panel-flat">
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th>#</th>
                <th>نوع العملية</th>
                <th>المبلغ</th>
                <th>السبب</th>
                <th>اسم المركز</th>
                <th>أضيف بواسطة</th>
                <th>تعديل</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            @if(count($data) > 0)
                @foreach($data as $value)

                    <tr>
                        <td>{{ $value->id }}</td>
                        <td> {{ $value->operation_type == '1' ? 'دفع' : 'تحصيل' }} </td>
                        <td> {{ $value->price }} </td>
                        <td> {{ $value->reason }} </td>
                        <td> <a href="{{ route('center-details', ['id' => $value->company->id]) }}"> {{ $value->company->name }} </a> </td>
                        <td> <a href="{{ route('admin-details', ['id' => $value->user->id]) }}"> {{ $value->user->name }} </a> </td>

                        <td>
                            <a href="{{ route('operations.edit', ['id' => $value->id]) }}"><i class="icon-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a class="do-delete" href="{{ route('operations.delete', ['id' => $value->id]) }}"><i class="icon-database-remove"></i>
                            </a>
                        </td>
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
    </div>


@endsection