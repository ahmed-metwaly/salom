<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.sliderImagesEdit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.sliderShow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e(trans('admin.sliderImagesEdit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-12">
        <form action="<?php echo e(route('sliders-update', ['id' => $data->id])); ?>" method="post" enctype="multipart/form-data">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> <?php echo e(trans('admin.rowData')); ?> </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">

                            <div class="form-group">
                                <label><?php echo e(trans('admin.sliderMainImage')); ?></label>
                                <img class="img-preview img-responsive" src="<?php echo e(url('/public/uploads/slider/' . $data->image)); ?>">
                            </div>

                            <div class="form-group">
                                <label><?php echo e(trans('admin.sliderMainImageChange')); ?></label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> الرابط </label>
                                <input type="text" name="url" class="form-control">
                            </div>

                        </div>
                    </fieldset>

                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"> <?php echo e(trans('admin.save')); ?> <i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>