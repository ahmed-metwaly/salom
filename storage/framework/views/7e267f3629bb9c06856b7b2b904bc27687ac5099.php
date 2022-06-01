<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.sideCenterEdit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.sideCentersTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e(trans('admin.sideCenterEdit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-12">
        <form action="<?php echo e(route('do-active-center', ['id' => $data->id])); ?>" method="post" enctype="multipart/form-data">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> <?php echo e(trans('admin.centerDet')); ?> </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">
                            <div class="form-group">
                                <label> <?php echo e(trans('admin.sideAdminsName')); ?> </label>
                                <input type="text" readonly name="name" value="<?php echo e($data->name); ?>"  class="form-control" placeholder=" <?php echo e(trans('admin.sideAdminsName')); ?> ">
                            </div>

                            <div class="form-group">
                                <label> <?php echo e(trans('admin.adminsADEmail')); ?> </label>
                                <input type="email" readonly name="email" value="<?php echo e($data->email); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.adminsADEmail')); ?> ">
                            </div>

                            <div class="form-group">
                                <label> <?php echo e(trans('admin.adminsADPhone')); ?> </label>
                                <input type="text" readonly name="phone" value="<?php echo e($data->phone); ?>"  class="form-control" placeholder=" <?php echo e(trans('admin.adminsADPhone')); ?> ">
                            </div>

                            <div class="form-group">
                                <label> <?php echo e(trans('admin.adminsADLocationText')); ?> </label>
                                <input type="text" readonly name="location_text" value="<?php echo e($data->location_text); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.adminsADLocationText')); ?> ">
                            </div>

                            <div class="form-group">
                                <label><?php echo e(trans('admin.adminsADPhoto')); ?></label>
                                <input type="file" readonly name="photo" class="form-control">
                            </div>

                            <div class="form-group">
                                <img class="img-preview img-responsive" src="<?php echo e(url('public/uploads/users/' . $data->photo)); ?>">
                            </div>

                            <div class="form-group">
                                <label> حالة التفعيل </label>
                                <select data-placeholder="-- <?php echo e(trans('admin.SettingsSelect')); ?> --" name="admin_is_conf" class="select">
                                    <option value="1" <?php echo e($data->admin_is_conf == 1 ? 'selected' : ''); ?> > <?php echo e(trans('admin.settingsOpen')); ?> </option>
                                    <option value="0" <?php echo e($data->admin_is_conf == 0 ? 'selected' : ''); ?> > <?php echo e(trans('admin.settingsClose')); ?> </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> مدة التفعيل (شهر) </label>
                                <select data-placeholder="-- <?php echo e(trans('admin.activeDuration')); ?> --" name="duration" class="select">
                                    <option value="1" <?php echo e($data->duration == 1 ? 'selected' : ''); ?> > 1 </option>
                                    <option value="2" <?php echo e($data->duration == 2 ? 'selected' : ''); ?> > 2 </option>
                                    <option value="3" <?php echo e($data->duration == 3 ? 'selected' : ''); ?> > 3 </option>
                                    <option value="4" <?php echo e($data->duration == 4 ? 'selected' : ''); ?> > 4 </option>
                                    <option value="5" <?php echo e($data->duration == 5 ? 'selected' : ''); ?> > 5 </option>
                                    <option value="6" <?php echo e($data->duration == 6 ? 'selected' : ''); ?> > 6 </option>
                                    <option value="7" <?php echo e($data->duration == 7 ? 'selected' : ''); ?> > 7 </option>
                                    <option value="8" <?php echo e($data->duration == 8 ? 'selected' : ''); ?> > 8 </option>
                                    <option value="9" <?php echo e($data->duration == 9 ? 'selected' : ''); ?> > 9 </option>
                                    <option value="10" <?php echo e($data->duration == 10 ? 'selected' : ''); ?> > 10 </option>
                                    <option value="11" <?php echo e($data->duration == 11 ? 'selected' : ''); ?> > 11 </option>
                                    <option value="12" <?php echo e($data->duration == 12 ? 'selected' : ''); ?> > 12 </option>
                                    <option value="13" <?php echo e($data->duration == 13 ? 'selected' : ''); ?> > 13 </option>
                                    <option value="14" <?php echo e($data->duration == 14 ? 'selected' : ''); ?> > 14 </option>
                                    <option value="15" <?php echo e($data->duration == 15 ? 'selected' : ''); ?> > 15 </option>
                                    <option value="16" <?php echo e($data->duration == 16 ? 'selected' : ''); ?> > 16 </option>
                                    <option value="17" <?php echo e($data->duration == 17 ? 'selected' : ''); ?> > 17 </option>
                                    <option value="18" <?php echo e($data->duration == 18 ? 'selected' : ''); ?> > 18 </option>
                                    <option value="19" <?php echo e($data->duration == 19 ? 'selected' : ''); ?> > 19 </option>
                                    <option value="20" <?php echo e($data->duration == 20 ? 'selected' : ''); ?> > 20 </option>
                                    <option value="21" <?php echo e($data->duration == 21 ? 'selected' : ''); ?> > 21 </option>
                                    <option value="22" <?php echo e($data->duration == 22 ? 'selected' : ''); ?> > 22 </option>
                                    <option value="23" <?php echo e($data->duration == 23 ? 'selected' : ''); ?> > 23 </option>
                                    <option value="24" <?php echo e($data->duration == 24 ? 'selected' : ''); ?> > 24 </option>

                                </select>
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