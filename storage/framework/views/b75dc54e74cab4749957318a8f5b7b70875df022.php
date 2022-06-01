<!DOCTYPE>
<html lang="<?php echo e(app()->getLocale()); ?>">

    <head>
        <meta charset="UTF-8">
        <meta name="X-CSRF-TOKEN" content="<?php echo e(csrf_token()); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=El+Messiri">
        <!-- Fontawesome V5 -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
        <!-- Owl Carousel V5 -->
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/web/css/owl.carousel.min.css')); ?>">

        <link rel="stylesheet" href="<?php echo e(URL::asset('public/web/css/select2.css')); ?>">

        <!-- Bootstrap V4 B2 -->
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/web/css/bootstrap.min.css')); ?>">
        <!-- Bootstrap RTL V4 B2 -->
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/web/css/bootstrap-rtl.min.css')); ?>">
        <!-- Animate -->
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/web/css/animate.min.css')); ?>">
        <!-- My Stylesheet -->
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/web/css/style.css')); ?>">

        <link rel="stylesheet" href="<?php echo e(URL::asset('public/web/css/custom-style.css')); ?>">

        <?php echo $__env->yieldContent('styles'); ?>

        <title><?php echo $__env->yieldContent('title'); ?></title>

        
        
            
            
                
                    
                
            
        
        
        
        
            
                    
                    
                    
                
                
            
        



    </head>

    <body class="rtl">

        <?php echo $__env->make('web.layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main>

            <?php echo $__env->yieldContent('content'); ?>

        </main>

        <?php echo $__env->make('web.layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Botton UP -->
        <section id="btn-top">
            <i class="fa fa-angle-up fa-2x py-2 px-3 bg-c5 text-white rounded m-5"></i>
        </section>

        <!-- Loading -->
        <div class="loading align-items-center">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="<?php echo e(URL::asset('public/web/js/popper.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/web/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/web/js/wow.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/web/js/html5shiv.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/web/js/respond.min.js')); ?>"></script>
        <script> new WOW({offset: 200}).init(); </script>
        <script src="<?php echo e(URL::asset('public/web/js/select2.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/web/js/backend.js')); ?>"></script>

        <?php echo $__env->yieldContent('scripts'); ?>

    </body>

</html>