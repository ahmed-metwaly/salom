@extends('admin.master')

@section('title')
    شروط التحويل البنكي
@endsection

@section('sectionName')
    الموقع
@endsection

@section('pageName')
    شروط التحويل البنكي
@endsection

@section('content')

    <div class="col-md-12">
        <form action="{{ route('bank-transfer-conditions-post') }}" method="post">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> شروط التحويل البنكي </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">

                            <div class="form-group">
                                {{--<label> شروط التحويل البنكي </label>--}}
                                <textarea rows="5" required cols="5" name="bank_transfer_conditions" class="form-control " placeholder="شروط التحويل البنكي">{{ $data->bank_transfer_conditions }}</textarea>
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
@section('script')
    <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'bank_transfer_conditions' );
    </script>
@endsection('script')