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
                
                    
                <a href="<?php echo e(url($type.'/subMenuCreate')); ?>" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('eventSetting.create')); ?></a>
            </div>
        <?php endif; ?>

    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">format_indent_increase</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>
        <input type="hidden" id="menu_id" value="0">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group <?php echo e($errors->has('menu') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('menu', trans('eventSetting.menu'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('menu',isset($main_menu)?$main_menu:[0=>trans('-- Select --')], (isset($event) ? $event->booking->location_id : null), ['id'=>'menu', 'class' => 'form-control select2','onchange'=>'filter1(this.options[this.selectedIndex].value)']); ?>

                            <span class="help-block"><?php echo e($errors->first('menu', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group <?php echo e($errors->has('menuTypes') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('menuTypes', trans('eventSetting.menuTypes'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('menuTypes',isset($menu_type)?$menu_type:[0=>trans('-- Select --')], (isset($event) ? $event->booking->location_id : null), ['id'=>'menuTypes', 'class' => 'form-control select2','onchange'=>'filter(this.options[this.selectedIndex].value)']); ?>

                            <span class="help-block"><?php echo e($errors->first('menu', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="data">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('eventSetting.menu')); ?></th>
                        <th><?php echo e(trans('eventSetting.menuTypes')); ?></th>
                        <th><?php echo e(trans('eventSetting.name')); ?></th>
                        <th><?php echo e(trans('eventSetting.minimumPerson')); ?></th>
                        <th><?php echo e(trans('eventSetting.maximumPerson')); ?></th>
                        <th><?php echo e(trans('eventSetting.time')); ?></th>
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
        function filter1(value){
            oTable.ajax.url('<?php echo url($type.'/data'); ?>/' + value + '/' + 0);
            oTable.ajax.reload();
            $('#menu_id').val(value);
        }
        function filter(value){
            oTable.ajax.url('<?php echo url($type.'/data'); ?>/' + $('#menu_id').val() + '/' + value);
            oTable.ajax.reload();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>