<?php $__env->startSection('title'); ?>
    <?php echo trans('admin.sideServiceDetails') . ' ' . $data->name; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.companyServices')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo trans('admin.sideServiceDetails')  . ' : <span class="text-success">' . $data->name . '</span>'; ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <div class="col-md-12">
        <div class="panel panel-flat">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <fieldset>
                    <div class="form-group">
                        <img class="img-header img-preview img-thumbnail pull-left" src="<?php echo e(url('public/uploads/services/' . $data->photo)); ?>">
                    </div>
                    <div class="clear-fix" style="display: block; clear: both;"></div>
                    <br>
                    <br>

                    <div class="collapse in" id="demo1">

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.serviceCompany')); ?> </label>
                            <input type="text" class="form-control" readonly value="<?php echo e($data->company->name); ?>">
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.serviceName')); ?> </label>
                            <input type="text" class="form-control" readonly value="<?php echo e($data->name); ?>">
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.servicePrice')); ?> </label>
                            <input type="text" class="form-control" readonly value="<?php echo e($data->price); ?>">
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.serviceInterval')); ?> </label>
                            <input type="text" class="form-control" readonly value="<?php echo e(explodeByColon( minutesToHours( $data->interval))[1]); ?>">
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.serviceDesc')); ?> </label>
                            <textarea id="editor1" rows="8" readonly class="form-control" placeholder=""> <?php echo e($data->description); ?> </textarea>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>