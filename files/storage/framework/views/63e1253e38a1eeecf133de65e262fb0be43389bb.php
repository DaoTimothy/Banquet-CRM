<script src="<?php echo e(url(mix('js/libs.js'))); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/metisMenu.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/lcrm_app.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url(mix('js/secure.js'))); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/icheck.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/notify.js')); ?>" type="text/javascript"></script>

<?php echo $__env->make('layouts._datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
