<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.sideUserEdit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.sideAdminsTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e(trans('admin.sideUserEdit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-12">
        <form action="<?php echo e(route('admin-do-edit', ['id' => $data->id])); ?>" method="post" enctype="multipart/form-data">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> <?php echo e(trans('admin.adminEditUserTitle')); ?> </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="form-group">
                            <img class="img-header img-preview img-thumbnail pull-left" src="<?php echo e(starts_with($data->photo, 'http') ? $data->photo : url("/public/uploads/users/". $data->photo)); ?>">
                        </div>
                        <div class="clear-fix" style="display: block; clear: both;"></div>
                        <br>
                        <br>

                        <div class="collapse in" id="demo1">

                            <div class="form-group">
                                <label>تغيير الصورة الشخصية</label>
                                <input type="file" name="photo" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> <?php echo e(trans('admin.sideAdminsName')); ?> </label>
                                <input type="text" name="name" value="<?php echo e($data->name); ?>"  class="form-control" placeholder=" <?php echo e(trans('admin.sideAdminsName')); ?> ">
                            </div>

                            <div class="form-group">
                                <label> <?php echo e(trans('admin.adminsADEmail')); ?> </label>
                                <input type="email" name="email" value="<?php echo e($data->email); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.adminsADEmail')); ?> ">
                            </div>

                            <div class="form-group">
                                <label> <?php echo e(trans('admin.adminsADPhone')); ?> </label>
                                <input type="text" name="phone" value="<?php echo e($data->phone); ?>"  class="form-control" placeholder=" <?php echo e(trans('admin.adminsADPhone')); ?> ">
                            </div>

                            
                                
                                
                            

                            
                                
                                
                            

                            
                                
                                
                            

                            
                                
                            

                            
                                
                                
                                        
                                    
                                        

                                            

                                        
                                    
                                
                            

                            
                                
                                
                                        
                                    
                                        

                                            

                                        
                                    
                                
                            

                            <div class="form-group">
                                <label> <?php echo e(trans('admin.adminsADIsAdmin')); ?> </label>
                                <select id="is-admin" data-placeholder="-- <?php echo e(trans('admin.SettingsSelect')); ?> --" name="is_admin"
                                        class="select">
                                    <option value="0">-- <?php echo e(trans('admin.SettingsSelect')); ?> --</option>
                                    <option value="1" <?php echo e($data->is_admin == 1 ? 'selected' : ''); ?> > <?php echo e(trans('admin.sAdmin')); ?> </option>
                                    <option value="0" <?php echo e($data->is_admin == 0 ? 'selected' : ''); ?> > <?php echo e(trans('admin.lAdmin')); ?> </option>
                                </select>
                            </div>
                            <?php $groups = Groups(); ?>

                            <div class="form-group" id="level" style="display:none;">
                                <label> مستوى الإدارة </label>
                                <select data-placeholder="-- <?php echo e(trans('admin.SettingsSelect')); ?> --" name="group_id" class="select">
                                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($group->id); ?>" <?php echo e($data->group_id == $group->id ? 'selected' : ''); ?> ><?php echo e($group->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                
                                	<label> الكود التعريفي </label>
								<input type="text" name="id_number" value="<?php echo e($data->id_number); ?>" class="form-control" placeholder="#1234">

                            </div>

                            <div class="form-group">
                                <label> <?php echo e(trans('admin.adminsADStatus')); ?> </label>
                                <select data-placeholder="-- <?php echo e(trans('admin.SettingsSelect')); ?> --" name="status"
                                        class="select">
                                    <option value="1" <?php echo e($data->status == 1 ? 'selected' : ''); ?> > <?php echo e(trans('admin.settingsOpen')); ?> </option>
                                    <option value="0" <?php echo e($data->status == 0 ? 'selected' : ''); ?> > <?php echo e(trans('admin.settingsClose')); ?> </option>
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
        <!-- /a legend -->

    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>

        $(document).ready(function () {
            
            

            if(<?php echo e($data->is_admin); ?>==1) {
    	        $('#level').removeAttr('style');
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>