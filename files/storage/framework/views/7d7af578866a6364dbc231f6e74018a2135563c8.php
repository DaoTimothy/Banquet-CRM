<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="panel panel-primary">
        <div class="panel-body">
            <?php if(isset($data)): ?>
                <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/updateMenuType', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

            <?php else: ?>
                <?php echo Form::open(['url' => $type.'/storeMenuType', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

            <?php endif; ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group required">
                        <?php echo Form::label('main_menu', trans('eventSetting.menu'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::select('main_menu', $main_menu ,(isset($data) ? $data->main_menu_id : null), ['class' => 'form-control select2','id'=>'main_menu']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required">
                        <?php echo Form::label('menuType', trans('eventSetting.menuTypes'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('menuType', (isset($data) ? $data->name : null), ['class' => 'form-control','id'=>'menuType']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required">
                        <?php echo Form::label('price', trans('eventSetting.pricePerPerson'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::number('price', (isset($data) ? $data->price_per_person : null), ['class' => 'form-control','id'=>'price' ,'min' => 0]); ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-group">
                <div class="controls">
                    <button class="btn btn-success" onclick="addMenuType()"><i class="fa fa-check-square-o"></i> <?php echo e(trans('eventSetting.add')); ?></button>
                    <a href="<?php echo e(url($type.'/menuType')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                </div>
            </div>
            <!-- ./ form actions -->
            <input type="hidden" id="supplierPackages" name="supplierPackages" value="">
            <?php echo Form::close(); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/tagsinput.js')); ?>"></script>

    <script>
        $(document).submit(function (event) {
            if ($("#menuType").val() == '') {
                toastr["error"]("Enter Name Of Menu Type");
                event.preventDefault();
                return;
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>