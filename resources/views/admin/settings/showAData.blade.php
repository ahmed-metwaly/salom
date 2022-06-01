@extends('admin.master')

@section('title')
    {{ trans('admin.settingsTitle') }}
@endsection

@section('sectionName')
    {{ trans('admin.sideSettingsTitle') }}
@endsection

@section('pageName')
    {{ trans('admin.sideSettings') }}
@endsection

@section('content')

<div class="col-md-12">
    <form action="{{ route('settings-do-edit') }}" method="post">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title"> {{ trans('admin.settingsFormTitle') }} </h5>
            </div>
            <div class="panel-body">
                <fieldset>
                    <div class="collapse in" id="demo1">
                        <div class="form-group">
                            <label> {{ trans('admin.settingsSiteName') }} </label>
                            <input type="text" required name="name" value="{{ $data->name }}" class="form-control" placeholder=" {{ trans('admin.settingsSiteName') }} ">
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.settingsSitePhone') }} </label>
                            <input type="tel" required name="phone" value="{{ $data->phone }}" class="form-control" placeholder=" {{ trans('admin.settingsSitePhone') }} ">
                        </div>

                        <div class="form-group">
                                <label> اميل الموقع </label>
                                <input type="email" required name="email" value="{{ $data->email }}" class="form-control">
                            </div>

                        <div class="form-group">
                            <label> فاكس الموقع </label>
                            <input type="text" name="fax" value="{{ $data->fax }}" class="form-control" placeholder=" فاكس الموقع ">
                        </div>

                        <div class="form-group">
                            <label> العنوان </label>
                            <input type="text" name="address" value="{{ $data->address }}" class="form-control" placeholder=" العنوان ">
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.settingsFb') }} </label>
                            <input type="text" name="facebook" value="{{ $data->facebook }}" class="form-control" placeholder=" {{ trans('admin.settingsFb') }} ">
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.settingsTw') }} </label>
                            <input type="text" name="twitter" value="{{ $data->twitter }}" class="form-control" placeholder="{{ trans('admin.settingsTw') }}">
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.settingsGo') }} </label>
                            <input type="text" name="google_plus" value="{{ $data->google_plus }}" class="form-control" placeholder="{{ trans('admin.settingsGo') }}">
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.settingsInst') }} </label>
                            <input type="text" name="instagram" value="{{ $data->instagram }}" class="form-control" placeholder="{{ trans('admin.settingsInst') }}">
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.settingsYout') }} </label>
                            <input type="text" name="youtube" value="{{ $data->youtube }}" class="form-control" placeholder=" {{ trans('admin.settingsYout') }}  ">
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.settingsPinterest') }} </label>
                            <input type="text" name="pinterest" value="{{ $data->pinterest }}" class="form-control" placeholder=" {{ trans('admin.settingsPinterest') }}  ">
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.settingsSnapchat') }} </label>
                            <input type="text" name="snapchat" value="{{ $data->snapchat }}" class="form-control" placeholder=" {{ trans('admin.settingsSnapchat') }}  ">
                        </div>

                        <div class="form-group">
                            <label> {{ trans('admin.SettingsStatus') }} </label>
                            <select required data-placeholder="-- {{ trans('admin.SettingsSelect') }} --" name="status" class="select">

                                <option value="1" {{ $data->status == 1 ? 'selected' : '' }} > {{ trans('admin.SettingsStatusOpen') }} </option>

                                <option value="0" {{ $data->status == 0 ? 'selected' : '' }} > {{ trans('admin.SettingsStatusClose') }} </option>

                            </select>
                        </div>



                        {{--<div class="form-group">--}}
                            {{--<label> {{ trans('admin.settingsKeyword') }} </label>--}}
                            {{--<textarea rows="5" required cols="5" name="site_keyword" class="form-control" placeholder="{{ trans('admin.settingsKeyword') }}">{{ $data->site_keyword }}</textarea>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label> {{ trans('admin.settingsDescription') }} </label>--}}
                            {{--<textarea rows="5" required cols="5" name="site_description" class="form-control" placeholder="{{ trans('admin.settingsDescription') }}">{{ $data->site_description }}</textarea>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label> عضوية مكاتب العقار والسيارات </label>--}}
                            {{--<textarea id="editor1" rows="5" required cols="5" name="subscribe" class="form-control ckeditor" placeholder="" value="{{$data->subscribe}}">{{ $data->subscribe }}</textarea>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label> عمولة حراج </label>--}}
                            {{--<textarea id="editor1" rows="5" required cols="5" name="commission" class="form-control ckeditor" placeholder="" value="{{$data->commission}}">{{ $data->commission }}</textarea>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label> حساب العمولة </label>--}}
                            {{--<textarea rows="5" required cols="5" name="commission_count" class="form-control" placeholder="" value="{{$data->commission_count}}">{{ $data->commission_count }}</textarea>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label> السلع والإعلانات الممنوعة </label>--}}
                            {{--<textarea id="editor1" rows="5" required cols="5" name="black_ads" class="form-control ckeditor" placeholder="" value="{{$data->black_ads}}">{{ $data->black_ads }}</textarea>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label> {{ trans('admin.settingsClose') }} </label>--}}
                            {{--<textarea rows="5" required cols="5" name="site_close_messge" class="form-control " placeholder="{{ trans('admin.settingsClose') }}">{{ $data->site_close_messge }}</textarea>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label> {{ trans('admin.settingsComments') }} </label>--}}
                            {{--<select data-placeholder="-- {{ trans('admin.SettingsSelect') }} --" name="site_comments_status" class="select">--}}

                                {{--<option value="1" {{ $data->site_comments_status == 1 ? 'selected' : '' }} > {{ trans('admin.settingsOpen') }} </option>--}}

                                {{--<option value="0" {{ $data->site_comments_status == 0 ? 'selected' : '' }} > {{ trans('admin.settingsClose') }} </option>--}}
                            {{--</select>--}}
                        {{--</div>--}}


                    </div>
                </fieldset>

                <input type="hidden" name="_token" value="{{ Session::token() }}">

                <div class="text-right">

                    <button type="submit" class="btn btn-primary"> {{ trans('admin.save') }} <i class="icon-arrow-left13 position-right"></i></button>

                </div>

            </div>

        </div>

    </form>

    <!-- /a legend -->



</div>

@endsection
@section('script')
    <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script> 
@endsection('script')