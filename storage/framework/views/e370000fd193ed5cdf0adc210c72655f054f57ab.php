<?php $__env->startSection('title'); ?>
    مستخدم جديد
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h3 color-c5 font-weight-bold ">مستخدم جديد</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h5 color-c5 font-weight-bold" href="<?php echo e(route('home')); ?>">الرئيسية / </a>
                        <span class="h5 color-c5 font-weight-bold">مستخدم جديد</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown">
                <h2 class="color-c5">تسجيل مستخدم جديد</h2>
                <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
            </div>

            <?php echo Form::open([ 'url' => route('register-user'), 'class' => 'row bg-f6 p-5 p-5', 'files' => 'true' ]); ?>


                <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn <?php echo e($errors->has('name') ? ' has-error' : ''); ?>" data-wow-delay=".5s">
                    <input name="name" value="<?php echo e(old('name')); ?>" type="text" class="form-control rounded-0" placeholder="الاسم كاملَا" required>

                    <?php if($errors->has('name')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn <?php echo e($errors->has('image') ? ' has-error' : ''); ?>" data-wow-delay=".5s">
                    <label class="custom-file border-0 w-100 btn-img">
                        <input name="image" type="file" id="file" class="custom-file-input btn-img" accept="image/*" required>
                        <span class="custom-file-control rounded-0 border-0">إضافة صورة</span>
                    </label>
                    <?php if($errors->has('image')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('image')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn <?php echo e($errors->has('phone') ? ' has-error' : ''); ?>" data-wow-delay=".6s">
                    <input name="phone" value="<?php echo e(old('phone')); ?>" type="text" class="form-control rounded-0" placeholder="رقم الجوال" required>

                    <?php if($errors->has('phone')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('phone')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn <?php echo e($errors->has('email') ? ' has-error' : ''); ?>" data-wow-delay=".6s">
                    <input name="email" value="<?php echo e(old('email')); ?>" type="text" class="form-control rounded-0" placeholder="البريد الإلكترونى" required>

                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn <?php echo e($errors->has('password') ? ' has-error' : ''); ?>" data-wow-delay=".7s">
                    <input name="password" type="password" class="form-control rounded-0" placeholder="كلمة المرور" required>

                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn" data-wow-delay=".7s">
                    <input name="password_confirmation" type="password" class="form-control rounded-0" placeholder="أعد كلمة المرور" required>
                </div>

            <p class="px-3 color-777 font-14 text-justify wow zoomIn" data-wow-delay=".8s">
                    بالنقر على إنشاء حساب جديد أنت توافق على
                    <a class="color-af" href="<?php echo e(route('site-conditions')); ?>">الشروط</a>
                التى نتبعها وأنك قرأت
                    <a class="color-af" href="#">سياسة الاستخدام</a>
                    بما فى ذلك
                    <a class="color-af" href="#">استخدام ملفات التعريف الارتباط</a>
                    يمكنك تلقي إشعارات رسائل SMS من فيسبوك ويمكنك إلغاء الإشتراك فى أى وقت
                </p>
            <div class="col mt-4 wow zoomIn" data-wow-delay="1s">
                <button type="submit" class="btn bg-c5 font-18 py-2 px-5 text-white btn-hover rounded-0">إنشاء حساب</button>
            </div>
            <?php echo Form::close(); ?>



            <div class="text-center my-5 wow fadeInDown">
                <h2 class="color-c5">تسجيل عن طريق</h2>
                <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
            </div>
            <div class="bg-f6 log text-center px-4 py-5 mb-5">
                <ul class="list-unstyled row pr-0">
                    <!--<li class="col-md-4 col-xs-12 mb-md-0 mb-5 wow zoomIn">-->
                    <!--    <a class=" text-white bg-twitter h2 m-0 px-5" href="<?php echo e(route('auth-provider', 'twitter')); ?>">-->
                    <!--        Twitter-->
                    <!--        <i class="fab fa-twitter mr-lg-4 mr-2"></i>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li class="col-md-4 col-xs-12 mb-md-0 mb-5 wow zoomIn">
                        <a class="col-12 text-white bg-google h2 px-5" href="<?php echo e(route('auth-provider', 'google')); ?>">
                            Google
                            <i class="fab fa-google mr-lg-4 mr-2"></i>
                        </a>
                    </li>
                    <li class="col-md-4 col-xs-12 mb-md-0 wow zoomIn">
                        <a class="col-12 text-white bg-facebook h2 px-md-4 px-5" href="<?php echo e(route('auth-provider', 'facebook')); ?>">
                            Facebook
                            <i class="fab fa-facebook-f mr-lg-4 mr-2"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    
        
        
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>