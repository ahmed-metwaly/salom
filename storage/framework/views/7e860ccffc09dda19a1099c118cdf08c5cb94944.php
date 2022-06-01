<?php $__env->startSection('title'); ?>
    طرق الدفع
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h2 color-c5 font-weight-bold ">طرق الدفع</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h4 color-c5 font-weight-bold" href="<?php echo e(route('home')); ?>">الرئيسية / </a>
                        <span class="h4 color-c5 font-weight-bold">حجز خدمة</span>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="payment mb-5">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown">
                <h2 class="color-c5">إختر طريقة الدفع</h2>
                <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
            </div>

            <div class="row" style="margin-bottom: 30">
                <div class="col-md-12 border bg-f6 font-14 font-weight-bold rounded pt-5 pb-4">
                    <p class="color-777 font-18 line-2">تأكيد الحجز لدى "
                        <span class="danger-color"> <?php echo e($companyName); ?> </span>
                        " لعدد "
                        <span class="danger-color"> <?php echo e($individualCount); ?> </span>
                        " أفراد بتاريخ "
                        <span class="danger-color"> <?php echo e($onlyDate); ?> </span>

                        <?php if( $onlyTime ): ?>
                        " الساعة "
                        <span class="danger-color"> <?php echo e($onlyTime); ?> </span>
                        <?php endif; ?>

                        " بإجمالي مبلغ "
                        <span class="danger-color"> <?php echo e($totalPrice); ?> ر.س </span>
                        " ودفع مقدم "
                        <span class="danger-color"> <?php echo e($commissionPrice); ?> ر.س </span>
                        " ؟؟؟
                    </p>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-12 mb-5 wow zoomIn">
                    <a href="<?php echo e(route('payment.method.create', 'bank')); ?>">
                        <div class="payment-card bg-dark text-white text-center rounded p-5">
                            <h3 class="mb-4">حوالة بنكية</h3>
                            <i class="fa fa-university fa-5x text-white rounded px-4 py-2 mb-4"></i>
                            <p class="line-2 mb-4">هناك حقيقة مثيتة منذ زمن طويل وهى أن المحتوى المقرء</p>
                            <span class="btn text-dark bg-white font-weight-bold py-3 px-5 btn-hover">ادفع</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-12 mb-5 wow zoomIn">

                    <a >
                        <div class="payment-card bg-info text-white text-center rounded p-5">
                            <h3 class="mb-4">Visa</h3>
                            <i class="fab fa-cc-visa fa-5x text-white rounded px-4 py-2 mb-4"></i>
                            <p class="line-2 mb-4">هناك حقيقة مثيتة منذ زمن طويل وهى أن المحتوى المقرء</p>
                            <span class="btn text-dark bg-white font-weight-bold py-3 px-5 btn-hover">ادفع</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-12 mb-5 wow zoomIn">
                    
                    <a >
                        <div class="payment-card bg-danger text-white text-center rounded p-5">
                            <h3 class="mb-4">MasterCard</h3>
                            <i class="fab fa-cc-mastercard fa-5x text-white rounded px-4 py-2 mb-4"></i>
                            <p class="line-2 mb-4">هناك حقيقة مثيتة منذ زمن طويل وهى أن المحتوى المقرء</p>
                            <span class="btn text-dark bg-white font-weight-bold py-3 px-5 btn-hover">ادفع</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 mb-5 wow zoomIn">
                    <a href="<?php echo e(route('payment.method.create', 'receipt')); ?>">
                        <div class="payment-card bg-dark text-white text-center rounded p-5">
                            <h3 class="mb-4"> الدفع عند المشغل </h3>
                            <i class="far fa-money-bill-alt fa-5x text-white rounded px-4 py-2 mb-4"></i>
                            <p class="line-2 mb-4">هناك حقيقة مثيتة منذ زمن طويل وهى أن المحتوى المقرء</p>
                            <span class="btn text-dark bg-white font-weight-bold py-3 px-5 btn-hover">ادفع</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--<section class="img position-relative bg-cover">-->
    <!--    <div class="overlay position-absolute">-->
    <!--    </div>-->
    <!--</section>-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>