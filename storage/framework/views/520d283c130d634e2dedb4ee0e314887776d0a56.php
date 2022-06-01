
<header>

<?php 

// dd(Auth::user());

?>
    <?php if(session()->has('new_user') || session()->has('new_social_user') || session()->has('user_guest') || session()->has('alert') || session()->has('not_conf') || session()->has('not_status')): ?>
    <div class="top bg-e2 pt-3" style="background-color:  #1c1c1c;">
        <div class="container  text-center" style=" max-height: 40px;">
            <div class="dropdown d-md-inline-block mb-3 ml-md-4 ml-0 wow zoomIn" data-wow-delay=".4s" style="/* visibility: visible; */animation-delay: 1.7s;animation-name: zoomIn;text-align: center !important;">
                <p style="color:  #c5a46d;text-align: center !important;">
                    <?php if(session()->has('new_user')): ?>
                        <?php echo e(session('new_user')); ?>


                    <?php elseif(session()->has('new_social_user')): ?>
                        <?php echo e(session('new_social_user')); ?>


                    <?php elseif(session()->has('user_guest')): ?>
                        <?php echo e(session('user_guest')); ?>


                    <?php elseif(session()->has('alert')): ?>
                        <?php echo e(session('alert')); ?>


                    <?php elseif(session()->has('not_conf')): ?>
                        <?php echo e(session('not_conf')); ?>


                    <?php elseif(session()->has('not_status')): ?>
                        <?php echo e(session('not_status')); ?>


                    <?php endif; ?>
                </p>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Header Top -->
<div class="top bg-e2 pt-3">
    <div class="container text-md-right text-center">
        <div class="dropdown d-md-inline-block mb-3 ml-md-4 ml-0 wow zoomIn" data-wow-delay=".4s" style="position: relative;
    z-index: 9999;">
            <?php if(Auth::check()): ?>
                <img class="user-img rounded-circle" src="<?php echo e(starts_with(Auth::user()->photo, 'http') ? Auth::user()->photo : url("/public/uploads/users/". Auth::user()->photo)); ?>" alt="">
                <button class="bg-transparent border-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    الحساب
                </button>

                <div class="dropdown-menu p-3 bg-e2" aria-labelledby="dropdownMenuButton">
                    <ul class="list-unstyled pr-0">
                        <?php if(Auth::user()->user_type == '3'): ?>
                            <li class="my-2">
                                <a class="text-dark" href="<?php echo e(route('create-profile')); ?>">حسابى</a>
                            </li>
                            <li class="my-2">
                                <a class="text-dark" href="<?php echo e(route('web.orders.index')); ?>">حجوزاتي</a>
                            </li>
                        <?php elseif(Auth::user()->user_type == '2'): ?>
                            <li class="my-2">
                                <a class="text-dark" href="<?php echo e(route('create-profile')); ?>">حسابى</a>
                            </li>
                            <li class="my-2">
                                <a class="text-dark" href="<?php echo e(route('companyDashboard')); ?>">لوحة التحكم</a>
                            </li>
                        <?php elseif(Auth::user()->user_type == '1'): ?>
                            <li class="my-2">
                                <a class="text-dark" href="<?php echo e(route('admin-edit', Auth::user()->id)); ?>">حسابى</a>
                            </li>
                            <li class="my-2">
                                <a class="text-dark" href="<?php echo e(route('web.orders.index')); ?>">حجوزاتي</a>
                            </li>
                            <li class="my-2">
                                <a class="text-dark" href="<?php echo e(route('dashboard')); ?>">لوحة التحكم</a>
                            </li>
                        <?php endif; ?>
                        <li class="my-2">
                            <a class="text-dark" href="<?php echo e(route('change-password-form')); ?>">تغيير كلمة المرور</a>
                        </li>
                        <li class="my-2">
                            <a class="text-dark" href="<?php echo e(route('logout')); ?>">تسجيل الخروج</a>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <i class="fa fa-user fa-lg color-c5 ml-2"></i>
                <button class="bg-transparent border-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    تسجيل الدخول
                </button>

                <div class="dropdown-menu p-3 bg-e2" aria-labelledby="dropdownMenuButton" style="z-index: 99999!important;background: #e2d1b6">


                        
                            
                            

                            
                                
                                    
                                
                            
                        
                        
                            
                            

                            
                                
                                    
                                
                            
                        
                        <a href="<?php echo e(route('get-login')); ?>" class="btn bg-c5 text-dark font-14 rounded-0">تسجيل دخول</a>
                        <span class="mx-1 text-dark">او</span>
                        <a href="<?php echo e(route('register')); ?>">
                            <span class="text-dark font-14">مستخدم جديد</span>
                        </a>

                </div>
            <?php endif; ?>
        </div>
        <a style="direction: ltr" href="del:<?php echo e(settings()['phone']); ?>" class="text-dark d-md-inline-block d-block mb-3 ml-md-4 ml-0 wow zoomIn" data-wow-delay=".5s">
            <?php echo e(settings()['phone']); ?>

            <i class="fa fa-phone fa-lg fa-flip-horizontal color-c5 ml-2"></i>
        </a>
        <a href="mailto:<?php echo e(settings()['email']); ?>" class="text-dark d-md-inline-block d-block mb-3 wow zoomIn" data-wow-delay=".6s">
            <i class="fa fa-envelope fa-lg color-c5 ml-2"></i>
            <?php echo e(settings()['email']); ?>

        </a>

        <ul class="<?php echo e(\Auth::user() ? 'pt-3' : ''); ?> social list-unstyled mb-0 pr-0 d-md-inline-block float-md-left wow zoomIn" data-wow-delay=".6s">
            <li class="list-inline-item ml-2">
                <a href="<?php echo e(settings()['pinterest'] ? settings()['pinterest'] : '#'); ?>" class="fab fa-pinterest-p fa-lg text-dark trans"></a>
            </li>
            <li class="list-inline-item ml-2">
                <a href="<?php echo e(settings()['youtube'] ? settings()['youtube'] : '#'); ?>" class="fab fa-youtube fa-lg text-dark trans"></a>
            </li>
            <li class="list-inline-item ml-2">
                <a href="<?php echo e(settings()['google_plus'] ? settings()['google_plus'] : '#'); ?>" class="fab fa-google fa-lg text-dark trans"></a>
            </li>
            <li class="list-inline-item ml-2">
                <a href="<?php echo e(settings()['instagram'] ? settings()['instagram'] : '#'); ?>" class="fab fa-instagram fa-lg text-dark trans"></a>
            </li>
            <li class="list-inline-item ml-2">
                <a href="<?php echo e(settings()['snapchat'] ? settings()['snapchat'] : '#'); ?>" class="fab fa-snapchat-ghost fa-lg text-dark trans"></a>
            </li>
            <li class="list-inline-item ml-2">
                <a href="<?php echo e(settings()['twitter'] ? settings()['twitter'] : '#'); ?>" class="fab fa-twitter fa-lg text-dark trans"></a>
            </li>
            <li class="list-inline-item ml-2">
                <a href="<?php echo e(settings()['facebook'] ? settings()['facebook'] : '#'); ?>" class="fab fa-facebook-f fa-lg text-dark trans"></a>
            </li>
        </ul>
    </div>
</div>
<!-- Header Bottom [ Navbar ] -->
<div class="bottom bg-1c py-3" id="bottom">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <a href="<?php echo e(route('home')); ?>"  class="navbar-brand font-48 text-white mr-0 wow zoomIn" data-wow-delay=".4s">
                
                <?php echo e(settings()['name']); ?>

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-align-justify fa-2x text-white"></span>
            </button>
            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto pr-0 text-center">
                    <li class="nav-item rounded my-md-0 my-2 trans wow zoomIn rounded-0" data-wow-delay=".5s">
                        <a class="nav-link text-white font-18 px-3" href="<?php echo e(route('home')); ?>">الرئيسية <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item rounded mr-md-3 mr-0 my-md-0 my-2 trans wow zoomIn rounded-0" data-wow-delay=".6s">
                        <a class="nav-link text-white font-18 px-3" href="<?php echo e(route('who-are')); ?>">من نحن </a>
                    </li>
                    <li class="nav-item rounded mr-md-3 mr-0 my-md-0 my-2 trans wow zoomIn rounded-0" data-wow-delay=".7s">
                        <a class="nav-link text-white font-18 px-3" href="<?php echo e(route('nearBy')); ?>">بالقرب منى</a>
                    </li>
                    <li class="nav-item rounded mr-md-3 mr-0 my-md-0 my-2 trans wow zoomIn rounded-0" data-wow-delay=".8s">
                        <a class="nav-link text-white font-18 px-3" href="<?php echo e(route('oneDay')); ?>"> خدمات اليوم الواحد</a>
                    </li>
                    <li class="nav-item rounded mr-md-3 mr-0 my-md-0 my-2 trans wow zoomIn rounded-0" data-wow-delay=".9s">
                        <a class="nav-link text-white font-18 px-3" href="<?php echo e(route('web.companies.index')); ?>">مراكز التجميل</a>
                    </li>
                    <?php if(Auth::check() && Auth::user()->user_type != '1'): ?>
                        <li class="nav-item rounded mr-md-3 mr-0 my-md-0 my-2 trans wow zoomIn rounded-0" data-wow-delay=".10s">
                            <a class="nav-link text-white font-18 px-3" href="<?php echo e(route('create-profile')); ?>">حسابى</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item rounded mr-md-3 mr-0 my-md-0 my-2 trans wow zoomIn rounded-0" data-wow-delay=".11s">
                        <a class="nav-link text-white font-18 px-3" href="<?php echo e(route('create.contact.us')); ?>">اتصل بنا</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
</header>