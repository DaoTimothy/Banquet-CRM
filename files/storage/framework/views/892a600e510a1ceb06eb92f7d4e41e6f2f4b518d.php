<?php $__env->startSection('content'); ?>
    <p>Hello,</p>
    <p>Please click on the following link to accept invitation to create account:</p>
    <p><a href="<?php echo e(url('invite/'.$invite->code)); ?>"><?php echo e(url('invite/'.$invite->code)); ?></a></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/emails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>