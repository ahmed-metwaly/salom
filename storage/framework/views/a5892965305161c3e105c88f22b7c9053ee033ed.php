<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href='https://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'/>

        <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/font-awesome/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/simple-line-icons/simple-line-icons.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/bootstrap-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/bootstrap-switch-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/components-rounded-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/plugins-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/layout-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/darkblue-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/custom-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/company/css/login-rtl.min.css')); ?>">

        <link rel="shortcut icon" href="favicon.ico" />
    </head>

    <body class=" login">
        <div class="logo">
            <a href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(URL::asset('public/images/logo-white.png')); ?>" alt="" />
            </a>
        </div>
        <div class="content">

            <?php echo $__env->yieldContent('content'); ?>

        </div>

        <div class="copyright"> <?php echo e(date('Y')); ?> © تطوير بواسطة
            <a href="https://www.ws4it.com"> وسائل الشبكة لتقنية المعلومات. </a>
        </div>

        <script src="<?php echo e(URL::asset('public/company/js/respond.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/excanvas.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/ie8.fix.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/js.cookie.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/jquery.slimscroll.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/jquery.blockui.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/bootstrap-switch.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/app.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/layout.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/demo.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/quick-sidebar.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/quick-nav.min.js')); ?>"></script>

        <script src="<?php echo e(URL::asset('public/company/js/jquery.validate.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/additional-methods.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/company/js/login.min.js')); ?>"></script>

    </body>
</html>


