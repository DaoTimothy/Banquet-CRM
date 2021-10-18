<?php $__env->startSection('content'); ?>
    Thank You, <br><br><b><?php echo e($user); ?></b> <br>

    <?php if($body != ''): ?>
        <?php echo e($body); ?>

    <?php else: ?>
        For Being With Us.
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/emails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>