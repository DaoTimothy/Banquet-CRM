<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($customer)): ?>
            <?php echo Form::model($customer, ['url' => $type . '/' . $customer->id, 'method' => 'put', 'files'=> true,'id'=>'customer']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type, 'method' => 'post', 'files'=> true,'id'=>'customer']); ?>

        <?php endif; ?>
            <div class="row">
            <div class="col-md-12">
                <div class="form-group <?php echo e($errors->has('user_avatar_file') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('user_avatar_file', trans('customer.customer_avatar'), ['class' => 'control-label']); ?>

                    <div class="controls row" v-image-preview>
                        <div class="col-sm-12">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail form_Blade" data-trigger="fileinput">
                                    <img id="image-preview" width="300">
                                    <?php if(isset($customer->company_avatar) && $customer->company_avatar!=""): ?>
                                        <img src="<?php echo e(url('uploads/avatar/thumb_'.$customer->company_avatar)); ?>"
                                             alt="Image" class="ima-responsive">
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileinput-new"><?php echo e(trans('dashboard.select_image')); ?></span>
                                        <span class="fileinput-exists"><?php echo e(trans('dashboard.change')); ?></span>
                                        <input type="file" name="user_avatar_file">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists"
                                       data-dismiss="fileinput"><?php echo e(trans('dashboard.remove')); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <span class="help-block"><?php echo e($errors->first('user_avatar_file', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('title', trans('customer.title'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('title', $titles, (isset($user))?$user->title:null, ['id'=>'title', 'class' => 'form-control select2']); ?>

                            <span class="help-block"><?php echo e($errors->first('title', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('first_name', trans('customer.first_name'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('first_name', isset($customer)?$customer->first_name:null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('first_name', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('last_name', trans('customer.last_name'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('last_name', isset($customer)?$customer->last_name:null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('last_name', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group <?php echo e($errors->has('job_position') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('job_position', trans('customer.job_position'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('job_position', (isset($user))?$user->customer->job_position:null, ['class' => 'form-control','id'=>'job_position']); ?>

                            <span class="help-block"><?php echo e($errors->first('job_position', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group <?php echo e($errors->has('company_id') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('company', trans('customer.company'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('company_id', $companies, (isset($user))?$user->company_id:null, ['id'=>'company_id', 'class' => 'form-control select2']); ?>

                            <span class="help-block"><?php echo e($errors->first('company_id', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group <?php echo e($errors->has('sales_team_id') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('sales_team_id', trans('customer.sales_team_id'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('sales_team_id', $salesteams, (isset($user))?$user->sales_team_id:null, ['id'=>'sales_team_id', 'class' => 'form-control select2']); ?>

                            <span class="help-block"><?php echo e($errors->first('sales_team_id', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('email', trans('customer.email'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::email('email', isset($customer)?$customer->website:null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group <?php echo e($errors->has('phone_number') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('phone_number', trans('customer.phone'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('phone_number', isset($customer)?$customer->mobile:null, ['class' => 'form-control ','data-fv-integer' => 'true']); ?>

                            <span class="help-block"><?php echo e($errors->first('phone_number', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                
                    
                        
                        
                            
                            
                        
                    
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('address', trans('customer.address'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('address', (isset($user))?$user->address:null, ['class' => 'form-control resize_vertical']); ?>

                            <span class="help-block"><?php echo e($errors->first('address', ':message')); ?></span>
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
        $(document).ready(function(){
            var availableTags = [
                "Manager",
                "Chef",
                "Sales Manager",
            ];
            $('#job_position').autocomplete({
                source: availableTags
            });

            $("#message").hide();
            $("#password, #password_confirmation").on("keyup", function () {
                if ($("#password").val() == $("#password_confirmation").val()) {
                    $("#message").hide();
                } else{
                    $("#message").show();
                    $('#customer').data('bootstrapValidator').validate();
                }
            });
            $(".change_password").on("click",function(){
                $(".password_fields").show();
                $(this).hide();
                $('#customer').data('bootstrapValidator').validate();
            });
            $(".password_fields").hide();
            $("#customer").bootstrapValidator({
                fields: {
                    user_avatar_file: {
                        validators: {
                            file: {
                                extension: 'jpeg,jpg,png',
                                type: 'image/jpeg,image/png',
                                maxSize: 1000000,
                                message: 'The logo format must be in jpeg, jpg or png and size less than 1MB'
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
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: 'The first name field is required.'
                            },
                            stringLength: {
                                min: 3,
                                message: 'The first name must be minimum 3 characters.'
                            },
                            regexp: {
                                regexp: /^[A-z]+$/,
                                message: 'The first name must be contain characters only.'
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
                    company_id: {
                        validators: {
                            notEmpty: {
                                message: 'The company name field is required.'
                            }
                        }
                    },
                    sales_team_id: {
                        validators: {
                            notEmpty: {
                                message: 'The Sales team field is required.'
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
//                    password: {
//                        validators: {
//                            notEmpty: {
//                                message: 'The password field is required.'
//                            },
//                            stringLength: {
//                                min: 3,
//                                message: 'The password must be minimum 3 characters.'
//                            }
//                        }
//                    },
//                    password_confirmation: {
//                        validators: {
//                            notEmpty: {
//                                message: 'The password confirmation field is required.'
//                            }
//                        }
//                    },
                    phone_number: {
                        validators: {
                            notEmpty: {
                                message: 'The phone number is required.'
                            },
                            regexp: {
                                regexp: /^\d{5,10}?$/,
                                message: 'The phone number can only consist of numbers.'
                            }
                        }
                    }
                }
            });
            $("#title").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('customer.title')); ?>"
            });
            $("#company_id").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('customer.company')); ?>"
            });
            $("#sales_team_id").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('customer.sales_team_id')); ?>"
            });
        })
    </script>
    <?php $__env->stopSection(); ?>
