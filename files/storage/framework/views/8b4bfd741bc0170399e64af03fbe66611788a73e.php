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
                <i class="material-icons">filter_list</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group required">
                        <?php echo Form::label('main_menu', trans('eventSetting.menu'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::select('main_menu', $main_menu ,null, ['class' => 'form-control','id'=>'main_menu']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group required">
                        <?php echo Form::label('menuType', trans('eventSetting.menuTypes'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('menuType', null, ['class' => 'form-control','id'=>'menuType']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group required">
                        <?php echo Form::label('price', trans('eventSetting.pricePerPerson'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('price', null, ['class' => 'form-control','id'=>'price']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="controls">
                            <button class="btn btn-success" onclick="addMenuType()"><i class="fa fa-check-square-o"></i> <?php echo e(trans('eventSetting.add')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="" id="idData">
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="menuTypeTable">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('eventSetting.menu')); ?></th>
                        <th><?php echo e(trans('eventSetting.menuTypes')); ?></th>
                        <th><?php echo e(trans('eventSetting.pricePerPerson')); ?></th>
                        <th><?php echo e(trans('eventSetting.actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($menuTypes) > 0): ?>
                        <?php $__currentLoopData = $menuTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($menuType->main_menu->name); ?></td>
                                <td><?php echo e($menuType->name); ?></td>
                                <td><?php echo e($menuType->price_per_person); ?></td>
                                <td><a onclick="editMenuType('<?php echo e($menuType->id); ?>','<?php echo e($menuType->name); ?>','<?php echo e($menuType->price_per_person); ?>','<?php echo e($menuType->main_menu->id); ?>')" title="<?php echo e(trans('table.edit')); ?>">
                                        <i class="fa fa-fw fa-pencil text-warning"></i> </a>
                                    <a onclick="deleteMenuType('<?php echo e($menuType->id); ?>')" title="<?php echo e(trans('table.delete')); ?>">
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
        function addMenuType(){
            var name = $('#menuType').val();
            var price = $('#price').val();
            var main_menu = $('#main_menu').val();
            var id = $('#idData').val();

            if(name == ''){
                $.notify('Enter Menu Type');
                return;
            }

            if(id != ''){
                $.ajax({
                    url:'<?php echo e(url($type.'/storeMenuType')); ?>',
                    type:"POST",
                    data:{id:id,name:name,main_menu:main_menu,price:price,_token:'<?php echo e(csrf_token()); ?>'},
                    success:function(data){
                        location.reload();
                    }
                });
            }else{
                $.ajax({
                    url:'<?php echo e(url($type.'/storeMenuType')); ?>',
                    type:"POST",
                    data:{name:name,main_menu:main_menu,price:price,_token:'<?php echo e(csrf_token()); ?>'},
                    success:function(data){
                        location.reload();
                    }
                });
            }

        }

        function editMenuType(id,name,price,main_menu){
            $('#idData').val(id);
            $('#menuType').val(name);
            $('#main_menu').val(main_menu);
            $('#price').val(price);
        }
        function deleteMenuType(id){
            $.ajax({
                url:'<?php echo e(url($type.'/deleteMenuType')); ?>',
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