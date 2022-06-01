<?php $__env->startSection('title'); ?>
    أفضل مراكز التجميل
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    الخدمات والمراكز المميزة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    أفضل مراكز التجميل
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">

        <div class="col-lg-2">
            <a href="<?php echo e(route('promotions.companies.create')); ?>" class="btn btn-primary" style="margin: 20px 10px 20px 0;">إضافة 
                <i class="icon-plus-circle2" style="top: 2px;"></i>
            </a>
        </div>

        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th><?php echo e(trans('admin.adminsADPhoto')); ?></th>
                <th><?php echo e(trans('admin.adminsADName')); ?></th>
                <th><?php echo e(trans('admin.adminsADPhone')); ?></th>
                <th><?php echo e(trans('admin.adminsADEmail')); ?></th>
                <th><?php echo e(trans('admin.centerADRating')); ?></th>
                <th><?php echo e(trans('admin.adminsADLocationText')); ?></th>
                <th> عرض من </th>
                <th> ينتهى فى </th>
                <th> مكان المركز  </th>
                <th><?php echo e(trans('admin.show')); ?></th>
                <th><?php echo e(trans('admin.edit')); ?></th>
                <th><?php echo e(trans('admin.delete')); ?></th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <img class="img-preview img-responsive" src="<?php echo e(url('public/uploads/users/' . $promotion->promotionable->photo)); ?>"> </td>
                    <td> <a href="<?php echo e(route('center-details', ['id' => $promotion->promotionable->id])); ?>"><?php echo e($promotion->promotionable->name); ?></a> </td>
                    <td> <?php echo e($promotion->promotionable->phone); ?> </td>
                    <td> <?php echo e($promotion->promotionable->email); ?> </td>
                    <td> <span class="text-success"> <?php echo e($promotion->promotionable->ratings->count() ? $promotion->promotionable->ratings->avg('stars_count') .'  نجوم' : '-------'); ?> </span></td>
                    <td> <?php echo e($promotion->promotionable->location_text); ?> </td>
                    <td><?php echo e($promotion->start_at); ?></td>
                    <td><?php echo e($promotion->end_at); ?></td>
                    <td>
                        <?php if( $promotion->priority == 1): ?>
                            على اليمين
                        <?php elseif( $promotion->priority == 2): ?>
                            فى المنتصف
                        <?php else: ?>
                            على اليسار
                        <?php endif; ?>        
                    </td>
                    <td>
                        <a href="<?php echo e(route('center-details', ['id' => $promotion->promotionable->id])); ?>">
                            <i class="icon-tv"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo e(route('promotions.companies.edit', ['id' => $promotion->id])); ?>">
                            <i class="icon-pencil"></i>
                        </a>
                    </td>
                    <td>
						<a class="do-delete" href="<?php echo e(route('promotions.delete', ['id' => $promotion->id])); ?>"><i class="icon-database-remove"></i>
                        </a>
					</td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>