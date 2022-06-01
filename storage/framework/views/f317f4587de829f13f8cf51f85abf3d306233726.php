<?php $__env->startSection('title'); ?>
   الدفع عند المشغل
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h2 color-c5 font-weight-bold "> الدفع عند المشغل</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h4 color-c5 font-weight-bold" href="<?php echo e(route('home')); ?>">الرئيسية / </a>
                        <a class="h4 color-c5 font-weight-bold" href="<?php echo e(route('payment.method')); ?>">طرق الدفع / </a>
                        <span class="h4 color-c5 font-weight-bold"> دفع عند المشغل</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="payment mb-5">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown">
                <h2 class="color-c5"> الدفع عند المشغل</h2>
                <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
            </div>
            <div class="row">
                <?php echo Form::open([ 'url' => route('payment.method.storeReceipt', 'receipt'), 'class' => 'bg-f6 p-5', 'files' => 'true' ]); ?>

                    <div class="row">
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
                                        
                                    "  بإجمالي مبلغ "
                                    <span class="danger-color"> <?php echo e($totalPrice); ?> ر.س </span>
                                     " ؟
                                        <!-- " ودفع مقدم "
                                        <span class="danger-color"> <?php  // echo $commissionPrice ?>  ر.س </span>
                                        " ؟؟؟ -->
                                
                                </p>
                                </p>
                            </div>
                        </div>
                        <input type="hidden" name="price" value="<?php echo e($totalPrice); ?>">
                        <input type="hidden" name="order_id" value="1">
                        <div class="col mt-4 wow zoomIn" data-wow-delay=".8s">
                            <button  type="submit" class="btn bg-c5 font-18 py-2 px-5 text-white btn-hover">تاكيد عملية الدفع </button>
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