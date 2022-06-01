@extends('admin.master')

@section('title')
    {{ trans('admin.confirmCommissionPaying') }}
@endsection

@section('sectionName')
    {{ trans('admin.commissionPaying') }}
@endsection

@section('pageName')
    {{ trans('admin.confirmCommissionPaying') }}
@endsection

@section('content')

    <div class="col-md-12">
        <form action="{{ route('commission-postCommissionPaying') }}" method="post">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> {{ trans('admin.confirmCommissionPaying') }} </h5>
                </div>
                
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">
                            <input type="hidden" name="company_id" value="{{ $company_id }}">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label> تأكيد سداد مبلغ قدره </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input readonly type="text" name="payed" value="{{ $payed }} ر.س" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label> من إجمالي </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input readonly type="text" name="base" value="{{ $base }}" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label> المستحق من قبل </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input readonly type="text" name="company_name" value="{{ $company_name }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <div class="text-right">
                        <button type="submit" class="btn btn-success"> تأكيد <i class="icon-check position-right"></i></button>
                        <a href="{{ route('commission-commissionPaying', $company_id) }}" class="btn btn-primary"> رجوع <i class="icon-database-remove position-right"></i></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

