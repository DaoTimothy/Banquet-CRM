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
                <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/decoratorUpdate', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

            <?php else: ?>
                <?php echo Form::open(['url' => $type.'/decoratorStore', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

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
                <div class="col-md-8">
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
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('price') ? 'has-error' : ''); ?>" id="service_div">
                        <?php echo Form::label('price', trans('eventSetting.price'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('price', (isset($data) ? $data->phone : null), ['class' => 'form-control','id'=>'price']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('service_provided') ? 'has-error' : ''); ?>" id="service_div">
                        <?php echo Form::label('service_provided', trans('eventSetting.service'), ['class' => 'control-label required','id'=>'service_label']); ?>

                        <div class="controls">
                            <?php echo Form::text('service_provided', (isset($data) ? $data->service_provided : null), ['class' => 'form-control','id'=>'service','data-role'=>'tagsinput']); ?>

                            <span class="help-block"><?php echo e($errors->first('service_provided', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('decorationContractTerms') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('decorationContractTerms', trans('eventSetting.decorationContractTerms'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('decorationContractTerms', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Decoration Contract Terms']); ?>

                            <span class="help-block"><?php echo e($errors->first('decorationContractTerms', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('decorationFees') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('decorationFees', trans('eventSetting.decorationFees'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('decorationFees', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Decoration Fees']); ?>

                            <span class="help-block"><?php echo e($errors->first('decorationFees', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('decorationArrangements') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('decorationArrangements', trans('eventSetting.decorationArrangements'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('decorationArrangements', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Decoration Arrangements']); ?>

                            <span class="help-block"><?php echo e($errors->first('decorationArrangements', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('damageToProperty') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('damageToProperty', trans('eventSetting.damageToProperty'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('damageToProperty', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Damage To Property']); ?>

                            <span class="help-block"><?php echo e($errors->first('damageToProperty', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('deposit') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('deposit', trans('eventSetting.deposit'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('deposit', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Deposit']); ?>

                            <span class="help-block"><?php echo e($errors->first('deposit', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('cancellationDesignChangeFees') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('cancellationDesignChangeFees', trans('eventSetting.cancellationDesignChangeFees'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('cancellationDesignChangeFees', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Cancellation and Design Change Fees']); ?>

                            <span class="help-block"><?php echo e($errors->first('cancellationDesignChangeFees', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('safety') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('safety', trans('eventSetting.safety'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('safety', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Safety']); ?>

                            <span class="help-block"><?php echo e($errors->first('safety', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('materialGuarantee') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('materialGuarantee', trans('eventSetting.materialGuarantee'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('materialGuarantee', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Material Guarantee']); ?>

                            <span class="help-block"><?php echo e($errors->first('materialGuarantee', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('makingChanges') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('makingChanges', trans('eventSetting.makingChanges'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('makingChanges', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Making Changes']); ?>

                            <span class="help-block"><?php echo e($errors->first('makingChanges', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('approval') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('approval', trans('eventSetting.approval'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('approval', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Approval']); ?>

                            <span class="help-block"><?php echo e($errors->first('approval', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-group">
                <div class="controls">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                    <a href="<?php echo e(url($type.'/decoratorIndex')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
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