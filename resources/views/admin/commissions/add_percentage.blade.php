@extends('admin.master')

@section('title')
    {{ trans('admin.commissionPercentage') }}
@endsection

@section('sectionName')
    {{ trans('admin.sideCommission') }}
@endsection

@section('pageName')
    {{ trans('admin.commissionPercentage') }}
@endsection

@section('content')

    <div class="col-md-12">
        <form action="{{ route('post-commission-percentage') }}" method="post">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> تحديد نسبة عمولة الموقع لكل حجز يتم لأي مركز </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">

                            <div class="form-group">
                                <label> النسبة المئوية للعمولة </label>
                                <input name="commission" value="{{ $commission ? $commission : " " }}" type="number" class="form-control" placeholder="النسبة المئوية للعمولة" step="5" min="0" max="100">
                            </div>

                        </div>
                    </fieldset>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"> {{ trans('admin.save') }} <i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
