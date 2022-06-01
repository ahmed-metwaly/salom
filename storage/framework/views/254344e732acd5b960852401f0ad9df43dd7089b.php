<?php $__env->startSection('title'); ?>
	<?php echo e(trans('admin.sideAdminsAdd')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
	<?php echo e(trans('admin.sideAdminsTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
	<?php echo e(trans('admin.sideAdminsAdd')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="col-md-12">
		<form action="<?php echo e(route('admin-do-add')); ?>" method="post" enctype="multipart/form-data">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"> <?php echo e(trans('admin.adminNewAdminTitle')); ?> </h5>
				</div>
				<div class="panel-body">
					<fieldset>
						<div class="collapse in" id="demo1">

							<div class="form-group">
								<label>الصورة الشخصية</label>
								<input type="file" name="photo" class="form-control" required>
							</div>

							<div class="form-group">
								<label> <?php echo e(trans('admin.sideAdminsName')); ?> </label>
								<input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.sideAdminsName')); ?> ">
							</div>

							<div class="form-group">
								<label> <?php echo e(trans('admin.adminsADEmail')); ?> </label>
								<input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.adminsADEmail')); ?> ">
							</div>

							<div class="form-group">
								<label> <?php echo e(trans('admin.adminsADPhone')); ?> </label>
								<input type="text" name="phone" value="<?php echo e(old('phone')); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.adminsADPhone')); ?> ">
							</div>

							<div class="form-group">
								<label><?php echo e(trans('admin.adminsADPassword')); ?></label>
								<input type="password" name="password" class="form-control" placeholder="****">
							</div>

							<div class="form-group">
								<label><?php echo e(trans('admin.adminsADRePassword')); ?></label>
								<input type="password" name="password_con" class="form-control" placeholder="****">
							</div>

							<div class="form-group">
								<label> <?php echo e(trans('admin.adminsADIsAdmin')); ?> </label>
								<select id="is-admin" data-placeholder="-- <?php echo e(trans('admin.SettingsSelect')); ?> --" name="is_admin" class="select">
									<option value="0">-- <?php echo e(trans('admin.SettingsSelect')); ?> --</option>
									<option value="1"> <?php echo e(trans('admin.sAdmin')); ?> </option>
									<option value="0"> <?php echo e(trans('admin.lAdmin')); ?> </option>
								</select>
							</div>

							<div class="form-group" id="level">
								<label> <?php echo e(trans('admin.adminsADLevel')); ?> </label>
								<select data-placeholder="-- <?php echo e(trans('admin.SettingsSelect')); ?> --"  name="group_id" class="form-control" >
									<option value="0">-- <?php echo e(trans('admin.SettingsSelect')); ?> --</option>
									<?php if(count($groups) > 0): ?>
										<?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($group->id); ?>"> <?php echo e($group->name); ?> </option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</select>
								<label> الكود التعريفي </label>
								<input type="text" name="id_number" class="form-control" placeholder="#1234">

							</div>

							<div class="form-group">
								<label> <?php echo e(trans('admin.adminsADStatus')); ?> </label>
								<select data-placeholder="-- <?php echo e(trans('admin.SettingsSelect')); ?> --" name="status" class="select">
									<option value="1"> <?php echo e(trans('admin.settingsOpen')); ?> </option>
									<option value="0"> <?php echo e(trans('admin.settingsClose')); ?> </option>
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

<?php $__env->startSection('script'); ?>
	<script>

        $("#level").hide();

        //		$('#is_admin').change(function(){
//			var id = $(this).val();
//			if(id==1){
////				$('#group_id').html('<option> جارى التحميل ...</option>');
//				$('#group_id').removeAttr('style');
//			}
//		});
	</script>
<?php $__env->stopSection(); ?>;

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>