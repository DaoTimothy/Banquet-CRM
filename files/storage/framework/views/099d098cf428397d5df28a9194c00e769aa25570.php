<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <?php if($user_data->hasAccess(['products.write']) || $user_data->inRole('admin')): ?>
            <div class="pull-right">
                <a href="<?php echo e($type.'/create'); ?>" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('product.create_product')); ?></a>
                 <a href="<?php echo e($type.'/import'); ?>" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('product.import')); ?></a>
            </div>
        <?php endif; ?>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">layers</i>
                <?php echo e($title); ?>

            </h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                </span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table  table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('product.product_name')); ?></th>
                        <th><?php echo e(trans('product.category_id')); ?></th>
                        <th><?php echo e(trans('product.product_type')); ?></th>
                        <th><?php echo e(trans('product.status')); ?></th>
                        <th><?php echo e(trans('product.quantity_on_hand')); ?></th>
                        <th><?php echo e(trans('product.quantity_available')); ?></th>
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