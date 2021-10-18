<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
    </div>
    <div class="panel panel-primary">
        <div class="panel-body">
            <?php if(isset($data)): ?>
                <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/decoratorUpdate', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

            <?php else: ?>
                <?php echo Form::open(['url' => $type.'/decoratorStore', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

            <?php endif; ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('name', trans('eventSetting.name'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('name', (isset($data) ? $data->name : null), ['class' => 'form-control','id'=>'name']); ?>

                            <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('email') ? 'has-error' : ''); ?>" id="service_div">
                        <?php echo Form::label('email', trans('eventSetting.email'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('email', (isset($data) ? $data->email : null), ['class' => 'form-control','id'=>'price']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>" id="service_div">
                        <?php echo Form::label('phone', trans('eventSetting.phone'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('phone', (isset($data) ? $data->phone : null), ['class' => 'form-control','id'=>'price']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('address') ? 'has-error' : ''); ?>" id="service_div">
                        <?php echo Form::label('address', trans('eventSetting.address'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('address', (isset($data) ? $data->address : null), ['class' => 'form-control','id'=>'price']); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h2>Packages</h2>
            </div>
            <div id="decoratorPackages">
                <?php if(isset($data)): ?>
                    <?php if(count($data->packages) > 0): ?>
                        <?php $ids = [] ?>
                        <?php $__currentLoopData = $data->packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php array_push($ids,$package->id) ?>
                            <input type="hidden" name="updateIds" value="<?php echo e(implode(",",$ids)); ?>">
                            <div id="packageContent_<?php echo e($key); ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group required" id="service_div">
                                            <?php echo Form::label('package_name', trans('eventSetting.packageName'), ['class' => 'control-label']); ?>

                                            <div class="controls">
                                                <?php echo Form::text('package_name_'.$key, $package->package_name, ['class' => 'form-control','id'=>'package_name_'.$key]); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group required" id="service_div">
                                            <?php echo Form::label('price', trans('eventSetting.price'), ['class' => 'control-label']); ?>

                                            <div class="controls">
                                                <?php echo Form::number('package_price_'.$key, $package->price, ['class' => 'form-control', 'placeholder'=>'Enter amount in '.\Config::get('constant.currency.'.Settings::get('currency'))[0],'id'=>'package_price_'.$key ,'min'=>0]); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group required <?php echo e($errors->has('person') ? 'has-error' : ''); ?>" id="service_div">
                                            <?php echo Form::label('person', trans('eventSetting.person'), ['class' => 'control-label']); ?>

                                            <div class="controls">
                                                <?php echo Form::number('package_person_'.$key, $package->person, ['class' => 'form-control','id'=>'package_person_'.$key]); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group required" id="service_div">
                                            <?php echo Form::label('service_provided', trans('eventSetting.service'), ['class' => 'control-label','id'=>'service_label']); ?>

                                            <div class="controls">
                                                <?php echo Form::text('package_services_'.$key, $package->services, ['class' => 'form-control','id'=>'package_services_'.$key,'data-role'=>'tagsinput']); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php if($key != 0): ?>
                                        <div class="col-md-2">
                                            <a onclick="removeContent('<?php echo e($key); ?>')"><i class="fa fa-fw fa-trash fa-lg text-danger"></i></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div id="packageContent_0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group required" id="service_div">
                                        <?php echo Form::label('package_name', trans('eventSetting.packageName'), ['class' => 'control-label']); ?>

                                        <div class="controls">
                                            <?php echo Form::text('package_name_0', null, ['class' => 'form-control','id'=>'package_name_0']); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group required" id="service_div">
                                        <?php echo Form::label('price', trans('eventSetting.price'), ['class' => 'control-label']); ?>

                                        <div class="controls">
                                            <?php echo Form::number('package_price_0', null, ['class' => 'form-control', 'placeholder'=>'Enter amount in '.\Config::get('constant.currency.'.Settings::get('currency'))[0],'id'=>'package_price_0','min'=>0]); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group required <?php echo e($errors->has('person') ? 'has-error' : ''); ?>" id="service_div">
                                        <?php echo Form::label('person', trans('eventSetting.person'), ['class' => 'control-label']); ?>

                                        <div class="controls">
                                            <?php echo Form::number('package_person_0', null, ['class' => 'form-control','id'=>'package_person_0','min'=>0]); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group required" id="service_div">
                                        <?php echo Form::label('service_provided', trans('eventSetting.service'), ['class' => 'control-label','id'=>'service_label']); ?>

                                        <div class="controls">
                                            <?php echo Form::text('package_services_0', null, ['class' => 'form-control','id'=>'package_services_0','data-role'=>'tagsinput']); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div id="packageContent_0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group required" id="service_div">
                                    <?php echo Form::label('package_name', trans('eventSetting.packageName'), ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::text('package_name_0', null, ['class' => 'form-control','id'=>'package_name_0']); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group required" id="service_div">
                                    <?php echo Form::label('price', trans('eventSetting.price'), ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::number('package_price_0', null, ['class' => 'form-control', 'placeholder'=>'Enter amount in '.\Config::get('constant.currency.'.Settings::get('currency'))[0],'id'=>'package_price_0','min'=>0]); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group required <?php echo e($errors->has('person') ? 'has-error' : ''); ?>" id="service_div">
                                    <?php echo Form::label('person', trans('eventSetting.person'), ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::number('package_person_0', null, ['class' => 'form-control','id'=>'package_person_0']); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group required" id="service_div">
                                    <?php echo Form::label('service_provided', trans('eventSetting.service'), ['class' => 'control-label','id'=>'service_label']); ?>

                                    <div class="controls">
                                        <?php echo Form::text('package_services_0', null, ['class' => 'form-control','id'=>'package_services_0','data-role'=>'tagsinput']); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-success" id="btnAddDecoratorPackages" style="width: 15%"><?php echo e(trans('event.add')); ?></button>
                </div>
            </div>
            <h2><?php echo e(trans('eventSetting.termsAndCondition')); ?></h2>
            <div class="row form-panel-event">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('decorationContractTerms') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('decoration_contract_terms', trans('eventSetting.decorationContractTerms'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('decoration_contract_terms', (isset($data) ? $data->decoration_contract_terms : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Decoration Contract Terms']); ?>

                            <span class="help-block"><?php echo e($errors->first('decorationContractTerms', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('decorationFees') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('decoration_fees', trans('eventSetting.decorationFees'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('decoration_fees', (isset($data) ? $data->decoration_fees : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Decoration Fees']); ?>

                            <span class="help-block"><?php echo e($errors->first('decorationFees', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('decorationArrangements') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('decoration_arrangements', trans('eventSetting.decorationArrangements'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('decoration_arrangements', (isset($data) ? $data->decoration_arrangements : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Decoration Arrangements']); ?>

                            <span class="help-block"><?php echo e($errors->first('decorationArrangements', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('damageToProperty') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('damage_to_property', trans('eventSetting.damageToProperty'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('damage_to_property', (isset($data) ? $data->damage_to_property : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Damage To Property']); ?>

                            <span class="help-block"><?php echo e($errors->first('damageToProperty', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('deposit') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('deposit', trans('eventSetting.deposit'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('deposit', (isset($data) ? $data->deposit : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Deposit']); ?>

                            <span class="help-block"><?php echo e($errors->first('deposit', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('cancellationDesignChangeFees') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('cancellation_design_change_fee', trans('eventSetting.cancellationDesignChangeFees'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('cancellation_design_change_fee', (isset($data) ? $data->cancellation_design_change_fee : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Cancellation and Design Change Fees']); ?>

                            <span class="help-block"><?php echo e($errors->first('cancellationDesignChangeFees', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('safety') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('safety', trans('eventSetting.safety'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('safety', (isset($data) ? $data->safety : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Safety']); ?>

                            <span class="help-block"><?php echo e($errors->first('safety', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('materialGuarantee') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('material_guarantee', trans('eventSetting.materialGuarantee'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('material_guarantee', (isset($data) ? $data->material_guarantee : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Material Guarantee']); ?>

                            <span class="help-block"><?php echo e($errors->first('materialGuarantee', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('makingChanges') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('making_changes', trans('eventSetting.makingChanges'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('making_changes', (isset($data) ? $data->making_changes : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Making Changes']); ?>

                            <span class="help-block"><?php echo e($errors->first('makingChanges', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('approval') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('approval', trans('eventSetting.approval'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('approval', (isset($data) ? $data->approval : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Approval']); ?>

                            <span class="help-block"><?php echo e($errors->first('approval', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-group">
                <div class="controls">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                    <a href="<?php echo e(url($type.'/decoratorIndex')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                </div>
            </div>
            <!-- ./ form actions -->
                <input type="hidden" id="supplierPackages" name="supplierPackages" value="">
            <?php echo Form::close(); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/tagsinput.js')); ?>"></script>

    <script>
        $(document).submit(function (event) {
            if ($("#name").val() == '') {
                toastr["error"]("Enter Name Of Supplier");
                event.preventDefault();
                return;
            }
        });
    </script>

    <script>
        var count = <?php echo e((isset($data) ? (count($data->packages) > 0) ? count($data->packages) - 1 : 0 : 0)); ?>;
        var count_stack = Array.from(Array(count + 1).keys());
        $('#supplierPackages').val(count_stack);
        $(document).ready(function () {
            $("#btnAddDecoratorPackages").click(function () {
                count = count + 1;
                var html = '<div id="packageContent_' + count + '"><div class="row">' +
                    '<div class="col-md-4">' +
                    '<?php echo Form::label('package_name', trans('eventSetting.packageName'), ['class' => 'control-label']); ?>' +
                    '<div class="form-group required" id="service_div">' +
                    '<div class="controls">' +
                    '<input type="text" class="form-control" name="package_name_' + count + '" id="package_name_' + count + '" />' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<?php echo Form::label('package_name', trans('eventSetting.price'), ['class' => 'control-label']); ?>' +
                    '<div class="form-group required" id="service_div">' +
                    '<div class="controls">' +
                    '<input type="number" class="form-control" name="package_price_' + count + '" placeholder="Enter amount in <?php echo e(\Config::get('constant.currency.'.Settings::get('currency'))[0]); ?>" id="package_price_' + count + '" min="0" />' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<?php echo Form::label('package_name', trans('eventSetting.person'), ['class' => 'control-label']); ?>' +
                    '<div class="form-group required" id="service_div">' +
                    '<div class="controls">' +
                    '<input type="number" class="form-control" name="package_person_' + count + '" id="package_person_' + count + '" min="0" />' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-10">' +
                    '<?php echo Form::label('package_name', trans('eventSetting.service'), ['class' => 'control-label']); ?>' +
                    '<div class="form-group required" id="service_div">' +
                    '<div class="controls">' +
                    '<input type="text" class="form-control" name="package_services_' + count + '" id="package_services_' + count + '" data-role="tagsinput" />' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<a onclick="removeContent(' + count + ')"><i class="fa fa-fw fa-trash fa-lg text-danger package-margin-top"></i></a>' +
                    '</div>' +
                    '</div></div>';

                $("#decoratorPackages").append(html);
                count_stack.push(count);
                $('#supplierPackages').val(count_stack);
                $('#package_services_' + count).tagsinput();
            });
        });

        function removeContent(id) {
            $('#packageContent_' + id).remove();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>