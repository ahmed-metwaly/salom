@extends('company.layouts.master')

@section('title')
    {{ trans('admin.servicesAdd') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/company/css/bootstrap-fileinput.css') }}">
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('companyDashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('services.index') }}">{{ trans('admin.servicesIndex') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ trans('admin.servicesAdd') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.servicesIndex') }}
        <small>إضافة خدمة جديدة</small>
    </h1>
@endsection

@section('content')
    {!! Form::open([ 'url' => route('services.store'), 'class' => 'form-horizontal', 'files' => 'true' ]) !!}

        <div class="row">
            <div class="col-lg-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> البيانات الرئيسية</span>
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <div class="form-body">

                            <div class="form-group ">
                                <label class="control-label col-lg-3">الصورة</label>
                                <div class="col-lg-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 330px; height: 150px;"> </div>
                                        <div>
                                                <span class="btn red btn-outline btn-file">
                                                    <span class="fileinput-new"> اختر صورة </span>
                                                    <span class="fileinput-exists"> تغيير </span>
                                                    <input type="file" name="photo" accept="image/*">
                                                </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-lg-3 control-label">اسم الخدمة</label>
                                <div class="col-lg-9">
                                    <input id="name" name="name" type="text" class="form-control" placeholder="اسم الخدمة">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="interval" class="col-lg-3 control-label">مدة الخدمة</label>
                                <div class="col-lg-9">
                                    <input id="interval" name="interval" type="number" class="form-control" placeholder="المدة بالدقيقة" step="5" min="5" max="500">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price" class="col-lg-3 control-label">سعر الخدمة</label>
                                <div class="col-lg-9">
                                    <input id="price" name="price" type="number" class="form-control" placeholder="سعر الخدمة" step="0.50" min="0.50" max="100000">
                                </div>
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<label for="orders_count_per_day" class="col-lg-3 control-label">أقصى عدد حجوزات في اليوم</label>--}}
                                {{--<div class="col-lg-9">--}}
                                    {{--<input id="orders_count_per_day" name="orders_count_per_day" type="number" class="form-control" placeholder="أقصى عدد حجوزات في اليوم" step="1" min="1" max="50">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <label for="description" class="col-lg-3 control-label">وصف الخدمة</label>
                                <div class="col-lg-9">
                                    <textarea id="description" name="description" class="form-control autosizeme" rows="4" placeholder="وصف الخدمة .."></textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                {{--<div class="row">--}}
                    {{--<div class="portlet light bordered">--}}
                        {{--<div class="portlet-title">--}}
                            {{--<div class="caption font-green-sharp">--}}
                                {{--<i class="icon-settings font-green-sharp"></i>--}}
                                {{--<span class="caption-subject bold uppercase"> أيام الخدمة لهذا الاسبوع</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="portlet-body form">--}}

                            {{--<div class="form-body">--}}
                                {{--<div class="form-group form-md-checkboxes margin-bottom-30 row">--}}
                                    {{--<label class="col-md-12">أيام الخدمة</label>--}}
                                    {{--<div class="md-checkbox-inline col-md-12">--}}
                                        {{--@foreach( $days as $day )--}}
                                            {{--<div class="md-checkbox col-md-3" style="margin-bottom: 10px;">--}}
                                                {{--<input name="days[]" type="checkbox" value="{{ $day->id }}" id="{{ $day->id }}" class="md-check">--}}
                                                {{--<label for="{{ $day->id }}">--}}
                                                    {{--<span></span>--}}
                                                    {{--<span class="check"></span>--}}
                                                    {{--<span class="box"></span> {{ $day->day }}--}}
                                                {{--</label>--}}
                                            {{--</div>--}}
                                        {{--@endforeach--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="row">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-green-sharp">
                                <i class="icon-settings font-green-sharp"></i>
                                <span class="caption-subject bold uppercase"> الخدمة المنزلية</span>
                            </div>
                        </div>
                        <div class="portlet-body form">

                            <div class="form-body">

                                <div class="form-group">
                                    <div class="col-lg-4">
                                        <label class="control-label">متوفر خدمة منزلية</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="checkbox" name="is_home" class="make-switch" data-on-color="success" data-off-color="danger" data-size="mini" data-on-text="نعم" data-off-text="لا">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-4">
                                        <label class="control-label">خدمة اليوم الواحد</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="checkbox" name="one_day" class="make-switch" data-on-color="success" data-off-color="danger" data-size="mini" data-on-text="نعم" data-off-text="لا">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <button type="submit" class="btn green btn-block">حفظ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script src="{{ URL::asset('public/company/js/bootstrap-fileinput.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/autosize.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ URL::asset('public/company/js/components-form-tools.min.js') }}"></script>
@endsection
