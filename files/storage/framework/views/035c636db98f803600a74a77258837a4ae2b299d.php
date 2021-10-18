<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
    </div>
    <div class="panel panel-primary">
        <div class="panel-body">
            <?php if(isset($data)): ?>
                <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/eventTypeUpdate', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

            <?php else: ?>
                <?php echo Form::open(['url' => $type.'/eventTypeStore', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('eventType') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('eventType', trans('eventSetting.eventType'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('name', (isset($data) ? $data->name : null), ['class' => 'form-control','id'=>'eventType']); ?>

                            <span class="help-block"><?php echo e($errors->first('eventType', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-group">
                <div class="controls">
                    <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> <?php echo e(trans('eventSetting.add')); ?></button>
                    <a href="<?php echo e(url($type.'/eventTypes')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/tagsinput.js')); ?>"></script>

    <script>
        $(document).submit(function (event) {
            if ($("#eventType").val() == '') {
                toastr["error"]("Enter Event type");
                event.preventDefault();
                return;
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>