<?php $__env->startSection('content'); ?>
Hello, <br><br><b>Email:</b>  <?php echo e($email); ?> <br> <b>Password:</b>
<?php echo e($password); ?> <br>Please <a href=" <?php echo e(url('signin')); ?> ">click here</a> for login
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/emails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>