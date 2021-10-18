<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <div class="pull-right">
            <?php if($user_data->hasAccess(['invoices.write']) || $user_data->inRole('admin')): ?>
            <a href="<?php echo e($type.'/create'); ?>" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i> <?php echo e(trans('invoices_payment_log.create_invoice_payment')); ?></a>
                <?php endif; ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">archive</i>
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
                        <th><?php echo e(trans('invoices_payment_log.payment_number')); ?></th>
                        <th><?php echo e(trans('invoices_payment_log.amount')); ?></th>
                        <th><?php echo e(trans('invoices_payment_log.invoice_number')); ?></th>
                        <th><?php echo e(trans('invoices_payment_log.payment_method')); ?></th>
                        <th><?php echo e(trans('invoices_payment_log.payment_date')); ?></th>
                        <th><?php echo e(trans('invoices_payment_log.agent_name')); ?></th>
                        <th><?php echo e(trans('invoices_payment_log.main_staff')); ?></th>
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