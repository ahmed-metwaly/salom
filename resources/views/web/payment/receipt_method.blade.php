@extends('web.layout.master')

@section('title')
   الدفع عند المشغل
@endsection

@section('content')
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h2 color-c5 font-weight-bold "> الدفع عند المشغل</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h4 color-c5 font-weight-bold" href="{{ route('home') }}">الرئيسية / </a>
                        <a class="h4 color-c5 font-weight-bold" href="{{ route('payment.method') }}">طرق الدفع / </a>
                        <span class="h4 color-c5 font-weight-bold"> دفع عند المشغل</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="payment mb-5">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown">
                <h2 class="color-c5"> الدفع عند المشغل</h2>
                <img class="img-fluid" src="{{ URL::asset('public/web/img/line.png') }}" alt="">
            </div>
            <div class="row">
                {!! Form::open([ 'url' => route('payment.method.storeReceipt', 'receipt'), 'class' => 'bg-f6 p-5', 'files' => 'true' ]) !!}
                    <div class="row">
                        <div class="row" style="margin-bottom: 30">
                            <div class="col-md-12 border bg-f6 font-14 font-weight-bold rounded pt-5 pb-4">
                                <p class="color-777 font-18 line-2">تأكيد الحجز لدى "
                                    <span class="danger-color"> {{ $companyName }} </span>
                                    " لعدد "
                                    <span class="danger-color"> {{ $individualCount }} </span>
                                    " أفراد بتاريخ "
                                    <span class="danger-color"> {{ $onlyDate }} </span>
            
                                    @if( $onlyTime )
                                    " الساعة "
                                    <span class="danger-color"> {{ $onlyTime }} </span>
                                    @endif
                                        
                                    "  بإجمالي مبلغ "
                                    <span class="danger-color"> {{ $totalPrice }} ر.س </span>
                                     " ؟
                                        <!-- " ودفع مقدم "
                                        <span class="danger-color"> <?php  // echo $commissionPrice ?>  ر.س </span>
                                        " ؟؟؟ -->
                                
                                </p>
                                </p>
                            </div>
                        </div>
                        <input type="hidden" name="price" value="{{ $totalPrice }}">
                        <input type="hidden" name="order_id" value="1">
                        <div class="col mt-4 wow zoomIn" data-wow-delay=".8s">
                            <button  type="submit" class="btn bg-c5 font-18 py-2 px-5 text-white btn-hover">تاكيد عملية الدفع </button>
                        </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!--<section class="img position-relative bg-cover">-->
    <!--    <div class="overlay position-absolute">-->
    <!--    </div>-->
    <!--</section>-->
@endsection

@section('scripts')

    <script>
        $(document).ready(function () {

            $('#payment').prop('disabled', true);


            $('#checkbox').change(function(){

                if($(this).is(':checked'))
                    $('#payment').prop('disabled', false);

                else
                    $('#payment').prop('disabled', true);

            });
        });
    </script>

@endsection
