<?php $__env->startSection('content'); ?>
    Hello, <br><br><b>User: </b> '<?php echo e($user); ?>' has sent you this message:<br>
<?php echo e($bodyMessage); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/emails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>