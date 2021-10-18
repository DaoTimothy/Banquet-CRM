<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <?php if($user_data->hasAccess(['opportunities.write']) || $user_data->inRole('admin')): ?>
            <div class="pull-right">
            </div>
        <?php endif; ?>
    </div>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <?php echo e($errors->first()); ?>

        </div>
    <?php endif; ?>
    <div class="panel panel-default m-t-30">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">event_seat</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                </span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('quotation.quotations_number')); ?></th>
                        <th><?php echo e(trans('quotation.agent_name')); ?></th>
                        <th><?php echo e(trans('salesteam.salesteam')); ?></th>
                        <th><?php echo e(trans('salesteam.main_staff')); ?></th>
                        <th><?php echo e(trans('quotation.total')); ?></th>
                        <th><?php echo e(trans('quotation.payment_term')); ?></th>
                        <th><?php echo e(trans('quotation.status')); ?></th>
                        <th><?php echo e(trans('table.actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <a href="<?php echo e(url('quotation')); ?>" class="btn btn-warning"><i
                        class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>