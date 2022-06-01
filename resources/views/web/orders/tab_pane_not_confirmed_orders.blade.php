<div class="last">
    <div class="row">
        @foreach($approveOrders as $order)
            <div class="col-12 mb-4 mt-2 wow fadeInUp" data-wow-duration="1s">
                <div class="card mb-3 border rounded-0">
                    <div class="row color-777 p-4">
                        <div class="col-lg-4">
                            <img class="card-img-top img-fluid rounded-0" src="{{ url('public/uploads/users/'. $order->company->photo) }}" alt="{{ $order->company->name }}">
                        </div>
                        <div class="col-lg-8">
                            <div class="card-block">

                                <a class="btn btn-sm rounded-0 bg-c5 text-white btn-hover rounded mb-3 mt-md-0 mt-3" href="{{ route('web.orders.invoice', Hashids::encode($order->id)) }}">عرض الفاتورة</a>

                                <h2 class="card-title h4 mb-4 mt-lg-0 mt-2">
                                    <i class="fa fa-home font-18 text-white bg-c5 text-center rounded ml-3"></i>
                                    {{ $order->company->name }}
                                </h2>
                                <span class="font-weight-bold d-md-inline-block d-block ml-4">
                                    <i class="fa fa-clock text-white font-18 bg-c5 text-center rounded ml-3"></i>
                                    {{ date('H:i:s', strtotime($order->date)) != '00:00:00' ? getFormattedTime($order->date) : '------' }}
                                </span>
                                <span class="font-weight-bold d-md-inline-block d-block ml-4">
                                    <i class="fa fa-calendar-alt text-white font-18 bg-c5 text-center rounded mt-lg-0 mt-4 ml-3"></i>
                                    {{ getFormattedDate($order->date) }}
                                </span>
                                <span class="font-weight-bold d-md-inline-block d-block">
                                    <i class="fa fa-users text-white font-18 bg-c5 text-center rounded mt-lg-0 mt-4 ml-3"></i>
                                    عددالافراد : {{ $order->individual_count }} أفراد
                                </span>
                                <p class="card-text font-weight-bold mt-4">
                                    <i class="fa fa-cog text-white font-18 bg-c5 text-center rounded ml-3"></i>
                                    الخدمة المحجوزة (
                                    <a class="color-c5" href="{{ route('web.services.show', Hashids::encode($order->service->id)) }}"><span> {{ $order->service->name }} </span></a>
                                    )
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-0 px-0 pb-lg-0 pt-3 mt-md-0 mt-3">
                                <p class="font-14 text-white font-weight-bold bg-c5 py-2 text-center btn-reserv bg-1d rounded-0" style="float: left">
                                    {{ $order->total_price }} ر.س
                                </p>

                                <div class='rating-stars text-center'>
                                    <ul id="stars" class='stars' service="{{ $order->service->id }}" user-rating="{{ userServiceRating(Auth::user()->id, $order->service->id ) }}">

                                        <li class='star' title='سيء' data-value='1'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='متوسط' data-value='2'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='جيد' data-value='3'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='جيد جدا' data-value='4'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='ممتاز' data-value='5'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>