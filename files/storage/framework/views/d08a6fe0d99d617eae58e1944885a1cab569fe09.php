<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($data)): ?>
            <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/miscellaneousUpdate', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type.'/miscellaneousStore', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

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
        <div id="miscellaneousPackages">
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
                                            <?php echo Form::number('package_price_'.$key, $package->price, ['class' => 'form-control', 'placeholder'=>'Enter amount in '.\Config::get('constant.currency.'.Settings::get('currency'))[0],'id'=>'package_price_'.$key,'min'=>0]); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group required <?php echo e($errors->has('person') ? 'has-error' : ''); ?>" id="service_div">
                                        <?php echo Form::label('person', trans('eventSetting.person'), ['class' => 'control-label']); ?>

                                        <div class="controls">
                                            <?php echo Form::number('package_person_'.$key, $package->person, ['class' => 'form-control','id'=>'package_person_'.$key,'min'=>0]); ?>

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
                                        <?php echo Form::number('package_price_0', null, ['class' => 'form-control','id'=>'package_price_0','min'=>0]); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group required <?php echo e($errors->has('person') ? 'has-error' : ''); ?>" id="service_div">
                                    <?php echo Form::label('person', trans('eventSetting.person'), ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::number('package_person_0', null, ['class' => 'form-control', 'placeholder'=>'Enter amount in '.\Config::get('constant.currency.'.Settings::get('currency'))[0],'id'=>'package_person_0','min'=>0]); ?>

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
        </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-success" id="btnAddMiscellaneousPackages" style="width: 15%"><?php echo e(trans('event.add')); ?></button>
                </div>
            </div>
            <h2><?php echo e(trans('eventSetting.termsAndCondition')); ?></h2>
            <div class="row form-panel-event">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('miscellaneousContractTerms') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('miscellaneous_contract_terms', trans('eventSetting.miscellaneousContractTerms'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('miscellaneous_contract_terms', (isset($data) ? $data->miscellaneous_contract_terms : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Contract Terms']); ?>

                            <span class="help-block"><?php echo e($errors->first('miscellaneousContractTerms', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('miscellaneousPayment') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('miscellaneous_payment', trans('eventSetting.miscellaneousPayment'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('miscellaneous_payment', (isset($data) ? $data->miscellaneous_payment : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Payment']); ?>

                            <span class="help-block"><?php echo e($errors->first('miscellaneousPayment', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('miscellaneousArrangements') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('miscellaneous_arrangements', trans('eventSetting.miscellaneousArrangements'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('miscellaneous_arrangements', (isset($data) ? $data->miscellaneous_arrangements : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Decoration Arrangements']); ?>

                            <span class="help-block"><?php echo e($errors->first('miscellaneousArrangements', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('miscellaneousCancellation') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('miscellaneous_cancellation', trans('eventSetting.miscellaneousCancellation'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('miscellaneous_cancellation', (isset($data) ? $data->damage_to_property : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Cancellation']); ?>

                            <span class="help-block"><?php echo e($errors->first('damageToProperty', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('reschedule') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('reschedule', trans('eventSetting.reschedule'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('reschedule', (isset($data) ? $data->reschedule : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Reschedule']); ?>

                            <span class="help-block"><?php echo e($errors->first('reschedule', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('force_majeure') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('force_majeure', trans('eventSetting.force_majeure'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('force_majeure', (isset($data) ? $data->force_majeure : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Force Majeure']); ?>

                            <span class="help-block"><?php echo e($errors->first('force_majeure', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('indemnification') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('indemnification', trans('eventSetting.indemnification'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('indemnification', (isset($data) ? $data->indemnification : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Indemnification']); ?>

                            <span class="help-block"><?php echo e($errors->first('indemnification', ':message')); ?></span>
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
                    <div class="form-group required <?php echo e($errors->has('binding_arbitration') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('binding_arbitration', trans('eventSetting.binding_arbitration'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('binding_arbitration', (isset($data) ? $data->binding_arbitration  : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Binding Arbitration ']); ?>

                            <span class="help-block"><?php echo e($errors->first('binding_arbitration', ':message')); ?></span>
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
                <a href="<?php echo e(url($type.'/miscellaneous')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
            </div>
        </div>
        <!-- ./ form actions -->
            <input type="hidden" id="supplierPackages" name="supplierPackages" value="">
        <?php echo Form::close(); ?>

    </div>
</div>
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
            $("#btnAddMiscellaneousPackages").click(function () {
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
                    '<input type="number" class="form-control" name="package_price_' + count + '" placeholder ="Enter amount in <?php echo e(\Config::get('constant.currency.'.Settings::get('currency'))[0]); ?>" id="package_price_' + count + '" min="0" />' +
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

                $("#miscellaneousPackages").append(html);
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