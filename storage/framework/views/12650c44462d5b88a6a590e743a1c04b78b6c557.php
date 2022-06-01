

<?php $__env->startSection('title'); ?>
	<?php echo e(trans('admin.sideCentersShow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
	<?php echo e(trans('admin.sideAdminsTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
	<?php echo e(trans('admin.sideCentersShow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="panel panel-flat">
		<table class="table table-bordered table-hover datatable-highlight">
			<thead>
			<tr>
				
				<th><?php echo e(trans('admin.adminsADPhoto')); ?></th>
				<th><?php echo e(trans('admin.adminsADName')); ?></th>
				<th>تسجيل بواسطة</th>
				<th><?php echo e(trans('admin.adminsADPhone')); ?></th>
				<th><?php echo e(trans('admin.adminsADEmail')); ?></th>
				<th><?php echo e(trans('admin.centerADRating')); ?></th>
				<th><?php echo e(trans('admin.adminsADLocationText')); ?></th>
				<th>تفعيل الادارة</th>
				<th><?php echo e(trans('admin.edit')); ?></th>
				<th><?php echo e(trans('admin.delete')); ?></th>
			</tr>
			</thead>
			<tbody>

			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					
					<td> <img class="img-preview img-responsive" src="<?php echo e(url('public/uploads/users/' . $value->photo)); ?>"> </td>
					<td> <a href="<?php echo e(route('center-details', ['id' => $value->id])); ?>"><?php echo e($value->name); ?></a> </td>

					<td>
						<?php if($value->invited_by): ?>
							<a href="<?php echo e(route(getUserById($value->invited_by)->user_type == '2' ? 'center-details' : 'admin-details', ['id' => $value->invited_by])); ?>">
								<?php echo e(getUserById($value->invited_by)->name); ?>

							</a>
						<?php else: ?>
							-------
						<?php endif; ?>
					</td>

					<td> <?php echo e($value->phone); ?> </td>
					<td> <?php echo e($value->email); ?> </td>
					<td> <span class="text-success"> <?php echo e($value->ratings->count() ? $value->ratings->avg('stars_count') .'  نجوم' : '-------'); ?> </span></td>
					<td> <?php echo e($value->location_text); ?> - <?php echo e($value->city->city); ?> </td>
					<td> في انتظار الموافقة </td>
					<td>
						<a href="<?php echo e(route('active-center', ['id' => $value->id])); ?>">
							<i class="icon-pencil"></i>
						</a>
					</td>
					<td>
						<a class="do-delete" href="<?php echo e(auth()->user()->id == $value->id ?  '#' : route('center-delete', ['id' => $value->id])); ?>">
							<i class="<?php echo e(auth()->user()->id == $value->id ?  '' : 'icon-database-remove'); ?>"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script>
        $(document).ready(function() {
            $('.changeStatus').on( "click", function( ) {

                var thisBtn = $(this).children();
                var user_id = $(this).children().attr('data');
                var status = $(this).children().attr('status');
                var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

                $.ajax({
                    url: "<?php echo e(url('/')); ?>" + "/change-status" ,
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'user_id': user_id, 'status': status },
                })

				.done(function(reseived_data) {

					var parsed_data = $.parseJSON(reseived_data);

					if (parsed_data == '1') {

						if( thisBtn.attr('status') == '0' ){

							thisBtn.attr('status', '1');
							thisBtn.removeClass('icon-x').addClass('icon-check');
							thisBtn.parent().parent().prev().html('غير مفعل');
						}
						else if( thisBtn.attr('status') == '1' ){

							thisBtn.attr('status', '0');
							thisBtn.removeClass('icon-check').addClass('icon-x');
							thisBtn.parent().parent().prev().html('مفعل');
						}
					}
				});
            });
        });
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>