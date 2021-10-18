<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($menu)): ?>
            <?php echo Form::model($menu, ['url' => $type . '/' . $menu->id .'/updateSubMenu', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type.'/storeSubMenu', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

        <?php endif; ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('main_menu_id') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('main_menu_id', trans('eventSetting.mainMenu'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::select('main_menu_id', $main_menu,(isset($menu) ? $menu->main_menu_id : null), ['class' => 'form-control','id'=>'main_menu','onchange'=>'filterMenuType()']); ?>

                        <span class="help-block"><?php echo e($errors->first('main_menu_id', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('menu_type') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('menu_type', trans('eventSetting.menuTypes'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::select('menu_type', (isset($menu) ? $menu_type : []),null, ['class' => 'form-control','id'=>'menu_type']); ?>

                        <span class="help-block"><?php echo e($errors->first('menu_type', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('name', trans('eventSetting.name'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('name', (isset($menu) ? $menu->name : null), ['class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                    </div>
                </div>
            </div>
                <div class="col-md-4">
                    <div class="form-group required">
                        <?php echo Form::label('minimumPerson', trans('eventSetting.minimumPerson'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::number('minimumPerson', (isset($menu) ? $menu->min_person : null), ['class' => 'form-control','id'=>'minimumPerson' ,'min' =>0]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required">
                        <?php echo Form::label('maximumPerson', trans('eventSetting.maximumPerson'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::number('maximumPerson', (isset($menu) ? $menu->max_person : null), ['class' => 'form-control','id'=>'maximumPerson','min' =>0]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required">
                        <?php echo Form::label('time', trans('eventSetting.time'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('time', (isset($menu) ? $menu->times : null), ['class' => 'form-control','id'=>'time']); ?>

                        </div>
                    </div>
                </div>
        </div>
        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                <a href="<?php echo e(url($type.'/subMenu')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
            </div>
        </div>
        <!-- ./ form actions -->

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/tagsinput.js')); ?>"></script>
    <script>
        $(function(){
            $('#main_menu').select2({
                theme: "bootstrap",
                placeholder: "Select Menu"
            }).find("option:first").attr({
                selected: false
            });
            $('#menu_type').select2({
                theme: "bootstrap",
                placeholder: "Select Menu Type"
            });
            $("#time").datetimepicker({
                format: "HH:mm a"
            });
        });
        function filterMenuType(){
            var main_menu_id = $('#main_menu').val();

            $.ajax({
                url:'<?php echo e(url($type . '/filterMenuType')); ?>',
                type:"get",
                data:{id:main_menu_id,_token:'<?php echo e(csrf_token()); ?>'},
                success:function(data){
                    $('#menu_type').empty();
                    $('#menu_type').val();
                    $('#menu_type').select2({
                        theme: "bootstrap",
                        placeholder: "Select Menu Type"
                    }).trigger('change');
                    $.each(data, function (val, text) {
                        $('#menu_type').append($('<option></option>').val(val).html(text).attr('selected',0));
                    });
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>