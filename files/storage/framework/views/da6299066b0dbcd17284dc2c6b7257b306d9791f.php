<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('vendor.flash.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="page-header clearfix">
        <?php if($user_data->hasAccess(['eventSettings.write']) || $user_data->inRole('admin')): ?>
            <div class="pull-right">
                
                    
                <a href="<?php echo e(url($type.'/transportCreate')); ?>" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('eventSetting.create')); ?></a>
            </div>
        <?php endif; ?>

    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">directions_car</i>
                <?php echo e($title); ?>

            </h4>

            <span class="pull-right">
                <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>

        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="data">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('eventSetting.name')); ?></th>
                        <th><?php echo e(trans('eventSetting.address')); ?></th>
                        <th><?php echo e(trans('eventSetting.phone')); ?></th>
                        <th><?php echo e(trans('eventSetting.email')); ?></th>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>