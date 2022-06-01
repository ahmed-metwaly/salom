<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    الموقع
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-12">
    <?php if($title == 'الشروط والأحكام'): ?>
        <form action="<?php echo e(route('site-conditions-post')); ?>" method="post">

    <?php elseif($title == 'شروط التحويل البنكي'): ?>
        <form action="<?php echo e(route('bank-transfer-conditions-post')); ?>" method="post">

    <?php elseif($title == 'سياسة الحجز'): ?>
        <form action="<?php echo e(route('orders-conditions-post')); ?>" method="post">

    <?php elseif($title == 'سياسة ما بعد البيع'): ?>
        <form action="<?php echo e(route('after-selling-conditions-post')); ?>" method="post">

    <?php elseif($title == 'سياسة الشحن'): ?>
        <form action="<?php echo e(route('delivery-conditions-post')); ?>" method="post">

    <?php elseif($title == 'وسائل الدفع'): ?>
        <form action="<?php echo e(route('payment-methods-post')); ?>" method="post">

    <?php elseif($title == 'من نحن'): ?>
        <form action="<?php echo e(route('who-are-post')); ?>" method="post">

    <?php endif; ?>
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> <?php echo e($title); ?> </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">

                           <div class="form-group">
                            
                            <textarea rows="5" required cols="5" name="<?php echo e($name); ?>" class="form-control " placeholder="شروط الموقع"><?php if(isset($data->who_are) && $data->who_are != ''): ?> <?php echo e($data->who_are); ?> <?php endif; ?></textarea>
                            
                            <?php if($title == 'من نحن'): ?>
                            <label> نبذة من نحن </label>
                            <textarea rows="5" required cols="5" name="footer_who_are" class="form-control " placeholder="نبذة من نحن"><?php echo e($data->footer_who_are); ?></textarea>
                            
                            <?php endif; ?>
                            </div>

                        </div>
                    </fieldset>

                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">

                    <div class="text-right">

                        <button type="submit" class="btn btn-primary"> <?php echo e(trans('admin.save')); ?> <i class="icon-arrow-left13 position-right"></i></button>

                    </div>

                </div>

            </div>

        </form>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( "<?php echo e($name); ?>" );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>