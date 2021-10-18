<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="panel panel-primary">
        <div class="panel-body">
            <?php if(isset($data)): ?>
                <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/transportUpdate', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

            <?php else: ?>
                <?php echo Form::open(['url' => $type.'/transportStore', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

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
                    <div class="form-group required <?php echo e($errors->has('service_provided') ? 'has-error' : ''); ?>" id="service_div">
                        <?php echo Form::label('service_provided', trans('eventSetting.service'), ['class' => 'control-label required','id'=>'service_label']); ?>

                        <div class="controls">
                            <?php echo Form::text('service_provided', (isset($data) ? $data->service_provided : null), ['class' => 'form-control','id'=>'service','data-role'=>'tagsinput']); ?>

                            <span class="help-block"><?php echo e($errors->first('service_provided', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('price') ? 'has-error' : ''); ?>" id="service_div">
                        <?php echo Form::label('price', trans('eventSetting.price'), ['class' => 'control-label','id'=>'service_label']); ?>

                        <div class="controls">
                            <?php echo Form::text('price', (isset($data) ? $data->price : null), ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('price', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                </div><div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('address') ? 'has-error' : ''); ?>" id="service_div">
                        <?php echo Form::label('address', trans('eventSetting.address'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('address', (isset($data) ? $data->address : null), ['class' => 'form-control','id'=>'price']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('email') ? 'has-error' : ''); ?>" id="service_div">
                        <?php echo Form::label('email', trans('eventSetting.email'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('email', (isset($data) ? $data->email : null), ['class' => 'form-control','id'=>'price']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>" id="service_div">
                        <?php echo Form::label('phone', trans('eventSetting.phone'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('phone', (isset($data) ? $data->phone : null), ['class' => 'form-control','id'=>'price']); ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-group">
                <div class="controls">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                    <a href="<?php echo e(url($type.'/transportIndex')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
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