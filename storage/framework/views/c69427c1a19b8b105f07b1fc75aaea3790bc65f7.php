<?php $__env->startSection('title'); ?>
    <?php echo e($ordersType); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/datatables.bootstrap-rtl.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_header'); ?>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(route('companyDashboard')); ?>"><?php echo e(trans('admin.dashboardTitle')); ?></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> <?php echo e($ordersType); ?> </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> <?php echo e(trans('admin.ordersIndex')); ?>

        <small> عرض <?php echo e($ordersType); ?> </small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                        <tr>
                            <th>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                    <span></span>
                                </label>
                            </th>
                            <th> رقم الحجز </th>
                            <th> وقت الحجز </th>
                            <th> تاريخ التنفيذ </th>
                            <th>المبلغ الكلي </th>
                            <th>المبلغ المدفوع </th>
                            <th>المبلغ المتبقي </th>
                            <th>طريقة الدفع </th>
                            <?php if($ordersType == 'حجوزات منتهية'): ?>
                            <th>تقييم صاحب الحجز للخدمة </th>
                            <?php endif; ?>
                            <th colspan="2"> العمليات </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd gradeX">
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes" value="1" />
                                        <span></span>
                                    </label>
                                </td>
                                <td class="no_dec"><a href="<?php echo e(route('company-orders-show', $value->id)); ?>"> <?php echo e($value->id); ?> </a></td>
                                <td> <?php echo e($value->created_at->format('Y-m-d')); ?> </td>

                                <td>

                                    <?php echo e(getArDay( date('D', strtotime($value->date)) )); ?>

                                    <?php echo e(date('Y-m-d', strtotime($value->date))); ?>

                                    <?php echo e(date('H:i:s', strtotime($value->date)) != '00:00:00' ? date('g:i A', strtotime($value->date)) : ''); ?>

                                </td>

                                <td><span class="badge badge-primary badge-roundless"> <?php echo e($value->total_price); ?> ر.س </span></td>
                                <td><span class="badge badge-flat badge-roundless"> <?php if($value->payment->method == 'receipt'): ?> 
                                0
                                <?php else: ?>
                                <?php echo e($value->payment->price); ?> 
                                <?php endif; ?>
                                ر.س </span></td>
                                <td><span class="badge badge-danger badge-roundless"> 
                                <?php if($value->payment->method == 'receipt'): ?>
                                <?php echo e($value->total_price); ?>

                                <?php else: ?>
                                
                                <?php echo e($value->total_price - $value->payment->price); ?>  
                                <?php endif; ?>
                                ر.س </span></td>
                                <td> <?php
                                    
                                     if($value->payment->method == 'bank') {

                                     echo 'تحويل بنكي';
                                     
                                     } elseif( $value->payment->method == 'receipt') {
                                        echo ' عند المشغل '; 
                                     } else {
                                       echo $value->payment->method;
                                     }

                                     ?>

                                      </td>
                                <?php if($value->payment->status == 1): ?>
                                <td>
                                    <span class="badge badge-warning badge-roundless"> <?php echo e(userServiceRating($value->user->id, $value->service->id ) > 0 ? userServiceRating($value->user->id, $value->service->id ).' نجوم ' : 'لا يوجد'); ?> </span>
                                </td>
                                <?php endif; ?>

                                <td>
                                    <?php if( $ordersType == 'حجوزات جديدة' ): ?>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> العمليات
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <li>
                                                    <a href="<?php echo e(route('company-orders-show', $value->id)); ?>">
                                                        <i class="fa fa-eye"></i> عرض التفاصيل
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="accept_order" payment_data="<?php echo e($value->payment->id); ?>" order_data="<?php echo e($value->id); ?>">
                                                        <i class="fa fa-check"></i> تحديد كحجز منتهي
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="reject_order" payment_data="<?php echo e($value->payment->id); ?>" order_data="<?php echo e($value->id); ?>">
                                                        <i class="fa fa-times"></i> تحديد كحجز لم يتم
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php elseif( $ordersType == 'حجوزات منتهية' ): ?>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> العمليات
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <li>
                                                    <a href="<?php echo e(route('company-orders-show', $value->id)); ?>">
                                                        <i class="fa fa-eye"></i> عرض التفاصيل
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(route('company-orders-invoice', $value->id)); ?>">
                                                        <i class="fa fa-eye"></i> عرض الفاتورة
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php else: ?>
                                        <a class="btn btn-xs green" href="<?php echo e(route('company-orders-show', $value->id)); ?>">
                                            <i class="fa fa-eye"></i>  عرض التفاصيل
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(URL::asset('public/company/js/datatable.js')); ?>"></script>
    <!-- <script src="<?php echo e(URL::asset('public/company/js/datatables.min.js')); ?>"></script> -->
    <!-- <script src="<?php echo e(URL::asset('public/company/js/datatables.bootstrap.js')); ?>"></script> -->
    <script src="<?php echo e(URL::asset('public/company/js/table-datatables-managed.min.js')); ?>"></script>




    <script src="<?php echo e(URL::asset('public/company/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/ui-sweetalert.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $('body').on('click', '.accept_order', function() {

                var id = $(this).attr('order_data');
                var swal_text = ' رقم ' + $(this).attr('order_data');
                var swal_title = 'هل أنت متأكد من تحديد هذا الحجز كحجز منتهي ؟';

                swal({
                    title: swal_title,
                    text: swal_text,
                    type: "info",
                    showCancelButton: true,
                    confirmButtonClass: "btn-info",
                    confirmButtonText: "تأكيد",
                    cancelButtonText: "إغلاق"
                }, function() {

                    $.ajax({
                        url: "<?php echo e(url('/')); ?>" + "/companyDashboard/orders/accept" ,
                        type: "POST",
                        data: {_token: CSRF_TOKEN, 'id' : id},
                    })
                    .done(function(reseived_data) {
                        var parsed_data = $.parseJSON(reseived_data);
//                        console.log(parsed_data)

                        if(parsed_data.code == true){
                            swal({
                                type: 'success',
                                title: "لقد تم تحديد الحجز " + swal_text + " " + "كحجز منتهي",
                                confirmButtonClass: 'btn-success'
                            }, function() {
                                window.location.href = parsed_data.url;
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
                });
            });

            $('body').on('click', '.reject_order', function() {

                var id = $(this).attr('order_data');
                var swal_text = ' رقم ' + $(this).attr('order_data');
                var swal_title = 'هل أنت متأكد من تحديد هذا الحجز كحجز لم يتم ؟';

                swal({
                        title: swal_title,
                        text: swal_text,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-warning",
                        confirmButtonText: "تأكيد",
                        cancelButtonText: "إغلاق",
                        closeOnConfirm: false
                }, function(){
                    swal({
                        title: 'اذكر سبب عدم إتمام هذا الحجز ليتم إعلام صاحب الحجز والأدمن',
                        type: "input",
                        showCancelButton: true,
                        confirmButtonText: 'حفظ',
                        cancelButtonText: "إغلاق",
                        inputPlaceholder: "اكتب سبب عدم إتمام الحجز",
                        closeOnConfirm: false
                    },function(inputValue){

                        if (inputValue === false) return false;

                        if (inputValue === '') {
                            swal.showInputError("اكتب سبب عدم إتمام الحجز!");
                            return false
                        }
                        //else...
                        $.ajax({
                            url: "<?php echo e(url('/')); ?>" + "/companyDashboard/orders/reject" ,
                            type: "POST",
                            data: {_token: CSRF_TOKEN, 'id': id, 'message': inputValue},
                        })
                        .done(function(reseived_data) {
                            var parsed_data = $.parseJSON(reseived_data);

                            if(parsed_data.code == true){
                                swal({
                                    type: 'success',
                                    title: "لقد تم تحديد الحجز  " + swal_text + " " + "كحجز لم يتم",
                                    confirmButtonClass: 'btn-success'
                                }, function() {
                                    window.location.href = parsed_data.url;
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
                    });
                });
            });

        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('company.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>