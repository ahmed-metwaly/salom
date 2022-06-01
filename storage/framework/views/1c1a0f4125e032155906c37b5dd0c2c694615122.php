<?php $__env->startSection('title'); ?>
    الدفع عن طريق حوالة بنكية
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h2 color-c5 font-weight-bold ">الدفع عن طريق حوالة بنكية</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h4 color-c5 font-weight-bold" href="<?php echo e(route('home')); ?>">الرئيسية / </a>
                        <a class="h4 color-c5 font-weight-bold" href="<?php echo e(route('payment.method')); ?>">طرق الدفع / </a>
                        <span class="h4 color-c5 font-weight-bold">حوالة بنكية</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="payment mb-5">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown">
                <h2 class="color-c5">الدفع عن طريق حوالة بنكية</h2>
                <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
            </div>
            <div class="row">
                <?php echo Form::open([ 'url' => route('payment.method.store', 'bank'), 'class' => 'bg-f6 p-5', 'files' => 'true' ]); ?>


                    <div class="row">
                    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-6 mb-4">
                            <h5 class="color-c5 mb-3 wow zoomIn" data-wow-delay=".53s"> البنك: <?php echo e($bank->bank_name); ?> </h5>
                            <h5 class="color-c5 mb-3 wow zoomIn" data-wow-delay=".55s"> اسم صاحب الحساب:  <?php echo e($bank->owner_name); ?></h5>
                            <h5 class="color-c5 mb-3 wow zoomIn" data-wow-delay=".58s"> رقم الحساب: <?php echo e($bank->number); ?> </h5>
                            <h5 class="color-c5 mb-3 wow zoomIn" data-wow-delay=".60s"> الأيبان: <?php echo e($bank->iban); ?> </h5>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="row">
                    <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn" data-wow-delay=".6s">
                        <input type="text" name="username" class="form-control rounded-0" placeholder="اسم المحول" required>
                        <?php if($errors->has('username')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('username')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn" data-wow-delay=".6s">
                        <input type="text" name="account_number" class="form-control rounded-0" placeholder="رقم الحساب المحول منه" required>
                        <?php if($errors->has('account_number')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('account_number')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn" data-wow-delay=".7s">
                        <input type="text" name="bank" class="form-control rounded-0" placeholder="البنك المحول إليه" required>
                        <?php if($errors->has('bank')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('bank')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-sm-6 col-xs-12 mb-4 wow zoomIn" data-wow-delay=".7s">
                        <input type="number" name="price" class="form-control rounded-0" placeholder="المبلغ المحول" min="0.0" max="100000.00" step="10.00" required>
                        <?php if($errors->has('price')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('price')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group col-12 mb-4 wow zoomIn" data-wow-delay=".8s">
                        <label class="custom-file border-0 rounded">
                            <span class="ml-4">صورة التحويل</span>
                            <input type="file" name="file" id="file" class="custom-file-input d-none" required>
                            <span class="text-white bg-c5 px-4 py-1 rounded">
                                <i class="fa fa-file pl-1"></i>
                                إرفاق ملف
                            </span>
                        </label>
                        <?php if($errors->has('file')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('file')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-12 mb-4 wow zoomIn" data-wow-delay=".8s">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="checkbox" type="checkbox" class="form-check-input">
                                اوافق على <a class="color-af" href="<?php echo e(route('bank-transfer-conditions')); ?>">الشروط</a>
                            </label>
                        </div>
                    </div>
                    <div class="col mt-4 wow zoomIn" data-wow-delay=".8s">
                        <button id="payment" type="submit" class="btn bg-c5 font-18 py-2 px-5 text-white btn-hover">إرسال</button>
                    </div>

                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>

    <!--<section class="img position-relative bg-cover">-->
    <!--    <div class="overlay position-absolute">-->
    <!--    </div>-->
    <!--</section>-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $(document).ready(function () {

            $('#payment').prop('disabled', true);


            $('#checkbox').change(function(){

                if($(this).is(':checked'))
                    $('#payment').prop('disabled', false);

                else
                    $('#payment').prop('disabled', true);

            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>