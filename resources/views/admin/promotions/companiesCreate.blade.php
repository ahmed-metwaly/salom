@extends('admin.master')

@section('title')
    اضافة أفضل مراكز التجميل
@endsection

@section('sectionName')
    الخدمات والمراكز المميزة
@endsection

@section('pageName')
    اضافة أفضل مراكز التجميل
@endsection

@section('content')

    <div class="col-md-12">
        <form action="{{ route('promotions.companies.store') }}" method="post">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> اختيار أفضل مراكز التجميل في الصفحة الرئيسية للموقع </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">
                            <div class="form-group">
                                <label for="promotionCompanies"> اسم المركز </label>
                                <select id="promotionCompanies" data-placeholder="-- يرجى كتابة اسم المركز --" name="promotionable_id" class="select" >
                                        @foreach($users as $s )
                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach                                             
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="promotionService"> مكان الخدمة  </label>
                                <select data-placeholder="-- اختر مكان المركز  --" name="priority" class="select">
                                    <option value="1"  > على اليمين  </option>
                                    <option value="2"  > فى المنتصف </option>
                                    <option value="3"  > على اليسار  </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="promotionService">  يبدا من  </label>
                                <input type="date" class="form-control"  name="start_at" required/>
                            </div>
                            <div class="form-group">
                                <label for="promotionService">  ينتهى فى   </label>
                                <input type="date" class="form-control"  name="end_at" required/>
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
    <script>

        $(document).ready(function () {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $( "#promotionCompanies" ).select2({
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