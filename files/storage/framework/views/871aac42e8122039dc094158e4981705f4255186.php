<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($lead)): ?>
            <?php echo Form::model($lead, ['url' => $type . '/' . $lead->id, 'method' => 'put', 'id'=>'lead', 'files'=> true]); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type, 'method' => 'post', 'files'=> true,'id'=>'lead']); ?>

        <?php endif; ?>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('company_name') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('company_name', trans('lead.company_name'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('company_name', null, ['class' => 'form-control', 'placeholder'=>'Company name']); ?>

                        <span class="help-block"><?php echo e($errors->first('company_name', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('function') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('function', trans('lead.function'), ['class' => 'control-label required', 'placeholder' => 'Please select']); ?>

                    <div class="controls">
                        <?php echo Form::select('function', $functions, null, ['id'=>'function', 'class' => 'form-control select_function']); ?>

                        <span class="help-block"><?php echo e($errors->first('function', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('product_name') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('product_name', trans('lead.product_name'), ['class' => 'control-label required' ]); ?>

                    <div class="controls">
                        <?php echo Form::text('product_name', null, ['class' => 'form-control', 'placeholder'=>'Product Name']); ?>

                        <span class="help-block"><?php echo e($errors->first('product_name', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('company_site') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('company_site', trans('lead.company_site'), ['class' => 'control-label required' ]); ?>

                    <div class="controls">
                        <?php echo Form::text('company_site', null, ['class' => 'form-control', 'placeholder'=>'Company Web Site']); ?>

                        <span class="help-block"><?php echo e($errors->first('company_site', ':message')); ?></span>
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
        <div class="row">
            <div class="col-md-12">
                <hr/>
            </div>
            <div class="col-md-12">
                <h4><?php echo e(trans('lead.personalInfo')); ?></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('title', trans('lead.title'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('title', $titles, null, ['id'=>'title', 'class' => 'form-control title_select select2']); ?>

                        <span class="help-block"><?php echo e($errors->first('title', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group <?php echo e($errors->has('client_name') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('client_name', trans('lead.agent_name'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('client_name', null, ['class' => 'form-control', 'placeholder'=>'Agent Name']); ?>

                        <span class="help-block"><?php echo e($errors->first('client_name', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group <?php echo e($errors->has('country_id') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('country_id', trans('lead.country'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('country_id', $countries, null, ['id'=>'country_id', 'class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('country_id', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group <?php echo e($errors->has('state_id') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('state_id', trans('lead.state'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('state_id', isset($lead)?$states:[0=>trans('lead.select_state')], null, ['id'=>'state_id', 'class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('state_id', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group <?php echo e($errors->has('city_id') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('city_id', trans('lead.city'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('city_id', isset($lead)?$cities:[0=>trans('lead.select_city')], null, ['id'=>'city_id', 'class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('city_id', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('address', trans('lead.address'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::textarea('address', null, ['class' => 'form-control resize_vertical']); ?>

                        <span class="help-block"><?php echo e($errors->first('address', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('phone', trans('lead.phone'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('phone', null, ['class' => 'form-control','data-fv-integer' => "true",'placeholder'=>'Phone Number']); ?>

                        <span class="help-block"><?php echo e($errors->first('phone', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('mobile') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('mobile', trans('lead.mobile'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('mobile', null, ['class' => 'form-control','data-fv-integer' => 'true', 'placeholder'=>'Mobile number']); ?>

                        <span class="help-block"><?php echo e($errors->first('mobile', ':message')); ?></span>
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
                <div class="form-group <?php echo e($errors->has('priority') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('priority', trans('lead.priority'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('priority', $priority, null, ['id'=>'priority','class' => 'form-control select2', 'placeholder'=>trans('lead.select_priority')]); ?>

                        <span class="help-block"><?php echo e($errors->first('priority', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Form Actions -->
                <div class="form-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success" form="lead"><i
                                    class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                        <a href="<?php echo e(route($type.'.index')); ?>" class="btn btn-warning"><i
                                    class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>

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
                                message: 'The function field is required.'
                            }
                        }
                    },
                    product_name: {
                        validators: {
                            notEmpty: {
                                message: 'The product name field is required.'
                            }
                        }
                    },
                    company_site: {
                        validators: {
                            notEmpty: {
                                message: 'The company web site field is required.'
                            },
                            uri: {
                                allowLocal: true,
                                message: 'The input is not a valid URL'
                            }
                        }
                    },
                    title: {
                        validators: {
                            notEmpty: {
                                message: 'The title field is required.'
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
                    country_id: {
                        validators: {
                            notEmpty: {
                                message: 'The country field is required.'
                            }
                        }
                    },
                    state_id: {
                        validators: {
                            notEmpty: {
                                message: 'The state field is required.'
                            }
                        }
                    },
                    city_id: {
                        validators: {
                            notEmpty: {
                                message: 'The city field is required.'
                            }
                        }
                    },
                    phone: {
                        validators: {
                            notEmpty: {
                                message: 'The phone number is required.'
                            },
                            regexp: {
                                regexp: /^\d{5,15}?$/,
                                message: 'The phone number can only consist of numbers.'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The email field is required.'
                            }
                        }
                    },
                    priority: {
                        validators: {
                            notEmpty: {
                                message: 'The priority field is required.'
                            }
                        }
                    }

                }
            });

            $("#function").select2({
                theme: "bootstrap",
                placeholder: "<?php echo e(trans('lead.function')); ?>"
            });
            $("#title").select2({
                theme: "bootstrap",
                placeholder: "<?php echo e(trans('lead.title')); ?>"
            });
            $("#priority").select2({
                theme: "bootstrap",
                placeholder: "<?php echo e(trans('lead.priority')); ?>"
            });
            $("#country_id").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('lead.select_country')); ?>"
            });
            $("#state_id").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('lead.select_state')); ?>"
            });
            $("#city_id").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('lead.select_city')); ?>"
            });
        });

        $("#state_id").find("option:contains('Select state')").attr({
            selected: true,
            value: ""
        });
        $("#city_id").find("option:contains('Select city')").attr({
            selected: true,
            value: ""
        });
        $('#country_id').change(function () {
            getstates($(this).val());
        });
        <?php if(old('country_id')): ?>
        getstates(<?php echo e(old('country_id')); ?>);

        <?php endif; ?>
        function getstates(country) {
            $.ajax({
                type: "GET",
                url: '<?php echo e(url('lead/ajax_state_list')); ?>',
                data: {'id': country, _token: '<?php echo e(csrf_token()); ?>'},
                success: function (data) {
                    $('#state_id').empty();
                    $('#city_id').empty();
                    $('#state_id').select2({
                        theme: "bootstrap",
                        placeholder: "Select State"
                    }).trigger('change');
                    $('#city_id').select2({
                        theme: "bootstrap",
                        placeholder: "Select City"
                    }).trigger('change');
                    $.each(data, function (val, text) {
                        $('#state_id').append($('<option></option>').val(val).html(text).attr('selected', val == "<?php echo e(old('state_id')); ?>" ? true : false));
                    });
                }
            });
        }

        $('#state_id').change(function () {
            getcities($(this).val());
        });
        <?php if(old('state_id')): ?>
        getcities(<?php echo e(old('state_id')); ?>);

        <?php endif; ?>
        function getcities(cities) {
            $.ajax({
                type: "GET",
                url: '<?php echo e(url('lead/ajax_city_list')); ?>',
                data: {'id': cities, _token: '<?php echo e(csrf_token()); ?>'},
                success: function (data) {
                    $('#city_id').empty();
                    $('#city_id').select2({
                        theme: "bootstrap",
                        placeholder: "Select City"
                    }).trigger('change');
                    $.each(data, function (val, text) {
                        $('#city_id').append($('<option></option>').val(val).html(text).attr('selected', val == "<?php echo e(old('city_id')); ?>" ? true : false));
                    });
                }
            });
        }
    </script>

<?php $__env->stopSection(); ?>
