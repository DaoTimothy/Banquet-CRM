<?php $__env->startSection('content'); ?>
    Hello, <br><br><b>User: </b> '<?php echo e($user); ?>' has shared some documents with you :<br><br>
<?php echo e($bodyMessage); ?>



    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e($link); ?>"><?php echo e($key); ?></a><br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/emails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>