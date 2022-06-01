<?php $__env->startSection('title'); ?>
    خدمات تجميلية راقية
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    الخدمات والمراكز المميزة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    خدمات تجميلية راقية
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">

        <div class="col-lg-2">
            <a href="<?php echo e(route('promotions.services.create')); ?>" class="btn btn-primary" style="margin: 20px 10px 20px 0;">إضافة جديد
                <i class="icon-plus-circle2" style="top: 2px;"></i>
            </a>
        </div>

        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th> صورة الخدمة</th>
                <th> الخدمة </th>
                <th> مركز التجميل </th>
                <th> عرض من </th>
                <th> ينتهى فى </th>
                <th><?php echo e(trans('admin.show')); ?></th>
                <th><?php echo e(trans('admin.edit')); ?></th>
                <th><?php echo e(trans('admin.delete')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($promotions) > 0): ?>
                <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <img class="img-preview img-responsive" src="<?php echo e(url('public/uploads/services/' . $promotion->promotionable->photo)); ?>">
                    </td>
                    <td>
                        <a href="<?php echo e(route('service-details', ['id' => $promotion->promotionable->id])); ?>"> <?php echo e($promotion->promotionable->name); ?> </a>
                    </td>
                    <td>
                        <a href="<?php echo e(route('center-details', ['id' => $promotion->promotionable->company->id])); ?>"> <?php echo e($promotion->promotionable->company->name); ?> </a>
                    </td>
                    <td><?php echo e($promotion->start_at); ?></td>
                    <td><?php echo e($promotion->end_at); ?></td>
                    <td>
                        <a href="<?php echo e(route('service-details', ['id' => $promotion->promotionable->id])); ?>">
                            <i class="icon-tv"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo e(route('promotions.services.edit', ['id' => $promotion->id])); ?>">
                            <i class="icon-pencil"></i>
                        </a>
                    </td>
                    <td>
						<a class="do-delete" href="<?php echo e(route('promotions.delete', ['id' => $promotion->id])); ?>"><i class="icon-database-remove"></i>
                        </a>
					</td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>