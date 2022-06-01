

<?php $__env->startSection('title'); ?>
    <?php echo trans('admin.sideCentersDetails') . ' ' . $data->name; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sectionName'); ?>
    <?php echo e(trans('admin.sideCentersTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageName'); ?>
    <?php echo trans('admin.sideCentersDetails') . ' : <span class="text-success">' . $data->name . '</span>'; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <form action="#" method="post">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"> <?php echo e(trans('admin.centerDet')); ?> </h5>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="form-group">
                            <img class="img-header img-preview img-thumbnail pull-left" src="<?php echo e(url('public/uploads/users/' . $data->photo)); ?>">
                        </div>
                        <div class="clear-fix" style="display: block; clear: both;"></div>
                        <br>
                        <br>
                        <div class="collapse in" id="demo1">
                            <div class="form-group">
                                <label> <?php echo e(trans('admin.sideAdminsName')); ?> </label>
                                <input readonly type="text" name="name" value="<?php echo e($data->name); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.sideAdminsName')); ?> ">
                            </div>

                            <div class="form-group">
                                <label> <?php echo e(trans('admin.adminsADEmail')); ?> </label>
                                <input readonly type="email" name="email" value="<?php echo e($data->email); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.adminsADEmail')); ?> ">
                            </div>

                            <div class="form-group">
                                <label> <?php echo e(trans('admin.adminsADPhone')); ?> </label>
                                <input readonly type="text" name="phone" value="<?php echo e($data->phone); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.adminsADPhone')); ?> ">
                            </div>

                            <div class="form-group">
                                <label> <?php echo e(trans('admin.adminsADStatus')); ?> </label>
                                <input type="text" class="form-control" readonly value="<?php echo e($data->status == 1 ?  trans('admin.settingsOpen') : trans('admin.settingsClose')); ?>">
                            </div>

                            <div class="form-group">
                                <label> <?php echo e(trans('admin.activeDuration')); ?> </label>
                                <input type="text" class="form-control" readonly value="<?php echo e($data->duration); ?> شهر">
                            </div>

                            <div class="form-group">
                                <label> <?php echo e(trans('admin.adminsADLocationText')); ?> </label>
                                <input readonly type="text" name="location_text" value="<?php echo e($data->location_text); ?>" class="form-control" placeholder=" <?php echo e(trans('admin.adminsADLocationText')); ?> ">
                            </div>
                           
                            
                                
                                    
                                        
                                        
                                    
                                
                                
                                    
                                        
                                        
                                    
                                
                            

                            <div class="row">
                                <div class="col-md-8 col-lg-offset-2" >
                                    <div class="mb-30" id="div_map" style="width: 100%;height:400px;"></div>
                                </div>
                            </div>

                        </div>
                    </fieldset>

                    <div class="text-right">

                    </div>
                </div>
            </div>
        </form>
        <!-- /a legend -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJve7ZMt3PvwUzwmJlvHaItGO5uVhEUIg&v=3.exp&language=ar&amp;libraries=places"></script>

    <script>
        $(document).ready(function() {
            var marker;
            var map;

            // var lat = $('#map_lat').val();
            var lat = "<?php echo e($data->lat); ?>";
            // var long = $('#map_long').val();
            var long = "<?php echo e($data->long); ?>";

            var lat_val;
            var long_val;

            lat_val = parseFloat(lat);
            long_val = parseFloat(long);

            var pos = {lat: lat_val, lng: long_val};

            map = new google.maps.Map(document.getElementById('div_map'), {
                zoom: 14,
                center: pos
            });
            marker = new google.maps.Marker({
                position: pos,
                map: map
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>