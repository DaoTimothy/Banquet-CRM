 Web site Title
<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

 Content
<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
    </div>
    <!-- ./ notifications -->
    <?php echo $__env->make('user/'.$type.'/'.$pageName, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="pdf_act">
        <a href="<?php echo e(url($type.'/'.$event->id .'/show')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
    <a class="btn btn-warning pull-right" href="#">Print</a>
        <a class="btn btn-warning pull-right" href="#">Download</a></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>