<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('vendor.flash.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="page-header clearfix">
        <div class="pull-right">
            <a href="<?php echo e(url($type.'/eventRoomCreate')); ?>" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i> <?php echo e(trans('eventSetting.create')); ?></a>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">airline_seat_individual_suite</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="controls">
                            <?php echo Form::select('hotel',$hotels, (isset($event) ? $event->booking->location_id : null), ['id'=>'hotel', 'class' => 'form-control select2','onchange'=>'filter1(this.value)']); ?>

                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="" id="idData">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="data">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('eventSetting.hotelName')); ?></th>
                        <th><?php echo e(trans('eventSetting.room')); ?></th>
                        <th><?php echo e(trans('eventSetting.actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function() {
            $("#hotel").select2({
                theme: "bootstrap",
                placeholder: "<?php echo e(trans('eventSetting.hotelName')); ?>"
            });
        });

        function filter1(val){
            oTable.ajax.url('<?php echo url($type.'/eventRoomData'); ?>/' + val);
            oTable.ajax.reload();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>