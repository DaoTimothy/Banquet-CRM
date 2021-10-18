<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('vendor.flash.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">room_service</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required <?php echo e($errors->has('catererServiceType') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('catererServiceType', trans('eventSetting.catererServiceType'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('catererServiceType', null, ['class' => 'form-control','id'=>'catererServiceType']); ?>

                            <span class="help-block"><?php echo e($errors->first('catererServiceType', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('counters') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('counters', trans('eventSetting.counters'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('counters', null, ['class' => 'form-control','id'=>'counters']); ?>

                            <span class="help-block"><?php echo e($errors->first('counters', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-success" onclick="addType()"><i class="fa fa-check-square-o"></i> <?php echo e(trans('eventSetting.add')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="" id="idData">
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="service_type">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('eventSetting.sr_no')); ?></th>
                        <th><?php echo e(trans('eventSetting.catererServiceType')); ?></th>
                        <th><?php echo e(trans('eventSetting.counters')); ?></th>
                        <th><?php echo e(trans('eventSetting.actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if(count($catering_type) > 0): ?>
                            <?php $__currentLoopData = $catering_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($types->id); ?></td>
                                    <td><?php echo e($types->name); ?></td>
                                    <td><?php echo e($types->counters); ?></td>
                                    <td><a onclick="editCatererType('<?php echo e($types->id); ?>','<?php echo e($types->name); ?>','<?php echo e($types->counters); ?>')" title="<?php echo e(trans('table.edit')); ?>">
                                            <i class="fa fa-fw fa-pencil text-warning"></i> </a>
                                        <a onclick="deleteCatererType('<?php echo e($types->id); ?>')" title="<?php echo e(trans('table.delete')); ?>">
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
        function addType(){
            var name = $('#catererServiceType').val();
            var counter = $('#counters').val();
            var id = $('#idData').val();

            if(name == ''){
                $.notify('Enter Service Type');
                return;
            }

            if(counter == ''){
                $.notify('Enter Number of counter');
                return;
            }

            if(id!=''){
                $.ajax({
                    url:'<?php echo e(url($type.'/storeCateringServiceType')); ?>',
                    type:"POST",
                    data:{id:id,name:name,counter:counter,_token:'<?php echo e(csrf_token()); ?>'},
                    success:function(data){
                        location.reload();
                    }
                });
            }else{
                $.ajax({
                    url:'<?php echo e(url($type.'/storeCateringServiceType')); ?>',
                    type:"POST",
                    data:{name:name,counter:counter,_token:'<?php echo e(csrf_token()); ?>'},
                    success:function(data){
                        location.reload();
                    }
                });
            }
        }

        function editCatererType(id,name,counter){
            $('#idData').val(id);
            $('#catererServiceType').val(name);
            $('#counters').val(counter);
        }

        function deleteCatererType(id){
            $.ajax({
                url:'<?php echo e(url($type.'/deleteCateringServiceType')); ?>',
                type:"POST",
                data:{id:id,_token:'<?php echo e(csrf_token()); ?>'},
                success:function(data){
                    location.reload();
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>