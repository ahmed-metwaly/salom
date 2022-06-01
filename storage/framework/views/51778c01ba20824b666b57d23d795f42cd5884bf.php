<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.ordersDetailsShow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.owedBalances')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e(trans('admin.ordersDetailsShow')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th> رقم الحجز </th>
                <th> مركز التجميل</th>
                <th> تاريخ الحجز</th>
                <th> وقت الحجز</th>
                <th>سعر الحجز </th>
                <th>عدد الخدمات المحجوزة</th>
                <th>صاحب الحجز</th>
                <th>صورة إيصال الدفع</th>
                <th>عرض تفاصيل الخدمات المحجوزة</th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($data) > 0): ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($value->id); ?> </td>
                        <td> <a href="<?php echo e(route('center-details', ['id' => $value->company->id])); ?>"> <?php echo e($value->company->name); ?> </a></td>
                        <td> <?php echo e($value->formatted_date); ?> </td>
                        <td> <?php echo e($value->formatted_time); ?> </td>
                        <td> <?php echo e($value->total_price); ?> ر.س </td>
                        <td>( <?php echo e($value->services_count); ?> )  خدمات</td>
                        <td> <a href="<?php echo e(route('admin-details', ['id' => $value->user->id])); ?>"> <?php echo e($value->user->name); ?> </a></td>
                        <td>
                            <a href="<?php echo e(url('/'). '/public/uploads/orders/'. $value->payment->paper); ?>" target="_blank">
                                <img class="img-preview img-responsive" src="<?php echo e(url('public/uploads/orders/' . $value->payment->paper)); ?>">
                            </a>
                        </td>

                        <td>
                            <a href="<?php echo e(route('order-services', ['id' => $value->id])); ?>">
                                <i class="icon-tv"></i>
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