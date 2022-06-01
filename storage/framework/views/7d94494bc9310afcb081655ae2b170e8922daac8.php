<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.sliderImagesShow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.sideSiteTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e(trans('admin.sliderImagesShow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">

        <div class="col-lg-2">
            <a href="<?php echo e(route('sliders-add')); ?>" class="btn btn-primary" style="margin: 20px 10px 20px 0;">اضافة جديد
                <i class="icon-plus-circle2" style="top: 2px;"></i>
            </a>
        </div>

        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th>#</th>
                <th><?php echo e(trans('admin.sliderMainImage')); ?></th>
                <th><?php echo e(trans('admin.edit')); ?></th>
                <th><?php echo e(trans('admin.delete')); ?></th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <?php echo e($value->id); ?> </td>

                    <td>
                        <a href="<?php echo e('/public/uploads/slider/'. $value->image); ?>" target="_blank">
                            <img class="img-preview img-responsive" src="<?php echo e(url('/public/uploads/slider/' . $value->image)); ?>">
                        </a>
                    </td>

                    <td>
                        <a href="<?php echo e(route('sliders-edit', ['id' => $value->id])); ?>">
                            <i class="icon-pencil"></i>
                        </a>
                    </td>

                    <td>
                        <a class="do-delete" href="<?php echo e(route('sliders-delete', ['id' => $value->id])); ?>">
                            <i class="icon-database-remove"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>