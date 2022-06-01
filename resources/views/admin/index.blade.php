@extends('admin.master')

@section('content')

    <div class="col-md-12">

        <!-- Advanced legend -->
        <form action="" method="post">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">بيانات اعدادات الموقع</h5>

                </div>


                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">
                            <div class="form-group">
                                <label> اسم الموقع بالغة العربية </label>
                                <input type="text" name="site_name_ar" class="form-control" placeholder="اسم الموقع بالغة العربية ">
                            </div>

                            <div class="form-group">
                                <label> اسم الموقع بالغة الانجليزية</label>
                                <input type="text" name="site_name_en" class="form-control" placeholder="اسم الموقع بالغة الانجليزية">
                            </div>

                            <div class="form-group">
                                <label>البريد الالكترونى الرئيسى للموقع</label>
                                <input type="email" name="site_email" class="form-control" placeholder="البريد الالكترونى الرئيسى للموقع">
                            </div>


                            <div class="form-group">
                                <label> هاتف الموقع </label>
                                <input type="tel" name="site_phone" class="form-control" placeholder=" هاتف الموقع ">
                            </div>

                            <div class="form-group">
                                <label> الحساب البنكى الخاص بالموقع </label>
                                <input type="number" name="site_bank_number" class="form-control" placeholder=" الحساب البنكى الخاص بالموقع ">
                            </div>

                            <div class="form-group">
                                <label> رابط الفيس بوك </label>
                                <input type="url" name="site_fb" class="form-control" placeholder=" رابط الفيس بوك ">
                            </div>

                            <div class="form-group">
                                <label> رابط تويتر</label>
                                <input type="url" name="site_tw" class="form-control" placeholder=" رابط تويتر">
                            </div>

                            <div class="form-group">
                                <label> رابط جوجل بلس</label>
                                <input type="url" name="site_go" class="form-control" placeholder=" رابط جوجل بلس">
                            </div>

                            <div class="form-group">
                                <label> رابط انستجرام</label>
                                <input type="url" name="site_inst" class="form-control" placeholder=" رابط انستجرام">
                            </div>

                            <div class="form-group">
                                <label> رابط يوتيوب</label>
                                <input type="url" name="site_yout" class="form-control" placeholder=" رابط يوتيوب">
                            </div>

                            <div class="form-group">
                                <label> رسالة اغلاق الموقع </label>
                                <textarea rows="5" cols="5" name="site_close_messge" class="form-control" placeholder="رسالة اغلاق الموقع"></textarea>
                            </div>


                            <div class="form-group">
                                <label class="display-block">حالة تفعيل التعليقات</label>

                                <label class="radio-inline">
                                    <input type="radio" name="site_comments_status" class="styled" >
                                    مفعلة
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="site_comments_status" class="styled">
                                    غير مفعلة
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="display-block"> عارض الصور </label>

                                <label class="radio-inline">
                                    <input type="radio" name="site_slider_status" class="styled" >
                                    اخر المضاف تلقائى
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="site_slider_status" class="styled">
                                    المضاف من لوحة التحكم
                                </label>
                            </div>


                            <div class="form-group">
                                <label> حالة الموقع </label>
                                <select data-placeholder="-- يرجى الاختيار --" name="site_status" class="select">
                                    <option value="1">مفتوح</option>
                                    <option value="0">مغلق</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"> حفظ <i
                                    class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /a legend -->

    </div>

@endsection
