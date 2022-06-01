@extends('admin.master')

@section('title')
   تعديل الخدمات الراقية
@endsection

@section('sectionName')
    الخدمات والمراكز المميزة
@endsection

@section('pageName')
    تعديل الخدمات الراقية
@endsection

@section('content')

    <div class="col-md-12">
        {{-- {!! Form::model($promotion, ['method' => 'post', 'url' => route('promotions.services.update',$promotion->id),'class' => 'form-horizontal']) !!} --}}
        <form action="{{ route('promotions.services.update',[$promotion->id] ) }}" method="post"> 
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> تعديل خدمات راقية في الصفحة الرئيسية للموقع </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">

                            <div class="form-group">
                                <label for="promotionService"> اسم الخدمة </label>
                                    <select id="promotionServices"  name="promotionable_id" class="form-control" >
                                    <option value="{{ $promotion->promotionable->id }}">{{ $promotion->promotionable->name }}</option>
                                                                                   
                                    </select>
                            </div>

                            <div class="form-group">
                                <label for="promotionService"> مكان الخدمة  </label>
                                <select data-placeholder="--  --" name="priority" class="select">
                                    <option value="1" > فى الاعلى  </option>
                                    <option value="2"  > فى المنتصف </option>
                                    <option value="3"  > فى الاسفل  </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="promotionService">  يبدا من  </label>
                                <input type="date" class="form-control" value="{{ $promotion->start_at }}"  name="start_at" required/>
                            </div>
                            <div class="form-group">
                                <label for="promotionService">  ينتهى فى   </label>
                                <input type="date" class="form-control" value="{{ $promotion->end_at }}"  name="end_at" required/>
                            </div>
                        </div>    
                    </fieldset>

                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"> {{ trans('admin.save') }} <i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        {{-- {!! Form::close() !!} --}}
         </form>

    </div>

@endsection

@section('script')
    <script>

        $(document).ready(function () {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $( "#promotionServices" ).select2({
                ajax: {
                    url: "{{ url('/') }}" + "/dashboard/promotions/service/findByName",
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