<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.servicesEdit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/bootstrap-fileinput.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_header'); ?>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(route('companyDashboard')); ?>"><?php echo e(trans('admin.dashboardTitle')); ?></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo e(route('services.index')); ?>"><?php echo e(trans('admin.servicesIndex')); ?></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span><?php echo e(trans('admin.servicesEdit')); ?></span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> <?php echo e(trans('admin.servicesIndex')); ?>

        <small>تعديل خدمة</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::model($service, ['method' => 'PATCH', 'url' => route('services.update', $service->id),'class' => 'form-horizontal', 'files' => 'true' ]); ?>


    <div class="row">
        <div class="col-lg-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> البيانات الرئيسية</span>
                    </div>
                </div>
                <div class="portlet-body form">

                    <div class="form-body">

                        <div class="form-group ">
                            <label class="control-label col-lg-3">الصورة</label>
                            <div class="col-lg-9">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <?php if( $service->photo ): ?>
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 330px; height: 150px;">
                                            <img src="<?php echo e($url = URL::to('/'). '/public/uploads/services/' . $service->photo); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <span class="btn red btn-outline btn-file">
                                            <span class="fileinput-new"> تغيير الصورة </span>
                                            <span class="fileinput-exists"> تغيير </span>
                                            <input type="file" name="photo" accept="image/*">
                                        </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-lg-3 control-label">اسم الخدمة</label>
                            <div class="col-lg-9">
                                <input id="name" name="name" value="<?php echo e($service->name); ?>" type="text" class="form-control" placeholder="اسم الخدمة">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="interval" class="col-lg-3 control-label">مدة الخدمة</label>
                            <div class="col-lg-9">
                                <input id="interval" name="interval" value="<?php echo e($service->interval); ?>" type="number" class="form-control" placeholder="المدة بالدقيقة" step="5" min="5" max="500">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-lg-3 control-label">سعر الخدمة</label>
                            <div class="col-lg-9">
                                <input id="price" name="price" type="number" value="<?php echo e($service->price); ?>" class="form-control" placeholder="سعر الخدمة" step="0.50" min="0.50" max="100000">
                            </div>
                        </div>

                        
                            
                            
                                
                            
                        

                        <div class="form-group">
                            <label for="description" class="col-lg-3 control-label">وصف الخدمة</label>
                            <div class="col-lg-9">
                                <textarea id="description" name="description" class="form-control autosizeme" rows="4" placeholder="وصف الخدمة .."><?php echo e($service->description); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            
                
                    
                        
                            
                            
                        
                    
                    

                        
                            
                                
                                
                                    
                                        
                                            
                                            
                                                
                                                
                                                
                                            
                                        
                                    
                                
                            

                        
                    
                
            
            <div class="row">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="icon-settings font-green-sharp"></i>
                            <span class="caption-subject bold uppercase"> الخدمة المنزلية</span>
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <div class="form-body">

                            <div class="form-group">
                                <div class="col-lg-4">
                                    <label class="control-label">متوفر خدمة منزلية</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="checkbox" <?php echo e($service->is_home ? 'checked' : ''); ?> name="is_home" class="make-switch" data-on-color="success" data-off-color="danger" data-size="mini" data-on-text="نعم" data-off-text="لا">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-lg-4">
                                    <label class="control-label">خدمة اليوم الواحد</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="checkbox" <?php echo e($service->one_day == 1 ? 'checked' : ''); ?> name="one_day" class="make-switch" data-on-color="success" data-off-color="danger" data-size="mini" data-on-text="نعم" data-off-text="لا">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="portlet light bordered">
            <div class="portlet-body form">
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <button type="submit" class="btn green btn-block">حفظ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(URL::asset('public/company/js/bootstrap-fileinput.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/autosize.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/bootstrap-maxlength.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/components-form-tools.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('company.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>