
<section class="special bg-0a">

    <div class="container">
        <div class="row text-center">

            <?php if(isset($specialService->id) && $specialService-> id != NULL): ?>


                <div class="col-md col-sm-12">
                    <?php if(isset($specialService) && $specialService != null) { ?>
                    <img class="card-img-top wow fadeIn" data-wow-duration="1s" src="<?php echo e(url('public/uploads/services/' . $specialService->promotionable->photo )); ?>" alt="<?php echo e($specialService->promotionable->name); ?>">

                    <?php } ?>

                </div>

                <div class="col-md col-sm-12 d-flex align-items-center justify-content-center">
                    <?php if(isset($specialService) && $specialService != null) { ?>

                    <a href="<?php echo e(route('web.services.show', Hashids::encode( $specialService->promotionable->id ))); ?>">

                        <h1 class="text-white mb-4 font-weight-bold mt-5 wow lightSpeedIn">خدمة مميزة (  <?php echo e($specialService->promotionable->name); ?> )</h1>

                        <?php } ?>
                        <span class="btn border text-white px-5 py-3 font-24 font-weight-bold mt-2 mb-5 wow lightSpeedIn btn-hover2 rounded-0">تصفحيها الأن</span>
                    </a>
                </div>

            <?php else: ?>



            <div class="col-md col-sm-12">
                <?php if(isset($mostReservedService) && $mostReservedService != null) { ?>
                <img class="card-img-top wow fadeIn" data-wow-duration="1s" src="<?php echo e(url('public/uploads/services/' .  $mostReservedService->photo)); ?>" alt="<?php echo e($mostReservedService->name); ?>">

                <?php } ?>

            </div>

            <div class="col-md col-sm-12 d-flex align-items-center justify-content-center">
                <?php if(isset($mostReservedService) && $mostReservedService != null) { ?>

                <a href="<?php echo e(route('web.services.show', Hashids::encode( $mostReservedService->id ))); ?>">

                    <h1 class="text-white mb-4 font-weight-bold mt-5 wow lightSpeedIn">خدمة مميزة ( <?php echo e($mostReservedService->name); ?> )</h1>

                      <?php } ?>
                    <span class="btn border text-white px-5 py-3 font-24 font-weight-bold mt-2 mb-5 wow lightSpeedIn btn-hover2 rounded-0">تصفحيها الأن</span>
                </a>
            </div>


            <?php endif; ?>       


        </div>
    </div>
</section>