<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-fixed">
	<div class="sidebar-content">

		<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div class="media">
					<a href="<?php echo e(route('dashboard')); ?>" class="media-left">
						<img src="<?php echo e(url('public/images/businessman.png')); ?>" class="img-circle img-sm" alt=""></a>
					<div class="media-body">
							<span class="media-heading text-semibold">
								<?php if(auth()->check()): ?>
									<?php echo e(auth()->user()->name); ?>

								<?php endif; ?>
							</span>
						<div class="text-size-mini text-muted">
						</div>
					</div>

					
						
							
								
							
						
					
				</div>
			</div>
		</div>
		<!-- /user menu -->


		<!-- Main navigation -->
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">
					<!-- Main -->
					<li class="navigation-header"><span> </span> <i class="icon-menu" title="Main pages"></i></li>
					<?php
						$menu = menu();
					?>
					<?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<a href="#"><i class="<?php echo e($items['icon']); ?>"></i> <span> <?php echo e($items['title']); ?> </span></a>
							<ul>
								<?php $__currentLoopData = $items['route']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li class="<?php echo e(Request::url() == route($route) ? 'active' : ''); ?>">
										<a href="<?php echo e(route($route)); ?>"> <?php echo $title; ?> </a>
									</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</div>
		<!-- /main navigation -->

	</div>
</div>
<!-- /main sidebar -->
