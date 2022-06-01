<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta name="X-CSRF-TOKEN" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    
    

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    
    <link href='https://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'/>

    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/simple-line-icons/simple-line-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/bootstrap-rtl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/bootstrap-switch-rtl.min.css')); ?>">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/components-rounded-rtl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/plugins-rtl.min.css')); ?>">
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN THEME LAYOUT STYLES -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/layout-rtl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/darkblue-rtl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/custom-rtl.min.css')); ?>">
    <!-- END THEME LAYOUT STYLES -->

    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/login-rtl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/custom.css')); ?>">

    <?php echo $__env->yieldContent('styles'); ?>

    <?php echo Charts::assets(); ?>


    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-footer-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        <!-- BEGIN HEADER -->

        <?php echo $__env->make('company.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->

            <?php echo $__env->make('company.layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">

                    <?php echo $__env->yieldContent('page_header'); ?>

                    <?php echo $__env->make('company.layouts.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo $__env->yieldContent('content'); ?>

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

            <!-- BEGIN QUICK SIDEBAR -->
            
                
            
            
                
                    
                        
                            
                                
                            
                        
                        
                            
                                
                            
                        
                        
                            
                                
                            
                            
                                
                                    
                                        
                                
                                
                                    
                                        
                                
                                
                                    
                                        
                                
                                
                                
                                    
                                        
                                
                            
                        
                    
                    
                        
                            
                                
                                
                                    
                                        
                                            
                                        
                                        
                                        
                                            
                                            
                                        
                                    
                                    
                                        
                                        
                                            
                                            
                                        
                                    
                                    
                                        
                                            
                                        
                                        
                                        
                                            
                                            
                                        
                                    
                                    
                                        
                                        
                                            
                                            
                                        
                                    
                                
                                
                                
                                    
                                        
                                            
                                        
                                        
                                        
                                            
                                            
                                            
                                        
                                    
                                    
                                        
                                            
                                        
                                        
                                        
                                            
                                            
                                                
                                        
                                    
                                    
                                        
                                        
                                            
                                            
                                            
                                        
                                    
                                    
                                        
                                            
                                        
                                        
                                        
                                            
                                            
                                        
                                    
                                    
                                        
                                        
                                            
                                            
                                        
                                    
                                    
                                        
                                            
                                        
                                        
                                        
                                            
                                            
                                            
                                        
                                    
                                
                            
                            
                                
                                    
                                        
                                            
                                    
                                    
                                        
                                            
                                            
                                                
                                                
                                                
                                                
                                            
                                        
                                        
                                            
                                            
                                                
                                                
                                                
                                                
                                            
                                        
                                        
                                            
                                            
                                                
                                                
                                                
                                                
                                            
                                        
                                        
                                            
                                            
                                                
                                                
                                                
                                                
                                            
                                        
                                        
                                            
                                            
                                                
                                                
                                                
                                                
                                            
                                        
                                        
                                            
                                            
                                                
                                                
                                                
                                                
                                            
                                        
                                        
                                            
                                            
                                                
                                                
                                                
                                                
                                            
                                        
                                        
                                            
                                            
                                                
                                                
                                                
                                                
                                            
                                        
                                        
                                            
                                            
                                                
                                                
                                                
                                                
                                            
                                        
                                    
                                    
                                        
                                            
                                            
                                                
                                                    
                                                
                                            
                                        
                                    
                                
                            
                        
                        
                            
                                
                                
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                        
                                                                    
                                                                
                                                    
                                                
                                            
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                            
                                                        
                                                    
                                                    
                                                        
                                                    
                                                
                                            
                                            
                                                
                                            
                                        
                                    
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                
                                            
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                        
                                                    
                                                
                                            
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                
                                            
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                        
                                                    
                                                
                                            
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                            
                                                        
                                                    
                                                    
                                                        
                                                    
                                                
                                            
                                            
                                                
                                            
                                        
                                    
                                
                                
                                
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                        
                                                                    
                                                                
                                                    
                                                
                                            
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                            
                                                        
                                                    
                                                    
                                                        
                                                    
                                                
                                            
                                            
                                                
                                            
                                        
                                    
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                
                                            
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                        
                                                    
                                                
                                            
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                
                                            
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                        
                                                    
                                                
                                            
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                            
                                                        
                                                    
                                                    
                                                        
                                                    
                                                
                                            
                                            
                                                
                                            
                                        
                                    
                                
                            
                        
                        
                            
                                
                                
                                    
                                        
                                    
                                        
                                    
                                        
                                    
                                        
                                    
                                        
                                
                                
                                
                                    
                                        
                                            
                                            
                                            
                                        
                                    
                                    
                                        
                                    
                                        
                                    
                                        
                                    
                                        
                                
                                
                                    
                                        
                                
                            
                        
                    
                
            
            <!-- END QUICK SIDEBAR -->

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> <?php echo e(date('Y')); ?> &copy; تطوير بواسطة
                <a target="_blank" href="https://www.ws4it.com">وسائل الشبكة لتقنية المعلومات</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
    </div>
    <!-- BEGIN QUICK NAV -->
    
        
            
        
        
            
                
                    
                    
                
            
            
                
                    
                    
                
            
            
                
                    
                    
                
            
            
                
                    
                    
                
            
        
        
    
    
    <!-- END QUICK NAV -->

    <!--[if lt IE 9]>
    <script src="<?php echo e(URL::asset('public/company/js/respond.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/excanvas.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/ie8.fix.min.js')); ?>"></script>
    <![endif]-->

    <!-- BEGIN CORE PLUGINS -->
    <script src="<?php echo e(URL::asset('public/company/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/js.cookie.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/jquery.slimscroll.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/jquery.blockui.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/bootstrap-switch.min.js')); ?>"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?php echo e(URL::asset('public/company/js/app.min.js')); ?>"></script>
    <!-- END THEME GLOBAL SCRIPTS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="<?php echo e(URL::asset('public/company/js/layout.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/demo.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/quick-sidebar.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/company/js/quick-nav.min.js')); ?>"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
    <script>
        $(document).ready(function()
        {
            $('#clickmewow').click(function()
            {
                $('#radio1003').attr('checked', 'checked');
            });
        })
    </script>

    <?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>