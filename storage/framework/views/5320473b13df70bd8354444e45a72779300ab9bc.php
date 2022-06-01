

<?php $__env->startSection('title'); ?>
    عرض جميع العمليات
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    العمليات
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    عرض جميع العمليات
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th>#</th>
                <th>نوع العملية</th>
                <th>المبلغ</th>
                <th>السبب</th>
                <th>اسم المركز</th>
                <th>أضيف بواسطة</th>
                <th>تعديل</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($data) > 0): ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><?php echo e($value->id); ?></td>
                        <td> <?php echo e($value->operation_type == '1' ? 'دفع' : 'تحصيل'); ?> </td>
                        <td> <?php echo e($value->price); ?> </td>
                        <td> <?php echo e($value->reason); ?> </td>
                        <td> <a href="<?php echo e(route('center-details', ['id' => $value->company->id])); ?>"> <?php echo e($value->company->name); ?> </a> </td>
                        <td> <a href="<?php echo e(route('admin-details', ['id' => $value->user->id])); ?>"> <?php echo e($value->user->name); ?> </a> </td>

                        <td>
                            <a href="<?php echo e(route('operations.edit', ['id' => $value->id])); ?>"><i class="icon-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a class="do-delete" href="<?php echo e(route('operations.delete', ['id' => $value->id])); ?>"><i class="icon-database-remove"></i>
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