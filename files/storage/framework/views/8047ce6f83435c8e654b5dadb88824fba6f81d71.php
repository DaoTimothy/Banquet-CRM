<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($data)): ?>
            <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/catererUpdate', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type.'/catererStore', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

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
        <div id="catererPackages">
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
                                            <?php echo Form::number('package_price_'.$key, $package->price, ['class' => 'form-control', 'placeholder'=>'Enter amount in '.\Config::get('constant.currency.'.Settings::get('currency'))[0],'id'=>'package_price_'.$key ,'min' => 0]); ?>

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
                                        <?php echo Form::number('package_price_0', null, ['class' => 'form-control', 'placeholder'=>'Enter amount in '.\Config::get('constant.currency.'.Settings::get('currency'))[0],'id'=>'package_price_0','min' => 0]); ?>

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
                                    <?php echo Form::number('package_price_0', null, ['class' => 'form-control', 'placeholder'=>'Enter amount in '.\Config::get('constant.currency.'.Settings::get('currency'))[0],'id'=>'package_price_0','min' => 0]); ?>

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
                <button type="button" class="btn btn-success" id="btnAddPackages" style="width: 15%"><?php echo e(trans('event.add')); ?></button>
            </div>
        </div>
            <h2><?php echo e(trans('eventSetting.termsAndCondition')); ?></h2>
            <div class="row form-panel-event">
                <div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('caterer_contract_terms', trans('eventSetting.caterer_contract_terms'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('caterer_contract_terms', (isset($data) ? $data->caterer_contract_terms : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Contract Terms']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('caterer_payment', trans('eventSetting.caterer_payment'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('caterer_payment', (isset($data) ? $data->caterer_payment : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Payment']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('caterer_staff_charge', trans('eventSetting.caterer_staff_charge'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('caterer_staff_charge', (isset($data) ? $data->caterer_staff_charge : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Staff Charge']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('caterer_guest_number', trans('eventSetting.caterer_guest_number'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('caterer_guest_number', (isset($data) ? $data->caterer_guest_number : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Guest Number']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('caterer_additional_meal', trans('eventSetting.caterer_additional_meal'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('caterer_additional_meal', (isset($data) ? $data->caterer_additional_meal : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Additional Meals']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('dietary_requirements', trans('eventSetting.dietary_requirements'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('dietary_requirements', (isset($data) ? $data->dietary_requirements : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Dietary Requirements']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('additional_beverages', trans('eventSetting.additional_beverages'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('additional_beverages', (isset($data) ? $data->additional_beverages : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Additional Beverages ']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('food_and_beverages', trans('eventSetting.food_and_beverages'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('food_and_beverages', (isset($data) ? $data->food_and_beverages : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Food and Beverages ']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('cancellation', trans('eventSetting.cancellation'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('cancellation', (isset($data) ? $data->cancellation : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Cancellation']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('hire_equipment', trans('eventSetting.hire_equipment'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('hire_equipment', (isset($data) ? $data->hire_equipment : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Hire Equipment']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('waste_disposal ', trans('eventSetting.waste_disposal'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('waste_disposal', (isset($data) ? $data->waste_disposal : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Waste Disposal ']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('responsibility_for_damage ', trans('eventSetting.responsibility_for_damage'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('responsibility_for_damage', (isset($data) ? $data->responsibility_for_damage : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Responsibility for Damage']); ?>

                        </div>
                    </div>
                </div><div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('disorderly_conduct ', trans('eventSetting.disorderly_conduct'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('disorderly_conduct', (isset($data) ? $data->disorderly_conduct : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Disorderly Conduct']); ?>

                        </div>
                    </div>
                </div><div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('responsible_service_of_alcohol ', trans('eventSetting.responsible_service_of_alcohol'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('responsible_service_of_alcohol', (isset($data) ? $data->responsible_service_of_alcohol : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Responsible Service of Alcohol']); ?>

                        </div>
                    </div>
                </div><div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('safety_and_hygiene ', trans('eventSetting.safety_and_hygiene'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('safety_and_hygiene', (isset($data) ? $data->safety_and_hygiene : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Safety & Hygiene']); ?>

                        </div>
                    </div>
                </div><div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('reschedule ', trans('eventSetting.reschedule'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('reschedule', (isset($data) ? $data->reschedule : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Reschedule']); ?>

                        </div>
                    </div>
                </div><div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('force_majeure ', trans('eventSetting.force_majeure'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('force_majeure', (isset($data) ? $data->force_majeure : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Force Majeure']); ?>

                        </div>
                    </div>
                </div><div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('indemnification ', trans('eventSetting.indemnification'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('indemnification', (isset($data) ? $data->indemnification : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Indemnification']); ?>

                        </div>
                    </div>
                </div><div class="col-md-12">
                    <div class="form-group required">
                        <?php echo Form::label('binding_arbitration ', trans('eventSetting.binding_arbitration'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('binding_arbitration', (isset($data) ? $data->binding_arbitration : null), ['class' => 'form-control resize_vertical', 'placeholder' => 'Binding Arbitration']); ?>

                        </div>
                    </div>
                </div>
            </div>
        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                <a href="<?php echo e(url($type.'/catererIndex')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
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
        $(document).ready(function () {
            $("#eventSetting").bootstrapValidator({
                fields: {
                    phone: {
                        validators: {
                            regexp: {
                                regexp: /^\d{5,10}?$/,
                                message: 'The phone number can only consist of 10 numbers.'
                            }
                        }
                    }
                }
            });
        });
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
            $("#btnAddPackages").click(function () {
                count = count + 1;
                var html = '<div id="packageContent_'+count+'"><div class="row">' +
                    '<div class="col-md-4">' +
                    '<?php echo Form::label('package_name', trans('eventSetting.packageName'), ['class' => 'control-label']); ?>' +
                    '<div class="form-group required" id="service_div">' +
                    '<div class="controls">' +
                    '<input type="text" class="form-control" name="package_name_'+count+'"  />' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<?php echo Form::label('package_name', trans('eventSetting.price'), ['class' => 'control-label']); ?>' +
                    '<div class="form-group required" id="service_div">' +
                    '<div class="controls">' +
                    '<input type="number" class="form-control" min="0" placeholder="Enter amount in <?php echo e(\Config::get('constant.currency.'.Settings::get('currency'))[0]); ?>" name="package_price_'+count+'" />' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<?php echo Form::label('package_name', trans('eventSetting.person'), ['class' => 'control-label']); ?>' +
                    '<div class="form-group required" id="service_div">' +
                    '<div class="controls">' +
                    '<input type="number" class="form-control" name="package_person_'+count+'" />' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-10">' +
                    '<?php echo Form::label('package_name', trans('eventSetting.service'), ['class' => 'control-label']); ?>' +
                    '<div class="form-group required" id="service_div">' +
                    '<div class="controls">' +
                    '<input type="text" class="form-control" name="package_services_'+count+'" id="package_services_'+count+'" data-role="tagsinput" />' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<a onclick="removeContent('+count+')"><i class="fa fa-fw fa-trash fa-lg text-danger package-margin-top"></i></a>' +
                    '</div>' +
                    '</div></div>';

                $("#catererPackages").append(html);
                count_stack.push(count);
                $('#supplierPackages').val(count_stack);

                $('#package_services_'+count).tagsinput();
            });
        });

        function removeContent(id){
            $('#packageContent_'+id).remove();
        }
    </script>

<?php $__env->stopSection(); ?>