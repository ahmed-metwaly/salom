@extends('admin.master')

@section('title')
    {{ trans('admin.levelsAdd') }}
@endsection

@section('sectionName')
    {{ trans('admin.levelTitle') }}
@endsection

@section('pageName')
    {{ trans('admin.levelsAdd') }}
@endsection

@section('style')

    <style>

        .holder {
            margin: 0 0 0.75em 0;
            display: table;
            float: right;
            margin-left: 60px;

        }

        .holder input[type="radio"] {
            display: none;
        }

        .holder input[type="radio"] + label {
            color: #808080;
            font: 14px droid;
        }

        .holder input[type="radio"] + label span {
            display: inline-block;
            width: 19px;
            height: 19px;
            padding: 3px;
            margin: -1px 4px 0 0;
            vertical-align: middle;
            cursor: pointer;
            -moz-border-radius: 50%;
            border-radius: 50%;
            margin-left: 7px;
        }

        .holder input[type="radio"] + label span {
            background-color: #fff;
            border: 3px solid #00acc1;
        }

        .holder input[type="radio"]:checked + label span {
            background-color: #00acc1;
        }

        .holder input[type="radio"] + label span,
        .holder input[type="radio"]:checked + label span {
            -webkit-transition: background-color 0.4s linear;
            -o-transition: background-color 0.4s linear;
            -moz-transition: background-color 0.4s linear;
            transition: background-color 0.4s linear;
        }
        .asd{
            border-bottom: 1px dashed #ddd;
            margin-bottom: 20px;
        }

    </style>

@endsection

@section('content')

    <div class="col-md-12">

        <!-- Advanced legend -->
        <form action="{{ route('level-do-add') }}" method="post" enctype="multipart/form-data">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> {{ trans('admin.adminNewLevelTitle') }} </h5>
                </div>


                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">
                            <div class="form-group">
                                <label> {{ trans('admin.levelName') }} </label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                       placeholder=" {{ trans('admin.levelName') }} ">
                            </div>
                            <div class="col-md-2"></div>

                            <div class="col-md-8">

                            @foreach($data as $items )

                                <h3 class="block">{{ $items['title'] }}</h3>

                                <?php
//                                $i = rand(555,5);
//                                $x = rand(999,5);

                                    $arrCount = count($items['route']);
                                ?>

                                @foreach($items['route'] as $route => $title)

                                    <div class="col-md-{{  12 / $arrCount  }} asd">

                                        <div class="form-group">

                                            <label class="">  {!! $title !!} </label>
                                            <input type="checkbox" name="items[{{ $route }}]">

                                            {{--<div class="holder">--}}
                                                {{--<input type="radio" id="radio{{$i + $x}}" name="items[{{$route}}]"/>--}}
                                                {{--<label for="radio{{$i + $x}}"><span></span> {{ trans('admin.settingsOpen') }} </label>--}}
                                            {{--</div>--}}

                                            {{--<div class="holder">--}}
                                                {{--<input type="radio" id="radio{{$x * $i}}" name="items[{{$route}}]"/>--}}
                                                {{--<label for="radio{{$x * $i}}"><span></span> {{ trans('admin.settingsClose') }} </label>--}}
                                            {{--</div>--}}

                                        </div>
                                    </div>

                                    <?php

//                                        $i += $x + 5;
//                                        $x += $i * 2;

                                    ?>

                                @endforeach



                            @endforeach
                                </div>

                        </div>
                    </fieldset>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"> {{ trans('admin.save') }} <i
                                    class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /a legend -->

    </div>


@endsection



