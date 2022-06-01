

<?php $__env->startSection('title'); ?>
     <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h2 color-c5 font-weight-bold "> <?php echo e($title); ?> </h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h4 color-c5 font-weight-bold" href="<?php echo e(route('home')); ?>">الرئيسية / </a>
                        <span class="h4 color-c5 font-weight-bold"> <?php echo e($title); ?> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown" data-wow-duration="2s">
                <h2 class="color-c5"> <?php echo e($title); ?> </h2>
                <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
            </div>

            <div class="row mb-5 wow fadeInUp" data-wow-duration= '1s'>
                <div class="col-sm-12  border bg-f6 font-14 font-weight-bold rounded pt-5 pb-4">

                    <?php echo $conditions; ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('web.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>