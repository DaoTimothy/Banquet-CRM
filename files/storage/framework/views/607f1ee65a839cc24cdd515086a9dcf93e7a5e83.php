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
                <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/updateMenu', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

            <?php else: ?>
                <?php echo Form::open(['url' => $type.'/storeMenu', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

            <?php endif; ?>
                <div class="row ">
                    <div class="col-md-3">
                        <div class="form-group required">
                            <?php echo Form::label('name', trans('eventSetting.name'), ['class' => 'control-label']); ?>

                            <div class="controls">
                                <?php echo Form::text('name', (isset($data) ? $data->name : null), ['class' => 'form-control','id'=>'name']); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group required">
                            <?php echo Form::label('minimumPerson', trans('eventSetting.minimumPerson'), ['class' => 'control-label']); ?>

                            <div class="controls">
                                <?php echo Form::number('minimumPerson', (isset($data) ? $data->min_person : null), ['class' => 'form-control','id'=>'minimumPerson','min' => 0]); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group required">
                            <?php echo Form::label('maximumPerson', trans('eventSetting.maximumPerson'), ['class' => 'control-label']); ?>

                            <div class="controls">
                                <?php echo Form::number('maximumPerson', (isset($data) ? $data->max_person : null), ['class' => 'form-control','id'=>'maximumPerson','min' => 0]); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group required">
                            <?php echo Form::label('table', trans('eventSetting.table'), ['class' => 'control-label']); ?>

                            <div class="controls">
                                <?php echo Form::number('tables', (isset($data) ? $data->tables : null), ['class' => 'form-control','id'=>'table','min' => 0]); ?>

                            </div>
                        </div>
                    </div>
                </div>

            <!-- Form Actions -->
            <div class="form-group">
                <div class="controls">
                    <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                    <a href="<?php echo e(url($type.'/menu')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
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
            if ($("#name").val() == '') {
                toastr["error"]("Enter Name Of Menu");
                event.preventDefault();
                return;
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>