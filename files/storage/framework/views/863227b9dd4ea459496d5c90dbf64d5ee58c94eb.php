<?php $__env->startSection('content'); ?>
    Welcome, <br><br><b><?php echo e($user); ?></b> <br>
    Your Event For <b><?php echo e($event_name); ?></b> Has been successfully created on <b><?php echo e($event_date); ?></b>

    We Will Get Back To You For Further Details.
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/emails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>