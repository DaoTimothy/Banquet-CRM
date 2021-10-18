<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <div class="pull-right">
            <a href="<?php echo e(url($type.'/draft_quotations')); ?>" class="btn btn-primary m-b-10"><?php echo e(trans('quotation.draft_quotations')); ?></a>
            <a href="<?php echo e(url('quotation_invoice_list')); ?>" class="btn btn-primary m-b-10"><?php echo e(trans('quotation.quotation_invoice_list')); ?></a>
            <a href="<?php echo e(url('quotation_converted_list')); ?>" class="btn btn-primary m-b-10"><?php echo e(trans('quotation.converted_list')); ?></a>
            <a href="<?php echo e(url('quotation_delete_list')); ?>" class="btn btn-primary m-b-10"><?php echo e(trans('quotation.delete_list')); ?></a>
            <?php if($user_data->hasAccess(['quotations.write']) || $user_data->inRole('admin')): ?>
                <a href="<?php echo e($type.'/create'); ?>" class="btn btn-primary m-b-10">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('quotation.create')); ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">receipt</i>
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


                        <th><?php echo e(trans('quotation.total')); ?></th>
                        <th><?php echo e(trans('quotation.date')); ?></th>
                        <th><?php echo e(trans('quotation.exp_date')); ?></th>
                        <th><?php echo e(trans('quotation.payment_term')); ?></th>
                        <th><?php echo e(trans('quotation.status')); ?></th>
                        <th><?php echo e(trans('quotation.expired')); ?></th>
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