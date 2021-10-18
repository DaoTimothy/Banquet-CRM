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
                <a href="#" class="btn btn-primary">
                    <i class="icon-deletecolor"></i> <?php echo e(trans('Delete List')); ?></a>
                <a href="<?php echo e(url($type.'/decoratorCreate')); ?>" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('eventSetting.create')); ?></a>
            </div>
        <?php endif; ?>

    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">card_giftcard</i>
                <?php echo e($title); ?>

            </h4>

            <span class="pull-right">
                <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>

        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">
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
                    <?php if(count($data) > 0): ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($value->name); ?></td>
                                <td><?php echo e($value->address); ?></td>
                                <td><?php echo e($value->phone); ?></td>
                                <td><?php echo e($value->email); ?></td>
                                <td><a href="<?php echo e(url('eventSetting/'. $value->id . '/decoratorEdit' )); ?>" title="<?php echo e(trans('table.edit')); ?>">
                                        <i class="fa fa-fw fa-pencil text-warning"></i> </a>
                                    <a href="<?php echo e(url('eventSetting/' . $value->id . '/decoratorDelete' )); ?>" title="<?php echo e(trans('table.delete')); ?>">
                                        <i class="fa fa-fw fa-trash text-danger"></i> </a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" align="center">No Data Available</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>