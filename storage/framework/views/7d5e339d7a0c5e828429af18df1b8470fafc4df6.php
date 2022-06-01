<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.bankAccountShow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.bankAccount')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e(trans('admin.bankAccountShow')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="panel panel-flat">
    <table class="table table-bordered table-hover datatable-highlight">
        <thead>
        <tr>
            <th>#</th>
            <th>اسم صاحب الحساب</th>
            <th>اسم البنك</th>
            <th>رقم الحساب</th>
            <th>رقم الأيبان</th>
            <th><?php echo e(trans('admin.edit')); ?></th>
            <th><?php echo e(trans('admin.delete')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($data) > 0): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($value->id); ?></td>
                    <td><?php echo e($value->owner_name); ?></td>
                    <td><?php echo e($value->bank_name); ?></td>
                    <td><?php echo e($value->number); ?></td>
                    <td><?php echo e($value->iban); ?></td>

                    <td>
                        <a href="<?php echo e(route('admin.banks.edit', ['id' => $value->id])); ?>"><i class="icon-pencil" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <a class="do-delete" href="<?php echo e(route('admin.banks.delete', ['id' => $value->id])); ?>"><i class="icon-database-remove"></i>
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