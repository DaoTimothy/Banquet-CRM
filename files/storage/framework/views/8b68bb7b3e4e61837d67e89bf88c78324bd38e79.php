<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <div class="pull-right">
            <?php if($user_data->hasAccess(['meetings.read']) || $user_data->inRole('admin')): ?>
                <a href="<?php echo e(url($type.'/calendar')); ?>" class="btn btn-primary">
                    <i class="fa fa-calendar"></i> <?php echo e(trans('opportunity.calendar')); ?></a>
            <?php endif; ?>
            <?php if($user_data->hasAccess(['meetings.write']) || $user_data->inRole('admin')): ?>
                <a href="<?php echo e(url($type.'/create')); ?>" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('meeting.meeting_create')); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">radio</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right"><i class="fa fa-fw fa-chevron-up clickable"></i></span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('meeting.meeting_subject')); ?></th>
                        <th><?php echo e(trans('meeting.starting_date')); ?></th>
                        <th><?php echo e(trans('meeting.ending_date')); ?></th>
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