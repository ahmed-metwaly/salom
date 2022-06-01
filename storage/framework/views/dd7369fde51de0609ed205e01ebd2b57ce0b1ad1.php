<?php $__env->startSection('title'); ?>
    حجز خدمة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/web/css/custom-style.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(URL::asset('public/web/css/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/web/css/bootstrap-timepicker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h3 color-c5 font-weight-bold ">حجز خدمة</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h5 color-c5 font-weight-bold" href="<?php echo e(route('home')); ?>">الرئيسية / </a>
                        <span class="h5 color-c5 font-weight-bold">حجز خدمة</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="center">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown">
                <h2 class="color-c5">حجز خدمة</h2>
                <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
            </div>
            <div class="row">
                <div class="col-12 mb-5 pb-5">
                    <div class="bg-f6 p-4 wow fadeInLeft">
                        <div class="serv-price bg-danger p-2">
                            <span id="service-price" class="text-left text-white h5"><?php echo e($service->price); ?> ر.س </span>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-5 mb-4">
                                <img class="img-fluid w-100" style="height: 315px" src="<?php echo e(url('public/uploads/services/' . $service->photo)); ?>" alt="">
                            </div>
                            <div class="col-md-7">
                                <div class="form-group col-md-6 col-sm-12 col-xs-12 wow zoomIn">
                                    <label class="mb-3">اختاري تاريخ الحجز</label>
                                    <div class="datepicker input-group date form-group mb-3 border rounded-0 p-0">
                                        <input id="date" value="<?php echo e($defaultDate); ?>" type="text" class="form-control border-0" required>
                                        <div class="input-group-addon bg-white border-0">
                                            <span class="fa fa-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 wow zoomIn">
                                    <label class="mb-3">اختاري وقت الحجز</label>
                                    <div class="bootstrap-timepicker timepicker input-group form-group box mb-3 border rounded-0">
                                        <input id="timepicker" value="<?php echo e($defaultTime); ?>" type="text" class="form-control border-0">
                                        <div class="input-group-addon bg-white border-0">
                                            <span class="fa fa-clock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group box col-md-12 col-sm-12 wow zoomIn mb-4">
                                    <i class="ico fa fa-angle-down color-777"></i>
                                    <label class="mb-3">عدد الأفراد</label>
                                    <select class="form-control border bg-transparent rounded-0" id="individual_num" style="z-index: 999999; position: relative;" required>
                                        <option value>اختارى عدد الافراد</option>
                                        <?php $__currentLoopData = individualsCount(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php if($service->is_home): ?>
                                <div class="col-12 btn-group wow zoomIn">
                                    <label class="switch">
                                            <input id="is_home" type="checkbox" name="is_home">
                                            <span class="toggle round"></span>
                                        </label>
                                    <p class="color-777 font-weight-bold">خدمة منزلية</p>
                                </div>
                                <?php endif; ?>
                                <div class="col-12 mt-3 wow zoomIn">
                                    <button id="confirm-order" companyName="<?php echo e($service->company->name); ?>" class="btn bg-c5 font-18 py-2 px-5 text-white btn-hover">تأكيد حجز الخدمة</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <?php echo $__env->make('web.orders.map_confirm_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('web.orders.confirm_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('web.orders.invalid_date_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<script src="<?php echo e(URL::asset('public/web/js/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/web/js/bootstrap-timepicker.js')); ?>"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5F_F681KtY6i1FIrNt0eLXm_hioNSg1w&v=3.exp&language=ar&amp;libraries=places"></script>

    <script>
        function calcPrice(individual_num) {

            var price = parseFloat(individual_num) * parseFloat("<?php echo e($service->price); ?>");
            return price;
        }

        $(document).ready(function () {

            $('#confirm-order').prop('disabled', true);

            var date = localStorage.getItem('date');
            var individual_num = localStorage.getItem('individual_num');
            var is_home = localStorage.getItem('is_home');

            if (date){
                var arr = date.split(' ');
                $('#date').val(arr[0] + ' ' + arr[1]);
                $('#timepicker').val(arr[2]);
            }

            if (individual_num) {

                $("#individual_num > option").each(function() {
                    if($(this).text() == individual_num) {

                        $("#individual_num").val($(this).val());

                        $('#service-price').text(calcPrice($(this).val()) + ' ر.س ');
                    }
                });
            }

            if (is_home)
                $('#is_home').attr('checked', true);

            // $('#datetimepicker1').datetimepicker({
            //     format: 'yyyy-mm-dd D hh:ii',
            // });

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd D',
                autoclose: true
            });

            $('#timepicker').timepicker({
                showMeridian: false,
                defaultTime: false,
                autoclose: true
                // direction: 'rtl',
            });


            $('#individual_num').on('change', function() {

                if($(this).val()) {

                    $('#service-price').text(calcPrice($(this).val()) + ' ر.س ');

                    if ( $('#date').val() && $('#timepicker').val() ) {

                        $('#confirm-order').prop('disabled', false);
                    }
                }
                else
                    $('#confirm-order').prop('disabled', true);
            })

            setInterval(function(){
                if( $('#date').val() && $('#timepicker').val() ) {

                    if ($('#individual_num').val()) {

                        // console.log("Hello");
                        $('#confirm-order').prop('disabled', false);
                    }
                }
                else
                    $('#confirm-order').prop('disabled', true);
            }, 1000);



            $('#confirm-order').on('click', function() {

            //check-if-date-valid......

                var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');
                var date = $('#date').val();
                var time = $('#timepicker').val();
                var serviceId = "<?php echo e($service->id); ?>";
                var companyId = "<?php echo e($service->company->id); ?>";

                $.ajax({
                    url: "<?php echo e(url('/')); ?>" + "/orders/validate-date" ,
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'date': date, 'time': time, 'serviceId': serviceId, 'companyId': companyId},
                })
                .done(function(reseived_data) {


                    var parsed_data = $.parseJSON(reseived_data);
                    // console.log(parsed_data)

                    if(parsed_data.code === '4'){

                        // localStorage.setItem('companyName', $('#confirm-order').attr('companyName'));
                        localStorage.setItem('orderPrice', "<?php echo e($service->price); ?>");
                        // localStorage.setItem('individualCount', $('#individual_num').val());
                        // localStorage.setItem('totalPrice', $('#service-price').text());
                        // localStorage.setItem('orderDate', $('#date').val());
                        // localStorage.setItem('orderTime', $('#timepicker').val());

                        $("input[name='company_id']").val( companyId );
                        $("input[name='company_name']").val( $('#confirm-order').attr('companyName') );
                        $("input[name='user_id']").val( "<?php echo e(Auth::user()->id); ?>" );
                        $("input[name='individual_count']").val( $('#individual_num').val() );
                        $("input[name='date']").val( $('#date').val() );
                        $("input[name='time']").val( $('#timepicker').val() );
                        $("input[name='total_price']").val( $('#service-price').text() );


                        if ( $('#is_home').is( ":checked" ) ) {

                            $("#map-confirm-modal").modal();
                        }
                        else{
                            // $("#confirm-modal").modal();

                            $('#not_home_order').submit();
                        }

                        $('.companyName').text( $('#confirm-order').attr('companyName') );
                        $('.orderPrice').text( "<?php echo e($service->price); ?>" );
                        $('.individualCount').text( $('#individual_num').val() );
                        $('.totalPrice').text( $('#service-price').text() );
                        $('.orderDate').text( $('#date').val() );
                        $('.orderTime').text( $('#timepicker').val() );
                    }
                    else {

                        $("#invalid-date-modal").modal();
                        $('.message').text( parsed_data.message );
                    }
                });

            });


        //------map----------
            var latlng;
            var marker;
            var map;

            $('#map-confirm-modal').on('shown.bs.modal', function () {

                lat_val = 24.710374406523634;
                long_val = 46.682441104815666;

                var pos = {lat: lat_val, lng: long_val};
                var geocoder = new google.maps.Geocoder;


                map = new google.maps.Map(document.getElementById('div_map'), {
                    zoom: 14,
                    center: pos
                });
                marker = new google.maps.Marker({
                    draggable: true,
                    position: pos,
                    map: map
                });

                google.maps.event.addListener(marker, 'dragend', function (event) {

                    $("#map_lat").val(this.getPosition().lat());
                    $("#map_long").val(this.getPosition().lng());

                    latlng = {lat: this.getPosition().lat(), lng: this.getPosition().lng()};

                    geocoder.geocode({'location': latlng}, function (results, status) {
    //                     if (status === 'OK') {
    //                         // console.log(results)
    // //                        if (results[1]) {
    // //                            $("#map_address").val(results[1].formatted_address);
    // //                        }
    //                     }
                        map.setZoom(14);
                    });
                });

                if (navigator.geolocation) {

                    navigator.geolocation.getCurrentPosition(function (positions) {
                        lat = positions.coords.latitude;
                        lng = positions.coords.longitude;

                        $("#map_lat").val(lat);
                        $("#map_long").val(lng);

                        if(marker){
                            marker.setMap(null);
                        }
                        var latlng = {lat: lat, lng: lng};

                        geocoder.geocode({'location': latlng}, function (results, status) {
                            if (status === 'OK') {
                                if (results[1]) {
    //                                $("#map_address").val(results[1].formatted_address);
                                    map.setCenter(new google.maps.LatLng(lat, lng));
                                    marker = new google.maps.Marker({
                                        draggable: true,
                                        position: latlng,
                                        map: map
                                    });
                                    map.setZoom(14);
                                    google.maps.event.addListener(marker, 'dragend', function (event) {
                                        $("#map_lat").val(this.getPosition().lat());
                                        $("#map_long").val(this.getPosition().lng());
                                        latlng = {lat: this.getPosition().lat(), lng: this.getPosition().lng()};
                                        geocoder.geocode({'location': latlng}, function (results, status) {
    // //                                        if (status === 'OK') {
    // //                                            if (results[1]) {
    // //                                                $("#map_address").val(results[1].formatted_address);
    // //                                            }
    // //                                        }
                                        });
                                    });
                                }
                            }
                        });
                    });
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>