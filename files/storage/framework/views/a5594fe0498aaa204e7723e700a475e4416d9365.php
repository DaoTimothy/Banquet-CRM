<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($company)): ?>
            <?php echo Form::model($company, ['url' => $type . '/' . $company->id, 'method' => 'put', 'files'=> true, 'id'=>'company']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type, 'method' => 'post', 'files'=> true, 'id'=>'company']); ?>

        <?php endif; ?>
        <div class="form-group required <?php echo e($errors->has('company_avatar_file') ? 'has-error' : ''); ?>">
            <?php echo Form::label('company_avatar_file', trans('company.company_avatar'), ['class' => 'control-label']); ?>

            <div class="controls row" v-image-preview>
                <div class="col-md-12">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail form_Blade" data-trigger="fileinput">
                            <img id="image-preview" width="300" class="img-responsive">
                            <?php if(isset($company->company_avatar) && $company->company_avatar!=""): ?>
                                <img src="<?php echo e(url('uploads/company/thumb_'.$company->company_avatar)); ?>"
                                     alt="Image" class="img-responsive" width="300">
                            <?php endif; ?>
                        </div>
                        <span class="btn btn-default btn-file">
                                    <span class="fileinput-new"><?php echo e(trans('dashboard.select_image')); ?></span>
                                    <span class="fileinput-exists"><?php echo e(trans('dashboard.change')); ?></span>
                                    <input type="file" name="company_avatar_file">
                                </span>
                        <a href="#" class="btn btn-default fileinput-exists"
                           data-dismiss="fileinput"><?php echo e(trans('dashboard.remove')); ?></a>
                        <span class="help-block"><?php echo e($errors->first('company_avatar_file', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group required <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('name', trans('company.company_name'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('name', null, ['class' => 'form-control','placeholder'=>'Company name']); ?>

                        <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group required <?php echo e($errors->has('website') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('website', trans('company.website'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('website', null, ['class' => 'form-control','placeholder'=>'Company website']); ?>

                        <span class="help-block"><?php echo e($errors->first('website', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group required <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('phone', trans('company.phone'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('phone', null, ['class' => 'form-control','data-fv-integer' => "true",'placeholder'=>'Phone']); ?>

                        <span class="help-block"><?php echo e($errors->first('phone', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group required <?php echo e($errors->has('mobile') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('mobile', trans('company.mobile'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('mobile', null, ['class' => 'form-control','data-fv-integer' => "true",'placeholder'=>'Mobile']); ?>

                        <span class="help-block"><?php echo e($errors->first('mobile', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <h3>Location</h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group <?php echo e($errors->has('country_id') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('country_id', trans('company.country'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('country_id', $countries, null, ['id'=>'country_id', 'class' => 'form-control select2']); ?>

                        <span class="help-block"><?php echo e($errors->first('country_id', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('state_id') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('state_id', trans('company.state'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('state_id', isset($company)?$states:[0=>trans('company.select_state')], null, ['id'=>'state_id', 'class' => 'form-control select2']); ?>

                        <span class="help-block"><?php echo e($errors->first('state_id', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('city_id') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('city_id', trans('company.city'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('city_id', isset($company)?$cities:[0=>trans('company.select_city')], null, ['id'=>'city_id', 'class' => 'form-control select2']); ?>

                        <span class="help-block"><?php echo e($errors->first('city_id', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group required <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('address', trans('company.address'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::textarea('address', null, ['class' => 'form-control resize_vertical','placeholder'=>'Address']); ?>

                        <span class="help-block"><?php echo e($errors->first('address', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success"><i
                                    class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                        <a href="<?php echo e(route($type.'.index')); ?>" class="btn btn-warning"><i
                                    class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php echo Form::hidden('latitude', null, ['class' => 'form-control', 'id'=>"latitude"]); ?>

        <?php echo Form::hidden('longitude', null, ['class' => 'form-control', 'id'=>"longitude"]); ?>

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAPS_KEY')); ?>&libraries=places"></script>
    <script>
        $(document).ready(function () {
            $("#company").bootstrapValidator({
                fields: {
                    company_avatar_file: {
                        validators: {
                            file: {
                                extension: 'jpeg,jpg,png',
                                type: 'image/jpeg,image/png',
                                maxSize: 1000000,
                                message: 'The logo format must be in jpeg, jpg or png and size less than 1MB'
                            }
                        }
                    },
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'The company name field is required.'
                            },
                            stringLength: {
                                min: 3,
                                message: 'The company name must be minimum 3 characters.'
                            }
                        }
                    },
                    website: {
                        validators: {
                            notEmpty: {
                                message: 'The company website field is required.'
                            },
                            uri: {
                                allowLocal: true,
                                message: 'The input is not a valid URL'
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
                    address: {
                        validators: {
                            notEmpty: {
                                message: 'The address field is required.'
                            }
                        }
                    }
                }
            });
            $(".fileinput").find('input').change(function () {
                button_disabled();
                $("input").on("keyup", function () {
                    button_disabled();
                });
            });

            function button_disabled() {
                if ($(".form-group.required").hasClass("has-error")) {
                    $("button[type='submit']").attr("disabled", true);
                } else {
                    $("button[type='submit']").attr("disabled", false);
                }
            }

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
                theme: "bootstrap",
                placeholder: "<?php echo e(trans('lead.select_country')); ?>"
            });
            $("#state_id").select2({
                theme: "bootstrap",
                placeholder: "<?php echo e(trans('lead.select_state')); ?>"
            });
            $("#city_id").select2({
                theme: "bootstrap",
                placeholder: "<?php echo e(trans('lead.select_city')); ?>"
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

        $('#city_id').change(function () {
            var geocoder = new google.maps.Geocoder();
            if (typeof $('#city_id').select2('data')[0] !== "undefined" && typeof $('#state_id').select2('data')[0] !== "undefined") {
                geocoder.geocode({'address': '"' + $('#city_id').select2('data')[0].text + '",' + $('#state_id').select2('data')[0].text + '"'}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        $('#latitude').val(results[0].geometry.location.lat());
                        $('#longitude').val(results[0].geometry.location.lng());
                    }
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>