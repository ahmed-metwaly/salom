<?php $__env->startSection('title'); ?>
    <?php echo e($type == 'company' ? trans('admin.companyServicesShow') : trans('admin.orderServicesShow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e($type == 'company' ? trans('admin.companyServices') : trans('admin.orderServices')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e($type == 'company' ? trans('admin.companyServicesShow') : trans('admin.orderServicesShow')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                
                <th> صورة الخدمة</th>
                <th> الخدمة </th>
                <th> السعر</th>
                <th> المدة</th>
                <th> مركز التجميل </th>
                <th>إيقاف من قبل الإدارة</th>
                <th><?php echo e(trans('admin.adminChangeStatus')); ?></th>
                <th><?php echo e(trans('admin.show')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($data) > 0): ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        
                        <td> <img class="img-preview img-responsive" src="<?php echo e(url('public/uploads/services/' . $value->photo)); ?>"> </td>
                        <td>
                            <a href="<?php echo e(route('service-details', ['id' => $value->id])); ?>"> <?php echo e($value->name); ?> </a>
                        </td>
                        <td><?php echo e($value->price); ?> ر.س </td>
                        <td><?php echo e(explodeByColon( minutesToHours( $value->interval))[1]); ?></td>
                        <td>
                            <a href="<?php echo e(route('center-details', ['id' => $value->company->id])); ?>"> <?php echo e($value->company->name); ?> </a>
                        </td>
                        <td> <?php echo e($value->has_blocked ? 'موقوفة' :  'مفعلة'); ?> </td>

                        <td>
                            <a class="changeStatus">
                                <?php if( !$value->has_blocked ): ?>
                                    <i class="icon-x" status="1" data="<?php echo e($value->id); ?>"></i>
                                <?php else: ?>
                                    <i class="icon-check" status="0" data="<?php echo e($value->id); ?>"></i>
                                <?php endif; ?>
                            </a>
                        </td>

                        <td>
                            <a href="<?php echo e(route('service-details', ['id' => $value->id])); ?>">
                                <i class="icon-tv"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('.changeStatus').on( "click", function( ) {

                var thisBtn = $(this).children();
                var serviceId = $(this).children().attr('data');
                var status = $(this).children().attr('status');
                var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

//                console.log(thisBtn.parent().parent().prev().html());

                $.ajax({
                    url: "<?php echo e(url('/')); ?>" + "/service-change-status" ,
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'serviceId': serviceId, 'status': status },
                })

                .done(function(reseived_data) {

                    var parsed_data = $.parseJSON(reseived_data);

                    if (parsed_data == '1') {

                        if( thisBtn.attr('status') == '0' ){

                            thisBtn.attr('status', '1');
                            thisBtn.removeClass('icon-check').addClass('icon-x');
                            thisBtn.parent().parent().prev().html('مفعلة');
                        }
                        else if( thisBtn.attr('status') == '1' ){

                            thisBtn.attr('status', '0');
                            thisBtn.removeClass('icon-x').addClass('icon-check');
                            thisBtn.parent().parent().prev().html('موقوفة');
                        }
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>