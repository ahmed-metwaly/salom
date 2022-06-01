@extends('admin.master')

@section('title')
    {{ trans('admin.ordersSettings') }}
@endsection

@section('sectionName')
    {{ trans('admin.sideSettingsTitle') }}
@endsection

@section('pageName')
    {{ trans('admin.ordersSettings') }}
@endsection

@section('content')

    <div class="col-md-12">
        <form action="{{ route('settings.order_settings.update') }}" method="post">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> تحديد إعدادات الحجوزات في الموقع </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">

                            <div class="form-group">
                                <label> النسبة المئوية لعمولة الموقع على كل حجز </label>
                                <input name="commission" value="{{ $data->commission ? $data->commission : " " }}" type="number" class="form-control" step="5" min="0" max="100">
                            </div>

                            <div class="form-group">
                                <label> فترة السماح للحجز "بالأيام" قبل تحديده كحجز معلق </label>
                                <input name="order_deadline" value="{{ $data->order_deadline ? $data->order_deadline : " " }}" type="number" class="form-control" placeholder="7" step="1" min="1" max="30">
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
