<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.commissionPercentage')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.sideCommission')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e(trans('admin.commissionPercentage')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-12">
        <form action="<?php echo e(route('post-commission-percentage')); ?>" method="post">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> تحديد نسبة عمولة الموقع لكل حجز يتم لأي مركز </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">

                            <div class="form-group">
                                <label> النسبة المئوية للعمولة </label>
                                <input name="commission" value="<?php echo e($commission ? $commission : " "); ?>" type="number" class="form-control" placeholder="النسبة المئوية للعمولة" step="5" min="0" max="100">
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

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>