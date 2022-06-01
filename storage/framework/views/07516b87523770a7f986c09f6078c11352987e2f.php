<?php $__env->startSection('title'); ?>
    <?php echo trans('admin.adminMDet') . ' ' . $data->subject; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <a href="<?php echo e(route('admin-messages')); ?>"> <?php echo e(trans('admin.adminMessages')); ?> </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo trans('admin.adminMDet')  . ' : <span class="text-success">' . $data->subject . '</span>'; ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <div class="col-md-12">
        <div class="panel panel-flat">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <fieldset>
                    <div class="collapse in" id="demo1">

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.userName')); ?> </label>
                            <input type="text" class="form-control" readonly value="<?php echo e($data->user ? $data->user->name : $data->name); ?>">
                        </div>

                        <?php if( $data->email ): ?>
                            <div class="form-group">
                                <label> <?php echo e(trans('admin.adminsADEmail')); ?> </label>
                                <input type="text" class="form-control" readonly value="<?php echo e($data->email); ?>">
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.titleMessage')); ?> </label>
                            <input type="text" class="form-control" readonly value="<?php echo e($data->subject); ?>">
                        </div>


                        <div class="form-group">
                            <label> <?php echo e(trans('admin.message')); ?> </label>
                            <textarea id="editor1" rows="8" readonly class="form-control" placeholder=""> <?php echo e($data->body); ?> </textarea>
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.dateMessage')); ?> </label>
                            <input type="text" class="form-control" readonly value="<?php echo e($data->created_at->format('Y-m-d g:i A')); ?>">

                        </div>
                    </div>
                </fieldset>
                
                    
                        
                        
                    
                
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>