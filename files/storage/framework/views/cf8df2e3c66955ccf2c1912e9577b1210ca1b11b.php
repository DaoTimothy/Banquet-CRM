<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">local_shipping</i>
                <?php echo e($title); ?>

            </h4>
            <label class="radio-inline">
                <input type='radio' id='category' name='category' checked value='__' class='icheck'/> <?php echo e(trans('left_menu.all')); ?>

            </label>
            <label class="radio-inline">
                <input type='radio' id='category' name='category' value='caterer' class='icheck'/> <?php echo e(trans('left_menu.caterer')); ?>

            </label>
            <label class="radio-inline">
                <input type='radio' id='category' name='category' value='entertainer' class='icheck'/> <?php echo e(trans('left_menu.entertainer')); ?>

            </label>
            <label class="radio-inline">
                <input type='radio' id='category' name='category' value='photo' class='icheck'/> <?php echo e(trans('left_menu.photographer')); ?>

            </label>
            <label class="radio-inline">
                <input type='radio' id='category' name='category' value='transport' class='icheck'/> <?php echo e(trans('left_menu.transport')); ?>

            </label>
            <label class="radio-inline">
                <input type='radio' id='category' name='category' value='decorator' class='icheck'/> <?php echo e(trans('left_menu.decorator')); ?>

            </label>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('eventSetting.supplier_name')); ?></th>
                        <th><?php echo e(trans('eventSetting.email')); ?></th>
                        <th><?php echo e(trans('eventSetting.contact')); ?></th>
                        <th><?php echo e(trans('eventSetting.address')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {
            $('.icheck').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
        });
    </script>
    <script>
        $('input[type=radio]').on('ifChecked', function (event) {
            oTable.ajax.url('<?php echo url($type.'/data'); ?>/' + $(this).val());
            oTable.ajax.reload();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>