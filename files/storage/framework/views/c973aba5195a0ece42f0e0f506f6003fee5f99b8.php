<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
    </div>
    <div class="panel panel-primary">
        <div class="panel-body">
            <?php if(isset($data)): ?>
                <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/updateHotel', 'method' => 'put', 'files'=> false, 'id'=>'eventSetting']); ?>

            <?php else: ?>
                <?php echo Form::open(['url' => $type.'/storeHotel', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('hotelName', trans('eventSetting.hotelName'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('name', (isset($data) ? $data->name : null), ['class' => 'form-control','id'=>'hotelName']); ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-group">
                <div class="controls">
                    <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> <?php echo e(trans('eventSetting.add')); ?></button>
                    <a href="<?php echo e(url($type.'/hotel')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

    <script>
        $(document).submit(function (event) {
            if ($("#hotelName").val() == '') {
                toastr["error"]("Enter Hotel Name");
                event.preventDefault();
                return;
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>