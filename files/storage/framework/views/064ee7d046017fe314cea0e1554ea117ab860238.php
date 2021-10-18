<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <div class="pull-right">
            <a href="<?php echo e(url('opportunity_converted_list')); ?>" class="btn btn-primary m-b-10"><?php echo e(trans('opportunity.converted_list')); ?></a>
            <a href="<?php echo e(url('opportunity_delete_list')); ?>" class="btn btn-primary m-b-10"><?php echo e(trans('opportunity.delete_list')); ?></a>
            <a href="<?php echo e(url('opportunity_archive')); ?>" class="btn btn-primary m-b-10"><?php echo e(trans('opportunity.archive')); ?></a>
            <?php if($user_data->hasAccess(['opportunities.write']) || $user_data->inRole('admin')): ?>
                <a href="<?php echo e($type.'/create'); ?>" class="btn btn-primary m-b-10">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('opportunity.create')); ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">event_seat</i>
                <?php echo e($title); ?>

            </h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('opportunity.opportunity_name')); ?></th>
                        <th><?php echo e(trans('company.company_name')); ?></th>
                        <th><?php echo e(trans('opportunity.next_action')); ?></th>
                        <th><?php echo e(trans('opportunity.stages')); ?></th>
                        <th><?php echo e(trans('opportunity.expected_revenue')); ?></th>
                        <th><?php echo e(trans('opportunity.probability')); ?></th>
                        <th><?php echo e(trans('salesteam.sales_team_id')); ?></th>
                        <th><?php echo e(trans('salesteam.main_staff')); ?></th>
                        <th><?php echo e(trans('table.actions')); ?></th>
                        <th><?php echo e(trans('opportunity.actions')); ?></th>
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