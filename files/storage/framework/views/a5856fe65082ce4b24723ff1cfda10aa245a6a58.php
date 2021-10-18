<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">view_comfy</i>
                <?php echo e($title); ?>

            </h4>
            <label class="radio-inline">
                <input type='radio' id='category' name='category' checked value='week' class='icheck'/> Weekly
            </label>
            <label class="radio-inline">
                <input type='radio' id='category' name='category' value='month' class='icheck'/> Monthly
            </label>
            <label class="radio-inline">
                <input type='radio' id='category' name='category' value='year' class='icheck'/> Yearly
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
                        <th><?php echo e(trans('lead.creation_date')); ?></th>
                        <th><?php echo e(trans('lead.company_name')); ?></th>
                        <th><?php echo e(trans('lead.agent_name')); ?></th>
                        <th><?php echo e(trans('lead.product_name')); ?></th>
                        <th><?php echo e(trans('lead.email')); ?></th>
                        <th><?php echo e(trans('lead.phone')); ?></th>
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