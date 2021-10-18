<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($menu)): ?>
            <?php echo Form::model($menu, ['url' => $type . '/' . $menu->id .'/updateMenuItem', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type.'/storeMenuItem', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

        <?php endif; ?>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group required">
                    <?php echo Form::label('main_menu_id', trans('eventSetting.menu'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::select('main_menu_id', $main_menu,(isset($menu) ? $menu->main_menu_id : null), ['class' => 'form-control','onchange'=>'filterMenuType()','id'=>'main_menu']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group required">
                    <?php echo Form::label('menu_type', trans('eventSetting.menuTypes'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::select('menu_type', (isset($menu) ? $menu_type : []),null, ['class' => 'form-control','id'=>'menu_type','onchange'=>'filterSubMenu()']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group required">
                    <?php echo Form::label('sub_menu', trans('eventSetting.subMenu'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::select('sub_menu_id', (isset($menu) ? $sub_menu : []),null, ['class' => 'form-control','id'=>'sub_menu']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group required">
                    <?php echo Form::label('name', trans('eventSetting.name'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('name', (isset($menu) ? $menu->name : null), ['class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
        </div>
         <div class="row">
             <div class="col-md-3">
                 <div class="form-group required">
                     <?php echo Form::label('price', trans('eventSetting.price'), ['class' => 'control-label']); ?>

                     <div class="controls">
                         <?php echo Form::text('price', (isset($menu) ? $menu->price : null), ['class' => 'form-control']); ?>

                     </div>
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group required">
                     <?php echo Form::label('hour', trans('eventSetting.hour'), ['class' => 'control-label']); ?>

                     <div class="controls">
                         <?php echo Form::text('hours', (isset($menu) ? $menu->hours : null), ['class' => 'form-control']); ?>

                     </div>
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group required">
                     <?php echo Form::label('person', trans('eventSetting.person'), ['class' => 'control-label']); ?>

                     <div class="controls">
                         <?php echo Form::text('persons', (isset($menu) ? $menu->persons : null), ['class' => 'form-control']); ?>

                     </div>
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group required">
                     <?php echo Form::label('additional', trans('eventSetting.additionalHour'), ['class' => 'control-label']); ?>

                     <div class="controls">
                         <?php echo Form::text('additional', (isset($menu) ? $menu->additional : null), ['class' => 'form-control']); ?>

                     </div>
                 </div>
             </div>
             <div class="col-md-12">
                 <div class="form-group required">
                     <?php echo Form::label('description', trans('eventSetting.description'), ['class' => 'control-label']); ?>

                     <div class="controls">
                         <?php echo Form::text('description', (isset($menu) ? $menu->description : null), ['class' => 'form-control']); ?>

                     </div>
                 </div>
             </div>
         </div>
        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                <a href="<?php echo e(url($type.'/menuItem')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
            </div>
        </div>
        <!-- ./ form actions -->

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/tagsinput.js')); ?>"></script>
    <script>
        $(function(){
            $('#main_menu').select2({
                theme: "bootstrap",
                placeholder: "Select Menu"
            });
            $('#menu_type').select2({
                theme: "bootstrap",
                placeholder: "Select Menu Type"
            });
            $('#sub_menu').select2({
                theme: "bootstrap",
                placeholder: "Select Sub Menu Type"
            })
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
        function filterSubMenu(){
            var menu_type_id = $('#menu_type').val();

            $.ajax({
                url:'<?php echo e(url($type . '/filterSubMenu')); ?>',
                type:"get",
                data:{id:menu_type_id,_token:'<?php echo e(csrf_token()); ?>'},
                success:function(data){
                    $('#sub_menu').empty();
                    $('#sub_menu').val();
                    $('#sub_menu').select2({
                        theme: "bootstrap",
                        placeholder: "Select Sub Menu Type"
                    });
                    $.each(data, function (val, text) {
                        $('#sub_menu').append($('<option></option>').val(val).html(text).attr('selected',0));
                    });
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>