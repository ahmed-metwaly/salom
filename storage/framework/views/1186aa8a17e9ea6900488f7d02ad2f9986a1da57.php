<?php $__env->startSection('title'); ?>
    الخدمة المميزة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    الخدمات والمراكز المميزة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    الخدمة المميزة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">

    
        <div class="col-lg-2">
            <a href="<?php echo e(route('promotions.service.add')); ?>" class="btn btn-primary" style="margin: 20px 10px 20px 0;">اضافة خدمة مميزة
                <i class="icon-plus-circle2" style="top: 2px;"></i>
            </a>
        </div>
       

        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th> صورة الخدمة</th>
                <th> الخدمة </th>
                <th> السعر</th>
                <th> مركز التجميل </th>
                <th> تاريخ البدء </th>
                <th> تاريخ الانتهاء </th>
                <th>تغيير</th>
                <th><?php echo e(trans('admin.delete')); ?></th>
            </tr>
            </thead>
            <tbody>

           
            <?php if($promotions): ?>
                <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <img class="img-preview img-responsive" src="<?php echo e(url('public/uploads/services/' . $promotion->promotionable->photo)); ?>">
                        </td>
                        <td>
                            <a href="<?php echo e(route('service-details', ['id' => $promotion->promotionable->id])); ?>"> <?php echo e($promotion->promotionable->name); ?> </a>
                        </td>
                        <td><?php echo e($promotion->promotionable->price); ?></td>
                      
                        <td>
                            <a href="<?php echo e(route('center-details', ['id' => $promotion->promotionable->company->id])); ?>"> <?php echo e($promotion->promotionable->company->name); ?> </a>
                        </td>
                        <td><?php echo e($promotion->start_at); ?></td>
                        <td><?php echo e($promotion->end_at); ?></td>
                        <td>
                            <a href="<?php echo e(route('promotions.service.edit', ['id' => $promotion->id] )); ?>">
                                <i class="icon-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a class="do-delete" href="<?php echo e(route('promotions.service.delete', $promotion->id)); ?>">
                                <i class="icon-database-remove"></i>
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