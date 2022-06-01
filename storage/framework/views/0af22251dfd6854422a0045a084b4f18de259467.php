<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.adminMessageShow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.adminMessages')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e(trans('admin.adminMessageShow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="panel panel-flat">
    <table class="table table-bordered table-hover datatable-highlight">
        <thead>
        <tr>
            <th>#</th>
            <th><?php echo e(trans('admin.userName')); ?></th>
            <th><?php echo e(trans('admin.adminsADEmail')); ?></th>
            <th><?php echo e(trans('admin.titleMessage')); ?></th>
            <th><?php echo e(trans('admin.dateMessage')); ?></th>
            <th><?php echo e(trans('admin.show')); ?></th>

            <th><?php echo e(trans('admin.delete')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($data) > 0): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <?php echo e($value->id); ?> </td>
                    <?php if( $value->user ): ?>
                        <td>
                            <a href="<?php echo e(route($value->user->user_type == 2 ? 'center-details' : 'admin-details', ['id' => $value->user->id])); ?>">
                                <?php echo e($value->user->name); ?>

                            </a>
                        </td>
                    <?php else: ?>
                        <td> <?php echo e($value->name); ?> </td>
                    <?php endif; ?>
                    <td> <?php echo e($value->email ? $value->email : '------'); ?> </td>
                    <td> <?php echo e($value->subject); ?> </td>
                    <td style="direction: rtl; text-align: right;"> <?php echo e($value->created_at->format('Y-m-d g:i A')); ?></td>

                    <td>
                        <a href="<?php echo e(route('admin-message-details', ['id' => $value->id])); ?>">
                            <i class="icon-tv" aria-hidden="true"></i>
                        </a>
                    </td>
                    
                        
                            
                        
                    
                    <td>
                        <a class="do-delete" href="<?php echo e(route('admin-message-delete', ['id' => $value->id])); ?>">
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