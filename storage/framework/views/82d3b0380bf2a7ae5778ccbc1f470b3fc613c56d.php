<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.settingsTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.sideSettingsTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e(trans('admin.sideSettings')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="col-md-12">
    <form action="<?php echo e(route('settings-do-edit')); ?>" method="post">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title"> <?php echo e(trans('admin.settingsFormTitle')); ?> </h5>
            </div>
            <div class="panel-body">
                <fieldset>
                    <div class="collapse in" id="demo1">
                        <div class="form-group">
                            <label> <?php echo e(trans('admin.settingsSiteName')); ?> </label>
                            <input type="text" required name="name" value="<?php echo e($data->name); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.settingsSiteName')); ?> ">
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.settingsSitePhone')); ?> </label>
                            <input type="tel" required name="phone" value="<?php echo e($data->phone); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.settingsSitePhone')); ?> ">
                        </div>

                        <div class="form-group">
                                <label> اميل الموقع </label>
                                <input type="email" required name="email" value="<?php echo e($data->email); ?>" class="form-control">
                            </div>

                        <div class="form-group">
                            <label> فاكس الموقع </label>
                            <input type="text" name="fax" value="<?php echo e($data->fax); ?>" class="form-control" placeholder=" فاكس الموقع ">
                        </div>

                        <div class="form-group">
                            <label> العنوان </label>
                            <input type="text" name="address" value="<?php echo e($data->address); ?>" class="form-control" placeholder=" العنوان ">
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.settingsFb')); ?> </label>
                            <input type="text" name="facebook" value="<?php echo e($data->facebook); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.settingsFb')); ?> ">
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.settingsTw')); ?> </label>
                            <input type="text" name="twitter" value="<?php echo e($data->twitter); ?>" class="form-control" placeholder="<?php echo e(trans('admin.settingsTw')); ?>">
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.settingsGo')); ?> </label>
                            <input type="text" name="google_plus" value="<?php echo e($data->google_plus); ?>" class="form-control" placeholder="<?php echo e(trans('admin.settingsGo')); ?>">
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.settingsInst')); ?> </label>
                            <input type="text" name="instagram" value="<?php echo e($data->instagram); ?>" class="form-control" placeholder="<?php echo e(trans('admin.settingsInst')); ?>">
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.settingsYout')); ?> </label>
                            <input type="text" name="youtube" value="<?php echo e($data->youtube); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.settingsYout')); ?>  ">
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.settingsPinterest')); ?> </label>
                            <input type="text" name="pinterest" value="<?php echo e($data->pinterest); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.settingsPinterest')); ?>  ">
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.settingsSnapchat')); ?> </label>
                            <input type="text" name="snapchat" value="<?php echo e($data->snapchat); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.settingsSnapchat')); ?>  ">
                        </div>

                        <div class="form-group">
                            <label> <?php echo e(trans('admin.SettingsStatus')); ?> </label>
                            <select required data-placeholder="-- <?php echo e(trans('admin.SettingsSelect')); ?> --" name="status" class="select">

                                <option value="1" <?php echo e($data->status == 1 ? 'selected' : ''); ?> > <?php echo e(trans('admin.SettingsStatusOpen')); ?> </option>

                                <option value="0" <?php echo e($data->status == 0 ? 'selected' : ''); ?> > <?php echo e(trans('admin.SettingsStatusClose')); ?> </option>

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
    <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>