<div class="modal modal-default fade" id="map-confirm-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -14px 0-15px -15px;">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">حدد موقعك لطلب خدمة منزلية</h4>
            </div>

            {!! Form::open([ 'url' => route('web.orders.store', Hashids::encode($service->id)) ]) !!}

                <input type="hidden" name="company_id" value="">
                <input type="hidden" name="company_name" value="">
                <input type="hidden" name="user_id" value="">
                <input type="hidden" name="individual_count" value="">
                <input type="hidden" name="date" value="">
                <input type="hidden" name="time" value="">
                <input type="hidden" name="total_price" value="">
                <input type="hidden" name="is_home" value="1">

                <div class="modal-body">

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

                    <div class="row">
                        <div class="col-md-6">
                            {{--<label for="map_lat" class="mb-10">دائرة العرض</label>--}}
                            <input id="map_lat" name="lat" value="" type="hidden" />
                        </div>

                        <div class="col-md-6">
                            {{--<label for="map_long" class="mb-10">خط الطول</label>--}}
                            <input id="map_long" name="long" value="" type="hidden" />
                        </div>

                        <div class="col-md-12" style="margin-top: 20px;">
                            <!--map_div_here-->
                            <div class="mb-30" id="div_map" style="width: 100%;height:400px;"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="col-lg-3 col-lg-offset-3">
                        <button type="submit" class="btn bg-c5 font-18 text-white btn-hove">تأكيدالحجز</button>
                    </div>
                    <div class="col-lg-2 col-lg-offset-1">
                        <button type="button" class="btn font-18 btn-main" data-dismiss="modal">إلغاء</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
