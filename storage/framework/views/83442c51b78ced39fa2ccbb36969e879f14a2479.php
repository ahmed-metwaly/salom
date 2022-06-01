<?php $__env->startSection('title'); ?>
    لوحة التحكم
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(route('companyDashboard')); ?>"><?php echo e(trans('admin.dashboardTitle')); ?></a>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> الإحصائيات
        <small>عرض الإحصائيات</small>
    </h1>

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo e(route('company-waiting-orders')); ?>">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span><?php echo e($newOrdersCount); ?></span>
                    </div>
                    <div class="desc">  حجوزات في انتظار الموافقة </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo e(route('company-done-orders')); ?>">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span><?php echo e($doneOrders); ?></span>
                    </div>
                    <div class="desc"> حجوزات منتهية </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 yellow-mint">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span><?php echo e($notDoneOrdersCount); ?></span>
                    </div>
                    <div class="desc"> حجوزات لم تتم </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple">
                <div class="visual">
                    <i class="fa fa-usd"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span><?php echo e($sumOrders); ?></span>
                    </div>
                    <div class="desc"> سعر جميع الحجوزات المنتهية </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 grey-mint" href="<?php echo e(route('services.index')); ?>">
                <div class="visual">
                    <i class="icon-puzzle"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span><?php echo e($activeServicesCount); ?></span>
                    </div>
                    <div class="desc"> عدد الخدمات المفعلة </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 yellow-casablanca" href="<?php echo e(route('services.index')); ?>">
                <div class="visual">
                    <i class="fa fa-ban"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span><?php echo e($disabledServicesCount); ?></span>
                    </div>
                    <div class="desc"> عدد الخدمات الموقوفة من قبل الإدارة </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red-pink" <?php echo e($mostReservedService ? 'href='.route('services.show', $mostReservedService->id) : ''); ?>>
                <div class="visual">
                    <i class="fa fa-cart-plus"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span style="font-size: 14px;"><?php echo e($mostReservedService ? $mostReservedService->name : 'لا يوجد'); ?></span>
                    </div>
                    <div class="desc"> أكثر الخدمات حجزًا </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo e(route('banks.index')); ?>">
                <div class="visual">
                    <i class="fa fa-bank"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span><?php echo e($banksCount); ?></span>
                    </div>
                    <div class="desc"> عدد الحسابات البنكية </div>
                </div>
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('company.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>