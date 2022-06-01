<?php $__env->startSection('title'); ?>
    حجوزاتى
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/web/css/custom-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h3 color-c5 font-weight-bold ">حجوزاتى</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h5 color-c5 font-weight-bold" href="<?php echo e(route('home')); ?>">الرئيسية / </a>
                        <span class="h5 color-c5 font-weight-bold">حجوزاتى</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="reservation">
        <div class="container">
            <!-- Reservation Now -->
            <div class="now">
                <div class="text-center my-5 wow fadeInDown" data-wow-duration="2s">
                    <h2 class="color-c5">حجوزاتى</h2>
                    <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
                </div>
                <div class="row">
                    <div class="col product-disc">
                        <ul class="nav nav-tabs border-0 my-5" role="tablist">
                            <li role="presentation">
                                <a href="#new-orders" aria-controls="new-orders" role="tab" data-toggle="tab" class="active rounded-0 bg-c5 px-sm-5 px-2 py-3 text-white font-18 btn-hover rounded">حجوزات جديدة</a>
                            </li>
                            <li role="presentation">
                                <a href="#waitting-orders" aria-controls="not-done-orders" role="tab" data-toggle="tab" class="rounded-0 bg-c5 px-sm-5 px-2 py-3 text-white font-18 mr-sm-5 mr-2 btn-hover rounded">حجوزات فى انتظار التأكيد </a>
                            </li>
                            <li role="presentation">
                                <a href="#done-orders" aria-controls="done-orders" role="tab" data-toggle="tab" class="rounded-0 bg-c5 px-sm-5 px-2 py-3 text-white font-18 mr-sm-5 mr-2 btn-hover rounded">حجوزات منتهية</a>
                            </li>
                            
                            <li role="presentation">
                                <a href="#not-done-orders" aria-controls="not-done-orders" role="tab" data-toggle="tab" class="rounded-0 bg-c5 px-sm-5 px-2 py-3 text-white font-18 mr-sm-5 mr-2 btn-hover rounded">حجوزات لم تتم</a>
                            </li>
                        </ul>
                        <div class="tab-content mb-5">
                            <div role="tabpanel" class="tab-pane active" id="new-orders">

                                <?php echo $__env->make('web.orders.tab_pane_new_orders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="waitting-orders">

                                <?php echo $__env->make('web.orders.tab_pane_not_confirmed_orders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="done-orders">

                                <?php echo $__env->make('web.orders.tab_pane_done_orders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="not-done-orders">

                                <?php echo $__env->make('web.orders.tab_pane_not_done_orders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                            
                        </div>
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
    
    <script src="<?php echo e(URL::asset('public/company/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/ui-sweetalert.min.js')); ?>"></script>

    <script>
        // $(function () {
        //
        //     // $(".rateYo").each(function (e) {
        //     //
        //     //     $(this).rateYo({
        //     //         fullStar: true,
        //     //         //rtl: true
        //     //
        //     //     });
        //     // });
        //
        // $(".rateYo").rateYo()
        //         .on("rateYo.change", function (e, data) {
        //
        //             var rating = data.rating;
        //             // $(this).next().text(rating);
        //             console.log(rating)
        //         });
        // });

        $(document).ready(function(){

            var userRating;

            $(".stars").each(function (e) {

                userRating = parseInt($(this).attr('user-rating'));

                if(userRating > 0) {

                    $(this).children('li.star').each(function (e) {

                        if($(this).data('value') === userRating) {

                            $(this).addClass('selected');
                            $(this).prevAll().addClass('selected');
                        }
                    });
                }
            });


            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function(e){
                    if (e < onStar) {
                        $(this).addClass('hover');
                    }
                    else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function(){
                $(this).parent().children('li.star').each(function(e){
                    $(this).removeClass('hover');
                });
            });

            /* 2. Action to perform on click */
            $('#stars li').on('click', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }

                // var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                var msg = "لقد قيمت الخدمة ب " + onStar + " نجوم ";
                var serviceId = $(this).parent().attr('service');
                var userId = "<?php echo e(Auth::user()->id); ?>";

                responseMessage(serviceId, userId, onStar, msg);

            });

        });


        function responseMessage(serviceId, userId, ratingValue, msg) {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $.ajax({
                url: "<?php echo e(url('/')); ?>" + "/services/rate" ,
                type: "POST",
                data: {_token: CSRF_TOKEN, 'serviceId': serviceId, 'userId': userId, 'ratingValue': ratingValue},
            })
            .done(function(reseived_data) {
                var parsed_data = $.parseJSON(reseived_data);
//                        console.log(parsed_data);

                if(parsed_data.code === '1'){
                    swal({
                        type: 'success',
                        title: msg,
                        confirmButtonClass: 'btn-success'
                    });
                }
                else{
                    swal(
                        "حدث خطأ ما",
                        "نأسف لحدوث هذا الخطأ, برجاء المحاولة لاحقًا",
                        "error"
                    );
                }
            });

        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>