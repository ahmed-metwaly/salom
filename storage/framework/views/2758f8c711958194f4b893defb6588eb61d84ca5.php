<?php $__env->startSection('title'); ?>
    <?php echo e($service->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h3 color-c5 font-weight-bold "> <?php echo e($service->name); ?> </h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h5 color-c5 font-weight-bold" href="<?php echo e(route('home')); ?>">الرئيسية / </a>
                        <a class="h5 color-c5 font-weight-bold" href="<?php echo e(route('web.companies.show', Hashids::encode($service->company->id))); ?>"><?php echo e($service->company->name); ?> / </a>
                        <span class="h5 color-c5 font-weight-bold"><?php echo e($service->name); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="center">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown" data-wow-duration="2s">
                <h2 class="color-c5">
                    <?php echo e($service->name); ?>/
                    <a class="color-c5" href="<?php echo e(route('web.companies.show', Hashids::encode($service->company->id))); ?>"><?php echo e($service->company->name); ?></a>
                </h2>
                <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
            </div>
            <div class="row my-5">
                <div class="col-12 mb-5 img-center wow zoomIn" data-wow-duration="2s" style='background: url("<?php echo e(url('public/uploads/services/' . $service->photo)); ?>") no-repeat center center'></div>

                <div class="col-md-6 col-sm-12 mb-md-0 mb-5">
                    <div class="bg-f6 p-4 font-24 wow fadeInRight" data-wow-duration="2s">
                        <div class="serv-price bg-danger p-2">
                            <span class="text-left text-white h5"><?php echo e($service->price); ?> ر.س </span>
                        </div>
                        <h4 class="d-inline-block color-c5 font-weight-bold mb-4 mt-5"><?php echo e($service->name); ?></h4>

                        <span class="text-left checked float-left font-weight-bold mb-5 mt-5 font-18">
                            <?php echo e($service->ratings()->count() ? $service->ratings()->avg('stars_count') : '0'); ?>

                            <i class="fa fa-star fa-lg"></i>
                        </span>
                        <div>
                            <h3 class="color-c5 font-weight-bold mt-1 mb-4 mt-3 font-18 d-inline-block">مـــدة الـخـدمــة :</h3>                
                            <p class="color-11 mb-4 font-18 d-inline-block mr-3">
                                <?php echo e(explodeByColon( minutesToHours( $service->interval))[1]); ?>

                            </p>
                        </div>

                        <div>
                        <h3 class="color-c5 font-weight-bold mb-4 d-inline-block font-18">الخدمة المنزلية :</h3>
                        <?php if($service->is_home): ?>
                            <span class="btn bg-success text-white ml-3 mr-3 rounded-0">متوفر</span>
                        <?php else: ?>
                            <span class="btn btn bg-danger text-white rounded-0">غير متوفر</span>
                        <?php endif; ?>
                        </div>

                        <div>
                            <h3 class="color-c5 font-weight-bold mb-4 font-18 d-inline-block">مـفـتـوح الـيـوم :</h3>
                            <span class="btn <?php echo e($isOpen > 0 ? 'bg-success' : 'bg-danger'); ?> text-white ml-3 mr-3 d-inline-block rounded-0">
                                <i class="fa <?php echo e($isOpen > 0 ? 'fa-check' : 'fa-times'); ?> ml-1"></i>
                                <?php echo e($isOpen > 0 ? 'نعم' : 'لا'); ?>

                            </span>
                        </div>

                        <div>
                            <h3 class="color-c5 font-weight-bold mb-4 font-18 d-inline-block">مواعيد العمل :</h3><br>
                            <?php if($service->works->count()): ?>
                                <?php $__currentLoopData = $service->works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="color-11 mb-2 font-18 d-inline-block mr-3">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label class="form-check-label font-18">
                                                    <a class="work_intervals">
                                                        <input full_time="<?php echo e($work->time_from); ?>" date="<?php echo e(getNextDate($work)); ?>" day="<?php echo e($work->day->en_day); ?>" type="radio" name="work_times" class="form-check-input" style="margin-top: 10px" <?php echo e(isValidReservation($work, $service->company->id) ? '' : 'disabled'); ?>>
                                                    </a>
                                                    - <?php echo e($work->day->day); ?> من
                                                    <span class="color-c5"> <?php echo e(date('g:i A', strtotime( $work->time_from ))); ?> </span> إلى
                                                    <span class="color-c5"> <?php echo e(date('g:i A', strtotime( $work->time_to ))); ?> </span>
                                                </label>
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn <?php echo e(isValidReservation($work, $service->company->id) ? 'bg-success' : 'bg-danger'); ?> btn-sm text-white ml-3 mr-3 d-inline-block rounded-0" style="font-size: 12px;">
                                                    <?php echo e(isValidReservation($work, $service->company->id) ? 'متاح' : 'محجوز'); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <p class="color-11 mb-4 font-18 d-inline-block mr-3"> --------- </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="bg-f6 p-4 wow fadeInLeft" data-wow-duration="2s">
                        <div class="serv-price bg-danger p-2">
                            <span class="text-left text-white h5"><?php echo e($service->price); ?> ر.س </span>
                        </div>
                        <h4 class="d-inline-block color-c5 mb-4 mt-5 font-weight-bold">وصف الخدمة</h4>
                        <p class="color-777 text-justify line-2 mt-2">
                            <?php echo e($service->description); ?>

                        </p>
                        <a class="btn bg-c5 text-white btn-hover px-3 font-weight-bold rounded-0" href="<?php echo e(route('web.orders.create', Hashids::encode($service->id))); ?>">إحجز الأن</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--<section class="img position-relative bg-cover">-->
    <!--    <div class="overlay position-absolute">-->
    <!--    </div>-->
    <!--</section>-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $(document).ready(function () {

            var work_input;
            var full_date;
            var full_time;
            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $('.work_intervals').on('click', function() {

                work_input = $(this).children();

                if( work_input.is(':checked') ) {

                    full_date = work_input.attr('date') + ' ' + work_input.attr('day');
                    full_time = work_input.attr('full_time');

                    $.ajax({
                        url: "<?php echo e(url('/')); ?>" + "/orders/store-session-date" ,
                        type: "POST",
                        data: { _token: CSRF_TOKEN, 'full_date': full_date, 'full_time': full_time },
                    })
                    .done(function(reseived_data) {
                        // var parsed_data = $.parseJSON(reseived_data);
                        // console.log(parsed_data)

                        // if(parsed_data.code === '4'){
                        //
                        // }
                        // else {
                        //
                        // }
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>