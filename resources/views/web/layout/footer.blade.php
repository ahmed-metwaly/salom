<footer class="bg-1c">
    <section class="container">

        <!-- Subscribe -->
        <section class="row subscribe wow slideInRight">
            <div class="col-md-4 col-sm-12 text-center">
                <div class="sub position-relative bg-c5">
                    <h1 class="text-white px-5 ">
                        النشرة البريدية
                    </h1>
                    <i class="fa fa-envelope fa-3x position-absolute d-none"></i>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 pt-4">
                <form class="row pt-3 mt-1">
                    <div class="form-group col-9">
                        <input type="email" class="form-control form-control-lg rounded-0 font-14" placeholder="اكتبى بريدك الإلكترونى" required>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn border-0 bg-c5 text-white font-18 font-weight-bold py-0 w-100 rounded-0 btn-hover">ارسل</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Info & Links -->
        <section class="row mt-5">
            <div class="col-md-4 col-sm-12 pl-0 mb-md-0 mb-4 wow wow zoomIn" data-wow-delay=".4s">
                <h2 class="color-c5 mb-4">{{ settings()['name'] }}</h2>
                <p class="text-white text-justify pl-5 pt-3 line-2">
                    <?php 
                    
                    $da = \App\Condition::where('id', 1)->select('footer_who_are')->first();
                    
                    
                    echo $da->footer_who_are;
                    
                    ?>
                </p>
            </div>
            <div class="col-md-4 col-sm-12 pr-md-4 pr-2 mb-md-0 mb-4 border-right wow zoomIn" data-wow-delay=".5s">
                <h2 class="color-c5 mb-4 mr-2">روابط اخرى</h2>
                <ul class="list-unstyled mb-0 pr-0 mr-2">
                    <li class="py-2">
                        <a class="text-white text-hover" href="{{ route('site-conditions') }}">
                            <i class="fa fa-angle-left ml-1"></i> الشروط والأحكام
                        </a>
                    </li>
                    <li class="py-2">
                        <a class="text-white text-hover" href="{{ route('bank-transfer-conditions') }}">
                            <i class="fa fa-angle-left ml-1"></i> شروط التحويل البنكي
                        </a>
                    </li>
                    <li class="py-2">
                        <a class="text-white text-hover" href="{{ route('orders-conditions') }}">
                            <i class="fa fa-angle-left ml-1"></i>   سياسة الحجز
                        </a>
                    </li>
                    <li class="py-2">
                        <a class="text-white text-hover" href="{{ route('after-selling-conditions') }}">
                            <i class="fa fa-angle-left ml-1"></i>  سياسة ما بعد البيع
                        </a>
                    </li>
                    <!--<li class="py-2">-->
                    <!--    <a class="text-white text-hover" href="{-- route('delivery-conditions') --}}">-->
                    <!--        <i class="fa fa-angle-left ml-1"></i> سياسة الشحن-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li class="py-2">
                        <a class="text-white text-hover" href="{{ route('payment-methods-conditions') }}">
                            <i class="fa fa-angle-left ml-1"></i>طرق الدفع
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-12 mb-md-0 mb-4 border-right border-right-sm-0 wow zoomIn" data-wow-delay=".6s">
                <h2 class="color-c5 mb-4">تواصل معنا</h2>
                <ul class="list-unstyled mb-0 pr-0">
                    <li class="py-3">
                        <a class="text-white text-hover">
                            <i class="fa fa-map-marker-alt color-c5 ml-3"></i>
                            {{ settings()['address'] }}
                        </a>
                    </li>
                    <li class="py-3">
                        <a class="text-white text-hover" href="del:{{ settings()['phone'] }}">
                            <i class="fa fa-phone color-c5 ml-3"></i>
                            {{  settings()['phone'] }}
                        </a>
                    </li>
                    <li class="py-3">
                        <a class="text-white text-hover" href="mailto:{{ settings()['email'] }}">
                            <i class="fa fa-envelope color-c5 ml-3"></i>
                            {{ settings()['email'] }}
                        </a>
                    </li>
                    <li class="py-3">
                        <ul class="social list-unstyled mb-0 pr-0 text-md-right text-center">
                            <li class="list-inline-item ml-2">
                                <a href="{{ settings()['pinterest'] ? settings()['pinterest'] : '#' }}" class="fab fa-pinterest-p fa-lg text-dark trans"></a>
                            </li>
                            <li class="list-inline-item ml-2">
                                <a href="{{ settings()['youtube'] ? settings()['youtube'] : '#' }}" class="fab fa-youtube fa-lg text-dark trans"></a>
                            </li>
                            <li class="list-inline-item ml-2">
                                <a href="{{ settings()['google_plus'] ? settings()['google_plus'] : '#' }}" class="fab fa-google fa-lg text-dark trans"></a>
                            </li>
                            <li class="list-inline-item ml-2">
                                <a href="{{ settings()['instagram'] ? settings()['instagram'] : '#' }}" class="fab fa-instagram fa-lg text-dark trans"></a>
                            </li>
                            <li class="list-inline-item ml-2">
                                <a href="{{ settings()['snapchat'] ? settings()['snapchat'] : '#' }}" class="fab fa-snapchat-ghost fa-lg text-dark trans"></a>
                            </li>
                            <li class="list-inline-item ml-2">
                                <a href="{{ settings()['twitter'] ? settings()['twitter'] : '#' }}" class="fab fa-twitter fa-lg text-dark trans"></a>
                            </li>
                            <li class="list-inline-item ml-2">
                                <a href="{{ settings()['facebook'] ? settings()['facebook'] : '#' }}" class="fab fa-facebook-f fa-lg text-dark trans"></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Copyright -->
        <section class="row mt-4 pb-3 text-center wow zoomIn" data-wow-delay=".6s" data-wow-offset="0">
            <div class="col-md-6 col-sm-12">
                <p class="text-white text-md-right">جميع الحقوق محفوظة - موقع {{ settings()['name'] }} 2018</p>
            </div>
            {{--<div class="col-md-6 col-sm-12 text-md-left wow zoomIn" data-wow-delay=".6s" data-wow-offset="0">--}}
                {{--<a href="#" class="text-white text-hover">تصميم وتطوير وسائل الشبكة</a>--}}
            {{--</div>--}}
        </section>
    </section>
</footer>