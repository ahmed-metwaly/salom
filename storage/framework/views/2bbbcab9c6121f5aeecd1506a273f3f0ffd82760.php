<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.owedBalances')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.sideCommission')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo e(trans('admin.owedBalances')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th> # </th>
                <th> المركز </th>
                <th> إجمالي المال المستحق </th>
                <th> عدد الحجوزات المستحقة </th>
                <th>عدد الشهور المستحقة </th>
                <th>عرض تفاصيل الحجوزات </th>
                <th> تسديد المال المستحق </th>
            </tr>
            </thead>
            <tbody>
                <?php if(count($new_obj) > 0): ?>
                    <?php for($i = 0; $i < count($new_obj); $i++ ): ?>
                        <tr>
                            <td> <?php echo e($i+1); ?> </td>
                            <td><a href="<?php echo e(route('center-details', ['id' => $new_obj[$i]['company_id']])); ?>"> <?php echo e($new_obj[$i]['company']); ?> </a></td>
                            <td> <?php echo e($new_obj[$i]['owed_commission']); ?> ر.س </td>
                            <td>( <?php echo e(count( explodeByComma($new_obj[$i]['orders']) )); ?> )  حجز</td>
                            <td>( <?php echo e(count( explodeByComma($new_obj[$i]['owed_months']) )); ?> )  شهر</td>

                            <td>

                                <?php if( ($new_obj[$i]['orders']) ): ?>
                                    <a href="<?php echo e(route('owed-balances-show', ['ids' => $new_obj[$i]['orders']])); ?>">
                                        <i class="icon-tv"></i>
                                    </a>
                                <?php endif; ?>
                            </td>

                            <td>
                                <a class="commission_pay" company_id="<?php echo e($new_obj[$i]['company_id']); ?>" >
                                    <i class="icon-credit-card"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endfor; ?>
                <?php endif; ?>

                <?php if(count($payed_obj) > 0): ?>
                    <?php for($i = 0; $i < count($payed_obj); $i++ ): ?>
                        <tr>
                            <td> <?php echo e($i+1); ?> </td>
                            <td><a href="<?php echo e(route('center-details', ['id' => $payed_obj[$i]['company_id']])); ?>"> <?php echo e($payed_obj[$i]['company']); ?> </a></td>
                            <td> <?php echo e($payed_obj[$i]['owed_commission']); ?> ر.س </td>
                            <td>( <?php echo e(count( $payed_obj[$i]['orders'] )); ?> )  حجز</td>
                            <td>( <?php echo e($payed_obj[$i]['owed_months']); ?> )  شهر</td>


                            <td>
                                <?php if( arrayToStr($payed_obj[$i]['orders']) != '' ): ?>
                                    <a href="<?php echo e(route('owed-balances-show', [ 'ids' => arrayToStr($payed_obj[$i]['orders']) ])); ?>">
                                        <i class="icon-tv"></i>
                                    </a>
                                <?php endif; ?>
                            </td>

                            <td>
                                <a class="commission_pay" company_id="<?php echo e($payed_obj[$i]['company_id']); ?>">
                                    <i class="icon-credit-card"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endfor; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {

            $('body').on('click', '.commission_pay', function() {

                var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');
                var commission = $(this).parent().prev().prev().prev().prev().text();
                var company_id = $(this).attr('company_id');

                $.ajax({
                    url: "<?php echo e(url('/')); ?>" + "/dashboard/commission/session-save-payment" ,
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'commission' : commission},
                })
                .done(function(reseived_data) {

                    var parsed_data = $.parseJSON(reseived_data);
                    var newURL = parsed_data.url + '/' + company_id;

                    window.location.href = newURL;
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>