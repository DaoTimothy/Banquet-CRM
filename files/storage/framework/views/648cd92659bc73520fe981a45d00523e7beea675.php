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
                            <?php echo Form::text('name', (isset($menu) ? $menu->name : null), ['class' => 'form-control' ,'id'=>'item_name']); ?>

                        </div>
                    </div>
                </div>
                
                    
                        
                        
                            
                        
                    
                
                
                    
                        
                        
                            
                        
                    
                
                
                    
                        
                        
                            
                        
                    
                
            </div>
            <div id="addNewSubmenu">
                <?php if(isset($menu)): ?>
                    <?php
                    $hour = explode(",",$menu->hours);
                    $person = explode(",",$menu->persons);
                    ?>
                    <?php $__currentLoopData = explode(",",$menu->price); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div id="addMenuContent_<?php echo e($key); ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group required">
                                        <?php if($key == 0): ?><?php echo Form::label('price', trans('eventSetting.price'), ['class' => 'control-label']); ?><?php endif; ?>
                                        <div class="controls">
                                            <?php echo Form::number('price_'.$key, $value, ['class' => 'form-control','id'=>'price_'.$key,'min' => 0]); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group required">
                                        <?php if($key == 0): ?><?php echo Form::label('hour', trans('eventSetting.hour'), ['class' => 'control-label']); ?><?php endif; ?>
                                        <div class="controls">
                                            <?php echo Form::number('hours_'.$key, (isset($hour[$key])) ? $hour[$key] : 0, ['class' => 'form-control','id'=>'hours_'.$key,'min' => 0]); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group required">
                                        <?php if($key == 0): ?><?php echo Form::label('person', trans('eventSetting.person'), ['class' => 'control-label']); ?><?php endif; ?>
                                        <div class="controls">
                                            <?php echo Form::number('persons_'.$key, (isset($person[$key])) ? $person[$key] : 0, ['class' => 'form-control','id'=>'persons_'.$key,'min' => 0]); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <?php if($key != 0): ?>
                                        <a onclick="removeContent('<?php echo e($key); ?>')"><i class="fa fa-fw fa-trash fa-lg text-danger"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div id="addMenuContent_0">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group required">
                                    <?php echo Form::label('price', trans('eventSetting.price'), ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::number('price_0', (isset($menu) ? $menu->price : null), ['class' => 'form-control','id'=>'price_0','min' => 0]); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group required">
                                    <?php echo Form::label('hour', trans('eventSetting.hour'), ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::number('hours_0', (isset($menu) ? $menu->hours : null), ['class' => 'form-control','id'=>'hours_0','min' => 0]); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group required">
                                    <?php echo Form::label('person', trans('eventSetting.person'), ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::number('persons_0', (isset($menu) ? $menu->persons : null), ['class' => 'form-control','id'=>'persons_0','min' => 0]); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-primary" id="subMenuItem" style="width: 15%"><?php echo e(trans('event.add')); ?></button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group required">
                        <?php echo Form::label('additional', trans('eventSetting.additionalHour'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::number('additional', (isset($menu) ? $menu->additional : null), ['class' => 'form-control' ,'min' => 0]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-9">
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
            <input type="hidden" id="menuItemBar" name="menuItemBar" value="">
            <!-- ./ form actions -->
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).submit(function (event) {
            if ($("#main_menu").val() == '' || $("#main_menu").val() == 0) {
                toastr["error"]("Select a Menu");
                event.preventDefault();
                return;
            }

            if ($("#menu_type").val() == '' || $("#menu_type").val() == 0) {
                toastr["error"]("Select a Menu Type");
                event.preventDefault();
                return;
            }

            if ($("#sub_menu").val() == '') {
                toastr["error"]("Select a Sub Menu");
                event.preventDefault();
                return;
            }

            if ($("#item_name").val() == '' || $("#item_name").val() == 0) {
                toastr["error"]("Enter Item Name");
                event.preventDefault();
                return;
            }
        });

        var count = <?php echo e((isset($menu) ? count(explode(",",$menu->price)) - 1 : 0)); ?>;
        var count_stack = Array.from(Array(count + 1).keys());
        $('#menuItemBar').val(count_stack);
        $(document).ready(function () {
            $("#subMenuItem").click(function () {
                count = count + 1;
                var html = '<div id="addMenuContent_'+count+'">' +
                    '<div class="row">' +
                    '<div class="col-md-3">' +
                    '<div class="form-group required">' +
                    '<div class="controls">' +
                    '<input type="number" name="price_'+count+'" value="" class="form-control" id="price_'+count+'" min="0">'+
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<div class="form-group required">' +
                    '<div class="controls">' +
                    '<input type="number" name="hours_'+count+'" value="" class="form-control" id="hours_'+count+'" min="0">'+
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<div class="form-group required">' +
                    '<div class="controls">' +
                    '<input type="number" name="persons_'+count+'" value="" class="form-control" id="persons_'+count+'" min="0">'+
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<a onclick="removeContent('+count+')"><i class="fa fa-fw fa-trash fa-lg text-danger"></i></a></div>' +
                    '</div>' +
                    '</div>'+
                    '</div>';
                $("#addNewSubmenu").append(html);
                count_stack.push(count);
                $('#menuItemBar').val(count_stack);
            });
        });

        function removeContent(id){
            $('#addMenuContent_'+id).remove();
        }
    </script>
    <script>
        $(function () {
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

        function filterMenuType() {
            var main_menu_id = $('#main_menu').val();

            $.ajax({
                url: '<?php echo e(url($type . '/filterMenuType')); ?>',
                type: "get",
                data: {id: main_menu_id, _token: '<?php echo e(csrf_token()); ?>'},
                success: function (data) {
                    $('#menu_type').empty();
                    $('#menu_type').val();
                    $('#menu_type').select2({
                        theme: "bootstrap",
                        placeholder: "Select Menu Type"
                    }).trigger('change');
                    $.each(data, function (val, text) {
                        $('#menu_type').append($('<option></option>').val(val).html(text).attr('selected', 0));
                    });
                }
            });
        }

        function filterSubMenu() {
            var menu_type_id = $('#menu_type').val();

            $.ajax({
                url: '<?php echo e(url($type . '/filterSubMenu')); ?>',
                type: "get",
                data: {id: menu_type_id, _token: '<?php echo e(csrf_token()); ?>'},
                success: function (data) {
                    $('#sub_menu').empty();
                    $('#sub_menu').val();
                    $('#sub_menu').select2({
                        theme: "bootstrap",
                        placeholder: "Select Sub Menu Type"
                    });
                    $.each(data, function (val, text) {
                        $('#sub_menu').append($('<option></option>').val(val).html(text).attr('selected', 0));
                    });
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>