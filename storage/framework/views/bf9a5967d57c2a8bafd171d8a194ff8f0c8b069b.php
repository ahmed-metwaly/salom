<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.payedBalances')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.sideCommission')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e(trans('admin.payedBalances')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th> # </th>
                <th> المركز </th>
                <th> المبلغ المدفوع </th>
                <th> من أصل </th>
                <th>تاريخ السداد </th>
                <th>طباعة الفاتوره</th>
            </tr>
            </thead> 
            <tbody> 
            <?php if(count($data) > 0): ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($value->id); ?> </td>
                        <td> <a href="<?php echo e(route('center-details', ['id' => $value->company->id])); ?>"> <?php echo e($value->company->name); ?> </a></td>
                        <td> <?php echo e($value->payed); ?> ر.س </td>
                        <td> <?php echo e($value->base); ?> ر.س </td>
                        <td> <?php echo e($value->created_at->format('Y-m-d')); ?> </td>
                        <td> <a href="<?php echo e(route('commission-printCommissionPaying', $value->id)); ?>" > <i class="icon-printer"></i> </a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>