@extends('admin.master')

@section('title')
    {{ trans('admin.owedBalances') }}
@endsection

@section('sectionName')
    {{ trans('admin.sideCommission') }}
@endsection

@section('pageName')
    {{ trans('admin.owedBalances') }}
@endsection


@section('content')
    <div class="panel panel-flat">
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th> # </th>
                <th> المركز </th>
                <th> إجمالي المال المستحق </th>
                <th> عدد الحجوزات المستحقة </th>
                <th>عدد الشهور المستحقة </th>
                <th>عرض تفاصيل الحجوزات </th>
                <th> تسديد المال المستحق </th>
            </tr>
            </thead>
            <tbody>
                @if(count($new_obj) > 0)
                    @for($i = 0; $i < count($new_obj); $i++ )
                        <tr>
                            <td> {{ $i+1 }} </td>
                            <td><a href="{{ route('center-details', ['id' => $new_obj[$i]['company_id']]) }}"> {{ $new_obj[$i]['company'] }} </a></td>
                            <td> {{ $new_obj[$i]['owed_commission'] }} ر.س </td>
                            <td>( {{ count( explodeByComma($new_obj[$i]['orders']) ) }} )  حجز</td>
                            <td>( {{ count( explodeByComma($new_obj[$i]['owed_months']) ) }} )  شهر</td>

                            <td>

                                @if( ($new_obj[$i]['orders']) )
                                    <a href="{{ route('owed-balances-show', ['ids' => $new_obj[$i]['orders']]) }}">
                                        <i class="icon-tv"></i>
                                    </a>
                                @endif
                            </td>

                            <td>
                                <a class="commission_pay" company_id="{{ $new_obj[$i]['company_id'] }}" >
                                    <i class="icon-credit-card"></i>
                                </a>
                            </td>
                        </tr>
                    @endfor
                @endif

                @if(count($payed_obj) > 0)
                    @for($i = 0; $i < count($payed_obj); $i++ )
                        <tr>
                            <td> {{ $i+1 }} </td>
                            <td><a href="{{ route('center-details', ['id' => $payed_obj[$i]['company_id']]) }}"> {{ $payed_obj[$i]['company'] }} </a></td>
                            <td> {{ $payed_obj[$i]['owed_commission'] }} ر.س </td>
                            <td>( {{ count( $payed_obj[$i]['orders'] ) }} )  حجز</td>
                            <td>( {{ $payed_obj[$i]['owed_months'] }} )  شهر</td>


                            <td>
                                @if( arrayToStr($payed_obj[$i]['orders']) != '' )
                                    <a href="{{ route('owed-balances-show', [ 'ids' => arrayToStr($payed_obj[$i]['orders']) ]) }}">
                                        <i class="icon-tv"></i>
                                    </a>
                                @endif
                            </td>

                            <td>
                                <a class="commission_pay" company_id="{{ $payed_obj[$i]['company_id'] }}">
                                    <i class="icon-credit-card"></i>
                                </a>
                            </td>
                        </tr>
                    @endfor
                @endif
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('body').on('click', '.commission_pay', function() {

                var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');
                var commission = $(this).parent().prev().prev().prev().prev().text();
                var company_id = $(this).attr('company_id');

                $.ajax({
                    url: "{{ url('/') }}" + "/dashboard/commission/session-save-payment" ,
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'commission' : commission},
                })
                .done(function(reseived_data) {

                    var parsed_data = $.parseJSON(reseived_data);
                    var newURL = parsed_data.url + '/' + company_id;

                    window.location.href = newURL;
                });
            });
        });
    </script>
@endsection