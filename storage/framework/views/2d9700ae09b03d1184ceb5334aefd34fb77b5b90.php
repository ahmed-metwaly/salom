
<section class="search mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md col-sm-12">
                <h2 class="mb-5 color-ae h2 wow zoomIn" data-wow-duration="1s">اعثرى على مركز تجميل</h2>

                <?php echo Form::open([ 'url' => route('search'), 'class' => 'search-form', 'method' => 'get']); ?>


                    <div class="form-group box col-sm-6 col-xs-12 wow zoomIn <?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                        <label for="" class="mb-3">المدينة</label>
                        <i class="ico fa fa-angle-down color-777"></i>
                        <select id="city" data-placeholder="-- اختاري مدينة --" name="city" class="form-control py-0 border bg-transparent select" required>
                            <option value></option>
                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($city->id); ?>"><?php echo e($city->city); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('city')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('city')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-sm-6 col-xs-12 wow zoomIn">
                        <label for="" class="mb-3">التاريخ</label>
                        <div class='input-group date form-group box border' id='datetimepicker1'>
                            <input id="date" name="date" type='text' class="form-control border-0" />
                            <span class="input-group-addon border-0 bg-transparent">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group box col-sm-6 col-xs-12 wow zoomIn">
                        <label for="" class="mb-3">عدد الأفراد</label>
                        <i class="ico fa fa-angle-down color-777"></i>
                        <select id="individual_num" data-placeholder="-- اختاري عدد الأفراد --" name="individual_num" class="form-control py-0 border bg-transparent select">
                            <option value></option>
                            <?php $__currentLoopData = individualsCount(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group box col-sm-6 col-xs-12 wow zoomIn <?php echo e($errors->has('service') ? ' has-error' : ''); ?>">
                        <label for="" class="mb-3">الخدمة</label>
                        <i class="ico fa fa-angle-down color-777"></i>
                        <select id="service" data-placeholder="-- الخدمة التي ترغبين بها --" name="service" class="form-control py-0 border bg-transparent select" required>
                        </select>

                        <?php if($errors->has('service')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('service')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="col-12 btn-group wow zoomIn">
                        <label class="switch">
                            <input id="is_home" type="checkbox" name="is_home">
                            <span class="toggle round"></span>
                        </label>
                        <p class="color-777 font-weight-bold">خدمة منزلية</p>
                    </div>
                    <div class="col-12 mt-3 wow zoomIn">
                        <button type="submit" class="btn bg-c5 font-18 py-2 px-5 text-white btn-hover rounded-0">بحث</button>
                    </div>
                <?php echo Form::close(); ?>

            </div>
            <div class="col-md col-sm-12 px-0 mt-5 pt-4">
                <img class="img-fluid wow fadeIn" data-wow-duration="1.9s" src="<?php echo e(URL::asset('public/web/img/sect2.png')); ?>" alt="">
            </div>
        </div>
    </div>
</section>