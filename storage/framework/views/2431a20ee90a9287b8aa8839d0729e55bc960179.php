
<section class="services">
    <div class="container">
        <div class="text-center mt-5">
            <h2 class="color-c5">خدمات تجميلية راقية</h2>
            <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
            <p class="color-777 mt-2 mb-5">تصفحى العديد من مراكز الخدمات الراقية</p>
        </div>
        <div class="row">
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key %2 != 0): ?>
                <div class="col-12 mb-5 serv-card">
                    <div class="row">
                        <div class="col-md-5 d-flex align-items-center">
                            <div class="serv-text p-4">
                                <svg class="svg-icon fa-flip-horizontal mb-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 31.73 31.73" style="enable-background:new 0 0 31.73 31.73;" xml:space="preserve">
                                    <g>
                                        <path d="M11.334,17.389c0.718,0.104,2.554-4.213,2.686-4.309c0.132-0.096,2.776,0.113,2.427-1.295   c-0.795,0.673-1.168-0.056-1.132-0.586c0.036-0.531,0.709-1.658,0.886-1.582c0.177,0.077,0.482,0.705,1.118,0.123   c-0.963,0.092-0.736-1.317-0.437-1.486c0.3-0.168,1.463-0.682,1.8-1.009s0.363-1.358,1.05-1.131   c0.687,0.227,0.18,1.689,0.385,2.181s2.063,2.062,2.032,2.557c-0.031,0.496-0.812,0.407-0.795,1.099c0,0.28,0.487,0.489,0.5,0.816   c0.014,0.327-0.526,0.573-0.526,0.573s0.463,0.127,0.373,0.618c-0.092,0.49-0.685,0.342-0.875,0.444   c-0.089,0.049,0.911,1.146,0.166,1.973c-0.672,0.791-4.035-0.042-4.682,0.209c-1.217,0.473-2.225,2.114-1.554,2.891   c0.67,0.776,2.985,3.281,3.586,5.362c1.031,2.728-1.496,7.49-2.909,4.036c-2,1.346,2.182,6.289,8.048-1.15   c4.495-6.049,2.297-17.062,0.969-19.536C23.124,5.714,16.942-2.83,10.308,0.952C2.056,5.46,5.981,16.367,11.334,17.389z" fill="#c5a46d"/>
                                    </g>
                                </svg>
                                <h2 class="color-c5 mb-4"><?php echo e($service->name); ?></h2>
                                <p class="text-justify color-777">
                                    <?php echo e(str_limit($service->description, 150)); ?>

                                </p>
                                <a href="<?php echo e(route('web.services.show', Hashids::encode($service->id))); ?>" class="btn bg-c5 text-white py-2 px-4 mt-2 rounded-0 btn-hover">تفاصيل أكثر</a>
                            </div>
                        </div>
                        <div class="col-md-7 d-flex align-items-center">
                            <div class="serv-img">
                                <img class="img-fluid py-4" src="<?php echo e(url('public/uploads/services/' . $service->photo)); ?>" alt="<?php echo e($service->name); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-12 mb-5 serv-card">
                    <div class="row">
                        <div class="col-md-7 d-flex align-items-center">
                            <div class="serv-img">
                                <img class="img-fluid py-4" src="<?php echo e(url('public/uploads/services/' . $service->photo)); ?>" alt="<?php echo e($service->name); ?>">
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-center">
                            <div class="serv-text2 p-4">
                                <svg class="svg-icon fa-flip-horizontal mb-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 31.73 31.73" style="enable-background:new 0 0 31.73 31.73;" xml:space="preserve">
                                    <g>
                                        <path d="M11.334,17.389c0.718,0.104,2.554-4.213,2.686-4.309c0.132-0.096,2.776,0.113,2.427-1.295   c-0.795,0.673-1.168-0.056-1.132-0.586c0.036-0.531,0.709-1.658,0.886-1.582c0.177,0.077,0.482,0.705,1.118,0.123   c-0.963,0.092-0.736-1.317-0.437-1.486c0.3-0.168,1.463-0.682,1.8-1.009s0.363-1.358,1.05-1.131   c0.687,0.227,0.18,1.689,0.385,2.181s2.063,2.062,2.032,2.557c-0.031,0.496-0.812,0.407-0.795,1.099c0,0.28,0.487,0.489,0.5,0.816   c0.014,0.327-0.526,0.573-0.526,0.573s0.463,0.127,0.373,0.618c-0.092,0.49-0.685,0.342-0.875,0.444   c-0.089,0.049,0.911,1.146,0.166,1.973c-0.672,0.791-4.035-0.042-4.682,0.209c-1.217,0.473-2.225,2.114-1.554,2.891   c0.67,0.776,2.985,3.281,3.586,5.362c1.031,2.728-1.496,7.49-2.909,4.036c-2,1.346,2.182,6.289,8.048-1.15   c4.495-6.049,2.297-17.062,0.969-19.536C23.124,5.714,16.942-2.83,10.308,0.952C2.056,5.46,5.981,16.367,11.334,17.389z" fill="#c5a46d"/>
                                    </g>
                                </svg>
                                <h2 class="color-c5 mb-4"><?php echo e($service->name); ?></h2>
                                <p class="text-justify color-777">
                                    <?php echo e(str_limit($service->description, 150)); ?>

                                </p>
                                <a href="<?php echo e(route('web.services.show', Hashids::encode($service->id))); ?>" class="btn bg-c5 text-white py-2 px-4 mt-2 rounded-0 btn-hover">تفاصيل أكثر</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>