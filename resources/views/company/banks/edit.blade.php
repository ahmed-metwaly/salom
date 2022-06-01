@extends('company.layouts.master')

@section('title')
    {{ trans('admin.banksEdit') }}
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('companyDashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('banks.index') }}">{{ trans('admin.banksIndex') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ trans('admin.banksEdit') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.banksIndex') }}
        <small>تعديل حساب بنكي</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    {!! Form::model($bank, ['method' => 'PATCH', 'url' => route('banks.update', $bank->id),'class' => 'form-horizontal']) !!}
                    <div class="form-body">

                        <div class="form-group">
                            <label for="bank_name" class="col-lg-3 control-label">اسم البنك</label>
                            <div class="col-lg-9">
                                <input id="bank_name" name="bank_name" type="text" class="form-control" value="{{ $bank->bank_name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="number" class="col-lg-3 control-label">رقم الحساب</label>
                            <div class="col-lg-9">
                                <input id="number" name="number" type="text" class="form-control" value="{{ $bank->number }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="iban" class="col-lg-3 control-label">الأيبان</label>
                            <div class="col-lg-9">
                                <input id="iban" name="iban" type="text" class="form-control" value="{{ $bank->iban }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="owner_name" class="col-lg-3 control-label">اسم صاحب الحساب</label>
                            <div class="col-lg-9">
                                <input id="owner_name" name="owner_name" type="text" class="form-control" value="{{ $bank->owner_name }}">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <button type="submit" class="btn green btn-block">حفظ</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
