<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('vendor.flash.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="page-header clearfix">
        <?php if($user_data->hasAccess(['eventSettings.read']) || $user_data->inRole('admin')): ?>
            <div class="pull-right">
                <a href="#" class="btn btn-primary">
                    <i class="icon-deletecolor"></i> <?php echo e(trans('Delete List')); ?></a>
                <a href="<?php echo e(url($type.'/menuCreate')); ?>" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('eventSetting.create')); ?></a>
            </div>
        <?php endif; ?>

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
                <table class="table table-bordered" id="menuTable">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('eventSetting.menuTypes')); ?></th>
                        <th><?php echo e(trans('eventSetting.menu')); ?></th>
                        <th><?php echo e(trans('eventSetting.actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($menus) > 0): ?>
                        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($menu->menuType->name); ?></td>
                                <td><?php echo e($menu->name); ?></td>
                                <td><a href="<?php echo e(url('eventSetting/' . $menu->id . '/editMenu' )); ?>" title="<?php echo e(trans('table.edit')); ?>">
                                        <i class="fa fa-fw fa-pencil text-warning"></i> </a>
                                    <a onclick="deleteMenu('<?php echo e($menu->id); ?>')" title="<?php echo e(trans('table.delete')); ?>">
                                        <i class="fa fa-fw fa-trash text-danger"></i> </a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function deleteMenu(id){
            $.ajax({
                url:'<?php echo e(url($type.'/deleteMenu')); ?>',
                type:"get",
                data:{id:id,_token:'<?php echo e(csrf_token()); ?>'},
                success:function(data){
                    location.reload();
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>