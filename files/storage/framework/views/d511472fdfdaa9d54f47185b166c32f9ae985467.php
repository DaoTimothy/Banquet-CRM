<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="panel panel-primary">
        <div class="panel-body">
            <sales-team url="<?php echo e(url('salesteam')); ?>/"></sales-team>
            <!-- Form Actions -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="controls">
                            <a href="<?php echo e(route($type.'.index')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>