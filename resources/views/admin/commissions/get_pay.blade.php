@extends('admin.master')

@section('title')
    {{ trans('admin.companyCommissionPaying') }}
@endsection

@section('sectionName')
    {{ trans('admin.commissionPaying') }}
@endsection

@section('pageName')
    {{ trans('admin.companyCommissionPaying') }}
@endsection

@section('content')

    <div class="col-md-12">
        <form action="{{ route('commission-confirmCommissionPaying', ['company_id' => $company_id]) }}" method="get">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> {{ trans('admin.companyCommissionPaying') }} </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">
                            <div class="form-group">
                                <label> إجمالي المبلغ المستحق </label>
                                <input readonly type="text" name="base" value="{{ $commission }} ر.س" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> المبلغ المسدد </label>
                                <input type="number" name="payed" value="{{ old('payed') }}" class="form-control" placeholder="المبلغ المسدد" step="0.5" min="0" max="100000">
                            </div>
                        </div>
                    </fieldset>
                    {{--<input type="hidden" name="_token" value="{{ Session::token() }}">--}}
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"> {{ trans('admin.save') }} <i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

