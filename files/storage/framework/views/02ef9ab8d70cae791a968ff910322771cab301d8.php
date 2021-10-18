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
                <i class="material-icons">swap_horiz</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group required <?php echo e($errors->has('depositsType') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('depositsType', trans('eventSetting.depositsType'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('depositsType', null, ['class' => 'form-control','id'=>'depositsType']); ?>

                            <span class="help-block"><?php echo e($errors->first('depositsType', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="controls">
                            <button class="btn btn-success" onclick="addDepositType()"><i class="fa fa-check-square-o"></i> <?php echo e(trans('eventSetting.add')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="" id="idData">
            <div class="table-responsive">
                <table class="table table-bordered" id="depositTypeTable">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('eventSetting.sr_no')); ?></th>
                        <th><?php echo e(trans('eventSetting.depositsType')); ?></th>
                        <th><?php echo e(trans('eventSetting.actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($depositTypes) > 0): ?>
                        <?php $__currentLoopData = $depositTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depositType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($depositType->id); ?></td>
                                <td><?php echo e($depositType->name); ?></td>
                                <td><a onclick="editDepositType('<?php echo e($depositType->id); ?>','<?php echo e($depositType->name); ?>')" title="<?php echo e(trans('table.edit')); ?>">
                                        <i class="fa fa-fw fa-pencil text-warning"></i> </a>
                                    <a onclick="deleteDepositType('<?php echo e($depositType->id); ?>')" title="<?php echo e(trans('table.delete')); ?>">
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
        function addDepositType(){
            var name = $('#depositsType').val();
            var id = $('#idData').val();

            if(name == ''){
                $.notify('Enter Deposit Type');
                return;
            }

            if(id != ''){
                $.ajax({
                    url:'<?php echo e(url($type.'/storeDepositType')); ?>',
                    type:"POST",
                    data:{id:id,name:name,_token:'<?php echo e(csrf_token()); ?>'},
                    success:function(data){
                        location.reload();
                    }
                });
            }else{
                $.ajax({
                    url:'<?php echo e(url($type.'/storeDepositType')); ?>',
                    type:"POST",
                    data:{name:name,_token:'<?php echo e(csrf_token()); ?>'},
                    success:function(data){
                        location.reload();
                    }
                });
            }
        }

        function editDepositType(id,name){
            $('#idData').val(id);
            $('#depositsType').val(name);
        }

        function deleteDepositType(id){
            $.ajax({
                url:'<?php echo e(url($type.'/deleteDepositType')); ?>',
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