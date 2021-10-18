<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($menu)): ?>
            <?php echo Form::model($menu, ['url' => $type . '/' . $menu->id .'/updateMenu', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type.'/storeMenu', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

        <?php endif; ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('menuTypes') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('menuTypes', trans('eventSetting.menuTypes'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::select('menu_type_id', $menuTypes,(isset($menu) ? $menu->menu_type_id : null), ['class' => 'form-control','id'=>'menu_type_id']); ?>

                        <span class="help-block"><?php echo e($errors->first('menuTypes', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('menu') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('menu', trans('eventSetting.menu'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('name', (isset($menu) ? $menu->name : null), ['class' => 'form-control','id'=>'menu']); ?>

                        <span class="help-block"><?php echo e($errors->first('menu', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('price', trans('eventSetting.price'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('price', (isset($menu) ? $menu->price : null), ['class' => 'form-control','id'=>'menu']); ?>

                        <span class="help-block"><?php echo e($errors->first('price', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                <a href="<?php echo e(url($type.'/menu')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
            </div>
        </div>
        <!-- ./ form actions -->

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/tagsinput.js')); ?>"></script>
<?php $__env->stopSection(); ?>