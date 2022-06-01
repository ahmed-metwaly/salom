<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.companyCommissionPaying')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.commissionPaying')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e(trans('admin.companyCommissionPaying')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-12">
        <form action="<?php echo e(route('commission-confirmCommissionPaying', ['company_id' => $company_id])); ?>" method="get">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> <?php echo e(trans('admin.companyCommissionPaying')); ?> </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">
                            <div class="form-group">
                                <label> إجمالي المبلغ المستحق </label>
                                <input readonly type="text" name="base" value="<?php echo e($commission); ?> ر.س" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> المبلغ المسدد </label>
                                <input type="number" name="payed" value="<?php echo e(old('payed')); ?>" class="form-control" placeholder="المبلغ المسدد" step="0.5" min="0" max="100000">
                            </div>
                        </div>
                    </fieldset>
                    
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"> <?php echo e(trans('admin.save')); ?> <i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>