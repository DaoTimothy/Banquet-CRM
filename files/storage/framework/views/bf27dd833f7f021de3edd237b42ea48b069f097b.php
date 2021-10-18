<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">dvr</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>
        <?php echo Form::open(['url' => $type.'/terms', 'method' => 'post', 'files'=> false, 'id' => 'eventSetting']); ?>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('foodBeverageService') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('foodBeverageService', trans('eventSetting.foodBeverageService'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('foodBeverageService', (isset($eventTerms) ? $eventTerms->food_beverage : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Food & Beverage Service']); ?>

                            <span class="help-block"><?php echo e($errors->first('foodBeverageService', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('administrativeFees') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('administrativeFees', trans('eventSetting.administrativeFees'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('administrativeFees', (isset($eventTerms) ? $eventTerms->administrative_fees : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Administrative Fees']); ?>

                            <span class="help-block"><?php echo e($errors->first('administrativeFees', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('functionRoomAssignments') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('functionRoomAssignments', trans('eventSetting.functionRoomAssignments'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('functionRoomAssignments', (isset($eventTerms) ? $eventTerms->function_room_assignement : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Function Room Assignments']); ?>

                            <span class="help-block"><?php echo e($errors->first('functionRoomAssignments', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('guarantees') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('guarantees', trans('eventSetting.guarantees'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('guarantees', (isset($eventTerms) ? $eventTerms->guarantees : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Guarantees']); ?>

                            <span class="help-block"><?php echo e($errors->first('guarantees', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('menuPricing') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('menuPricing', trans('eventSetting.menuPricing'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('menuPricing', (isset($eventTerms) ? $eventTerms->menu_pricing : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Menu Pricing']); ?>

                            <span class="help-block"><?php echo e($errors->first('menuPricing', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('decoration') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('decoration', trans('eventSetting.decoration'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('decoration', (isset($eventTerms) ? $eventTerms->decoration : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Decoration']); ?>

                            <span class="help-block"><?php echo e($errors->first('decoration', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('securityParking') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('securityParking', trans('eventSetting.securityParking'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('securityParking', (isset($eventTerms) ? $eventTerms->security_parking : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Security / Parking']); ?>

                            <span class="help-block"><?php echo e($errors->first('securityParking', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('damages') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('damages', trans('eventSetting.damages'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('damages', (isset($eventTerms) ? $eventTerms->damages : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Damages']); ?>

                            <span class="help-block"><?php echo e($errors->first('damages', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('servicesFees') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('servicesFees', trans('eventSetting.servicesFees'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('servicesFees', (isset($eventTerms) ? $eventTerms->service_fees : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Services / Fees']); ?>

                            <span class="help-block"><?php echo e($errors->first('servicesFees', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <?php if(isset($eventTerms)): ?>
                    <input type="hidden" name="terms_id" value="<?php echo e($eventTerms->id); ?>">
                <?php endif; ?>
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('eventSetting.add')); ?></button>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>