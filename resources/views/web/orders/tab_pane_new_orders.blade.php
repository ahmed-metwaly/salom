<div class="row">
    @foreach($newOrders as $order)
        <div class="col-12 mb-4 mt-2 wow fadeInUp" data-wow-duration="2s">
            <div class="card mb-3 border rounded-0">
                <div class="row color-777 p-4">
                    <div class="col-lg-4">
                        <img class="card-img-top img-fluid rounded-0" src="{{ url('public/uploads/users/'. $order->company->photo) }}" alt="{{ $order->company->name }}">
                    </div>
                    <div class="col-lg-8">
                        <div class="card-block">
                            <h2 class="card-title h4 mb-4 mt-lg-0 mt-4">
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
                        <div class="card-footer bg-transparent border-0 mt-md-5 mt-4 px-0 pb-lg-0 pt-3">
                            <p class="font-14 text-white font-weight-bold bg-c5 py-2 text-center btn-reserv bg-1d rounded-0" >
                                {{ $order->total_price }} ر.س
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>