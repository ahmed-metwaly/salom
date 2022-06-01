

<?php $__env->startSection('title'); ?>
    ساعات عمل الخدمة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/bootstrap-timepicker.min.css')); ?>">
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
                <span>ساعات عمل الخدمة</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> ساعات عمل الخدمة</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-10">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                <?php echo Form::open( ['method' => 'POST', 'url' => route('works.services.store', $serviceId),'class' => 'form-horizontal']); ?>


                    <div class="form-body">

                        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div style="margin-bottom: 40px">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="col-lg-12">اليوم</label>
                                        <div class="md-checkbox-inline col-lg-12">
                                            <div class="md-checkbox col-md-3" style="margin-bottom: 10px;">
                                                <input id="<?php echo e($day->id); ?>" name="days[]" type="checkbox" value="<?php echo e($day->id); ?>" class="md-check">
                                                <label for="<?php echo e($day->id); ?>">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> <?php echo e($day->day); ?>

                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-repeater">
                                    <div data-repeater-list="<?php echo e($day->en_day); ?>">

                                        <div data-repeater-item class="mt-repeater-item mt-overflow">
                                            <div class="mt-repeater-cell">
                                                <div class="col-lg-3">
                                                    <label for="time_from" class="col-lg-12 ">من الساعة</label>
                                                    <div class="col-lg-12 input-group" style="padding-right: 15px;">
                                                        <input value=" " name="time_from" type="text" class="form-control timepicker timepicker-24">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-clock-o"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="time_to" class="col-lg-12">إلى الساعة</label>
                                                    <div class="col-lg-12 input-group" style="padding-right: 15px;">
                                                        <input value=" " name="time_to"  type="text" class="form-control timepicker timepicker-24">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-clock-o"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="col-lg-12">أقصى عدد حجوزات للفترة</label>
                                                    <div class="col-lg-12 input-group" style="padding-right: 15px;">
                                                        <input name="orders_count_per_interval" type="number" class="form-control" placeholder="أقصى عدد حجوزات" step="1" min="1" max="50">
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <label style="visibility: hidden" class="col-lg-12">إزالة</label>
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline">
                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
                                        <i class="fa fa-plus"></i> أضف فترة دوام أخرى
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <button type="submit" class="btn green btn-block">حفظ</button>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(URL::asset('public/company/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/bootstrap-timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/components-date-time-pickers.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('public/company/js/jquery.repeater.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/form-repeater.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('company.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>