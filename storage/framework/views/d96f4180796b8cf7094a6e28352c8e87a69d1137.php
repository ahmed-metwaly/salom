<?php $__env->startSection('top_header'); ?>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
	<?php echo e(trans('admin.loginPageTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<!-- Simple login form -->
	<form action="<?php echo e(url('login-admin')); ?>" method="post">
		<div class="panel panel-body login-form">
			<div class="text-center">
				<div class="overflow-hidden">
					<img style="width: 250px;height: auto;" src="<?php echo e(url('public/images/logo.png')); ?>" alt="وسائل الشبكة"></div>
				<h5 class="content-group"> <?php echo e(trans('admin.loginPageTitle')); ?> </h5>

				<?php if(Session::has('mOk')): ?>

					<div class="alert alert-success alert-styled-left">
						<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
						<?php echo e(Session::get('mOk')); ?>

					</div>
				<?php endif; ?>

				<?php if(Session::has('mNo')): ?>
					<h5 class="has-error error red">
						<small style="color: red"> <?php echo e(Session::get('mNo')); ?> </small>
					</h5>
				<?php endif; ?>

			</div>

			<div class="form-group has-feedback has-feedback-left  <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">

				<input type="email" name="email" required class="form-control"
				       placeholder="<?php echo e(trans('admin.loginEmail')); ?>" value="<?php echo e(old('email')); ?>">

				<div class="form-control-feedback">
					<i class="icon-user text-muted"></i>
				</div>

				<?php if($errors->has('email')): ?>
					<span class="help-block">
						<strong><?php echo e($errors->first('email')); ?></strong>
					</span>
				<?php endif; ?>

			</div>

			<div class="form-group has-feedback has-feedback-left <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">

				<input type="password" name="password" required class="form-control"
				       placeholder="<?php echo e(trans('admin.loginPassword')); ?>">
				<div class="form-control-feedback">
					<i class="icon-lock2 text-muted"></i>
				</div>
				<?php if($errors->has('password')): ?>
					<span class="help-block">
						<strong><?php echo e($errors->first('password')); ?></strong>
					</span>
				<?php endif; ?>
			</div>
			<?php echo csrf_field(); ?>



			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block"> <?php echo e(trans('admin.loginSubmit')); ?> <i
							class="icon-circle-left2 position-right"></i></button>
			</div>

			<div class="text-center">
				<a href="<?php echo e(url('login-admin-forget')); ?>"> <?php echo e(trans('admin.loginForget')); ?> </a>
			</div>
		</div>
	</form>
	<!-- /simple login form -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.auth.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>