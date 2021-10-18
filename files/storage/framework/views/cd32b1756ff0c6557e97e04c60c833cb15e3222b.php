<div id="food-menu-content" class="row">
    <div class="col-md-3">
        <div class="form-group"><?php echo Form::label('menu', trans('Menu'), ['class' => 'control-label required']); ?>

            <div class="controls"><?php echo Form::select('menu_choice[]',isset($menus)?$menus:[0=>trans('-- Select --')], null,['class' => 'form-control select2',"id"=>"menu"]); ?></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group require"><?php echo Form::label('menuType', trans('Menu Types'), ['class' => 'control-label required']); ?>

            <div class="controls"><?php echo Form::select('menuType',isset($food_category)?$food_category:[0=>trans('-- Select --')], null,['class' => 'form-control select2',"id"=>"menuType"]); ?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="staff-show-detail">
            <button type="button" data-toggle="modal" data-target="#menuItemModel" class="btn btn-primary add-menu-food" id="MenuItem">Menu Item
            </button>
            <div class="modal fade" id="menuItemModel" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Menu Items</h4>
                        </div>
                        <div class="modal-body">
                            <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#subMenuItem">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <b>Soup</b>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <i class="fa fa-fw fa-chevron-down"></i>
                                        <i class="fa fa-fw fa-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div id="subMenuItem" class="collapse multi-collapse">
                                <div class="event_collapse_padding">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group required <?php echo e($errors->has('room') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('room', trans('Sub Menu Items'), ['class' => 'control-label required']); ?>

                                                <div class="form-group">
                                                    <?php if(count($event_rooms) > 0): ?>
                                                        <?php $__currentLoopData = $event_rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rooms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <label>
                                                                <input type="checkbox" value="<?php echo e($rooms['id']); ?>" name="room[]" id="all_day" class='icheck'
                                                                       <?php if(isset($room_data) && in_array($rooms['id'],$room_data)): ?>checked <?php endif; ?>>
                                                                <?php echo e($rooms['room_name']); ?>

                                                            </label>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <label>
                                                            No Rooms Available
                                                        </label>
                                                    <?php endif; ?>
                                                </div>
                                                <span class="help-block"><?php echo e($errors->first('room', ':message')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" onclick="menuChoice()">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>