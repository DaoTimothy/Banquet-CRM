<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<head>

    <style>
        .space_20 {
            clear: both;
            padding: 20px;
        }
        .body{
            height: 900vh;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="<?php echo e(asset('css/editor.css')); ?>" type="text/css" rel="stylesheet"/>

</head>

<?php $__env->startSection('content'); ?>

    <div class="panel panel-primary body">
        <div class="panel-body">
            <div style="border: 1px solid black">
                <table class="table table-striped">
                    <tr>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Rooms</th>
                        <th>When</th>
                        <th>Expected Guests</th>
                    </tr>
                    <tr>
                        <td>Tenantive</td>
                        <td>Wendding Ceremony</td>
                        <td>TGB</td>
                        <td>Vintahe Room</td>
                        <td> Mon,Feb 11,2018
                            4:00pm to 6:00pm</td>
                        <td>85</td>
                    </tr>
                </table>
            </div>
            <div class="space_20"></div>

            <h3><b>Event Information</b></h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-gorup required <?php echo e($errors->has('heading') ? 'has-error' : ''); ?>">
                        <?php echo Form::label ('heading', trans('Heading'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('heading',null,['class'=>'form-control','id' => 'heading']); ?>

                            <span class="help-block"><?php echo e($errors-> first('heading',':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <h3><b>Special Instructions</b></h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-gorup required <?php echo e($errors->has('instructions') ? 'has-error' : ''); ?>">
                        <?php echo Form::label ('instructions', trans('Special Instructions'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('instructions',null,['class'=>'form-control','id' => 'instructions']); ?>

                            <span class="help-block"><?php echo e($errors-> first('instructions',':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <h3><b>Lunch</b></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('lunch') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('lunch', trans('Lunch'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('lunch', null, ['class' => 'form-control','id'=> 'lunch']); ?>

                            <span class="help-block"><?php echo e($errors->first('lunch', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="control-label required"><?php echo e(trans('Lunch')); ?>

                        <span><?php echo $errors->first('lunch'); ?></span></label>
                    <div class="<?php echo e($errors->has('lunch_id.*') ? 'has-error' : ''); ?>">
                        <span class="help-block"><?php echo e($errors->first('lunch_id.*', ':message')); ?></span>
                    </div>
                    <div class="<?php echo e($errors->has('lunch_id') ? 'has-error' : ''); ?>">
                        <span class="help-block"><?php echo e($errors->first('lunch_id', ':message')); ?></span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="detailes-tr">
                                <th><?php echo e(trans('Item')); ?></th>
                                <th><?php echo e(trans('Quantity')); ?></th>
                                <th><?php echo e(trans('Description')); ?></th>
                                <th><?php echo e(trans('Price')); ?></th>
                                <th><?php echo e(trans('Total')); ?></th>
                                <th><?php echo e(trans('Delete')); ?></th>
                            </tr>
                            </thead>
                            <tbody id="InputsWrapper">

                            </tbody>
                        </table>
                    </div>
                    <button type="button" id="AddMoreFile"
                            class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> <?php echo e(trans('Lunch')); ?>

                    </button>
                    <div class="row">&nbsp;</div>
                </div>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#list">Add from Picklist</button>

            <h3><b>Dinner</b></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('dinner') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('dinner', trans('Dinner'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('dinner', null, ['class' => 'form-control','id'=> 'dinner']); ?>

                            <span class="help-block"><?php echo e($errors->first('dinner', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="control-label required"><?php echo e(trans('Dinner')); ?>

                        <span><?php echo $errors->first('dinner'); ?></span></label>
                    <div class="<?php echo e($errors->has('dinner_id.*') ? 'has-error' : ''); ?>">
                        <span class="help-block"><?php echo e($errors->first('dinner_id.*', ':message')); ?></span>
                    </div>
                    <div class="<?php echo e($errors->has('dinner_id') ? 'has-error' : ''); ?>">
                        <span class="help-block"><?php echo e($errors->first('dinner_id', ':message')); ?></span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="detailes-tr">
                                <th><?php echo e(trans('Quantity')); ?></th>
                                <th><?php echo e(trans('Description')); ?></th>
                                <th><?php echo e(trans('Price')); ?></th>
                                <th><?php echo e(trans('Total')); ?></th>
                                <th><?php echo e(trans('Delete')); ?></th>
                            </tr>
                            </thead>
                            <tbody id="InputsWrapperdinner">

                            <?php if(isset($saleorder) && $saleorder->products->count()>0): ?>
                                <?php $__currentLoopData = $saleorder->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $variants): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="remove_tr">
                                        <td>
                                            <input type="hidden" name="dinner_id[]" id="dinner_id<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->dinner_id); ?>"
                                                   readOnly>
                                            <input type="hidden" name="dinner_name[]" id="dinner_name<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->dinner_name); ?>"
                                                   readOnly>
                                            <select name="dinner_list" id="dinner_list<?php echo e($index); ?>" class="form-control lunch_list"
                                                    data-search="true" onchange="product_value(<?php echo e($index); ?>);">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $dinners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dinner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($dinner->id . '_' . $dinner->product_name . '_' . $dinner->sale_price . '_' . $dinner->description); ?>"
                                                            <?php if($dinner->id == $variants->product_id): ?> selected="selected" <?php endif; ?>><?php echo e($dinner->product_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        <td><textarea name=description[]" id="description<?php echo e($index); ?>" rows="2"
                                                      class="form-control resize_vertical" readOnly><?php echo e($variants->description); ?></textarea>
                                        </td>
                                        <td><input type="text" name="quantity[]" id="quantity<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->quantity); ?>"
                                                   class="form-control number"
                                                   onkeyup="product_price_changes('quantity<?php echo e($index); ?>','price<?php echo e($index); ?>','sub_total<?php echo e($index); ?>');">
                                        </td>
                                        <td><?php echo e($variants->price); ?><input type="hidden" name="price[]" id="price<?php echo e($index); ?>"
                                                                       value="<?php echo e($variants->price); ?>"
                                                                       class="form-control"></td>
                                        <input type="hidden" name="taxes[]" id="taxes<?php echo e($index); ?>"
                                               value="<?php echo e(floatval(Settings::get('sales_tax'))); ?>" class="form-control"></td>
                                        <td><input type="text" name="sub_total[]" id="sub_total<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->sub_total); ?>"
                                                   class="form-control" readOnly></td>
                                        <td><a href="javascript:void(0)" class="delete removeclass"><i
                                                        class="fa fa-fw fa-trash fa-lg text-danger"></i></a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" id="AddMoredinner"
                            class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> <?php echo e(trans('Dinner')); ?>

                    </button>
                    <div class="row">&nbsp;</div>
                </div>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#list">Add from Picklist</button>
            

            <h3><b>Beverage</b></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('beverage') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('beverage', trans('Beverage'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('beverage', null, ['class' => 'form-control','id'=> 'beverage']); ?>

                            <span class="help-block"><?php echo e($errors->first('beverage', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="control-label required"><?php echo e(trans('Beverage')); ?>

                        <span><?php echo $errors->first('beverage'); ?></span></label>
                    <div class="<?php echo e($errors->has('beverage_id.*') ? 'has-error' : ''); ?>">
                        <span class="help-block"><?php echo e($errors->first('beverage_id.*', ':message')); ?></span>
                    </div>
                    <div class="<?php echo e($errors->has('beverage_id') ? 'has-error' : ''); ?>">
                        <span class="help-block"><?php echo e($errors->first('beverage_id', ':message')); ?></span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="detailes-tr">
                                <th><?php echo e(trans('Quantity')); ?></th>
                                <th><?php echo e(trans('Description')); ?></th>
                                <th><?php echo e(trans('Price')); ?></th>
                                <th><?php echo e(trans('Total')); ?></th>
                                <th><?php echo e(trans('Delete')); ?></th>
                            </tr>
                            </thead>
                            <tbody id="InputsWrapperBeverage">

                            <?php if(isset($saleorder) && $saleorder->products->count()>0): ?>
                                <?php $__currentLoopData = $saleorder->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $variants): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="remove_tr">
                                        <td>
                                            <input type="hidden" name="lunch_id[]" id="lunch_id<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->lunch_id); ?>"
                                                   readOnly>
                                            <input type="hidden" name="lunch_name[]" id="lunch_name<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->lunch_name); ?>"
                                                   readOnly>
                                            <select name="lunch_list" id="lunch_list<?php echo e($index); ?>" class="form-control lunch_list"
                                                    data-search="true" onchange="product_value(<?php echo e($index); ?>);">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $beverages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beverage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($beverage->id . '_' . $beverage->product_name . '_' . $beverage->sale_price . '_' . $beverage->description); ?>"
                                                            <?php if($beverage->id == $variants->product_id): ?> selected="selected" <?php endif; ?>><?php echo e($beverage->product_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        <td><textarea name=description[]" id="description<?php echo e($index); ?>" rows="2"
                                                      class="form-control resize_vertical" readOnly><?php echo e($variants->description); ?></textarea>
                                        </td>
                                        <td><input type="text" name="quantity[]" id="quantity<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->quantity); ?>"
                                                   class="form-control number"
                                                   onkeyup="product_price_changes('quantity<?php echo e($index); ?>','price<?php echo e($index); ?>','sub_total<?php echo e($index); ?>');">
                                        </td>
                                        <td><?php echo e($variants->price); ?><input type="hidden" name="price[]" id="price<?php echo e($index); ?>"
                                                                       value="<?php echo e($variants->price); ?>"
                                                                       class="form-control"></td>
                                        <input type="hidden" name="taxes[]" id="taxes<?php echo e($index); ?>"
                                               value="<?php echo e(floatval(Settings::get('sales_tax'))); ?>" class="form-control"></td>
                                        <td><input type="text" name="sub_total[]" id="sub_total<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->sub_total); ?>"
                                                   class="form-control" readOnly></td>
                                        <td><a href="javascript:void(0)" class="delete removeclass"><i
                                                        class="fa fa-fw fa-trash fa-lg text-danger"></i></a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" id="AddMoreBeverage"
                            class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> <?php echo e(trans('Beverage')); ?>

                    </button>
                    <div class="row">&nbsp;</div>
                </div>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#list">Add from Picklist</button>
            

            <h3><b>Snacks</b></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('snacks') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('snacks', trans('Snacks'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('snacks', null, ['class' => 'form-control','id'=> 'snacks']); ?>

                            <span class="help-block"><?php echo e($errors->first('snacks', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="control-label required"><?php echo e(trans('Snacks')); ?>

                        <span><?php echo $errors->first('snacks'); ?></span></label>
                    <div class="<?php echo e($errors->has('snacks_id.*') ? 'has-error' : ''); ?>">
                        <span class="help-block"><?php echo e($errors->first('snacks_id.*', ':message')); ?></span>
                    </div>
                    <div class="<?php echo e($errors->has('snacks_id') ? 'has-error' : ''); ?>">
                        <span class="help-block"><?php echo e($errors->first('snacks_id', ':message')); ?></span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="detailes-tr">
                                <th><?php echo e(trans('Quantity')); ?></th>
                                <th><?php echo e(trans('Description')); ?></th>
                                <th><?php echo e(trans('Price')); ?></th>
                                <th><?php echo e(trans('Total')); ?></th>
                                <th><?php echo e(trans('Delete')); ?></th>
                            </tr>
                            </thead>
                            <tbody id="InputsWrapperSnacks">

                            <?php if(isset($saleorder) && $saleorder->products->count()>0): ?>
                                <?php $__currentLoopData = $saleorder->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $variants): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="remove_tr">
                                        <td>
                                            <input type="hidden" name="lunch_id[]" id="lunch_id<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->lunch_id); ?>"
                                                   readOnly>
                                            <input type="hidden" name="lunch_name[]" id="lunch_name<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->lunch_name); ?>"
                                                   readOnly>
                                            <select name="lunch_list" id="lunch_list<?php echo e($index); ?>" class="form-control lunch_list"
                                                    data-search="true" onchange="product_value(<?php echo e($index); ?>);">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $snacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $snack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($snack->id . '_' . $snack->product_name . '_' . $snack->sale_price . '_' . $snack->description); ?>"
                                                            <?php if($snack->id == $variants->product_id): ?> selected="selected" <?php endif; ?>><?php echo e($snack->product_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        <td><textarea name=description[]" id="description<?php echo e($index); ?>" rows="2"
                                                      class="form-control resize_vertical" readOnly><?php echo e($variants->description); ?></textarea>
                                        </td>
                                        <td><input type="text" name="quantity[]" id="quantity<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->quantity); ?>"
                                                   class="form-control number"
                                                   onkeyup="product_price_changes('quantity<?php echo e($index); ?>','price<?php echo e($index); ?>','sub_total<?php echo e($index); ?>');">
                                        </td>
                                        <td><?php echo e($variants->price); ?><input type="hidden" name="price[]" id="price<?php echo e($index); ?>"
                                                                       value="<?php echo e($variants->price); ?>"
                                                                       class="form-control"></td>
                                        <input type="hidden" name="taxes[]" id="taxes<?php echo e($index); ?>"
                                               value="<?php echo e(floatval(Settings::get('sales_tax'))); ?>" class="form-control"></td>
                                        <td><input type="text" name="sub_total[]" id="sub_total<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->sub_total); ?>"
                                                   class="form-control" readOnly></td>
                                        <td><a href="javascript:void(0)" class="delete removeclass"><i
                                                        class="fa fa-fw fa-trash fa-lg text-danger"></i></a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" id="AddMoreFileSnacks"
                            class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> <?php echo e(trans('Snacks')); ?>

                    </button>
                    <div class="row">&nbsp;</div>
                </div>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#list">Add from Picklist</button>
            

            <h3><b>Entertainment</b></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('entertainment') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('entertainment', trans('Entertainment'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('entertainment', null, ['class' => 'form-control','id'=> 'entertainment']); ?>

                            <span class="help-block"><?php echo e($errors->first('entertainment', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#entr">Add from Picklist</button>
            

            <h3><b>Equipment Requipment</b></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('equipment_requipment') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('equipment_requipment', trans('Equipment Requipment'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('equipment_requipment', null, ['class' => 'form-control','id'=> 'equipment']); ?>

                            <span class="help-block"><?php echo e($errors->first('equipment_requipment', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="control-label required"><?php echo e(trans('Equipment Requipment')); ?>

                        <span><?php echo $errors->first('snacks'); ?></span></label>
                    <div class="<?php echo e($errors->has('equipment_requipment_id.*') ? 'has-error' : ''); ?>">
                        <span class="help-block"><?php echo e($errors->first('equipment_requipment_id.*', ':message')); ?></span>
                    </div>
                    <div class="<?php echo e($errors->has('equipment_requipment_id') ? 'has-error' : ''); ?>">
                        <span class="help-block"><?php echo e($errors->first('equipment_requipment_id', ':message')); ?></span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="detailes-tr">
                                <th><?php echo e(trans('Quantity')); ?></th>
                                <th><?php echo e(trans('Description')); ?></th>
                                <th><?php echo e(trans('Price')); ?></th>
                                <th><?php echo e(trans('Total')); ?></th>
                                <th><?php echo e(trans('Delete')); ?></th>
                            </tr>
                            </thead>
                            <tbody id="InputsWrapperEquipmentRequipment">

                            <?php if(isset($saleorder) && $saleorder->products->count()>0): ?>
                                <?php $__currentLoopData = $saleorder->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $variants): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="remove_tr">
                                        <td>
                                            <input type="hidden" name="lunch_id[]" id="lunch_id<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->lunch_id); ?>"
                                                   readOnly>
                                            <input type="hidden" name="lunch_name[]" id="lunch_name<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->lunch_name); ?>"
                                                   readOnly>
                                            <select name="lunch_list" id="lunch_list<?php echo e($index); ?>" class="form-control lunch_list"
                                                    data-search="true" onchange="product_value(<?php echo e($index); ?>);">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($equipment->id . '_' . $equipment->product_name . '_' . $equipment->sale_price . '_' . $equipment->description); ?>"
                                                            <?php if($equipment->id == $variants->product_id): ?> selected="selected" <?php endif; ?>><?php echo e($equipment->product_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        <td><textarea name=description[]" id="description<?php echo e($index); ?>" rows="2"
                                                      class="form-control resize_vertical" readOnly><?php echo e($variants->description); ?></textarea>
                                        </td>
                                        <td><input type="text" name="quantity[]" id="quantity<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->quantity); ?>"
                                                   class="form-control number"
                                                   onkeyup="product_price_changes('quantity<?php echo e($index); ?>','price<?php echo e($index); ?>','sub_total<?php echo e($index); ?>');">
                                        </td>
                                        <td><?php echo e($variants->price); ?><input type="hidden" name="price[]" id="price<?php echo e($index); ?>"
                                                                       value="<?php echo e($variants->price); ?>"
                                                                       class="form-control"></td>
                                        <input type="hidden" name="taxes[]" id="taxes<?php echo e($index); ?>"
                                               value="<?php echo e(floatval(Settings::get('sales_tax'))); ?>" class="form-control"></td>
                                        <td><input type="text" name="sub_total[]" id="sub_total<?php echo e($index); ?>"
                                                   value="<?php echo e($variants->sub_total); ?>"
                                                   class="form-control" readOnly></td>
                                        <td><a href="javascript:void(0)" class="delete removeclass"><i
                                                        class="fa fa-fw fa-trash fa-lg text-danger"></i></a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" id="AddMoreFileEquipmentRequipment"
                            class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> <?php echo e(trans('Equipment Requipment')); ?>

                    </button>
                    <div class="row">&nbsp;</div>
                </div>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#equ">Add from Picklist</button>
            

            <h3><b>Decoration</b></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('decoration') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('decoration', trans('Decoration'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('decoration', null, ['class' => 'form-control','id'=> 'decoration']); ?>

                            <span class="help-block"><?php echo e($errors->first('decoration', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dec">Add from Picklist</button>
            

            <h3><b>Billing Notes</b></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('billing_notes') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('billing_notes', trans('Billing Notes'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('billing_notes', null, ['class' => 'form-control','id'=> 'billingnotes']); ?>

                            <span class="help-block"><?php echo e($errors->first('billing_notes', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <h3><b>Billing Widget</b></h3>
            <hr>
            <table class="table table-striped">
                <tr>
                    <th><h4><b>Description</b></h4></th>
                    <th><h4><b>Discount</b></h4></th>
                    <th><h4><b>Total</b></h4></th>
                </tr>
                <tr>
                    <td>Room Rental</td>
                    <td></td>
                    <td>$250.00</td>
                </tr>
                <tr>
                    <td>Decoration</td>
                    <td></td>
                    <td>$6532.00</td>
                </tr>
                <tr>
                    <td>Entertainment</td>
                    <td></td>
                    <td>$6532.00</td>
                </tr>
                <tr>
                    <td>Food</td>
                    <td></td>
                    <td>$6532.00</td>
                </tr>
                <tr>
                    <td>Photography</td>
                    <td></td>
                    <td>$6532.00</td>
                </tr>
                <tr>
                    <td>Food and Beverage Arrangment</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Equipment</td>
                    <td></td>
                    <td>$6532.00</td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td></td>
                    <td>$6532.00</td>
                </tr>
                <tr>
                    <td>State Sales tax</td>
                    <td>8%</td>
                    <td>$632.22</td>
                </tr>
                <tr>
                    <td>Administrator fee</td>
                    <td>3%</td>
                    <td>$562.03</td>
                </tr>
                <tr>
                    <td>Gratuity</td>
                    <td>0</td>
                    <td>$0</td>
                </tr>
            </table><br>

            <h3><b>Term & Condition</b></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('term_condition') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('term_condition', trans('Term Condition'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('term_condition', null, ['class' => 'form-control','id'=> 'termcondition']); ?>

                            <span class="help-block"><?php echo e($errors->first('term_condition', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <h3><b>CC Auth</b></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('ccauth') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('ccauth', trans('CC Auth'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('ccauth', null, ['class' => 'form-control','id'=> 'ccauth']); ?>

                            <span class="help-block"><?php echo e($errors->first('ccauth', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="controls">
                    <a href="<?php echo e(url($type.'/6/show')); ?>" class="btn btn-success"><?php echo e(trans('SAVE')); ?></a>
                    <a href="<?php echo e(url($type.'/6/show')); ?>" class="btn btn-success"><?php echo e(trans('CANCLE')); ?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>


    <div class="modal fade" id="list" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Select Menu Items</h4>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="list" class="tab-pane fade in active">
                            <h3><i>Searching for and existing Contact</i></h3>
                            <div class="form-group required <?php echo e($errors->has('search') ? 'has-error' : ''); ?>">
                                <div class="input-group">
                                    <span class="input-group-addon">Search</span>
                                    <input id="msg" type="text" class="form-control" name="search">
                                </div>
                                
                                
                                
                                
                                
                            </div>
                            <div>
                                <div class="form-group required <?php echo e($errors->has('caterers_name') ? 'has-error' : ''); ?>">
                                    <?php echo Form::label('caterers_name', trans('Caterers Name'), ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::select('caterers_name', isset($caterers)?$caterers:[trans('-- Select --')], null,['class' => 'form-control select2']); ?>

                                        <span class="help-block"><?php echo e($errors->first('caterers_name', ':message')); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required <?php echo e($errors->has('evening_snacks') ? 'has-error' : ''); ?>">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" value="1" name="evening_snacks[]" id="all_day" class='icheck'
                                               <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                        <?php echo e(trans('Lunch (12:00 pm To 2:00 pm)')); ?>

                                    </label><br>
                                </div>
                                <span class="help-block"><?php echo e($errors->first('room', ':message')); ?></span>
                            </div>
                            <br>
                            <div class="container">
                                <ol class="nav nav-pills">
                                    <ol class="active"><a data-toggle="pill" href="#startars"><i class="glyphicon glyphicon-plus"></i>  Startars</a></ol><br>
                                    <ol><a data-toggle="pill" href="#Dinner"><i class="glyphicon glyphicon-plus"></i>  Dinner</a></ol><br>
                                    <ol><a data-toggle="pill" href="#Appetizer"><i class="glyphicon glyphicon-plus"></i>  Appetizer</a></ol><br>
                                    <ol><a data-toggle="pill" href="#Dessert"><i class="glyphicon glyphicon-plus"></i>  Dessert</a></ol><br>
                                </ol>

                                <div class="tab-content">
                                    <div id="startars" class="tab-pane fade in active">
                                        <h3>Startars</h3>
                                        <input type="checkbox">Aloo and Dal ki Tikki<br>
                                        <input type="checkbox">Cheese Balls<br>
                                        <input type="checkbox">Microwave Paneer Tikkas<br>
                                    </div>
                                    <div id="Dinner" class="tab-pane fade">
                                        <h3>Dinner</h3>
                                        <input type="checkbox">Makhni Paneer Biryani<br>
                                        <input type="checkbox">Hot Yellow Curry with Vegetables<br>
                                        <input type="checkbox">Masala Bhindi<br>
                                        <input type="checkbox">Pommes Gratin<br>
                                    </div>
                                    <div id="Appetizer" class="tab-pane fade">
                                        <h3>Appetizer</h3>
                                        <input type="checkbox">Tuma Tartar<br>
                                        <input type="checkbox">Metaballs<br>
                                        <input type="checkbox">Avocado salad<br>
                                        <input type="checkbox">Savory party Bread<br>
                                    </div>
                                    <div id="Dessert" class="tab-pane fade">
                                        <h3>Dessert</h3>
                                        <input type="checkbox">Dessert cakes<br>
                                        <input type="checkbox">A birthday cake<br>
                                        <input type="checkbox">Gingerbread<br>
                                        <input type="checkbox">An ice cream cake<br>
                                        <input type="checkbox">Molten chocolate cake<br>
                                    </div>
                                </div>
                            </div><br>
                            <div class="form-group required <?php echo e($errors->has('evening_snacks') ? 'has-error' : ''); ?>">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" value="1" name="evening_snacks[]" id="all_day" class='icheck'
                                               <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                        <?php echo e(trans('Dinner (12:00 pm To 2:00 pm)')); ?>

                                    </label><br>
                                </div>
                                <span class="help-block"><?php echo e($errors->first('room', ':message')); ?></span>
                            </div>
                            <div class="form-group required <?php echo e($errors->has('evening_snacks') ? 'has-error' : ''); ?>">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" value="1" name="evening_snacks[]" id="all_day" class='icheck'
                                               <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                        <?php echo e(trans('Morning Snacks (9:00 pm To 10:30 pm)')); ?>

                                    </label><br>
                                </div>
                                <span class="help-block"><?php echo e($errors->first('room', ':message')); ?></span>
                            </div>
                            <div class="form-group required <?php echo e($errors->has('evening_snacks') ? 'has-error' : ''); ?>">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" value="1" name="evening_snacks[]" id="all_day" class='icheck'
                                               <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                        <?php echo e(trans('Evening Snacks (04:00 pm To 5:30 pm)')); ?>

                                    </label><br>
                                </div>
                                <span class="help-block"><?php echo e($errors->first('room', ':message')); ?></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div align="left">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">SAVE</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">CANCEL</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="entr" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Select Entertainment</h4>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="entr" class="tab-pane fade in active">
                            <h3><i>Searching for and existing Contact</i></h3>
                            <div class="form-group required <?php echo e($errors->has('search') ? 'has-error' : ''); ?>">
                                <div class="input-group">
                                    <span class="input-group-addon">Search</span>
                                    <input id="msg" type="text" class="form-control" name="search">
                                </div>
                            </div>
                            <div>
                                <div class="form-group required <?php echo e($errors->has('caterers_name') ? 'has-error' : ''); ?>">
                                    <?php echo Form::label('caterers_name', trans('Brand Name'), ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::select('caterers_name', isset($caterers)?$caterers:[trans('-- Select --')], null,['class' => 'form-control select2']); ?>

                                        <span class="help-block"><?php echo e($errors->first('caterers_name', ':message')); ?></span>
                                    </div>
                                </div>
                            </div><br><br>

                            <div class="col-md-6">
                                <div class="form-group required <?php echo e($errors->has('magician') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="magician[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Magician')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('magician', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('hypnotist') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="hypnotist[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Hypnotist')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('master_ceremonies', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('master_ceremonies') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="master_ceremonies[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Master of Ceremonies')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('master_ceremonies', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('blackout_flair') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="blackout_flair[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Blackout Flair')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('blackout_flair', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('shadow_performer') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="shadow_performer[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Shadow Performer')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('shadow_performer', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('mentalist') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="mentalist[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Mentalist')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('mentalist', ':message')); ?></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group required <?php echo e($errors->has('illsuionist') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="illsuionist[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Illsuionist')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('illsuionist', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('improv_comedian') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="improv_comedian[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Improv Comedian')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('improv_comedian', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('musical_comedian') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="musical_comedian[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Musical Comedian')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('musical_comedian', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('blue_star_phyrotechnics') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="blue_star_phyrotechnics[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Blue Star Phyrotechnics')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('blue_star_phyrotechnics', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('band') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="band[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Band')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('band', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('your_private_dancers') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="your_private_dancers[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Your Private Dancers')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('your_private_dancers', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div align="left">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">SAVE</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">CANCEL</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="equ" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Select Equipments</h4>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="equ" class="tab-pane fade in active">
                            <h3><i>Searching for and existing Contact</i></h3>
                            <div class="form-group required <?php echo e($errors->has('search') ? 'has-error' : ''); ?>">
                                <div class="input-group">
                                    <span class="input-group-addon">Search</span>
                                    <input id="msg" type="text" class="form-control" name="search">
                                </div>
                            </div>
                            <div>
                            </div><br><br>
                            <div class="col-md-6">
                                <div class="form-group required <?php echo e($errors->has('party_marquees') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="party_marquees[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Party Marquees')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('party_marquees', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('catering_equipment') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="catering_equipment[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Catering Equipment')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('catering_equipment', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('public_address_system') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="public_address_system[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Public Address System')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('public_address_system', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('flip_charts_markers') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="flip_charts_markers[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Flip Charts Markers')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('flip_charts_markers', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('bar_serving_tables') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="bar_serving_tables[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Bar/Serving Tables')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('bar_serving_tables', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('torches') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="torches[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Torches')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('torches', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('band_stage') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="band_stage[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Band Stage')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('band_stage', ':message')); ?></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group required <?php echo e($errors->has('lighting_equipment') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="lighting_equipment[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Lighting Equipment')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('lighting_equipment', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('microphones') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="microphones[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Microphone (s)')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('microphones', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('lap_top_screen') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="lap_top_screen[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Lap Top to Screen')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('lap_top_screen', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('dinnerware') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="dinnerware[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Dinnerware ')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('dinnerware', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('party_furniture_set') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="party_furniture_set[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Party Furniture Set')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('party_furniture_set', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('raised_platform') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="raised_platform[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Raised Platform')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('raised_platform', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('lectern') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="lectern[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Lectern')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('lectern', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div align="left">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">SAVE</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">CANCEL</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dec" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Select Decoration</h4>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="dec" class="tab-pane fade in active">
                            <h3><i>Searching for and existing Contact</i></h3>
                            <div class="form-group required <?php echo e($errors->has('search') ? 'has-error' : ''); ?>">
                                <div class="input-group">
                                    <span class="input-group-addon">Search</span>
                                    <input id="msg" type="text" class="form-control" name="search">
                                </div>
                            </div>
                            <div>
                                <div class="form-group required <?php echo e($errors->has('decorator') ? 'has-error' : ''); ?>">
                                    <?php echo Form::label('decorator', trans('Decorator'), ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::select('decorator', isset($decorator)?$decorator:[trans('-- Select --')], null,['class' => 'form-control select2']); ?>

                                        <span class="help-block"><?php echo e($errors->first('decorator', ':message')); ?></span>
                                    </div>
                                </div>
                            </div>
                            <br><br>

                            <div class="col-md-6">
                                <div class="form-group required <?php echo e($errors->has('entrances_exits') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="entrances_exits[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Entrances and Exits')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('entrances_exits', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('savory_party_bread') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="savory_party_bread[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Savory Party Bread')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('savory_party_bread', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('bridal_car') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="bridal_car[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Bridal Car')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('bridal_car', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('chair_covers') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="chair_covers[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Chair Covers')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('chair_covers', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('head_tables') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="head_tables[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Head Tables')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('head_tables', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('speaker_platform') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="speaker_platform[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Speaker Platform')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('speaker_platform', ':message')); ?></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group required<?php echo e($errors->has('use_table_lamps') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="use_table_lamps[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Use Table Lamps')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('use_table_lamps', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('light') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="light[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Light')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('light', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('dining_tables') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="dining_tables[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Dining Tables')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('dining_tables', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('chair_tables') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="chair_tables[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Chair Tables ')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('chair_tables', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('family_photo_wall') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="family_photo_wall[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Family Photo Wall')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('family_photo_wall', ':message')); ?></span>
                                </div>
                                <div class="form-group required <?php echo e($errors->has('floral_arrangements') ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="1" name="floral_arrangements[]" id="all_day" class='icheck'
                                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Floral Arrangements')); ?>

                                        </label><br>
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('floral_arrangements', ':message')); ?></span>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <div align="left">
                                    
                                    
                                    
                                    
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">SAVE</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">CANCEL</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/editor.js')); ?>" type="text/javascript"></script>
    <script>

        $(function(){
            $("#heading").Editor();
            $("#instructions").Editor();
            $("#lunch").Editor();
            $("#dinner").Editor();
            $("#beverage").Editor();
            $("#snacks").Editor();
            $("#entertainment").Editor();
            $("#equipment").Editor();
            $("#decoration").Editor();
            $("#termcondition").Editor();
            $("#billingnotes").Editor();
            $("#ccauth").Editor();
        });

    </script>

    <script>
        function makeContent(number, item) {
            item = item || '';

            var content = '<tr class="remove_tr"><td>';
            content += '<input type="hidden" name="lunch_id[]" id="lunch_id' + number + '" value="' + ((typeof item.lunch_id == 'undefined') ? '' : item.lunch_id) + '" readOnly>';
            content += '<input type="hidden" name="lunch_name[]" id="lunch_name' + number + '" value="' + ((typeof item.lunch_name == 'undefined') ? '' : item.lunch_name) + '" readOnly>';
            content += '<select name="lunch_list" id="lunch_list' + number + '" class="form-control lunch_list" data-search="true" onchange="lunch_list(' + number + ');">' +
                '<option value=""></option>';

            content += '</select>' +
                '<td><textarea name=description[]" id="description' + number + '" rows="2" class="form-control resize_vertical" readOnly>' + ((typeof item.description == 'undefined') ? '' : item.description) + '</textarea>' +
                '</td>' +
                '<td><input type="text" name="quantity[]" id="quantity' + number + '" value="' + ((typeof item.quantity == 'undefined') ? '' : item.quantity) + '" class="form-control number" onkeyup="product_price_changes(\'quantity' + number + '\',\'price' + number + '\',\'sub_total' + number + '\');"></td>' +
                '<td><input type="text" name="price[]" id="price' + number + '" value="' + ((typeof item.price == 'undefined') ? '' : item.price) + '" class="form-control" readOnly>' +
                '<td><a href="javascript:void(0)" class="delete removeclass" title="<?php echo e(trans('table.delete')); ?>"><i class="fa fa-fw fa-trash fa-lg text-danger"></i></a></td>' +
                '</tr>';
            return content;
        }

        var FieldCount = 1; //to keep track of text box added
        var MaxInputs = 50; //maximum input boxes allowed
        var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
        var AddButton = $("#AddMoreFile"); //Add button ID

        var x = InputsWrapper.length; //initlal text box count


        $("#total").val("0");

        $(AddButton).click(function (e)  //on add input button click
        {

            setTimeout(function(){
                $(".product_list").select2({
                    theme:"bootstrap",
                    placeholder:"lunch"
                });
            });
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                content = makeContent(FieldCount);
                $(InputsWrapper).append(content);
                x++; //text box increment

                $('.number').keypress(function (event) {
                    if (event.which < 46
                        || event.which > 59) {
                        event.preventDefault();
                    } // prevent if not number/dot

                    if (event.which == 46
                        && $(this).val().indexOf('.') != -1) {
                        event.preventDefault();
                    } // prevent if already dot
                });
            }
            //            $('#surveyForm').formValidation('addField', $option);

            return false;
        });

        $(InputsWrapper).on("click", ".removeclass", function (e) { //user click on remove text
            $(this).closest(".remove_tr").remove();
            update_total_price();
            return false;
        });
    </script>

    <script>
        function makeContent(number, item) {
            item = item || '';

            var content = '<tr class="remove_tr"><td>';
            content += '<input type="hidden" name="lunch_id[]" id="lunch_id' + number + '" value="' + ((typeof item.lunch_id == 'undefined') ? '' : item.lunch_id) + '" readOnly>';
            content += '<input type="hidden" name="lunch_name[]" id="lunch_name' + number + '" value="' + ((typeof item.lunch_name == 'undefined') ? '' : item.lunch_name) + '" readOnly>';
            content += '<select name="lunch_list" id="lunch_list' + number + '" class="form-control lunch_list" data-search="true" onchange="lunch_list(' + number + ');">' +
                '<option value=""></option>';

            content += '</select>' +
                '<td><textarea name=description[]" id="description' + number + '" rows="2" class="form-control resize_vertical" readOnly>' + ((typeof item.description == 'undefined') ? '' : item.description) + '</textarea>' +
                '</td>' +
                '<td><input type="text" name="quantity[]" id="quantity' + number + '" value="' + ((typeof item.quantity == 'undefined') ? '' : item.quantity) + '" class="form-control number" onkeyup="product_price_changes(\'quantity' + number + '\',\'price' + number + '\',\'sub_total' + number + '\');"></td>' +
                '<td><input type="text" name="price[]" id="price' + number + '" value="' + ((typeof item.price == 'undefined') ? '' : item.price) + '" class="form-control" readOnly>' +
                '<td><a href="javascript:void(0)" class="delete removeclass" title="<?php echo e(trans('table.delete')); ?>"><i class="fa fa-fw fa-trash fa-lg text-danger"></i></a></td>' +
                '</tr>';
            return content;
        }

        var FieldCount = 1; //to keep track of text box added
        var MaxInputs = 50; //maximum input boxes allowed
        var InputsWrapperdinner = $("#InputsWrapperdinner"); //Input boxes wrapper ID
        var AddButton = $("#AddMoredinner"); //Add button ID

        var x = InputsWrapperdinner.length; //initlal text box count


        $("#total").val("0");

        $(AddButton).click(function (e)  //on add input button click
        {

            setTimeout(function(){
                $(".product_list").select2({
                    theme:"bootstrap",
                    placeholder:"dinner"
                });
            });
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                content = makeContent(FieldCount);
                $(InputsWrapperdinner).append(content);
                x++; //text box increment

                $('.number').keypress(function (event) {
                    if (event.which < 46
                        || event.which > 59) {
                        event.preventDefault();
                    } // prevent if not number/dot

                    if (event.which == 46
                        && $(this).val().indexOf('.') != -1) {
                        event.preventDefault();
                    } // prevent if already dot
                });
            }
            //            $('#surveyForm').formValidation('addField', $option);

            return false;
        });

        $(InputsWrapperdinner).on("click", ".removeclass", function (e) { //user click on remove text
            $(this).closest(".remove_tr").remove();
            update_total_price();
            return false;
        });
    </script>

    <script>
        function makeContent(number, item) {
            item = item || '';

            var content = '<tr class="remove_tr"><td>';
            content += '<input type="hidden" name="lunch_id[]" id="lunch_id' + number + '" value="' + ((typeof item.lunch_id == 'undefined') ? '' : item.lunch_id) + '" readOnly>';
            content += '<input type="hidden" name="lunch_name[]" id="lunch_name' + number + '" value="' + ((typeof item.lunch_name == 'undefined') ? '' : item.lunch_name) + '" readOnly>';
            content += '<select name="lunch_list" id="lunch_list' + number + '" class="form-control lunch_list" data-search="true" onchange="lunch_list(' + number + ');">' +
                '<option value=""></option>';

            content += '</select>' +
                '<td><textarea name=description[]" id="description' + number + '" rows="2" class="form-control resize_vertical" readOnly>' + ((typeof item.description == 'undefined') ? '' : item.description) + '</textarea>' +
                '</td>' +
                '<td><input type="text" name="quantity[]" id="quantity' + number + '" value="' + ((typeof item.quantity == 'undefined') ? '' : item.quantity) + '" class="form-control number" onkeyup="product_price_changes(\'quantity' + number + '\',\'price' + number + '\',\'sub_total' + number + '\');"></td>' +
                '<td><input type="text" name="price[]" id="price' + number + '" value="' + ((typeof item.price == 'undefined') ? '' : item.price) + '" class="form-control" readOnly>' +
                '<td><a href="javascript:void(0)" class="delete removeclass" title="<?php echo e(trans('table.delete')); ?>"><i class="fa fa-fw fa-trash fa-lg text-danger"></i></a></td>' +
                '</tr>';
            return content;
        }

        var FieldCount = 1; //to keep track of text box added
        var MaxInputs = 50; //maximum input boxes allowed
        var InputsWrapperBeverage = $("#InputsWrapperBeverage"); //Input boxes wrapper ID
        var AddButton = $("#AddMoreBeverage"); //Add button ID

        var x = InputsWrapperBeverage.length; //initlal text box count


        $("#total").val("0");

        $(AddButton).click(function (e)  //on add input button click
        {

            setTimeout(function(){
                $(".product_list").select2({
                    theme:"bootstrap",
                    placeholder:"Beverage"
                });
            });
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                content = makeContent(FieldCount);
                $(InputsWrapperBeverage).append(content);
                x++; //text box increment

                $('.number').keypress(function (event) {
                    if (event.which < 46
                        || event.which > 59) {
                        event.preventDefault();
                    } // prevent if not number/dot

                    if (event.which == 46
                        && $(this).val().indexOf('.') != -1) {
                        event.preventDefault();
                    } // prevent if already dot
                });
            }
            //            $('#surveyForm').formValidation('addField', $option);

            return false;
        });

        $(InputsWrapperBeverage).on("click", ".removeclass", function (e) { //user click on remove text
            $(this).closest(".remove_tr").remove();
            update_total_price();
            return false;
        });
    </script>

    <script>
        function makeContent(number, item) {
            item = item || '';

            var content = '<tr class="remove_tr"><td>';
            content += '<input type="hidden" name="lunch_id[]" id="lunch_id' + number + '" value="' + ((typeof item.lunch_id == 'undefined') ? '' : item.lunch_id) + '" readOnly>';
            content += '<input type="hidden" name="lunch_name[]" id="lunch_name' + number + '" value="' + ((typeof item.lunch_name == 'undefined') ? '' : item.lunch_name) + '" readOnly>';
            content += '<select name="lunch_list" id="lunch_list' + number + '" class="form-control lunch_list" data-search="true" onchange="lunch_list(' + number + ');">' +
                '<option value=""></option>';

            content += '</select>' +
                '<td><textarea name=description[]" id="description' + number + '" rows="2" class="form-control resize_vertical" readOnly>' + ((typeof item.description == 'undefined') ? '' : item.description) + '</textarea>' +
                '</td>' +
                '<td><input type="text" name="quantity[]" id="quantity' + number + '" value="' + ((typeof item.quantity == 'undefined') ? '' : item.quantity) + '" class="form-control number" onkeyup="product_price_changes(\'quantity' + number + '\',\'price' + number + '\',\'sub_total' + number + '\');"></td>' +
                '<td><input type="text" name="price[]" id="price' + number + '" value="' + ((typeof item.price == 'undefined') ? '' : item.price) + '" class="form-control" readOnly>' +
                '<td><a href="javascript:void(0)" class="delete removeclass" title="<?php echo e(trans('table.delete')); ?>"><i class="fa fa-fw fa-trash fa-lg text-danger"></i></a></td>' +
                '</tr>';
            return content;
        }

        var FieldCount = 1; //to keep track of text box added
        var MaxInputs = 50; //maximum input boxes allowed
        var InputsWrapperSnacks = $("#InputsWrapperSnacks"); //Input boxes wrapper ID
        var AddButton = $("#AddMoreFileSnacks"); //Add button ID

        var x = InputsWrapperSnacks.length; //initlal text box count


        $("#total").val("0");

        $(AddButton).click(function (e)  //on add input button click
        {

            setTimeout(function(){
                $(".product_list").select2({
                    theme:"bootstrap",
                    placeholder:"Snacks"
                });
            });
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                content = makeContent(FieldCount);
                $(InputsWrapperSnacks).append(content);
                x++; //text box increment

                $('.number').keypress(function (event) {
                    if (event.which < 46
                        || event.which > 59) {
                        event.preventDefault();
                    } // prevent if not number/dot

                    if (event.which == 46
                        && $(this).val().indexOf('.') != -1) {
                        event.preventDefault();
                    } // prevent if already dot
                });
            }
            //            $('#surveyForm').formValidation('addField', $option);

            return false;
        });

        $(InputsWrapperSnacks).on("click", ".removeclass", function (e) { //user click on remove text
            $(this).closest(".remove_tr").remove();
            update_total_price();
            return false;
        });
    </script>

    <script>
        function makeContent(number, item) {
            item = item || '';

            var content = '<tr class="remove_tr"><td>';
            content += '<input type="hidden" name="lunch_id[]" id="lunch_id' + number + '" value="' + ((typeof item.lunch_id == 'undefined') ? '' : item.lunch_id) + '" readOnly>';
            content += '<input type="hidden" name="lunch_name[]" id="lunch_name' + number + '" value="' + ((typeof item.lunch_name == 'undefined') ? '' : item.lunch_name) + '" readOnly>';
            content += '<select name="lunch_list" id="lunch_list' + number + '" class="form-control lunch_list" data-search="true" onchange="lunch_list(' + number + ');">' +
                '<option value=""></option>';

            content += '</select>' +
                '<td><textarea name=description[]" id="description' + number + '" rows="2" class="form-control resize_vertical" readOnly>' + ((typeof item.description == 'undefined') ? '' : item.description) + '</textarea>' +
                '</td>' +
                '<td><input type="text" name="quantity[]" id="quantity' + number + '" value="' + ((typeof item.quantity == 'undefined') ? '' : item.quantity) + '" class="form-control number" onkeyup="product_price_changes(\'quantity' + number + '\',\'price' + number + '\',\'sub_total' + number + '\');"></td>' +
                '<td><input type="text" name="price[]" id="price' + number + '" value="' + ((typeof item.price == 'undefined') ? '' : item.price) + '" class="form-control" readOnly>' +
                '<td><a href="javascript:void(0)" class="delete removeclass" title="<?php echo e(trans('table.delete')); ?>"><i class="fa fa-fw fa-trash fa-lg text-danger"></i></a></td>' +
                '</tr>';
            return content;
        }

        var FieldCount = 1; //to keep track of text box added
        var MaxInputs = 50; //maximum input boxes allowed
        var InputsWrapperEquipmentRequipment = $("#InputsWrapperEquipmentRequipment"); //Input boxes wrapper ID
        var AddButton = $("#AddMoreFileEquipmentRequipment"); //Add button ID

        var x = InputsWrapperEquipmentRequipment.length; //initlal text box count


        $("#total").val("0");

        $(AddButton).click(function (e)  //on add input button click
        {

            setTimeout(function(){
                $(".product_list").select2({
                    theme:"bootstrap",
                    placeholder:"Snacks"
                });
            });
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                content = makeContent(FieldCount);
                $(InputsWrapperEquipmentRequipment).append(content);
                x++; //text box increment

                $('.number').keypress(function (event) {
                    if (event.which < 46
                        || event.which > 59) {
                        event.preventDefault();
                    } // prevent if not number/dot

                    if (event.which == 46
                        && $(this).val().indexOf('.') != -1) {
                        event.preventDefault();
                    } // prevent if already dot
                });
            }
            //            $('#surveyForm').formValidation('addField', $option);

            return false;
        });

        $(InputsWrapperEquipmentRequipment).on("click", ".removeclass", function (e) { //user click on remove text
            $(this).closest(".remove_tr").remove();
            update_total_price();
            return false;
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>