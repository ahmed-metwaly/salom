@extends('admin.master')

@section('title')
    تعديل عملية
@endsection

@section('sectionName')
    العمليات
@endsection

@section('pageName')
    تعديل عملية
@endsection

@section('content')

    <div class="col-md-12">
        {!! Form::model($operation, ['method' => 'PATCH', 'url' => route('operations.update', $operation->id)]) !!}

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> بيانات العملية </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">

                            <div class="form-group">
                                <label for="company_id"> اسم المركز </label>
                                <select id="company_id" name="company_id" class="select" required>
                                    <option value="{{ $operation->company_id }}" selected>{{ $operation->company->name }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label> المبلغ </label>
                                <input name="price" value="{{ $operation->price }}" type="number" class="form-control" min="0" max="100000" required>
                            </div>

                            <div class="form-group">
                                <label for="operation_type"> نوع العملية </label>
                                <select id="operation_type" name="operation_type" class="select" required>
                                    <option value="1" {{ $operation->operation_type == '1' ? 'selected' : '' }}>دفع</option>
                                    <option value="2" {{ $operation->operation_type == '2' ? 'selected' : '' }}>تحصيل</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="reason"> السبب </label>
                                <textarea id="reason" rows="7" cols="5" name="reason" class="form-control " required>{{ $operation->reason }}</textarea>
                            </div>

                        </div>
                    </fieldset>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"> {{ trans('admin.save') }} <i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('script')
    <script>

        $(document).ready(function () {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $( "#company_id" ).select2({
                ajax: {
                    url: "{{ url('/') }}" + "/dashboard/promotions/companies/findByName",
                    dataType: 'json',
                    type: 'POST',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            _token: CSRF_TOKEN
                        };
                    },

                    processResults: function (data) {

                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1
            });
        });
    </script>
@endsection
