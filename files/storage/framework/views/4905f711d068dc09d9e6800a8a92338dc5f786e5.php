<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($staff)): ?>

            <?php echo Form::model($staff, ['url' => $type . '/' . $staff->id, 'method' => 'put', 'files'=> true,'id'=>'staff']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type, 'method' => 'post', 'files'=> true,'id'=>'staff']); ?>

        <?php endif; ?>
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group <?php echo e($errors->has('user_avatar_file') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('user_avatar_file', trans('staff.user_avatar'), ['class' => 'control-label']); ?>

                    <div class="controls row" v-image-preview>
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail form_Blade" data-trigger="fileinput" style="width: 180px">
                                    <img id="image-preview" width="300">
                                    <?php if(isset($staff->avatar) ): ?>
                                        <img src="<?php echo e(url($staff->avatar)); ?>" alt="User Image" width="300px">
                                    <?php endif; ?>
                                </div>
                                <span class="help-block"><?php echo e($errors->first('user_avatar_file', ':message')); ?></span>
                                <div class="m-t-10">
                                    <span class="btn btn-default btn-file"><span
                                                class="fileinput-new"><?php echo e(trans('dashboard.select_image')); ?></span>
                                        <span class="fileinput-exists"><?php echo e(trans('dashboard.change')); ?></span>
                                        <input type="file" name="user_avatar_file">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists"
                                       data-dismiss="fileinput"><?php echo e(trans('dashboard.remove')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('first_name', trans('staff.first_name'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('first_name', null, ['class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('first_name', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('last_name', trans('staff.last_name'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('last_name', null, ['class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('last_name', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('phone_number') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('phone_number', trans('staff.phone_number'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('phone_number', null, ['class' => 'form-control','data-fv-integer' => 'true']); ?>

                        <span class="help-block"><?php echo e($errors->first('phone_number', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('email', trans('staff.email'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::email('email', null, ['class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!Request::is('staff/*/edit')): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('password', trans('staff.password'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::password('password', ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('password', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('password_confirmation', trans('staff.password_confirmation'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::password('password_confirmation', ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('password_confirmation', ':message')); ?></span>
                            <small class="text-danger" id='message'><?php echo e(trans('staff.passwordNotMatching')); ?></small>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row password_fields">
                <div class="col-md-6">
                    <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('password', trans('staff.password'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::password('password', ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('password', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('password_confirmation', trans('staff.password_confirmation'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::password('password_confirmation', ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('password_confirmation', ':message')); ?></span>
                            <small class="text-danger" id='message'><?php echo e(trans('staff.passwordNotMatching')); ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-warning change_password"><?php echo e(trans('staff.changePassword')); ?></button>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <div class="panel-content">
                    <h2><?php echo e(trans('staff.permissions')); ?></h2>
                    <div class="row">
                        <div class="col-sm-4 col-lg-3">
                            <h5 class="m-t-20"><?php echo e(trans('staff.sales_teams')); ?></h5>
                            <div class="input-group">
                                <label>
                                    <input type="checkbox" name="permissions[]" value="sales_team.read"
                                           class='icheckgreen'
                                           <?php if(isset($staff) && $staff->hasAccess(['sales_team.read'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.read')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="sales_team.write"
                                           class='icheckblue'
                                           <?php if(isset($staff) && $staff->hasAccess(['sales_team.write'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.write')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="sales_team.delete"
                                           class='icheckred'
                                           <?php if(isset($staff) && $staff->hasAccess(['sales_team.delete'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.delete')); ?> </label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <h5 class="m-t-20"><?php echo e(trans('staff.leads')); ?></h5>
                            <div class="input-group">
                                <label>
                                    <input type="checkbox" name="permissions[]" value="leads.read" class='icheckgreen'
                                           <?php if(isset($staff) && $staff->hasAccess(['leads.read'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.read')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="leads.write" class='icheckblue'
                                           <?php if(isset($staff) && $staff->hasAccess(['leads.write'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.write')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="leads.delete" class='icheckred'
                                           <?php if(isset($staff) && $staff->hasAccess(['leads.delete'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.delete')); ?> </label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <h5 class="m-t-20"><?php echo e(trans('staff.opportunities')); ?></h5>
                            <div class="input-group">
                                <label>
                                    <input type="checkbox" name="permissions[]" value="opportunities.read"
                                           class='icheckgreen'
                                           <?php if(isset($staff) && $staff->hasAccess(['opportunities.read'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.read')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="opportunities.write"
                                           class='icheckblue'
                                           <?php if(isset($staff) && $staff->hasAccess(['opportunities.write'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.write')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="opportunities.delete"
                                           class='icheckred'
                                           <?php if(isset($staff) && $staff->hasAccess(['opportunities.delete'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.delete')); ?> </label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <h5 class="m-t-20"><?php echo e(trans('staff.logged_calls')); ?></h5>
                            <div class="input-group">
                                <label>
                                    <input type="checkbox" name="permissions[]" value="logged_calls.read"
                                           class='icheckgreen'
                                           <?php if(isset($staff) && $staff->hasAccess(['logged_calls.read'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.read')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="logged_calls.write"
                                           class='icheckblue'
                                           <?php if(isset($staff) && $staff->hasAccess(['logged_calls.write'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.write')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="logged_calls.delete"
                                           class='icheckred'
                                           <?php if(isset($staff) && $staff->hasAccess(['logged_calls.delete'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.delete')); ?> </label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <h5 class="m-t-20"><?php echo e(trans('staff.meetings')); ?></h5>
                            <div class="input-group">
                                <label>
                                    <input type="checkbox" name="permissions[]" value="meetings.read"
                                           class='icheckgreen'
                                           <?php if(isset($staff) && $staff->hasAccess(['meetings.read'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.read')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="meetings.write"
                                           class='icheckblue'
                                           <?php if(isset($staff) && $staff->hasAccess(['meetings.write'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.write')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="meetings.delete"
                                           class='icheckred'
                                           <?php if(isset($staff) && $staff->hasAccess(['meetings.delete'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.delete')); ?> </label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <h5 class="m-t-20"><?php echo e(trans('staff.products')); ?></h5>
                            <div class="input-group">
                                <label>
                                    <input type="checkbox" name="permissions[]" value="products.read"
                                           class='icheckgreen'
                                           <?php if(isset($staff) && $staff->hasAccess(['products.read'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.read')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="products.write"
                                           class='icheckblue'
                                           <?php if(isset($staff) && $staff->hasAccess(['products.write'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.write')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="products.delete"
                                           class='icheckred'
                                           <?php if(isset($staff) && $staff->hasAccess(['products.delete'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.delete')); ?> </label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <h5 class="m-t-20"><?php echo e(trans('staff.quotations')); ?></h5>
                            <div class="input-group">
                                <label>
                                    <input type="checkbox" name="permissions[]" value="quotations.read"
                                           class='icheckgreen'
                                           <?php if(isset($staff) && $staff->hasAccess(['quotations.read'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.read')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="quotations.write"
                                           class='icheckblue'
                                           <?php if(isset($staff) && $staff->hasAccess(['quotations.write'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.write')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="quotations.delete"
                                           class='icheckred'
                                           <?php if(isset($staff) && $staff->hasAccess(['quotations.delete'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.delete')); ?> </label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <h5 class="m-t-20"><?php echo e(trans('staff.sales_orders')); ?></h5>
                            <div class="input-group">
                                <label>
                                    <input type="checkbox" name="permissions[]" value="sales_orders.read"
                                           class='icheckgreen'
                                           <?php if(isset($staff) && $staff->hasAccess(['sales_orders.read'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.read')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="sales_orders.write"
                                           class='icheckblue'
                                           <?php if(isset($staff) && $staff->hasAccess(['sales_orders.write'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.write')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="sales_orders.delete"
                                           class='icheckred'
                                           <?php if(isset($staff) && $staff->hasAccess(['sales_orders.delete'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.delete')); ?> </label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <h5 class="m-t-20"><?php echo e(trans('staff.invoices')); ?></h5>
                            <div class="input-group">
                                <label>
                                    <input type="checkbox" name="permissions[]" value="invoices.read"
                                           class='icheckgreen'
                                           <?php if(isset($staff) && $staff->hasAccess(['invoices.read'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.read')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="invoices.write"
                                           class='icheckblue'
                                           <?php if(isset($staff) && $staff->hasAccess(['invoices.write'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.write')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="invoices.delete"
                                           class='icheckred'
                                           <?php if(isset($staff) && $staff->hasAccess(['invoices.delete'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.delete')); ?> </label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <h5 class="m-t-20"><?php echo e(trans('staff.staff')); ?></h5>
                            <div class="input-group">
                                <label>
                                    <input type="checkbox" name="permissions[]" value="staff.read" class='icheckgreen'
                                           <?php if(isset($staff) && $staff->hasAccess(['staff.read'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.read')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="staff.write" class='icheckblue'
                                           <?php if(isset($staff) && $staff->hasAccess(['staff.write'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.write')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="staff.delete" class='icheckred'
                                           <?php if(isset($staff) && $staff->hasAccess(['staff.delete'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.delete')); ?> </label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <h5 class="m-t-20"><?php echo e(trans('staff.companies')); ?></h5>
                            <div class="input-group">
                                <label>
                                    <input type="checkbox" name="permissions[]" value="contacts.read"
                                           class='icheckgreen'
                                           <?php if(isset($staff) && $staff->hasAccess(['contacts.read'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.read')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="contacts.write"
                                           class='icheckblue'
                                           <?php if(isset($staff) && $staff->hasAccess(['contacts.write'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.write')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="contacts.delete"
                                           class='icheckred'
                                           <?php if(isset($staff) && $staff->hasAccess(['contacts.delete'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.delete')); ?> </label>
                            </div>
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

                        <button type="submit" class="btn btn-success"><i
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
            $("#message").hide();
            $("#password, #password_confirmation").on("keyup", function () {
                if ($("#password").val() == $("#password_confirmation").val()) {
                    $("#message").hide();
                } else {
                    $("#message").show();
                    $("button[type='submit']").attr("disabled", true)
                }
            });
            $("#staff").bootstrapValidator({
                fields: {
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: 'The first name field is required.'
                            },
                            stringLength: {
                                min: 3,
                                message: 'The first name must be minimum 3 characters.'
                            }
                        }
                    },
                    last_name: {
                        validators: {
                            notEmpty: {
                                message: 'The last name field is required.'
                            },
                            stringLength: {
                                min: 3,
                                message: 'The last name must be minimum 3 characters.'
                            }
                        }
                    },
                    phone_number: {
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
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'The password field is required.'
                            },
                            stringLength: {
                                min: 3,
                                message: 'The password must be minimum 3 characters.'
                            }
                        }
                    },
                    password_confirmation: {
                        validators: {
                            notEmpty: {
                                message: 'The password confirmation field is required.'
                            }
                        }
                    }

                }
            });
            $(".change_password").on("click", function () {
                $(".password_fields").show();
                $(this).hide();
            });
            $(".password_fields").hide();
            $('.icheckgreen').iCheck({
                checkboxClass: 'icheckbox_minimal-green',
                radioClass: 'iradio_minimal-green'
            });
            $('.icheckblue').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            $('.icheckred').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            });

            $("input[value$='write'],input[value$='delete']").on('ifChecked', function () {
                var item = $(this).val();
                var part = item.split('.');
                $("input[value='" + part[0] + ".read']").iCheck('check').iCheck('disable');
            });
            $("input[value$='write'],input[value$='delete']").on('ifUnchecked', function () {
                var item = $(this).val();
                var part = item.split('.');
                if (!$("input[value='" + part[0] + ".write']").is(":checked") && !$("input[value='" + part[0] + ".delete']").is(":checked")) {
                    $("input[value='" + part[0] + ".read']").iCheck('enable').iCheck('uncheck');
                }
            });
            $(".btn-success").click(function () {
                $("input").iCheck('enable');
            });
            $("input[type='checkbox']:checked").each(function () {
                var item = $(this).val();
                var part = item.split('.');
                if ($("input[value='" + part[0] + ".write']").is(":checked") || $("input[value='" + part[0] + ".delete']").is(":checked")) {
                    $("input[value='" + part[0] + ".read']").iCheck('check').iCheck('disable');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
