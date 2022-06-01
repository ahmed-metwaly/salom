@extends('admin.master')

@section('title')
    {!! trans($data->is_admin == 0 ? 'admin.sideUserDetails' : 'admin.sideAdminsDetails') . ' ' . $data->name  !!}
@endsection

@section('sectionName')
    {{ trans('admin.sideAdminsTitle') }}
@endsection

@section('pageName')
    {!!  trans($data->is_admin == 0 ? 'admin.sideUserDetails' : 'admin.sideAdminsDetails')  . ' : <span class="text-success">' . $data->name . '</span>' !!}
@endsection

@section('content')
    <div class="col-md-12">
        <form action="#" method="post">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> {{ trans($data->is_admin == 0 ? 'admin.userDet' : 'admin.adminEditAdminTitle') }} </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="form-group">
                            <img class="img-header img-preview img-thumbnail pull-left" src="{{ starts_with($data->photo, 'http') ? $data->photo : url("/public/uploads/users/". $data->photo) }}">
                        </div>
                        <div class="clear-fix" style="display: block; clear: both;"></div>
                        <br>
                        <br>

                        <div class="collapse in" id="demo1">
                            <div class="form-group">
                                <label> {{ trans('admin.sideAdminsName') }} </label>
                                <input readonly type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder=" {{ trans('admin.sideAdminsName') }} ">
                            </div>

                            <div class="form-group">
                                <label> {{ trans('admin.adminsADEmail') }} </label>
                                <input readonly type="email" name="email" value="{{ $data->email }}" class="form-control" placeholder=" {{ trans('admin.adminsADEmail') }} ">
                            </div>

                            <div class="form-group">
                                <label> {{ trans('admin.adminsADPhone') }} </label>
                                <input readonly type="text" name="phone" value="{{ $data->phone }}" class="form-control" placeholder=" {{ trans('admin.adminsADPhone') }} ">
                            </div>

                            @if( $data->is_admin == 1 )
                                <div class="form-group">
                                    <label> {{ trans('admin.adminsADLevel') }} </label>
                                    <input type="text" class="form-control" readonly
                                           value="<?php
                                               if ($data->group_id != '') {
                                                   echo $data->group->name;
                                               } else {
                                                   echo trans('admin.levelRemoved');
                                               }
                                           ?>">
                                </div>
                            @endif

                            <div class="form-group">
                                <label> {{ trans('admin.adminsADDate') }} </label>
                                <input type="text" class="form-control" readonly value="{{ $data->created_at->format('Y-m-d g:i A') }}">
                            </div>

                            <div class="form-group">
                                <label> {{ trans('admin.adminsADStatus') }} </label>
                                <input type="text" class="form-control" readonly value="{{  $data->status == 1 ?  trans('admin.settingsOpen') : trans('admin.settingsClose')  }}">
                            </div>

                        </div>
                    </fieldset>

                    <div class="text-right">

                    </div>
                </div>
            </div>
        </form>
        <!-- /a legend -->

    </div>


@endsection