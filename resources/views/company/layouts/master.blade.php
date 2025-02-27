<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--<meta content="width=device-width, initial-scale=1" name="viewport" />--}}
    {{--<meta content="Preview page of Metronic Admin RTL Theme #1 for fixed footer option" name="description" />--}}
    {{--<meta content="" name="author" />--}}

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{--<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />--}}
    <link href='https://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'/>

    <link rel="stylesheet" href="{{ URL::asset('public/company/css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/simple-line-icons/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/bootstrap-switch-rtl.min.css') }}">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/components-rounded-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/plugins-rtl.min.css') }}">
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN THEME LAYOUT STYLES -->
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/layout-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/darkblue-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/custom-rtl.min.css') }}">
    <!-- END THEME LAYOUT STYLES -->

    <link rel="stylesheet" href="{{ URL::asset('public/company/css/login-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/custom.css') }}">

    @yield('styles')

    {!! Charts::assets() !!}

    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-footer-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        <!-- BEGIN HEADER -->

        @include('company.layouts.header')

        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->

            @include('company.layouts.sidebar')

            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">

                    @yield('page_header')

                    @include('company.layouts.alerts')

                    @yield('content')

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

            <!-- BEGIN QUICK SIDEBAR -->
            {{--<a href="javascript:;" class="page-quick-sidebar-toggler">--}}
                {{--<i class="icon-login"></i>--}}
            {{--</a>--}}
            {{--<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">--}}
                {{--<div class="page-quick-sidebar">--}}
                    {{--<ul class="nav nav-tabs">--}}
                        {{--<li class="active">--}}
                            {{--<a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users--}}
                                {{--<span class="badge badge-danger">2</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts--}}
                                {{--<span class="badge badge-success">7</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More--}}
                                {{--<i class="fa fa-angle-down"></i>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu pull-right">--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">--}}
                                        {{--<i class="icon-bell"></i> Alerts </a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">--}}
                                        {{--<i class="icon-info"></i> Notifications </a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">--}}
                                        {{--<i class="icon-speech"></i> Activities </a>--}}
                                {{--</li>--}}
                                {{--<li class="divider"></li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">--}}
                                        {{--<i class="icon-settings"></i> Settings </a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<div class="tab-content">--}}
                        {{--<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">--}}
                            {{--<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">--}}
                                {{--<h3 class="list-heading">Staff</h3>--}}
                                {{--<ul class="media-list list-items">--}}
                                    {{--<li class="media">--}}
                                        {{--<div class="media-status">--}}
                                            {{--<span class="badge badge-success">8</span>--}}
                                        {{--</div>--}}
                                        {{--<img class="media-object" src="{{ URL::asset('public/company/img/avatar3.jpg') }}" alt="...">--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h4 class="media-heading">Bob Nilson</h4>--}}
                                            {{--<div class="media-heading-sub"> Project Manager </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li class="media">--}}
                                        {{--<img class="media-object" src="{{ URL::asset('public/company/img/avatar1.jpg') }}" alt="...">--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h4 class="media-heading">Nick Larson</h4>--}}
                                            {{--<div class="media-heading-sub"> Art Director </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li class="media">--}}
                                        {{--<div class="media-status">--}}
                                            {{--<span class="badge badge-danger">3</span>--}}
                                        {{--</div>--}}
                                        {{--<img class="media-object" src="{{ URL::asset('public/company/img/avatar4.jpg') }}" alt="...">--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h4 class="media-heading">Deon Hubert</h4>--}}
                                            {{--<div class="media-heading-sub"> CTO </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li class="media">--}}
                                        {{--<img class="media-object" src="{{ URL::asset('public/company/img/avatar2.jpg') }}" alt="...">--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h4 class="media-heading">Ella Wong</h4>--}}
                                            {{--<div class="media-heading-sub"> CEO </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                                {{--<h3 class="list-heading">Customers</h3>--}}
                                {{--<ul class="media-list list-items">--}}
                                    {{--<li class="media">--}}
                                        {{--<div class="media-status">--}}
                                            {{--<span class="badge badge-warning">2</span>--}}
                                        {{--</div>--}}
                                        {{--<img class="media-object" src="{{ URL::asset('public/company/img/avatar6.jpg') }}" alt="...">--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h4 class="media-heading">Lara Kunis</h4>--}}
                                            {{--<div class="media-heading-sub"> CEO, Loop Inc </div>--}}
                                            {{--<div class="media-heading-small"> Last seen 03:10 AM </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li class="media">--}}
                                        {{--<div class="media-status">--}}
                                            {{--<span class="label label-sm label-success">new</span>--}}
                                        {{--</div>--}}
                                        {{--<img class="media-object" src="{{ URL::asset('public/company/img/avatar7.jpg') }}" alt="...">--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h4 class="media-heading">Ernie Kyllonen</h4>--}}
                                            {{--<div class="media-heading-sub"> Project Manager,--}}
                                                {{--<br> SmartBizz PTL </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li class="media">--}}
                                        {{--<img class="media-object" src=".{{ URL::asset('public/company/img/avatar8.jpg') }}" alt="...">--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h4 class="media-heading">Lisa Stone</h4>--}}
                                            {{--<div class="media-heading-sub"> CTO, Keort Inc </div>--}}
                                            {{--<div class="media-heading-small"> Last seen 13:10 PM </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li class="media">--}}
                                        {{--<div class="media-status">--}}
                                            {{--<span class="badge badge-success">7</span>--}}
                                        {{--</div>--}}
                                        {{--<img class="media-object" src="{{ URL::asset('public/company/img/avatar9.jpg') }}" alt="...">--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h4 class="media-heading">Deon Portalatin</h4>--}}
                                            {{--<div class="media-heading-sub"> CFO, H&D LTD </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li class="media">--}}
                                        {{--<img class="media-object" src="{{ URL::asset('public/company/img/avatar10.jpg') }}" alt="...">--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h4 class="media-heading">Irina Savikova</h4>--}}
                                            {{--<div class="media-heading-sub"> CEO, Tizda Motors Inc </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li class="media">--}}
                                        {{--<div class="media-status">--}}
                                            {{--<span class="badge badge-danger">4</span>--}}
                                        {{--</div>--}}
                                        {{--<img class="media-object" src="{{ URL::asset('public/company/img/avatar11.jpg') }}" alt="...">--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h4 class="media-heading">Maria Gomez</h4>--}}
                                            {{--<div class="media-heading-sub"> Manager, Infomatic Inc </div>--}}
                                            {{--<div class="media-heading-small"> Last seen 03:10 AM </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div class="page-quick-sidebar-item">--}}
                                {{--<div class="page-quick-sidebar-chat-user">--}}
                                    {{--<div class="page-quick-sidebar-nav">--}}
                                        {{--<a href="javascript:;" class="page-quick-sidebar-back-to-list">--}}
                                            {{--<i class="icon-arrow-left"></i>Back</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="page-quick-sidebar-chat-user-messages">--}}
                                        {{--<div class="post out">--}}
                                            {{--<img class="avatar" alt="" src="{{ URL::asset('public/company/img/avatar3.jpg') }}" />--}}
                                            {{--<div class="message">--}}
                                                {{--<span class="arrow"></span>--}}
                                                {{--<a href="javascript:;" class="name">Bob Nilson</a>--}}
                                                {{--<span class="datetime">20:15</span>--}}
                                                {{--<span class="body"> When could you send me the report ? </span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="post in">--}}
                                            {{--<img class="avatar" alt="" src="{{ URL::asset('public/company/img/avatar2.jpg') }}" />--}}
                                            {{--<div class="message">--}}
                                                {{--<span class="arrow"></span>--}}
                                                {{--<a href="javascript:;" class="name">Ella Wong</a>--}}
                                                {{--<span class="datetime">20:15</span>--}}
                                                {{--<span class="body"> Its almost done. I will be sending it shortly </span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="post out">--}}
                                            {{--<img class="avatar" alt="" src="{{ URL::asset('public/company/img/avatar3.jpg') }}" />--}}
                                            {{--<div class="message">--}}
                                                {{--<span class="arrow"></span>--}}
                                                {{--<a href="javascript:;" class="name">Bob Nilson</a>--}}
                                                {{--<span class="datetime">20:15</span>--}}
                                                {{--<span class="body"> Alright. Thanks! :) </span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="post in">--}}
                                            {{--<img class="avatar" alt="" src="{{ URL::asset('public/company/img/avatar2.jpg') }}" />--}}
                                            {{--<div class="message">--}}
                                                {{--<span class="arrow"></span>--}}
                                                {{--<a href="javascript:;" class="name">Ella Wong</a>--}}
                                                {{--<span class="datetime">20:16</span>--}}
                                                {{--<span class="body"> You are most welcome. Sorry for the delay. </span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="post out">--}}
                                            {{--<img class="avatar" alt="" src="{{ URL::asset('public/company/img/avatar3.jpg') }}" />--}}
                                            {{--<div class="message">--}}
                                                {{--<span class="arrow"></span>--}}
                                                {{--<a href="javascript:;" class="name">Bob Nilson</a>--}}
                                                {{--<span class="datetime">20:17</span>--}}
                                                {{--<span class="body"> No probs. Just take your time :) </span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="post in">--}}
                                            {{--<img class="avatar" alt="" src="{{ URL::asset('public/company/img/avatar2.jpg') }}" />--}}
                                            {{--<div class="message">--}}
                                                {{--<span class="arrow"></span>--}}
                                                {{--<a href="javascript:;" class="name">Ella Wong</a>--}}
                                                {{--<span class="datetime">20:40</span>--}}
                                                {{--<span class="body"> Alright. I just emailed it to you. </span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="post out">--}}
                                            {{--<img class="avatar" alt="" src="{{ URL::asset('public/company/img/avatar3.jpg') }}" />--}}
                                            {{--<div class="message">--}}
                                                {{--<span class="arrow"></span>--}}
                                                {{--<a href="javascript:;" class="name">Bob Nilson</a>--}}
                                                {{--<span class="datetime">20:17</span>--}}
                                                {{--<span class="body"> Great! Thanks. Will check it right away. </span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="post in">--}}
                                            {{--<img class="avatar" alt="" src="{{ URL::asset('public/company/img/avatar2.jpg') }}" />--}}
                                            {{--<div class="message">--}}
                                                {{--<span class="arrow"></span>--}}
                                                {{--<a href="javascript:;" class="name">Ella Wong</a>--}}
                                                {{--<span class="datetime">20:40</span>--}}
                                                {{--<span class="body"> Please let me know if you have any comment. </span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="post out">--}}
                                            {{--<img class="avatar" alt="" src="{{ URL::asset('public/company/img/avatar3.jpg') }}" />--}}
                                            {{--<div class="message">--}}
                                                {{--<span class="arrow"></span>--}}
                                                {{--<a href="javascript:;" class="name">Bob Nilson</a>--}}
                                                {{--<span class="datetime">20:17</span>--}}
                                                {{--<span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="page-quick-sidebar-chat-user-form">--}}
                                        {{--<div class="input-group">--}}
                                            {{--<input type="text" class="form-control" placeholder="Type a message here...">--}}
                                            {{--<div class="input-group-btn">--}}
                                                {{--<button type="button" class="btn green">--}}
                                                    {{--<i class="icon-paper-clip"></i>--}}
                                                {{--</button>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">--}}
                            {{--<div class="page-quick-sidebar-alerts-list">--}}
                                {{--<h3 class="list-heading">General</h3>--}}
                                {{--<ul class="feeds list-items">--}}
                                    {{--<li>--}}
                                        {{--<div class="col1">--}}
                                            {{--<div class="cont">--}}
                                                {{--<div class="cont-col1">--}}
                                                    {{--<div class="label label-sm label-info">--}}
                                                        {{--<i class="fa fa-check"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="cont-col2">--}}
                                                    {{--<div class="desc"> You have 4 pending tasks.--}}
                                                        {{--<span class="label label-sm label-warning "> Take action--}}
                                                                    {{--<i class="fa fa-share"></i>--}}
                                                                {{--</span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col2">--}}
                                            {{--<div class="date"> Just now </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<div class="col1">--}}
                                                {{--<div class="cont">--}}
                                                    {{--<div class="cont-col1">--}}
                                                        {{--<div class="label label-sm label-success">--}}
                                                            {{--<i class="fa fa-bar-chart-o"></i>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="cont-col2">--}}
                                                        {{--<div class="desc"> Finance Report for year 2013 has been released. </div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col2">--}}
                                                {{--<div class="date"> 20 mins </div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="col1">--}}
                                            {{--<div class="cont">--}}
                                                {{--<div class="cont-col1">--}}
                                                    {{--<div class="label label-sm label-danger">--}}
                                                        {{--<i class="fa fa-user"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="cont-col2">--}}
                                                    {{--<div class="desc"> You have 5 pending membership that requires a quick review. </div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col2">--}}
                                            {{--<div class="date"> 24 mins </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="col1">--}}
                                            {{--<div class="cont">--}}
                                                {{--<div class="cont-col1">--}}
                                                    {{--<div class="label label-sm label-info">--}}
                                                        {{--<i class="fa fa-shopping-cart"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="cont-col2">--}}
                                                    {{--<div class="desc"> New order received with--}}
                                                        {{--<span class="label label-sm label-success"> Reference Number: DR23923 </span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col2">--}}
                                            {{--<div class="date"> 30 mins </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="col1">--}}
                                            {{--<div class="cont">--}}
                                                {{--<div class="cont-col1">--}}
                                                    {{--<div class="label label-sm label-success">--}}
                                                        {{--<i class="fa fa-user"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="cont-col2">--}}
                                                    {{--<div class="desc"> You have 5 pending membership that requires a quick review. </div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col2">--}}
                                            {{--<div class="date"> 24 mins </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="col1">--}}
                                            {{--<div class="cont">--}}
                                                {{--<div class="cont-col1">--}}
                                                    {{--<div class="label label-sm label-info">--}}
                                                        {{--<i class="fa fa-bell-o"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="cont-col2">--}}
                                                    {{--<div class="desc"> Web server hardware needs to be upgraded.--}}
                                                        {{--<span class="label label-sm label-warning"> Overdue </span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col2">--}}
                                            {{--<div class="date"> 2 hours </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<div class="col1">--}}
                                                {{--<div class="cont">--}}
                                                    {{--<div class="cont-col1">--}}
                                                        {{--<div class="label label-sm label-default">--}}
                                                            {{--<i class="fa fa-briefcase"></i>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="cont-col2">--}}
                                                        {{--<div class="desc"> IPO Report for year 2013 has been released. </div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col2">--}}
                                                {{--<div class="date"> 20 mins </div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                                {{--<h3 class="list-heading">System</h3>--}}
                                {{--<ul class="feeds list-items">--}}
                                    {{--<li>--}}
                                        {{--<div class="col1">--}}
                                            {{--<div class="cont">--}}
                                                {{--<div class="cont-col1">--}}
                                                    {{--<div class="label label-sm label-info">--}}
                                                        {{--<i class="fa fa-check"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="cont-col2">--}}
                                                    {{--<div class="desc"> You have 4 pending tasks.--}}
                                                        {{--<span class="label label-sm label-warning "> Take action--}}
                                                                    {{--<i class="fa fa-share"></i>--}}
                                                                {{--</span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col2">--}}
                                            {{--<div class="date"> Just now </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<div class="col1">--}}
                                                {{--<div class="cont">--}}
                                                    {{--<div class="cont-col1">--}}
                                                        {{--<div class="label label-sm label-danger">--}}
                                                            {{--<i class="fa fa-bar-chart-o"></i>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="cont-col2">--}}
                                                        {{--<div class="desc"> Finance Report for year 2013 has been released. </div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col2">--}}
                                                {{--<div class="date"> 20 mins </div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="col1">--}}
                                            {{--<div class="cont">--}}
                                                {{--<div class="cont-col1">--}}
                                                    {{--<div class="label label-sm label-default">--}}
                                                        {{--<i class="fa fa-user"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="cont-col2">--}}
                                                    {{--<div class="desc"> You have 5 pending membership that requires a quick review. </div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col2">--}}
                                            {{--<div class="date"> 24 mins </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="col1">--}}
                                            {{--<div class="cont">--}}
                                                {{--<div class="cont-col1">--}}
                                                    {{--<div class="label label-sm label-info">--}}
                                                        {{--<i class="fa fa-shopping-cart"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="cont-col2">--}}
                                                    {{--<div class="desc"> New order received with--}}
                                                        {{--<span class="label label-sm label-success"> Reference Number: DR23923 </span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col2">--}}
                                            {{--<div class="date"> 30 mins </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="col1">--}}
                                            {{--<div class="cont">--}}
                                                {{--<div class="cont-col1">--}}
                                                    {{--<div class="label label-sm label-success">--}}
                                                        {{--<i class="fa fa-user"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="cont-col2">--}}
                                                    {{--<div class="desc"> You have 5 pending membership that requires a quick review. </div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col2">--}}
                                            {{--<div class="date"> 24 mins </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="col1">--}}
                                            {{--<div class="cont">--}}
                                                {{--<div class="cont-col1">--}}
                                                    {{--<div class="label label-sm label-warning">--}}
                                                        {{--<i class="fa fa-bell-o"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="cont-col2">--}}
                                                    {{--<div class="desc"> Web server hardware needs to be upgraded.--}}
                                                        {{--<span class="label label-sm label-default "> Overdue </span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col2">--}}
                                            {{--<div class="date"> 2 hours </div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<div class="col1">--}}
                                                {{--<div class="cont">--}}
                                                    {{--<div class="cont-col1">--}}
                                                        {{--<div class="label label-sm label-info">--}}
                                                            {{--<i class="fa fa-briefcase"></i>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="cont-col2">--}}
                                                        {{--<div class="desc"> IPO Report for year 2013 has been released. </div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col2">--}}
                                                {{--<div class="date"> 20 mins </div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">--}}
                            {{--<div class="page-quick-sidebar-settings-list">--}}
                                {{--<h3 class="list-heading">General Settings</h3>--}}
                                {{--<ul class="list-items borderless">--}}
                                    {{--<li> Enable Notifications--}}
                                        {{--<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
                                    {{--<li> Allow Tracking--}}
                                        {{--<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
                                    {{--<li> Log Errors--}}
                                        {{--<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
                                    {{--<li> Auto Sumbit Issues--}}
                                        {{--<input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
                                    {{--<li> Enable SMS Alerts--}}
                                        {{--<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
                                {{--</ul>--}}
                                {{--<h3 class="list-heading">System Settings</h3>--}}
                                {{--<ul class="list-items borderless">--}}
                                    {{--<li> Security Level--}}
                                        {{--<select class="form-control input-inline input-sm input-small">--}}
                                            {{--<option value="1">Normal</option>--}}
                                            {{--<option value="2" selected>Medium</option>--}}
                                            {{--<option value="e">High</option>--}}
                                        {{--</select>--}}
                                    {{--</li>--}}
                                    {{--<li> Failed Email Attempts--}}
                                        {{--<input class="form-control input-inline input-sm input-small" value="5" /> </li>--}}
                                    {{--<li> Secondary SMTP Port--}}
                                        {{--<input class="form-control input-inline input-sm input-small" value="3560" /> </li>--}}
                                    {{--<li> Notify On System Error--}}
                                        {{--<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
                                    {{--<li> Notify On SMTP Error--}}
                                        {{--<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
                                {{--</ul>--}}
                                {{--<div class="inner-content">--}}
                                    {{--<button class="btn btn-success">--}}
                                        {{--<i class="icon-settings"></i> Save Changes</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <!-- END QUICK SIDEBAR -->

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> {{ date('Y') }} &copy; تطوير بواسطة
                <a target="_blank" href="https://www.ws4it.com">وسائل الشبكة لتقنية المعلومات</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
    </div>
    <!-- BEGIN QUICK NAV -->
    {{--<nav class="quick-nav">--}}
        {{--<a class="quick-nav-trigger" href="#0">--}}
            {{--<span aria-hidden="true"></span>--}}
        {{--</a>--}}
        {{--<ul>--}}
            {{--<li>--}}
                {{--<a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank" class="active">--}}
                    {{--<span>Purchase Metronic</span>--}}
                    {{--<i class="icon-basket"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/reviews/4021469?ref=keenthemes" target="_blank">--}}
                    {{--<span>Customer Reviews</span>--}}
                    {{--<i class="icon-users"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="http://keenthemes.com/showcast/" target="_blank">--}}
                    {{--<span>Showcase</span>--}}
                    {{--<i class="icon-user"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="http://keenthemes.com/metronic-theme/changelog/" target="_blank">--}}
                    {{--<span>Changelog</span>--}}
                    {{--<i class="icon-graph"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
        {{--<span aria-hidden="true" class="quick-nav-bg"></span>--}}
    {{--</nav>--}}
    {{--<div class="quick-nav-overlay"></div>--}}
    <!-- END QUICK NAV -->

    <!--[if lt IE 9]>
    <script src="{{ URL::asset('public/company/js/respond.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/excanvas.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/ie8.fix.min.js') }}"></script>
    <![endif]-->

    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ URL::asset('public/company/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/js.cookie.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/jquery.blockui.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/bootstrap-switch.min.js') }}"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ URL::asset('public/company/js/app.min.js') }}"></script>
    <!-- END THEME GLOBAL SCRIPTS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ URL::asset('public/company/js/layout.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/demo.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/quick-sidebar.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/quick-nav.min.js') }}"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
    <script>
        $(document).ready(function()
        {
            $('#clickmewow').click(function()
            {
                $('#radio1003').attr('checked', 'checked');
            });
        })
    </script>

    @yield('scripts')

</body>

</html>