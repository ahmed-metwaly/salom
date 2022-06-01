@extends('admin.master')

@section('title')
    {{ trans('admin.sideCenterEdit') }}
@endsection

@section('sectionName')
    {{ trans('admin.sideCentersTitle') }}
@endsection

@section('pageName')
    {{ trans('admin.sideCenterEdit') }}
@endsection

@section('content')

    <div class="col-md-12">
        <form action="{{ route('do-active-center', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> {{ trans('admin.centerDet') }} </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">
                            <div class="form-group">
                                <label> {{ trans('admin.sideAdminsName') }} </label>
                                <input type="text" readonly name="name" value="{{ $data->name }}"  class="form-control" placeholder=" {{ trans('admin.sideAdminsName') }} ">
                            </div>

                            <div class="form-group">
                                <label> {{ trans('admin.adminsADEmail') }} </label>
                                <input type="email" readonly name="email" value="{{ $data->email }}" class="form-control" placeholder=" {{ trans('admin.adminsADEmail') }} ">
                            </div>

                            <div class="form-group">
                                <label> {{ trans('admin.adminsADPhone') }} </label>
                                <input type="text" readonly name="phone" value="{{ $data->phone }}"  class="form-control" placeholder=" {{ trans('admin.adminsADPhone') }} ">
                            </div>

                            <div class="form-group">
                                <label> {{ trans('admin.adminsADLocationText') }} </label>
                                <input type="text" readonly name="location_text" value="{{ $data->location_text }}" class="form-control" placeholder=" {{ trans('admin.adminsADLocationText') }} ">
                            </div>

                            <div class="form-group">
                                <label>{{ trans('admin.adminsADPhoto') }}</label>
                                <input type="file" readonly name="photo" class="form-control">
                            </div>

                            <div class="form-group">
                                <img class="img-preview img-responsive" src="{{ url('public/uploads/users/' . $data->photo) }}">
                            </div>

                            <div class="form-group">
                                <label> حالة التفعيل </label>
                                <select data-placeholder="-- {{ trans('admin.SettingsSelect') }} --" name="admin_is_conf" class="select">
                                    <option value="1" {{ $data->admin_is_conf == 1 ? 'selected' : '' }} > {{ trans('admin.settingsOpen') }} </option>
                                    <option value="0" {{ $data->admin_is_conf == 0 ? 'selected' : '' }} > {{ trans('admin.settingsClose') }} </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> مدة التفعيل (شهر) </label>
                                <select data-placeholder="-- {{ trans('admin.activeDuration') }} --" name="duration" class="select">
                                    <option value="1" {{ $data->duration == 1 ? 'selected' : '' }} > 1 </option>
                                    <option value="2" {{ $data->duration == 2 ? 'selected' : '' }} > 2 </option>
                                    <option value="3" {{ $data->duration == 3 ? 'selected' : '' }} > 3 </option>
                                    <option value="4" {{ $data->duration == 4 ? 'selected' : '' }} > 4 </option>
                                    <option value="5" {{ $data->duration == 5 ? 'selected' : '' }} > 5 </option>
                                    <option value="6" {{ $data->duration == 6 ? 'selected' : '' }} > 6 </option>
                                    <option value="7" {{ $data->duration == 7 ? 'selected' : '' }} > 7 </option>
                                    <option value="8" {{ $data->duration == 8 ? 'selected' : '' }} > 8 </option>
                                    <option value="9" {{ $data->duration == 9 ? 'selected' : '' }} > 9 </option>
                                    <option value="10" {{ $data->duration == 10 ? 'selected' : '' }} > 10 </option>
                                    <option value="11" {{ $data->duration == 11 ? 'selected' : '' }} > 11 </option>
                                    <option value="12" {{ $data->duration == 12 ? 'selected' : '' }} > 12 </option>
                                    <option value="13" {{ $data->duration == 13 ? 'selected' : '' }} > 13 </option>
                                    <option value="14" {{ $data->duration == 14 ? 'selected' : '' }} > 14 </option>
                                    <option value="15" {{ $data->duration == 15 ? 'selected' : '' }} > 15 </option>
                                    <option value="16" {{ $data->duration == 16 ? 'selected' : '' }} > 16 </option>
                                    <option value="17" {{ $data->duration == 17 ? 'selected' : '' }} > 17 </option>
                                    <option value="18" {{ $data->duration == 18 ? 'selected' : '' }} > 18 </option>
                                    <option value="19" {{ $data->duration == 19 ? 'selected' : '' }} > 19 </option>
                                    <option value="20" {{ $data->duration == 20 ? 'selected' : '' }} > 20 </option>
                                    <option value="21" {{ $data->duration == 21 ? 'selected' : '' }} > 21 </option>
                                    <option value="22" {{ $data->duration == 22 ? 'selected' : '' }} > 22 </option>
                                    <option value="23" {{ $data->duration == 23 ? 'selected' : '' }} > 23 </option>
                                    <option value="24" {{ $data->duration == 24 ? 'selected' : '' }} > 24 </option>

                                </select>
                            </div>

                        </div>
                    </fieldset>

                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"> {{ trans('admin.save') }} <i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

