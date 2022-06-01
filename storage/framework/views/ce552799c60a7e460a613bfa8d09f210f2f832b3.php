<?php $__env->startSection('title'); ?>
    نتائج البحث عن مراكز تجميل
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h2 color-c5 font-weight-bold ">نتائج البحث عن مراكز تجميل</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h4 color-c5 font-weight-bold" href="<?php echo e(route('home')); ?>">الرئيسية / </a>
                        <span class="h4 color-c5 font-weight-bold">نتائج البحث عن مراكز تجميل</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service">
        <div class="container">
            <div class="now">
                <div class="text-center my-5 wow fadeInDown" data-wow-duration="2s">
                    <h2 class="color-c5">نتائج البحث عن مراكز تجميل</h2>
                    <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
                </div>
                <div class="row">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-xs-12 mb-5 wow fadeInUp" data-wow-duration="2s">
                            <div class="card border rounded-0">
                                <div class="row">
                                    <div class="col-lg-6 pl-lg-0 d-flex align-items-center">
                                        <div class="card-header border-0 w-100 p-0">
                                            <div class="card-img-top">
                                                <a <?php echo e($service->is_active && !$service->has_blocked ? "href=" . route('web.services.show', Hashids::encode($service->id)) : ''); ?>>
                                                    <img class="w-100" src="<?php echo e(url('public/uploads/services/' . $service->photo)); ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <?php if(!$service->is_active || $service->has_blocked): ?>
                                                    <i class="fa fa-ban text-danger position-absolute"></i>
                                                <?php endif; ?>
                                                <div class="card-body border-0 p-0 pt-3">
                                                    <div class="card-block">
                                                        <svg class="d-inline-block mr-lg-0 mr-3 ml-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 414.384 414.384" style="enable-background:new 0 0 414.384 414.384;" xml:space="preserve">
                                                            <g>
                                                                <g>
                                                                    <path d="M182.069,107.05V65.245H86.774v41.805c-26.269,4.539-45.691,14.609-57.669,30.152    c-12.203,15.819-16.579,36.876-13.034,62.608C39.35,368.463,56.835,388.548,62.587,395.157    c14.483,16.635,45.344,19.228,62.937,19.228l17.733-0.017c17.586,0,48.524-2.561,63.015-19.211    c5.741-6.608,23.237-26.693,46.513-195.347c3.542-25.717-0.822-46.789-13.032-62.608    C227.773,121.66,208.346,111.589,182.069,107.05z M229.461,196.583c-20.149,145.929-35.35,176.657-40.952,183.098    c-5.881,6.752-23.648,11.128-45.252,11.128l-17.733,0.017c-21.558,0-39.285-4.377-45.182-11.145    c-5.596-6.42-20.787-37.129-40.938-183.098c-2.645-19.232,0.165-34.376,8.352-44.998c8.203-10.629,22.682-17.821,43.036-21.328    c11.289-1.956,19.542-11.754,19.542-23.207V88.796h48.191v18.254c0,11.453,8.251,21.251,19.534,23.207    c20.361,3.507,34.842,10.682,43.046,21.328C229.292,162.215,232.113,177.351,229.461,196.583z" fill="#c5a46d"/>
                                                                    <path d="M138.907,149.684h-8.971c-23.646,0-75.099,3.236-67.735,63.888c8.065,66.375,18.434,129.392,29.384,143.683    c8.077,10.563,27.808,11.93,37.558,11.93h10.534c9.752,0,29.485-1.366,37.574-11.93c10.952-14.274,21.319-77.308,29.393-143.683    C214.021,152.919,162.561,149.684,138.907,149.684z" fill="#c5a46d"/>
                                                                    <path d="M383.938,180.506h-16.197V73.561c9.934-53.283,11.032-53.523,11.032-60.472c0-7.215-5.859-13.088-13.08-13.088    c-3.183,0-6.063,1.192-8.34,3.094C355.081,1.2,352.2,0,349.01,0c-3.174,0-6.071,1.192-8.347,3.094    C338.395,1.2,335.497,0,332.315,0c-7.21,0-13.097,5.865-13.097,13.088c0,6.941,1.143,7.189,11.057,60.418v107.014h-16.222v-0.006    c-8.588,0-15.573,6.987-15.573,15.589v202.671c0,8.616,7.001,15.585,15.573,15.585h69.854c8.604,0,15.597-6.98,15.597-15.585    v-202.68C399.516,187.485,392.526,180.506,383.938,180.506z" fill="#c5a46d"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <h4 class="card-title color-c5 font-weight-bold d-inline-block h4 mb-2 <?php echo e(strlen($service->name) > 20 ? 'pr-lg-0 pr-3 mt-3' : ''); ?>">
                                                            <a class="color-c5" href="<?php echo e(route('web.services.show', Hashids::encode($service->id))); ?>">
                                                                <?php echo e($service->name); ?>

                                                            </a>
                                                        </h4>
                                                        <p class="card-text text-justify color-777 mt-2 mb-3 pl-3 pr-lg-0 pr-3">
                                                            <?php echo e(str_limit($service->description, 80)); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="card-footer bg-transparent border-0 p-0 mb-3 row">
                                                    <div class="card-rating col d-flex align-items-center color-777 mr-lg-0 mr-3 ">
                                                        <?php echo e($service->ratings()->count() ? $service->ratings()->avg('stars_count') : '0'); ?>

                                                        <i class="fa fa-star fa-lg checked"></i>
                                                    </div>
                                                    <div class="serv-link col-8 col-sm-7 pr-0 pl-4 text-left">
                                                        <a <?php echo e($service->is_active && !$service->has_blocked  ? "href=" . route('web.services.show', Hashids::encode($service->id)) : ''); ?> class="btn bg-c5 text-white btn-hover ml-2">عرض</a>
                                                        <a <?php echo e($service->is_active && !$service->has_blocked  ? "href=" . route('web.orders.create', Hashids::encode($service->id)) : ''); ?> class="btn bg-c5 text-white btn-hover">حجز</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-12 col-xs-12 mb-5">
                        <?php if($data->hasMorePages()): ?>
                            <a href="<?php echo e($data->nextPageUrl()); ?>" class="btn btn bg-c5 font-18 py-2 px-5 text-center mx-auto text-white wow zoomIn btn-hover" data-wow-duration="1s">مزيد من الخدمات</a>
                        <?php endif; ?>
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
<?php echo $__env->make('web.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>