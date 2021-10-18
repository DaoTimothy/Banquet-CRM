<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
    </div>
    <!-- ./ notifications -->
    <?php echo $__env->make('user/'.$type.'/'.$pageName, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <hr>
    <a href="<?php echo e(url($type.'/'.$event->id .'/show')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>