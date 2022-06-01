
<section class="slider mb-5 wow zoomIn">
    <div class="container-fluid">
        <div class="row">
            <div class="owl-carousel">
                <?php $__currentLoopData = $sliderImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <a href="<?php echo e($image->url); ?>" style="
                        position: absolute;
                        left: 30%;
                        top: 60%;
                    " class="btn bg-c5 font-18 py-2 px-5 text-white btn-hover rounded-0"> المزيد </a>

                            <img class="img-fluid" src="<?php echo e(url('/public/uploads/slider/' . $image->image)); ?>" alt="">
                       
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>