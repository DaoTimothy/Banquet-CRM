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
                <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/photoUpdate', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

            <?php else: ?>
                <?php echo Form::open(['url' => $type.'/photoStore', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

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
                            <?php echo Form::text('address', (isset($data) ? $data->address : null), ['class' => 'form-control']); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('email') ? 'has-error' : ''); ?>" id="service_div">
                        <?php echo Form::label('email', trans('eventSetting.email'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('email', (isset($data) ? $data->email : null), ['class' => 'form-control']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>" id="service_div">
                        <?php echo Form::label('phone', trans('eventSetting.phone'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('phone', (isset($data) ? $data->phone : null), ['class' => 'form-control']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('price') ? 'has-error' : ''); ?>" id="service_div">
                        <?php echo Form::label('price', trans('eventSetting.price'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('price', (isset($data) ? $data->price : null), ['class' => 'form-control']); ?>

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
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('weddingPhotographyContractTerms') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('wedding_photography_contract_terms', trans('eventSetting.weddingPhotographyContractTerms'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('wedding_photography_contract_terms', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Wedding Photography Contract Terms']); ?>

                            <span class="help-block"><?php echo e($errors->first('weddingPhotographyContractTerms', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('payment') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('payment', trans('eventSetting.payment'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('payment', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Payment']); ?>

                            <span class="help-block"><?php echo e($errors->first('payment', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('cancellation') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('cancellation', trans('eventSetting.cancellation'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('cancellation', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Cancellation']); ?>

                            <span class="help-block"><?php echo e($errors->first('cancellation', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('reschedule') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('reschedule', trans('eventSetting.reschedule'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('reschedule', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'reschedule']); ?>

                            <span class="help-block"><?php echo e($errors->first('reschedule', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('liability') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('liability', trans('eventSetting.liability'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('liability', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Liability']); ?>

                            <span class="help-block"><?php echo e($errors->first('liability', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('responsibilities') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('responsibilities', trans('eventSetting.responsibilities'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('responsibilities', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Responsibilities']); ?>

                            <span class="help-block"><?php echo e($errors->first('responsibilities', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('coverage') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('coverage', trans('eventSetting.coverage'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('coverage', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Coverage']); ?>

                            <span class="help-block"><?php echo e($errors->first('coverage', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('imageProcessing') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('image_processing', trans('eventSetting.imageProcessing'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('image_processing', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Image Processing']); ?>

                            <span class="help-block"><?php echo e($errors->first('imageProcessing', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('modelRelease') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('model_release', trans('eventSetting.modelRelease'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('model_release', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Model Release']); ?>

                            <span class="help-block"><?php echo e($errors->first('modelRelease', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('copyright') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('copyright', trans('eventSetting.copyright'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('copyright', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'Copyright']); ?>

                            <span class="help-block"><?php echo e($errors->first('copyright', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('unauthorizedReproduction') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('unauthorized_reproduction', trans('eventSetting.unauthorizedReproduction'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('unauthorized_reproduction', null, ['class' => 'form-control resize_vertical', 'placeholder' => 'unauthorized Reproduction']); ?>

                            <span class="help-block"><?php echo e($errors->first('unauthorizedReproduction', ':message')); ?></span>
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
                    <a href="<?php echo e(url($type.'/photoIndex')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
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