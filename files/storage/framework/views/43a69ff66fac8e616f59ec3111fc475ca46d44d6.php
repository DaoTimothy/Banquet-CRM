<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <?php if($user_data->hasAccess(['quotations.write']) || $user_data->inRole('admin')): ?>
                <div class="page-header clearfix">
                    <a href="<?php echo e(url($type . '/'.$opportunity->id.'/convert_to_quotation/')); ?>"
                       class="btn btn-primary" target=""><?php echo e(trans('opportunity.convert_to_quotation')); ?></a>
                </div>
            <?php endif; ?>
            <div class="details">
                <?php echo $__env->make('user/'.$type.'/_details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>