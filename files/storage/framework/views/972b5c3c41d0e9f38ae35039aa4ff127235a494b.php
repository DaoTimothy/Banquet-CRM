<div class="panel panel-primary cnts">
    <div class="panel-body">
        <?php if(isset($lead)): ?>
            <?php echo Form::model($lead, ['url' => $type . '/' . $lead->id, 'method' => 'put', 'id'=>'lead', 'files'=> true]); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type, 'method' => 'post', 'files'=> true,'id'=>'lead']); ?>

        <?php endif; ?>

        <div class="form_box">
            <div class="row form-panel">
                <h4>Lead Details</h4>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('client_name') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('client_name', trans('lead.client_name'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('client_name', null, ['class' => 'form-control', 'placeholder'=>'Client Name']); ?>

                        <span class="help-block"><?php echo e($errors->first('client_name', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('email', trans('lead.email'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder'=>'Email Address']); ?>

                        <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('mobile') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('mobile', trans('lead.mobile'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('mobile', null, ['class' => 'form-control','data-fv-integer' => "true",'placeholder'=>'Phone Number']); ?>

                        <span class="help-block"><?php echo e($errors->first('mobile', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('company_name') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('company_name', trans('lead.company_name'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('company_name',$companies ,isset($lead) ? $lead->company_name : null, ['class' => 'form-control select2']); ?>

                        <span class="help-block"><?php echo e($errors->first('company_name', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('sales_team_id') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('sales_team_id', trans('salesteam.salesteam'), ['class' => 'control-label required', 'placeholder' => 'Please select']); ?>

                    <div class="controls">
                        <?php echo Form::select('sales_team_id', $salesteams, null, ['id'=>'sales_team_id', 'class' => 'form-control select_function']); ?>

                        <span class="help-block"><?php echo e($errors->first('sales_team_id', ':message')); ?></span>
                    </div>
                </div>
            </div>
                <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('sales_person_id') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('sales_person_id', trans('event.lead_owner'), ['class' => 'control-label required', 'placeholder' => 'Please select']); ?>

                    <div class="controls">
                        <?php echo Form::select('sales_person_id', [], null, ['id'=>'sales_person_id', 'class' => 'form-control select_function']); ?>

                        <span class="help-block"><?php echo e($errors->first('sales_person_id', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <?php $status = ["Open" => 'Open',"Approached" => 'Approached',"Do Not Contact" => 'Do Not Contact']; ?>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('priority') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('priority', trans('lead.priority'), ['class' => 'control-label required', 'placeholder' => 'Please select']); ?>

                    <div class="controls">
                        <?php echo Form::select('priority', $status, null, ['id'=>'priority', 'class' => 'form-control select_function']); ?>

                        <span class="help-block"><?php echo e($errors->first('priority', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="form_box">
            <div class="row form-panel">
            <h4><?php echo e(trans('lead.event_details')); ?></h4>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('function') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('function', trans('lead.event_type'), ['class' => 'control-label required', 'placeholder' => 'Please select']); ?>

                    <div class="controls">
                        <?php echo Form::select('function', $functions, null, ['id'=>'function', 'class' => 'form-control select_function']); ?>

                        <span class="help-block"><?php echo e($errors->first('function', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('location') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('location', trans('event.location'), ['class' => 'control-label required', 'placeholder' => 'Please select']); ?>

                    <div class="controls">
                        <?php echo Form::select('location', $location, null, ['id'=>'location', 'class' => 'form-control select_function']); ?>

                        <span class="help-block"><?php echo e($errors->first('function', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('event_date') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('event_date', trans('event.start_date'), ['class' => 'control-label required' ]); ?>

                    <div class="controls">
                        <?php echo Form::text('event_date', null, ['class' => 'form-control', 'placeholder'=>'Event Date' ,'id' => 'event_date']); ?>

                        <span class="help-block"><?php echo e($errors->first('event_date', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('start_time') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('start_time', trans('lead.start_time'), ['class' => 'control-label required' ]); ?>

                    <div class="controls">
                        <?php echo Form::text('start_time', null, ['class' => 'form-control', 'placeholder'=>'Start Time' ,'id'=>'start_time']); ?>

                        <span class="help-block"><?php echo e($errors->first('start_time', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('event_end_date') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('event_end_date', trans('event.end_date'), ['class' => 'control-label required' ]); ?>

                    <div class="controls">
                        <?php echo Form::text('event_end_date', null, ['class' => 'form-control', 'placeholder'=>'Event End Date' ,'id' => 'event_end_date']); ?>

                        <span class="help-block"><?php echo e($errors->first('event_end_date', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('end_time') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('end_time', trans('lead.end_time'), ['class' => 'control-label required' ]); ?>

                    <div class="controls">
                        <?php echo Form::text('end_time', null, ['class' => 'form-control', 'placeholder'=>'End Time','id'=>'end_time']); ?>

                        <span class="help-block"><?php echo e($errors->first('end_time', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                <div class="form-group <?php echo e($errors->has('expected_guests') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('expected_guests', trans('event.expectedGuests'), ['class' => 'control-label col-md-12' ]); ?>

                    <div class="controls">

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon veg" id="basic-addon1"><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <?php echo Form::number('expected_guests_veg', null, ['class' => 'form-control', 'placeholder'=>'Veg','min'=>0]); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon non_veg" id="basic-addon1"><i class="fa fa-circle" aria-hidden="true"></i></span>
                               <?php echo Form::number('expected_guests_non_veg', null, ['class' => 'form-control', 'placeholder'=>'Non Veg','min'=>0]); ?>

                            </div>
                        </div>
                        <span class="help-block"><?php echo e($errors->first('expected_guests', ':message')); ?></span>
                    </div>
                </div>
                </div></div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('budget') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('budget', trans('event.budget'), ['class' => 'control-label' ]); ?>

                    <div class="controls">
                        <?php echo Form::number('budget', null, ['class' => 'form-control','min' => 0,'step'=>"0.01" , 'placeholder'=>'Budget Up To In '.\Config::get('constant.currency.'.Settings::get('currency'))[0]  ]); ?>

                        <span class="help-block"><?php echo e($errors->first('budget', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <?php echo Form::label('additionl_info', trans('lead.additionl_info'), ['class' => 'control-label']); ?>

                <div class="form-group <?php echo e($errors->has('additionl_info') ? 'has-error' : ''); ?>">
                    <div class="controls">
                        <?php echo Form::textarea('additionl_info', null, ['class' => 'form-control resize_vertical']); ?>

                        <span class="help-block"><?php echo e($errors->first('additionl_info', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Form Actions -->
                <div class="form-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success" form="lead"><?php echo e(trans('table.submit')); ?></button>
                        <a href="<?php echo e(route($type.'.index')); ?>" class="btn btn-warning"> <?php echo e(trans('table.cancel')); ?></a>

                    </div>
                </div>
                <!-- ./ form actions -->
            </div>
        </div>


        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {
            $("#lead").bootstrapValidator({
                fields: {
                    company_name: {
                        validators: {
                            notEmpty: {
                                message: 'The company name field is required.'
                            }
                        }
                    },
                    function: {
                        validators: {
                            notEmpty: {
                                message: 'The event type field is required.'
                            }
                        }
                    },
                    location: {
                        validators: {
                            notEmpty: {
                                message: 'The location field is required.'
                            }
                        }
                    },
                    sales_person_id: {
                        validators: {
                            notEmpty: {
                                message: 'The owner field is required.'
                            }
                        }
                    },
                    sales_team_id: {
                        validators: {
                            notEmpty: {
                                message: 'The team field is required.'
                            }
                        }
                    },
                    event_date :{
                        validators:{
                            date: {
                                format: 'YYYY-MM-DD',
                                message: 'The value is not a valid date'
                            }
                        }
                    },
                    event_end_date :{
                        validators:{
                            date: {
                                format: 'YYYY-MM-DD',
                                message: 'The value is not a valid date'
                            }
                        }
                    },
                    start_time :{
                        validators :{
                            time :{
                                format : 'HH:mm a',
                                message : 'The value is not a valid time'
                            }
                        }
                    },
                    end_time :{
                        validators :{
                            time :{
                                format : 'HH:mm a',
                                message : 'The value is not a valid time'
                            }
                        }
                    },
                    client_name: {
                        validators: {
                            notEmpty: {
                                message: 'The agent name field is required.'
                            }
                        }
                    },
                    mobile: {
                        validators: {
                            notEmpty: {
                                message: 'The phone number is required.'
                            },
                            regexp: {
                                regexp: /^\d{5,10}?$/,
                                message: 'The phone number can consists only 10 digits.'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The email field is required.'
                            }
                        }
                    }
                }
            });

            $("#function").select2({
                theme: "bootstrap",
                placeholder: "<?php echo e(trans('lead.event_type')); ?>"
            });
            $("#location").select2({
                theme: "bootstrap",
                placeholder: "<?php echo e(trans('event.location')); ?>"
            });
            $("#priority").select2({
                theme: "bootstrap",
                placeholder: "<?php echo e(trans('lead.priority')); ?>"
            }).find("option:first").attr({
                selected: false
            });
            $('#event_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#event_end_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#start_time').datetimepicker({
                format: "HH:mm a"
            });
            $('#end_time').datetimepicker({
                format: "HH:mm a"
            });
            $("#sales_team_id").select2({
                placeholder:"<?php echo e(trans('salesteam.salesteam')); ?>",
                theme: 'bootstrap'
            }).on('change',function(){
                var MainStaff=$(this).select2("val");
                $.ajax({
                   url : '<?php echo e(url('lead/filterMembers')); ?>',
                   type : 'post',
                   data: {'id': MainStaff, _token: '<?php echo e(csrf_token()); ?>'},
                   success:function(data){
                       $('#sales_person_id').empty();
                       $("#sales_person_id").select2({
                           placeholder:"<?php echo e(trans('salesteam.staff_members')); ?>",
                           theme: 'bootstrap'
                       });
                       $.each(data,function(val, text){
                           $('#sales_person_id').append($('<option></option>').val(val).html(text));
                       });
                       $('#sales_person_id').trigger('change');
                       <?php if(isset($lead)): ?>
                            $("#sales_person_id option[value='<?php echo e($lead->sales_person_id); ?>']").prop('selected', true);
                       <?php endif; ?>
                   }
                });
            });

            <?php if(isset($lead)): ?>
                $("#sales_team_id").trigger('change');
            <?php endif; ?>
        });
    </script>

<?php $__env->stopSection(); ?>
