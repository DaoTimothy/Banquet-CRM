<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('vendor.flash.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="page-header clearfix">
        <div class="pull-right">
            <a href="<?php echo e(url($type.'/mainMenuCreate')); ?>" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i> <?php echo e(trans('eventSetting.create')); ?></a>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">restaurant_menu</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="data">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('eventSetting.name')); ?></th>
                        <th><?php echo e(trans('eventSetting.minimumPerson')); ?></th>
                        <th><?php echo e(trans('eventSetting.maximumPerson')); ?></th>
                        <th><?php echo e(trans('eventSetting.table')); ?></th>
                        <th><?php echo e(trans('eventSetting.actions')); ?></th>
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
        function addMenu() {
            var name = $('#name').val();
            var id = $('#idData').val();

            if (name == '') {
                toastr["error"]("Enter Menu Name");
                return;
            }

            if (id != '') {
                $.ajax({
                    url: '<?php echo e(url($type.'/storeMenu')); ?>',
                    type: "POST",
                    data: {id: id, name: name, _token: '<?php echo e(csrf_token()); ?>'},
                    success: function (data) {
                        location.reload();
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo e(url($type.'/storeMenu')); ?>',
                    type: "POST",
                    data: {name: name, _token: '<?php echo e(csrf_token()); ?>'},
                    success: function (data) {
                        location.reload();
                    }
                });
            }

        }

        function editMenu(id, name) {
            $('#idData').val(id);
            $('#name').val(name);
        }

        function deleteMenu(id) {
            $.ajax({
                url: '<?php echo e(url($type.'/deleteMenu')); ?>',
                type: "POST",
                data: {id: id, _token: '<?php echo e(csrf_token()); ?>'},
                success: function (data) {
                    location.reload();
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>