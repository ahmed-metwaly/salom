<?php $__env->startSection('title'); ?>
	<?php echo e(trans('admin.cityAdd')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
	<?php echo e(trans('admin.citiesTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
	<?php echo e(trans('admin.cityAdd')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="col-md-12">

		<form action="<?php echo e(route('cities.store')); ?>" method="post">

			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"> <?php echo e(trans('admin.cityData')); ?> </h5>
				</div>
				<div class="panel-body">
					<fieldset>
						<div class="collapse in" id="demo1">

							<div class="form-group">
								<label> <?php echo e(trans('admin.cityName')); ?> </label>
								<input type="text" name="city" value="<?php echo e(old('city')); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.cityName')); ?> ">
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








<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>