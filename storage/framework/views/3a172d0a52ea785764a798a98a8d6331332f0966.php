<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.ordersOneShow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_header'); ?>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(route('companyDashboard')); ?>"><?php echo e(trans('admin.dashboardTitle')); ?></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> <?php echo e(trans('admin.ordersOneShow')); ?> </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> <?php echo e(trans('admin.ordersShow')); ?>

        <small> <?php echo e(trans('admin.ordersOneShow')); ?> </small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div id="your div id" class="portlet light bordered">

                
                    
                
<?php if( $order->status == 5 ): ?>

<a href="<?php echo e(route('company-approve-orders', $order->id)); ?>" class="btn btn-primary ptn-lg pull-right" style="margin: 20px 0; display: block;" >موافقه علي الطلب</a>
<?php endif; ?>

                <div class="portlet-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="portlet green-meadow box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>الخدمة المحجوزة
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> الخدمة: </div>
                                        <div class="col-lg-7 value no_dec">
                                            <a href="<?php echo e(route('services.show', $order->service->id)); ?>"> <?php echo e($order->service->name); ?> </a>
                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> سعر الخدمة: </div>
                                        <span class="badge badge-roundless" style="background-color: #1BBC9B"> <?php echo e($order->service->price); ?> ر.س </span>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> مدة الخدمة: </div>
                                        <span> <?php echo e(minutesToHours($order->service->interval)); ?>  </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="portlet blue-hoki box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>صاحب الحجز
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> الاسم: </div>
                                        <div class="col-lg-7 value"> <?php echo e($order->user->name); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> البريد الإلكتروني </div>
                                        <div class="col-lg-7 value"> <?php

                                            if(auth()->user()->is_pro == 1) {
                                                echo $order->user->email;
                                            } else {
                                                echo mb_substr($order->user->email, 0, -7);
                                            }
                                         ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> رقم الجوال: </div>
                                        <div class="col-lg-7 value"> 

                                            <?php

                                            if(auth()->user()->is_pro == 1) {
                                                echo $order->user->phone;
                                            } else {
                                                echo substr($order->user->phone, 0, -5);
                                            } ?>
                                             </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="portlet yellow-crusta box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>تفاصيل الحجز
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> رقم الحجز: </div>
                                        <div class="col-lg-7 value"> <?php echo e($order->id); ?>

                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> وقت الحجز:  </div>
                                        <div class="col-lg-7 value"> <?php echo e($order->created_at->format('Y-m-d')); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> تاريخ التنفيذ:  </div>
                                        <div class="col-lg-7 value"> <?php echo e($order->formatted_date .' '. $order->formatted_time); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> عدد الأفراد:  </div>
                                        <span class="badge badge-warning badge-roundless"> <?php echo e($order->individual_count); ?> أفراد </span>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> خدمة منزلية:  </div>
                                        <span class="badge <?php echo e($order->is_home ? 'badge-primary' : 'badge-danger'); ?> badge-roundless">
                                        <?php if( $order->is_home ): ?>
                                            <i class="fa fa-check"></i> نعم
                                        <?php else: ?>
                                            <i class="fa fa-times"></i> لا
                                        <?php endif; ?>
                                        </span>
                                    </div>
                                    <?php if( $order->is_home ): ?>
                                        <div class="row static-info">
                                            <div class="col-lg-5 name"> الموقع على الخريطة:  </div>
                                            <button id="show_map" class="btn btn-xs green">
                                                <i class="fa fa-eye"></i>  عرض
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="portlet red-sunglo box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>تفاصيل الدفع
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> طريقة الدفع: </div>
                                        <div class="col-lg-7 value">

                                    <?php
                                    
                                    if($order->payment->method == 'bank') {

                                    echo 'تحويل بنكي';
                                    
                                    } elseif( $order->payment->method == 'receipt') {
                                       echo ' عند المشغل '; 
                                    } else {
                                      echo $order->payment->method;
                                    }

                                    ?>


                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> المبلغ الكلي:  </div>
                                        <span class="badge badge-primary badge-roundless"> <?php echo e($order->total_price); ?> ر.س </span>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> المبلغ المدفوع:  </div>
                                        <span class="badge badge-flat badge-roundless"> 
                                    <?php

                                        if( $order->payment->method == 'receipt') {
                                           echo '0 '; 
                                        } else {
                                          echo  $order->payment->price;

                                        }

                                    ?>
                                             ر.س </span>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-lg-5 name"> المبلغ المتبقي:  </div>
                                        <span class="badge badge-danger badge-roundless">

                                    <?php

                                        if( $order->payment->method == 'receipt') {
                                           echo $order->payment->price; 
                                        } else {
                                          echo  $order->total_price - $order->payment->price;

                                        }

                                    ?>
                                         ر.س </span>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>



                    <?php if( $order->payment->status == 0 ): ?>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="portlet grey-cascade box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-cogs"></i>سبب عدم إتمام الحجز
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row static-info">
                                            <div class="col-lg-12 value">
                                                <?php echo e($order->payment->orderStatus->message); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('company.orders.order_map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5F_F681KtY6i1FIrNt0eLXm_hioNSg1w&v=3.exp&language=ar&amp;libraries=places"></script>

    <script>
        $(document).ready(function() {

//            $('body').on('click', '#print', function() {
//                var prtContent = document.getElementById("your div id");
//                var WinPrint = window.open('', '', 'left=0,top=0,width=1,height=1,toolbar=0,scrollbars=0,status=0');
//                WinPrint.document.write(prtContent.innerHTML);
//                WinPrint.document.close();
//                WinPrint.focus();
//                WinPrint.print();
//                WinPrint.close();
//            });

            $('body').on('click', '#show_map', function() {

                $("#map-modal").modal();
            });

            $('#map-modal').on('shown.bs.modal', function () {
                var marker;
                var map;

                var lat_val = parseFloat("<?php echo e($order->lat); ?>");
                var long_val = parseFloat("<?php echo e($order->long); ?>");

                var pos = {lat: lat_val, lng: long_val};

                map = new google.maps.Map(document.getElementById('div_map'), {
                    zoom: 14,
                    center: pos
                });
                marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    draggable: false,
                });
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('company.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>