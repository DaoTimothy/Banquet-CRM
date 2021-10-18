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
                <i class="material-icons">leak_add</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group required <?php echo e($errors->has('leadSource') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('leadSource', trans('eventSetting.leadSource'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('leadSource', null, ['class' => 'form-control','id'=>'leadSource']); ?>

                            <span class="help-block"><?php echo e($errors->first('leadSource', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="controls">
                            <button class="btn btn-success" onclick="addLeadSource()"><i class="fa fa-check-square-o"></i> <?php echo e(trans('eventSetting.add')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="" id="idData">
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="leadSourceStable">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('eventSetting.sr_no')); ?></th>
                        <th><?php echo e(trans('eventSetting.leadSource')); ?></th>
                        <th><?php echo e(trans('eventSetting.actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($leadSources) > 0): ?>
                        <?php $__currentLoopData = $leadSources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leadSource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($leadSource->id); ?></td>
                                <td><?php echo e($leadSource->name); ?></td>
                                <td><a onclick="editLeadSource('<?php echo e($leadSource->id); ?>','<?php echo e($leadSource->name); ?>')" title="<?php echo e(trans('table.edit')); ?>">
                                        <i class="fa fa-fw fa-pencil text-warning"></i> </a>
                                    <a onclick="deleteLeadSource('<?php echo e($leadSource->id); ?>')" title="<?php echo e(trans('table.delete')); ?>">
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
        function addLeadSource(){
            var name = $('#leadSource').val();
            var id = $('#idData').val();

            if(name == ''){
                $.notify('Enter Lead Source');
                return;
            }

            if(id!= ''){
                $.ajax({
                    url:'<?php echo e(url($type.'/storeLeadSource')); ?>',
                    type:"POST",
                    data:{id:id,name:name,_token:'<?php echo e(csrf_token()); ?>'},
                    success:function(data){
                        location.reload();
                    }
                });
            }else{
                $.ajax({
                    url:'<?php echo e(url($type.'/storeLeadSource')); ?>',
                    type:"POST",
                    data:{name:name,_token:'<?php echo e(csrf_token()); ?>'},
                    success:function(data){
                        location.reload();
                    }
                });
            }
        }

        function editLeadSource(id,name){
            $('#idData').val(id);
            $('#leadSource').val(name);
        }

        function deleteLeadSource(id){
            $.ajax({
                url:'<?php echo e(url($type.'/deleteLeadSource')); ?>',
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