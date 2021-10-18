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
            <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/updateEventLocation', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type.'/eventLocationStore', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

        <?php endif; ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('name', trans('eventSetting.name'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('name', (isset($data) ? $data->name : null), ['class' => 'form-control','id'=>'name']); ?>

                        <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('dimension') ? 'has-error' : ''); ?>" id="service_div">
                    <?php echo Form::label('dimension', trans('eventSetting.dimension'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('dimension', (isset($data) ? $data->service_provided : null), ['class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('dimension', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('theater') ? 'has-error' : ''); ?>" id="service_div">
                    <?php echo Form::label('theater', trans('eventSetting.theater'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('theater', (isset($data) ? $data->address : null), ['class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('classroom') ? 'has-error' : ''); ?>" id="service_div">
                    <?php echo Form::label('classroom', trans('eventSetting.classroom'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('classroom', (isset($data) ? $data->email : null), ['class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('banquet') ? 'has-error' : ''); ?>" id="service_div">
                    <?php echo Form::label('banquet', trans('eventSetting.banquet'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('banquet', (isset($data) ? $data->phone : null), ['class' => 'form-control','id'=>'price']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('booth') ? 'has-error' : ''); ?>" id="service_div">
                    <?php echo Form::label('booth', trans('eventSetting.booth'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('booth', (isset($data) ? $data->phone : null), ['class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('trade') ? 'has-error' : ''); ?>" id="service_div">
                    <?php echo Form::label('trade', trans('eventSetting.trade'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('trade', (isset($data) ? $data->phone : null), ['class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                <a href="<?php echo e(url($type.'/eventLocation')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
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