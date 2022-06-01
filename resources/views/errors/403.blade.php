<!DOCTYPE html>
<html>
<head>
    <title>403 FORBIDDEN</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
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

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato', sans-serif;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">403 FORBIDDEN</div>
        <div class="text-right">
            <a href="{{ route('home') }}" class="btn btn-primary"> عودة للرئيسية <i class="icon-arrow-left13 position-right"></i></a>
        </div>
    </div>
</div>
</body>
</html>
