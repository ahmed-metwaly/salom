<?php $__env->startSection('title'); ?>
	<?php echo e(trans('admin.dashboardTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
	<?php echo e(trans('admin.home')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
	<?php echo e(trans('admin.dashboardTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-lg-4">
			<a href="http://saaloon.com/dashboard/admins" target="_blanck">
			<div class="panel bg-teal-400">
				<div class="panel-body">
					<div class="heading-elements">

					</div>
					<h3 class="no-margin"><?php echo e($data['adminsCount']); ?></h3>
					عدد المديرين
				</div>
			</div>
			</a>
		</div>
		<div class="col-lg-4">
			<a href="http://saaloon.com/dashboard/admins/users" target="_blanck">
			<div class="panel bg-pink-400">
				<div class="panel-body">
					<h3 class="no-margin"><?php echo e($data['usersCount']); ?></h3>
					عدد المستخدمين
				</div>
			</div>
			</a>
		</div>
		<div class="col-lg-4">
			<a href="http://saaloon.com/dashboard/centers" target="_blanck">
			<div class="panel bg-grey-400">
				<div class="panel-body">
					<h3 class="no-margin"><?php echo e($data['centersCount']); ?></h3>
					عدد مراكز التجميل
				</div>
			</div>
			</a>
		</div>
		<div class="col-lg-4">
			<a href="http://saaloon.com/dashboard/orders/rejected" target="_blanck">
			<div class="panel bg-danger-400">
				<div class="panel-body">
					<h3 class="no-margin"><?php echo e($data['rejectedOrdersCount']); ?></h3>
					حجوزات مرفوضة
				</div>
			</div>
			</a>
		</div>
		<div class="col-lg-4">
			<a href="http://saaloon.com/dashboard/orders/pending" target="_blanck">
			<div class="panel bg-success-400">
				<div class="panel-body">
					<h3 class="no-margin"><?php echo e($data['pendingOrdersCount']); ?></h3>
					حجوزات في انتظار الموافقة
				</div>
			</div>
		</a>
		</div>
		<div class="col-lg-4">
			<a href="http://saaloon.com/dashboard/banks" target="_blanck">
			<div class="panel bg-violet-400">
				<div class="panel-body">
					<h3 class="no-margin"><?php echo e($data['banksCount']); ?></h3>
					الحسابات البنكية
				</div>
			</div>
			</a>
		</div>
		<div class="col-lg-4">
			<a href="http://saaloon.com/dashboard/admin-messages" target="_blanck">
			<div class="panel bg-indigo-400">
				<div class="panel-body">
					<h3 class="no-margin"><?php echo e($data['adminMessagesCount']); ?></h3>
					رسائل الإدارة
				</div>
			</div>
			</a>
		</div>
		<div class="col-lg-4">
			<a href="http://saaloon.com/dashboard/cities" target="_blanck">
			<div class="panel bg-orange-400">
				<div class="panel-body">
					<h3 class="no-margin"><?php echo e($data['citiesCount']); ?></h3>
					المدن
				</div>
			</div>
			</a>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>