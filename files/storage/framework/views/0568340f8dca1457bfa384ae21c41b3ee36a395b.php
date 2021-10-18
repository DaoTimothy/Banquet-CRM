<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <div class="pull-right">
            <?php if($user_data->hasAccess(['logged_calls.write']) || $user_data->hasAccess(['opportunities.write']) || $user_data->inRole('admin')): ?>
                <a href="<?php echo e(url($type.'/'.$opportunity->id.'/create')); ?>" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('call.create_opportunity_call')); ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="fa fa-fw fa-bell-o"></i>
                <?php echo e($title); ?>

            </h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
        </div>
        <div class="panel-body">
            <input type="hidden" id="id" value="<?php echo e($opportunity->id); ?>">
            <div class="table-responsive">
            <table id="data" class="table  table-bordered" data-id="data">
                <thead>
                <tr>
                    <th><?php echo e(trans('call.date')); ?></th>
                    <th><?php echo e(trans('call.summary')); ?></th>
                    <th><?php echo e(trans('call.company')); ?></th>
                    <th><?php echo e(trans('salesteam.main_staff')); ?></th>
                    <th><?php echo e(trans('table.actions')); ?></th>
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