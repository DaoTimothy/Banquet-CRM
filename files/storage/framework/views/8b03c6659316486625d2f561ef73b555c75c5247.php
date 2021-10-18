<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="panel panel-default m-t-30">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">attach_money</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right"><i class="fa fa-fw fa-chevron-up clickable"></i></span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table  table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('sales_order.sale_number')); ?></th>
                        <th><?php echo e(trans('sales_order.agent_name')); ?></th>

                        <th><?php echo e(trans('sales_order.total')); ?></th>
                        <th><?php echo e(trans('sales_order.date')); ?></th>
                        <th><?php echo e(trans('sales_order.exp_date')); ?></th>
                        <th><?php echo e(trans('sales_order.payment_term')); ?></th>
                        <th><?php echo e(trans('sales_order.status')); ?></th>
                        <th><?php echo e(trans('sales_order.expired')); ?></th>
                        <th><?php echo e(trans('table.actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <a href="<?php echo e(url('sales_order')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
            window.oTable.ajax.url('<?php echo url($type.'/draft_salesorder_list'); ?>');
            window.oTable.ajax.reload();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>