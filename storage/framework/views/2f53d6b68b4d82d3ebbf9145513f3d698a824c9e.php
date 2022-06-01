<?php $__env->startSection('title'); ?>
    نوع العضوية
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h3 color-c5 font-weight-bold ">نوع العضوية</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h5 color-c5 font-weight-bold" href="<?php echo e(route('home')); ?>">الرئيسية / </a>
                        <span class="h5 color-c5 font-weight-bold">نوع العضوية</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="type">
        <div class="container text-center">
            <div class="mt-5 wow fadeInDown">
                <h2 class="color-c5">نوع العضوية</h2>
                <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">

            </div>
            <div class="my-5 wow fadeInDown">
                <a href="<?php echo e(route('show-register-user')); ?>" class="btn bg-c5 text-white rounded-0 ml-4 p-3 font-weight-bold btn-hover">
                    <i class="fa fa-user fa-2x d-block mb-2"></i>
                    <span>مستخدم</span>
                </a>
                <a href="<?php echo e(route('show-register-company')); ?>" class="btn bg-c5 text-white rounded-0 m-0 mr-4 p-3 font-weight-bold btn-hover">
                    <i class="fa fa-building fa-2x d-block mb-2"></i>
                    <span>مركز تجميل</span>
                </a>
            </div>
        </div>
    </div>

    <!--<section class="img position-relative bg-cover">-->
    <!--    <div class="overlay position-absolute">-->
    <!--    </div>-->
    <!--</section>-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>