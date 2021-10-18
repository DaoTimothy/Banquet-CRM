<?php $__env->startSection('content'); ?>
    <div class="box-color text-color">
        <h4><?php echo e(trans('auth.forgot')); ?></h4>
        <br>
        <?php echo Form::open(array('url' => url('password'), 'method' => 'post')); ?>

        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
            <?php echo Form::label(trans('auth.email')); ?> :
            <span><?php echo e($errors->first('email', ':message')); ?></span>
            <?php echo Form::email('email', null, array('class' => 'form-control', 'required'=>'required', 'placeholder'=>'E-mail')); ?>

        </div>
        <input type="submit" class="btn btn-primary btn-block" value="<?php echo e(trans('auth.send_reset')); ?>">
        <?php echo Form::close(); ?>

    </div>
    <h5 class="text-center">
        <a href="<?php echo e(url('signin')); ?>" class="text-default"><?php echo e(trans('auth.login')); ?>?</a>
    </h5>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>