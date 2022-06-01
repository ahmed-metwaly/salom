@extends('admin.master')

@section('title')
{{ trans('admin.bankAccountEdit') }}
@endsection

@section('sectionName')
    <a href="{{ route('bank-accounts') }}"> {{ trans('admin.bankAccount')  }} </a>
@endsection

@section('pageName')
{{ trans('admin.bankAccountEdit') }}
@endsection

@section('content')
	<div class="col-md-12">
		{!! Form::model($bank, ['method' => 'PATCH', 'url' => route('admin.banks.update', $bank->id)]) !!}

			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"> {{ trans('admin.bankAccount') }} </h5>
				</div>
				<div class="panel-body">
					<fieldset>
						<div class="collapse in" id="demo1">
							<div class="form-group">
								<label> اسم البنك </label>
								<input type="text" name="bank_name" value="{{ $bank->bank_name }}"  class="form-control" placeholder=" اسم البنك ">
							</div>

							<div class="form-group">
								<label> رقم الحساب </label>
								<input type="text" name="number" value="{{ $bank->number }}" class="form-control" placeholder=" رقم الحساب ">
							</div>

							<div class="form-group">
								<label> الأيبان </label>
								<input type="text" name="iban" value="{{ $bank->iban }}" class="form-control" placeholder=" رقم الحساب الدولي ">
							</div>

							<div class="form-group">
								<label> اسم صاحب الحساب </label>
								<input type="text" name="owner_name" value="{{ $bank->owner_name }}" class="form-control" placeholder=" اسم صاحب الحساب ">
							</div>

							<div class="col-md-2"></div>
						</div>
					</fieldset>
					<div class="text-right">
						<button type="submit" class="btn btn-primary"> {{ trans('admin.save') }} <i class="icon-arrow-left13 position-right"></i></button>
					</div>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
@endsection







