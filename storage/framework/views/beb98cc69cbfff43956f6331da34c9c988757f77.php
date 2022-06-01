<?php $__env->startSection('title'); ?>
    تغيير الخدمة المميزة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    الخدمات والمراكز المميزة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    إضافة أو تعديل الخدمة المميزة
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="col-md-12">
        <form action="<?php echo e(route('promotions.service.update', $data->id)); ?>" method="post">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> اختيار خدمة مميزة في الصفحة الرئيسية للموقع </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="collapse in" id="demo1">

                            <div class="form-group">
                                <label for="promotionService"> اسم الخدمة </label>
                                <select id="promotionService" data-placeholder="-- يرجى كتابة اسم الخدمة --" name="promotionService" class="select" required>
                                    <option value="<?php echo e($data->promotionable->id); ?>"><?php echo e($data->promotionable->name); ?></option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>تاريخ البدء</lable>
                                <input class="form-control" type="date" name="start_at" value="<?php echo e($data->start_at); ?>">
                            </div>

                                
                            <div class="form-group">
                                <label>تاريخ الانتهاء</lable>
                                <input class="form-control" type="date" name="end_at" value="<?php echo e($data->end_at); ?>">
                            </div>

                        </div>
                    </fieldset>
                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"> <?php echo e(trans('admin.save')); ?> <i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>

        $(document).ready(function () {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $( "#promotionService" ).select2({
                ajax: {
                    url: "<?php echo e(url('/')); ?>" + "/dashboard/promotions/service/findByName",
                    dataType: 'json',
                    type: 'POST',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            _token: CSRF_TOKEN
                        };
                    },

                    processResults: function (data) {

                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>