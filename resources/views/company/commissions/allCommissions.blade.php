@extends('company.layouts.master')

@section('title')
    فاتورة المبلغ المستحق للموقع
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/datatables.bootstrap-rtl.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/sweetalert.css') }}">
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('companyDashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('services.index') }}">المبلغ المستحق للموقع </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>فاتورة المبلغ المستحق </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title">
         عرض الفاتورة
    </h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body">
                    
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b><i class="icon-pencil before_word"></i>&nbsp;
                                    فاتورة
                                    </b>
                                    <hr>
                                </h4>
                                <p>
                                    <button id="printPage" class="btn btn-success btn-lg">
                                        <span class="glyphicon glyphicon-print"></span> طباعة
                                    </button>
                                </p>          
                                <div class="row voice-border p-2 d-flex align-items-center">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-lg-6 col-xs-9 col-12 text-center">
                                                <img class="mb-2" src="img/Untitled-1.png" alt="">
                                                <div class="logo p-1">
                                                    <div class="p-3">
                                                        <p class="m-0 h3">تفاصيل الفاتورة   </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </br></br>
                                    <div class="row voice-border p-3 mt-5">
                                    <div class="col-xs-5">
                                        <p> اجمالى المبلغ المستحق  :   {{ $commission }} ر.س</p>
                                    </div>
                                    
                                    <div class="col-xs-5">
                                        <p> المبلغ المدفوع : {{ $data->payed }} ر.س</p>
                                    </div>
                                    
                                    <div class="col-xs-5">
                                        <p> المبلغ المتبقى : {{   ($data->base) - ($data->payed) }} ر.س</p>
                                    </div>
                                    <div class="col-xs-5">
                                        <p> من اصل   : {{ $data->base }} ر.س</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ URL::asset('public/company/js/datatable.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/datatables.bootstrap.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/table-datatables-managed.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/ui-sweetalert.min.js') }}"></script>
 <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKhmEeCCFWkzxpDjA7QKjDu4zdLLoqYVw&callback=initMap">
    </script>

    <script type="text/javascript" src="{{asset('panel/assets/plugins/isotope/js/isotope.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('panel/assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>

    <script type="text/javascript">
        $(window).load(function(){
            var $container = $('.portfolioContainer');
            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            $('.portfolioFilter a').click(function(){
                $('.portfolioFilter .current').removeClass('current');
                $(this).addClass('current');

                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            });
        });
        $(document).ready(function() {
            $('#printPage').click(function(){
                window.print();
            });
            $('.image-popup').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                }
            });
        });
@endsection