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
            <div class="m-t-20">
                <select id='category' name='category' class="select2">
                    <option value="__"><?php echo e(trans('left_menu.all')); ?></option>
                    <option value="caterer"><?php echo e(trans('left_menu.caterer')); ?></option>
                    <option value="entertainer"><?php echo e(trans('left_menu.entertainer')); ?></option>
                    <option value="photo"><?php echo e(trans('left_menu.photographer')); ?></option>
                    <option value="transport"><?php echo e(trans('left_menu.transport')); ?></option>
                    <option value="decorator"><?php echo e(trans('left_menu.decorator')); ?></option>
                </select>
            </div>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered table-hover">
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
        $('#category').on('change', function (event) {
            oTable.ajax.url('<?php echo url($type.'/data'); ?>/' + $(this).val());
            oTable.ajax.reload();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>