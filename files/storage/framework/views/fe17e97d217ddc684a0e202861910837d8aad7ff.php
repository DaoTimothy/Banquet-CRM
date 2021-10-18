<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <div class="pull-right">
            <a href="<?php echo e($type.'/create'); ?>" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i> <?php echo e(trans('eventSetting.create')); ?></a>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">view_comfy</i>
                <?php echo e($title); ?>

            </h4>
            <label class="radio-inline">
                <input type='radio' id='category' name='category' checked value='__' class='icheck'/> All
            </label>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label class="radio-inline">
                    <input type='radio' id='category' name='category' value='<?php echo e($key); ?>' class='icheck'/> <?php echo e($value); ?>

                </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('option.category')); ?></th>
                        <th><?php echo e(trans('option.title')); ?></th>
                        <th><?php echo e(trans('option.value')); ?></th>
                        <th><?php echo e(trans('table.actions')); ?></th>
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