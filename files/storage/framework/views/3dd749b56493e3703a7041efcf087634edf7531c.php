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
            <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/parkingUpdate', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type.'/parkingStore', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

        <?php endif; ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group required <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('name', trans('eventSetting.name'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('name', (isset($data) ? $data->type : null), ['class' => 'form-control','id'=>'name',"required"=>"required"]); ?>

                        <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group required <?php echo e($errors->has('service_provided') ? 'has-error' : ''); ?>" id="service_div">
                    <?php echo Form::label('service_provided', trans('eventSetting.capacity'), ['class' => 'control-label','id'=>'service_label']); ?>

                    <div class="controls">
                        <?php echo Form::number('service_provided', (isset($data) ? $data->capacity : null), ['class' => 'form-control','id'=>'service','min'=>0]); ?>

                        <span class="help-block"><?php echo e($errors->first('service_provided', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                <a href="<?php echo e(url($type.'/parkingIndex')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
            </div>
        </div>
        <!-- ./ form actions -->

        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/tagsinput.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>