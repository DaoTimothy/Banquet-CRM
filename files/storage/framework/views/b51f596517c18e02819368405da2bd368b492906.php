<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/icheck.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
    </div>
    <!-- ./ notifications -->
    <?php echo $__env->make('user/'.$type.'/_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/icheck.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('.icheck').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
        });
    </script>
    <script>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>