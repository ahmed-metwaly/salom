<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/bootstrap-switch.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/colors.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/extras/animate.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/dropzone.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>

    <style>
        li, a, p, article, h1, h2, h3, h4, h5, h6, button, input, table, td, section, li a, label, span, textarea, div, th, span {
            font-family: 'DroidArabicKufiRegular' !important;
            font-weight: normal !important;
            font-style: normal !important;
        }

    </style>

    @yield('style')

    {!! Charts::assets() !!}

    <script type="text/javascript" src="{{ url('public/js/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/plugins/loaders/blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/plugins/uploaders/fileinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/pages/animations_css3.js')}}"></script>
    <script type="text/javascript" src="{{ url('public/js/plugins/notifications/bootbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/pages/form_layouts.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/pages/uploader_bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/pages/datatables_advanced.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/pages/components_modals.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/bootstrap-switch.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/main.js') }}"></script>


</head>

<body class="navbar-top">

<!-- Main navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            {{-- صالون --}}
        </a>
        <span style="margin-top: 15px;display: inline-block;">
            {{ 'App\Settings'::siteName()[0] }}
        </span>
        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>
    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
            </li>
        </ul>
        {{--<p class="navbar-text"><span class="label bg-success-400">متواجد الان</span></p>--}}
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <div class="media">
                        <img src="{{ url('public/images/businessman.png') }}" class="img-circle img-sm" alt="">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a href="{{ route('admin-edit',[ 'id' => Auth()->user()->id ]) }}"><i class="icon-user-plus"></i>
                            الصفحة الشخصية
                        </a>
                    </li>
                    {{--<li>--}}
                    {{--<a href="{{ route('admin-messages') }}">--}}
                    {{--<span class="badge bg-teal-400 pull-right">3</span>--}}
                    {{--<i class="icon-comment-discussion"></i> الرسائل--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}"><i class="icon-switch2"></i> تسجيل الخروج</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

    @include('admin.template.sidebar')


    <!-- start content -->
        <div class="content-wrapper">

            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4>
                            <i class="icon-arrow-right6 position-left"></i>
                            <span class="text-semibold">
								@yield('sectionName')
							</span> -
                            @yield('pageName')
                        </h4>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}"><i class="icon-home2 position-left"></i> {{ trans('admin.home') }} </a></li>
                        <li class="active">
                            @yield('pageName')
                        </li>
                    </ul>
                </div>
            </div>


            <div class="content">
                <div class="row ">
                    <div class="alertM">
                        @include('admin.template.alert')
                    </div>
                    @yield('content')
                </div>
            </div>
            <!-- Footer -->
            <div class="footer text-center center-block position-relative">
                <a target="_blank" href="https://www.ws4it.com">تطوير بواسطة </a> &copy; <a href="https://www.ws4it.com" target="_blank"> وسائل الشبكة
                    <small> لتقنية المعلومات </small>
                </a>
            </div>
            <!-- /footer -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->
<script type="text/javascript">
    $(document).ready(function () {

        // $("input[name='accept']").bootstrapSwitch();
        $("input[name='accept']").on('change', function (e) {
            e.preventDefault();
            var accept = $('.acceptForm').serialize();
            alert(accept);
            //request using ajax
            $.ajax({
                url: "{{-- route('bank-accept') --}}",
                type: 'POST',
                dataType: 'json',
                data: {accept: accept, _token: _token},
                success: function (data) {

                    alert(data);
                }
            });
        });


    });

</script>

<!-- Danger modal -->
<div id="modal_Delete_User" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">تحذير</h4>
            </div>

            <div class="modal-body text-center">
                <h5 class="text-semibold">هل انت متأكد من اتمام هذه العمليه ؟</h5>
                <h2 class="text-semibold">سيتم حذف كامل البيانات !</h2>
            </div>
            <div class="modal-footer">
                <form action="#" method="get" id="DeleteFrm">
                    {{ csrf_field() }}
                    <button type="button" class="btn btn-link" data-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /default modal -->

@yield('script')


</body>
</html>
