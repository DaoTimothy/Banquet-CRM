<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('vendor.flash.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="page-header clearfix">
        <?php if($user_data->hasAccess(['eventSettings.read']) || $user_data->inRole('admin')): ?>
            <div class="pull-right">
                <a href="#" class="btn btn-primary">
                    <i class="icon-deletecolor"></i> <?php echo e(trans('Delete List')); ?></a>
                <a href="<?php echo e(url($type.'/eventLocationCreate')); ?>" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('eventSetting.create')); ?></a>
            </div>
        <?php endif; ?>

    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">person</i>
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
                        <th><?php echo e(trans('eventSetting.dimension')); ?></th>
                        <th><?php echo e(trans('eventSetting.theater')); ?></th>
                        <th><?php echo e(trans('eventSetting.classroom')); ?></th>
                        <th><?php echo e(trans('eventSetting.banquet')); ?></th>
                        <th><?php echo e(trans('eventSetting.booth')); ?></th>
                        <th><?php echo e(trans('eventSetting.trade')); ?></th>
                        <th><?php echo e(trans('table.actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($locations) > 0): ?>
                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($location->name); ?></td>
                                <td><?php echo e($location->dimension); ?></td>
                                <td><?php echo e($location->theater); ?></td>
                                <td><?php echo e($location->classroom); ?></td>
                                <td><?php echo e($location->banquet); ?></td>
                                <td><?php echo e($location->booth); ?></td>
                                <td><?php echo e($location->trade); ?></td>
                                <td><a href="<?php echo e(url('eventSetting/' . $location->id . '/editEventLocation' )); ?>" title="<?php echo e(trans('table.edit')); ?>">
                                        <i class="fa fa-fw fa-pencil text-warning"></i> </a>
                                    <a href="<?php echo e(url('eventSetting/' . $location->id . '/deleteEventLocation' )); ?>" title="<?php echo e(trans('table.delete')); ?>">
                                        <i class="fa fa-fw fa-trash text-danger"></i> </a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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