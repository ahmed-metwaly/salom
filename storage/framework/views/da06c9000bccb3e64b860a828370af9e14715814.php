<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.servicesOneShow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/blog-rtl.min.css')); ?>">
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
                <span><?php echo e(trans('admin.servicesOneShow')); ?></span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> <?php echo e(trans('admin.servicesShow')); ?>

        <small><?php echo e(trans('admin.servicesOneShow')); ?></small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="blog-page blog-content-2">
        <div class="row">
            <div class="col-lg-9">
                <div class="blog-single-content bordered blog-container">
                    <div class="blog-single-head">
                        <h1 class="blog-single-head-title"><?php echo e($service->name); ?></h1>
                        <div class="blog-single-head-date mb-10" style="margin-bottom: 20px;">
                            <span class="label label-sm label-danger" style="margin-left: 5px;"> السعر: <?php echo e($service->price); ?> ر.س </span>
                            <span class="label label-sm label-primary" >المدة: <?php echo e($service->interval); ?> دقيقة</span>
                            
                            <?php if($service->is_home): ?>
                                <span  style="margin-left: 5px;" class="label label-sm label-success"  > متوفر خدمة منزلية </span>
                            <?php endif; ?>
                            <?php if($service->one_day == 1): ?>
                                <span class="label label-sm label-info">خدمة اليوم الواحد</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="blog-single-img">
                        <img style="width: 40%; display: block;margin: auto auto;" src="<?php echo e($url = URL::to('/'). '/public/uploads/services/' . $service->photo); ?>"> </div>
                    <div class="blog-single-desc">
                        <p> <?php echo e($service->description); ?> </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="blog-single-sidebar bordered blog-container">
                    <div class="blog-single-sidebar-tags">
                        <h3 class="blog-sidebar-title uppercase">أيام عمل الخدمة</h3>
                        <ul class="blog-post-tags">
                            <?php if( $workHours ): ?>
                                <?php $__currentLoopData = $workHours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workHour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="uppercase" style="margin: 0 0 25px 5px;">
                                        <a> <?php echo e($workHour->day->day); ?>

                                            : <?php echo e(date('g:i A', strtotime( $workHour->time_from ))); ?>

                                            إلى <?php echo e(date('g:i A', strtotime( $workHour->time_to ))); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('company.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>