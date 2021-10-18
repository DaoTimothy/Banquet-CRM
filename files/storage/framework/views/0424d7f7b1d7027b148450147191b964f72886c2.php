<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="details">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="material-icons">payment</i>
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
                                    <th><?php echo e(trans('invoice.invoice_number')); ?></th>
                                    <th><?php echo e(trans('invoice.invoice_date')); ?></th>
                                    <th><?php echo e(trans('invoice.agent_name')); ?></th>
                                    <th><?php echo e(trans('invoice.due_date')); ?></th>
                                    <th><?php echo e(trans('invoice.total')); ?></th>
                                    <th><?php echo e(trans('invoice.status')); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>