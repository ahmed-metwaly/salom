<?php $__env->startSection('title'); ?>
    اتصل بنا
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h3 color-c5 font-weight-bold ">اتصل بنا</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h5 color-c5 font-weight-bold" href="<?php echo e(route('home')); ?>">الرئيسية / </a>
                        <span class="h5 color-c5 font-weight-bold">اتصل بنا</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact">
        <div class="container">
            <div class="text-center my-5 wow fadeInDown" data-wow-duration="2s">
                <h2 class="color-c5">تواصل معنا</h2>
                <img class="img-fluid" src="<?php echo e(URL::asset('public/web/img/line.png')); ?>" alt="">
            </div>

            <?php echo Form::open([ 'url' => route('store.contact.us'), 'class' => 'row mb-5 wow fadeInUp', 'data-wow-duration' => '1s' ]); ?>


                <div class="col-md-6 col-sm-12 border bg-f6 font-14 font-weight-bold rounded pt-5 pb-4 rounded-0">
                    <p class="color-777 font-14 line-2 mb-5 wow fadeInUp">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعيا</p>
                    <h6 class="font-14 font-weight-bold mb-4 wow fadeInUp">
                        العنوان :
                        <a class="color-c5" href=""><?php echo e(settings()['address'] ? settings()['address'] : '----------'); ?></a>
                    </h6>
                    <h6 class="font-14 font-weight-bold mb-4 mt-1 wow fadeInUp">
                        البريد الإلكترونى :
                        <a class="color-c5" href="mailto:<?php echo e(settings()['email']); ?>"><?php echo e(settings()['email']); ?></a>
                    </h6>
                    <h6 class="font-14 font-weight-bold mb-4 mt-1 wow fadeInUp">
                        رقم الهاتف :
                        <a class="color-c5" href="del:<?php echo e(settings()['phone']); ?>"><?php echo e(settings()['phone']); ?></a>
                    </h6>
                    <h6 class="font-14 font-weight-bold mb-4 mt-1 wow fadeInUp">
                        الفاكس :
                        <a class="color-c5" href=""><?php echo e(settings()['fax'] ? settings()['fax'] : '----------'); ?></a>
                    </h6>
                </div>
                <div class="col-md-6 col-sm-12 contact-form my-4">
                    <div class="bg-f6 border rounded p-md-5 py-5 px-4 rounded-0">
                        <div class="form-group mb-4 mt-2 color-777 wow fadeInUp <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <div class="input-group rounded input-border rounded-0">
                                <span class="input-group-addon bg-white border-top-0 border-bottom-0 rounded-0 p-3"><i class="fa fa-user color-777"></i></span>
                                <input id="name" name="name" value="<?php echo e(Auth::user() ? Auth::user()->name : old('name')); ?>" type="text" class="form-control border-0" placeholder="الاسم"  required>
                            </div>
                            <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-4 mt-2 wow fadeInUp <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <div class="input-group rounded input-border rounded-0">
                                <span class="input-group-addon bg-white border-top-0 border-bottom-0 rounded-0 p-3"><i class="fa fa-envelope color-777"></i></span>
                                <input id="email" name="email" value="<?php echo e(Auth::user() ? Auth::user()->email : old('email')); ?>" type="email" class="form-control border-0" placeholder="البريد الإلكترونى"  required>
                            </div>
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-4 mt-2 wow fadeInUp <?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                            <div class="input-group rounded input-border rounded-0">
                                <span class="input-group-addon bg-white border-top-0 border-bottom-0 rounded-0 p-3"><i class="fa fa-phone fa-flip-horizontal color-777"></i></span>
                                <input id="phone" name="phone" value="<?php echo e(Auth::user() ? Auth::user()->phone : old('phone')); ?>" type="text" class="form-control border-0" placeholder="رقم الهاتف"  required>
                            </div>
                            <?php if($errors->has('phone')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-4 mt-2 wow fadeInUp <?php echo e($errors->has('body') ? ' has-error' : ''); ?>">
                            <textarea class="w-100 rounded py-2 px-3 rounded-0" name="body" id="body" cols="30" rows="10" placeholder="رسالتك..." required></textarea>
                        </div>
                        <?php if($errors->has('body')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('body')); ?></strong>
                            </span>
                        <?php endif; ?>
                        <button type="submit" class="btn bg-c5 font-18 py-2 px-5 text-white mt-2 wow fadeInUp btn-hover rounded-0">ارسل الأن</button>
                    </div>
                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
    <section class="img position-relative bg-cover">
        <div class="overlay position-absolute">
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>