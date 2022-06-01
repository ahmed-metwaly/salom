@extends('admin.master')

@section('title')
    {{ $type == 'company' ? trans('admin.companyServicesShow') : trans('admin.orderServicesShow') }}
@endsection

@section('sectionName')
    {{ $type == 'company' ? trans('admin.companyServices') : trans('admin.orderServices') }}
@endsection

@section('pageName')
    {{ $type == 'company' ? trans('admin.companyServicesShow') : trans('admin.orderServicesShow') }}
@endsection


@section('content')
    <div class="panel panel-flat">
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                {{--<th>#</th>--}}
                <th> صورة الخدمة</th>
                <th> الخدمة </th>
                <th> السعر</th>
                <th> المدة</th>
                <th> مركز التجميل </th>
                <th>إيقاف من قبل الإدارة</th>
                <th>{{ trans('admin.adminChangeStatus') }}</th>
                <th>{{ trans('admin.show') }}</th>
            </tr>
            </thead>
            <tbody>
            @if(count($data) > 0)
                @foreach($data as $value)
                    <tr>
                        {{--<td>{{ $value->id }}</td>--}}
                        <td> <img class="img-preview img-responsive" src="{{ url('public/uploads/services/' . $value->photo) }}"> </td>
                        <td>
                            <a href="{{ route('service-details', ['id' => $value->id]) }}"> {{ $value->name }} </a>
                        </td>
                        <td>{{ $value->price }} ر.س </td>
                        <td>{{ explodeByColon( minutesToHours( $value->interval))[1] }}</td>
                        <td>
                            <a href="{{ route('center-details', ['id' => $value->company->id]) }}"> {{ $value->company->name }} </a>
                        </td>
                        <td> {{ $value->has_blocked ? 'موقوفة' :  'مفعلة' }} </td>

                        <td>
                            <a class="changeStatus">
                                @if( !$value->has_blocked )
                                    <i class="icon-x" status="1" data="{{ $value->id }}"></i>
                                @else
                                    <i class="icon-check" status="0" data="{{ $value->id }}"></i>
                                @endif
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('service-details', ['id' => $value->id]) }}">
                                <i class="icon-tv"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.changeStatus').on( "click", function( ) {

                var thisBtn = $(this).children();
                var serviceId = $(this).children().attr('data');
                var status = $(this).children().attr('status');
                var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

//                console.log(thisBtn.parent().parent().prev().html());

                $.ajax({
                    url: "{{ url('/') }}" + "/service-change-status" ,
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'serviceId': serviceId, 'status': status },
                })

                .done(function(reseived_data) {

                    var parsed_data = $.parseJSON(reseived_data);

                    if (parsed_data == '1') {

                        if( thisBtn.attr('status') == '0' ){

                            thisBtn.attr('status', '1');
                            thisBtn.removeClass('icon-check').addClass('icon-x');
                            thisBtn.parent().parent().prev().html('مفعلة');
                        }
                        else if( thisBtn.attr('status') == '1' ){

                            thisBtn.attr('status', '0');
                            thisBtn.removeClass('icon-x').addClass('icon-check');
                            thisBtn.parent().parent().prev().html('موقوفة');
                        }
                    }
                });
            });
        });
    </script>
@endsection