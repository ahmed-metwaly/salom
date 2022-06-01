@extends('admin.master')

@section('title')
    {{ $title }}
@endsection

@section('sectionName')
    الموقع
@endsection

@section('pageName')
    {{ $title }}
@endsection

@section('content')

    <div class="col-md-12">
    @if ($title == 'الشروط والأحكام')
        <form action="{{ route('site-conditions-post') }}" method="post">

    @elseif($title == 'شروط التحويل البنكي')
        <form action="{{ route('bank-transfer-conditions-post') }}" method="post">

    @elseif($title == 'سياسة الحجز')
        <form action="{{ route('orders-conditions-post') }}" method="post">

    @elseif($title == 'سياسة ما بعد البيع')
        <form action="{{ route('after-selling-conditions-post') }}" method="post">

    @elseif($title == 'سياسة الشحن')
        <form action="{{ route('delivery-conditions-post') }}" method="post">

    @elseif($title == 'وسائل الدفع')
        <form action="{{ route('payment-methods-post') }}" method="post">

    @elseif($title == 'من نحن')
        <form action="{{ route('who-are-post') }}" method="post">

    @endif
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> {{ $title }} </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">

                           <div class="form-group">
                            
                            <textarea rows="5" required cols="5" name="{{ $name }}" class="form-control " placeholder="شروط الموقع">@if(isset($data->who_are) && $data->who_are != '') {{ $data->who_are }} @endif</textarea>
                            
                            @if($title == 'من نحن')
                            <label> نبذة من نحن </label>
                            <textarea rows="5" required cols="5" name="footer_who_are" class="form-control " placeholder="نبذة من نحن">{{ $data->footer_who_are }}</textarea>
                            
                            @endif
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
@section('script')
    <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( "{{ $name }}" );
    </script>
@endsection('script')