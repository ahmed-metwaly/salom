
<section class="best mt-5 bg-f6 py-5">
    <div class="container text-center">
        <h2 class="color-c5 wow fadeIn">افضل مراكز التجميل</h2>
        <img class="img-fluid wow fadeIn" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
        <p class="color-777 mt-2 mb-5 wow fadeIn">تصفحى العديد من مراكز التجميل الممتازة</p>
        <div class="row mb-3">
            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 col-sm-12 wow fadeInDown" data-wow-duration="1s">
                    <a href="<?php echo e(route('web.companies.show', Hashids::encode($company->id))); ?>">
                        <div class="card border-0 rounded-0 mb-5 mb-md-0 text-center bg-white">
                            <hr class="mx-auto card-hr bg-c5 m-0 position-absolute">
                            <div class="card-block px-4 mt-5 mb-4 w-100 position-absolute">
                                <h4 class="card-title color-c5"><?php echo e($company->name); ?></h4>
                                <p class="card-text color-777 font-weight-bold px-1"><?php echo e($company->location_text); ?>, <?php echo e($company->city); ?></p>
                            </div>
                            <div class="card-img-top rounded-0 position-absolute">
                                <img class="img-fluid trans" src="<?php echo e(url('public/uploads/users/' . $company->photo)); ?>" alt="<?php echo e($company->name); ?>">
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
            
        

    </div>
</section>