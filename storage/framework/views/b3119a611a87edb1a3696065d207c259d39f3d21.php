<?php $__env->startSection('title'); ?>
    حسابي
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h2 color-c5 font-weight-bold "> حسابي</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h4 color-c5 font-weight-bold" href="<?php echo e(route('home')); ?>">الرئيسية / </a>
                        <span class="h4 color-c5 font-weight-bold"> حسابي</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login">
        <div class="container">
            <div class="text-center my-5">
                <h2 class="color-c5">بياناتي الشخصية</h2>
                <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
            </div>

            <?php echo Form::open([ 'url' => route('store-profile'), 'class' => 'row bg-f6 p-5 p-5 mb-5', 'files' => 'true' ]); ?>


            <div class="form-group col-sm-6 col-xs-12 mb wow zoomIn">
                <img class="img-fluid" style="width: 200px;" src="<?php echo e(starts_with($user->photo, 'http') ? $user->photo : url("/public/uploads/users/$user->photo")); ?>" alt="<?php echo e($user->name); ?>">
            </div>

            <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn <?php echo e($errors->has('image') ? ' has-error' : ''); ?>" data-wow-delay=".5s">
                <label class="custom-file border-0">
                    <input name="image" type="file" id="file" class="custom-file-input">
                    <span class="custom-file-control">إضافة صورة</span>
                </label>
                <?php if($errors->has('image')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('image')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>

            <div class="form-group col-sm-12 col-xs-12 mb-4 wow zoomIn <?php echo e($errors->has('name') ? ' has-error' : ''); ?>" data-wow-delay=".6s">
                <input name="name" value="<?php echo e($user->name); ?>" type="text" class="form-control rounded-0" placeholder="الاسم كاملَا" required>

                <?php if($errors->has('name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>

            <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn <?php echo e($errors->has('phone') ? ' has-error' : ''); ?>" data-wow-delay=".7s">
                <input name="phone" value="<?php echo e($user->phone ? $user->phone : old('phone')); ?>" type="text" class="form-control rounded-0" placeholder="رقم الجوال" required>

                <?php if($errors->has('phone')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('phone')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn <?php echo e($errors->has('email') ? ' has-error' : ''); ?>" data-wow-delay=".7s">
                <input name="email" value="<?php echo e($user->email ? $user->email : old('email')); ?>" type="text" class="form-control rounded-0" placeholder="البريد الإلكترونى" required>

                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>

            <?php if(!$user->password): ?>
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
            <?php endif; ?>
            <div class="col mt-4 wow zoomIn" data-wow-delay="1s">
                <button type="submit" class="btn bg-c5 font-18 py-2 px-5 text-white btn-hover">حفظ</button>
            </div>
            <?php echo Form::close(); ?>


        </div>
    </div>

    <!--<section class="img position-relative bg-cover">-->
    <!--    <div class="overlay position-absolute">-->
    <!--    </div>-->
    <!--</section>-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>