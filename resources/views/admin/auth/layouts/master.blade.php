<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('top_header')
    <title>@yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('public/css/colors.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ url('public/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ url('public/js/core/app.js') }}"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Page container -->
<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">


                @yield('content')




            </div>
<!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
