<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($manager)): ?>
            <?php echo Form::model($manager, ['url' => $type . '/' . $manager->id .'/updateManager', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type .'/storeManager', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

        <?php endif; ?>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group required <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('name', trans('eventSetting.name'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('name', null, ['class' => 'form-control','id'=>'name']); ?>

                        <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group required <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('email', trans('eventSetting.email'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('email', null, ['class' => 'form-control','id'=>'email']); ?>

                        <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group required <?php echo e($errors->has('contact') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('contact', trans('eventSetting.contact'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('contact', null, ['class' => 'form-control','id'=>'contact']); ?>

                        <span class="help-block"><?php echo e($errors->first('contact', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group required <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('gender', trans('eventSetting.gender'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <div class="input-group">
                            <label>
                                <input type="radio" name="gender" value="Male"
                                       class='icheckblue'
                                       <?php if(isset($manager) && $manager->gender == 'Male'): ?> checked <?php endif; ?>>
                                <?php echo e(trans('eventSetting.male')); ?>

                            </label>
                            <label>
                                <input type="radio" name="gender" value="Female"
                                       class='icheckblue'
                                       <?php if(isset($manager) && $manager->gender == 'Female'): ?> checked <?php endif; ?>>
                                <?php echo e(trans('eventSetting.female')); ?>

                            </label>
                        </div>
                        <span class="help-block"><?php echo e($errors->first('gender', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                <a href="<?php echo e(url($type.'/manager')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
            </div>
        </div>
        <!-- ./ form actions -->

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/tagsinput.js')); ?>"></script>
<?php $__env->stopSection(); ?>