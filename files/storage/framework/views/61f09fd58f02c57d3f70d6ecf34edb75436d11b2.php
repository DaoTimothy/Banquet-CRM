<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
    </div>
    <div class="panel panel-primary">
        <div class="panel-body">
            <?php if(isset($data)): ?>
                <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/updateDepositType', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

            <?php else: ?>
                <?php echo Form::open(['url' => $type.'/storeDepositType', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

            <?php endif; ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group required <?php echo e($errors->has('depositsType') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('depositsType', trans('eventSetting.depositsType'), ['class' => 'control-label']); ?>

                            <div class="controls">
                                <?php echo Form::text('depositsType', (isset($data) ? $data->name : null), ['class' => 'form-control','id'=>'depositsType']); ?>

                                <span class="help-block"><?php echo e($errors->first('depositsType', ':message')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Form Actions -->
            <div class="form-group">
                <div class="controls">
                    <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> <?php echo e(trans('eventSetting.add')); ?></button>
                    <a href="<?php echo e(url($type.'/depositsType')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                </div>
            </div>
            <!-- ./ form actions -->
            <input type="hidden" id="supplierPackages" name="supplierPackages" value="">
            <?php echo Form::close(); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>