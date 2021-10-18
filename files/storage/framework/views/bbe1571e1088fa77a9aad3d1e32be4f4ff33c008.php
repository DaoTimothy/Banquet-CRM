<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <?php echo e($errors->first()); ?>

        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="details">
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
                                    <th><?php echo e(trans('sales_order.sale_number')); ?></th>
                                    <th><?php echo e(trans('sales_order.date')); ?></th>
                                    <th><?php echo e(trans('sales_order.customer')); ?></th>
                                    <th><?php echo e(trans('sales_order.salesperson')); ?></th>
                                    <th><?php echo e(trans('sales_order.total')); ?></th>
                                    <th><?php echo e(trans('sales_order.status')); ?></th>
                                    <th><?php echo e(trans('table.actions')); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <a href="<?php echo e(url('sales_order')); ?>" class="btn btn-warning"><i
                                    class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>