<!DOCTYPE>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="UTF-8">
        <meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=El+Messiri">
        <!-- Fontawesome V5 -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
        <!-- Owl Carousel V5 -->
        <link rel="stylesheet" href="{{ URL::asset('public/web/css/owl.carousel.min.css') }}">

        <link rel="stylesheet" href="{{ URL::asset('public/web/css/select2.css') }}">

        <!-- Bootstrap V4 B2 -->
        <link rel="stylesheet" href="{{ URL::asset('public/web/css/bootstrap.min.css') }}">
        <!-- Bootstrap RTL V4 B2 -->
        <link rel="stylesheet" href="{{ URL::asset('public/web/css/bootstrap-rtl.min.css') }}">
        <!-- Animate -->
        <link rel="stylesheet" href="{{ URL::asset('public/web/css/animate.min.css') }}">
        <!-- My Stylesheet -->
        <link rel="stylesheet" href="{{ URL::asset('public/web/css/style.css') }}">

        <link rel="stylesheet" href="{{ URL::asset('public/web/css/custom-style.css') }}">

        @yield('styles')

        <title>@yield('title')</title>

        {{--<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>--}}
        {{--<script>--}}
            {{--var OneSignal = window.OneSignal || [];--}}
            {{--OneSignal.push(function() {--}}
                {{--OneSignal.init({--}}
                    {{--appId: "62d795c5-764a-48c7-ad8f-d4243c93f23a",--}}
                {{--});--}}
            {{--});--}}
        {{--</script>--}}
        {{----}}
        {{----}}
        {{--<script>--}}
            {{--window.OneSignal.getIds(function(ids) {--}}
                    {{--var device_id = ids.userId;--}}
                    {{----}}
                    {{--console.log(device_id);--}}
                {{--});--}}
                {{----}}
            {{--console.log(device_id);--}}
        {{--</script>--}}



    </head>

    <body class="rtl">

        @include('web.layout.header')

        <main>

            @yield('content')

        </main>

        @include('web.layout.footer')

        <!-- Botton UP -->
        <section id="btn-top">
            <i class="fa fa-angle-up fa-2x py-2 px-3 bg-c5 text-white rounded m-5"></i>
        </section>

        <!-- Loading -->
        <div class="loading align-items-center">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="{{ URL::asset('public/web/js/popper.min.js') }}"></script>
        <script src="{{ URL::asset('public/web/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('public/web/js/wow.min.js') }}"></script>
        <script src="{{ URL::asset('public/web/js/html5shiv.min.js') }}"></script>
        <script src="{{ URL::asset('public/web/js/respond.min.js') }}"></script>
        <script> new WOW({offset: 200}).init(); </script>
        <script src="{{ URL::asset('public/web/js/select2.js') }}"></script>
        <script src="{{ URL::asset('public/web/js/backend.js') }}"></script>

        @yield('scripts')

    </body>

</html>