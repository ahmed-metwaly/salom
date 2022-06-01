{!! Form::open([ 'url' => route('web.orders.store', Hashids::encode($service->id)), 'id' => 'not_home_order' ]) !!}

    <input type="hidden" name="company_id" value="">
    <input type="hidden" name="company_name" value="">
    <input type="hidden" name="user_id" value="">
    <input type="hidden" name="individual_count" value="">
    <input type="hidden" name="date" value="">
    <input type="hidden" name="time" value="">
    <input type="hidden" name="total_price" value="">
    <input type="hidden" name="is_home" value="0">

{!! Form::close() !!}


{{--<div class="modal modal-default fade" id="confirm-modal">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -14px 0-15px -15px;">--}}
                    {{--<span aria-hidden="true">×</span></button>--}}
                {{--<h4 class="modal-title">تأكيد حجز خدمة</h4>--}}
            {{--</div>--}}

            {{--{!! Form::open([ 'url' => route('web.orders.store', Hashids::encode($service->id)) ]) !!}--}}

                {{--<input type="hidden" name="company_id" value="">--}}
                {{--<input type="hidden" name="user_id" value="">--}}
                {{--<input type="hidden" name="individual_count" value="">--}}
                {{--<input type="hidden" name="date" value="">--}}
                {{--<input type="hidden" name="total_price" value="">--}}
                {{--<input type="hidden" name="is_home" value="0">--}}

                {{--<div class="modal-body">--}}
                    {{--<p>تأكيد الحجز لدى "--}}
                        {{--<span class="companyName danger-color"></span>--}}
                        {{--" بقيمة "--}}
                        {{--<span class="orderPrice danger-color"></span>--}}
                        {{--" لعدد "--}}
                        {{--<span class="individualCount danger-color"></span>--}}
                        {{--" أفراد بإجمالي مبلغ "--}}
                        {{--<span class="totalPrice danger-color"></span>--}}
                        {{--" بتاريخ "--}}
                        {{--<span class="orderDate danger-color"></span>--}}
                        {{--" ؟؟؟--}}
                    {{--</p>--}}
                {{--</div>--}}

                {{--<div class="modal-footer">--}}
                    {{--<div class="col-lg-5 col-lg-offset-3">--}}
                        {{--<button type="submit" class="btn bg-c5 font-18 text-white btn-hove">تأكيد ودفع المقدم</button>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-2 col-lg-offset-1">--}}
                        {{--<button type="button" class="btn font-18 btn-main" data-dismiss="modal">إلغاء</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--{!! Form::close() !!}--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
