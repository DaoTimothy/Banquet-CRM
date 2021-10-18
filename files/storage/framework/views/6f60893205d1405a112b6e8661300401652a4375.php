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
        <div class="modal fade" id="department" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" align="center"><?php echo e(trans('staff.add_department')); ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-panel-collapse text-left" id="newContactDiv">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group required <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                        <?php echo Form::label('name', trans('event.name'), ['class' => 'control-label required']); ?>

                                        <div class="controls">
                                            <?php echo Form::text('name', null, ['class' => 'form-control','id'=>'department_name']); ?>

                                            <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="saveDepartment()">Save</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="designation" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" align="center"><?php echo e(trans('staff.add_designation')); ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-panel-collapse text-left" id="newContactDiv">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group required <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                        <?php echo Form::label('name', trans('staff.department_name'), ['class' => 'control-label required']); ?>

                                        <div class="controls">
                                            <?php echo Form::select('name', $departments ,null, ['class' => 'form-control select2','id'=>'desig_department']); ?>

                                            <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group required <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                        <?php echo Form::label('name', trans('event.designation_name'), ['class' => 'control-label required']); ?>

                                        <div class="controls">
                                            <?php echo Form::text('name', null, ['class' => 'form-control','id'=>'desig_name']); ?>

                                            <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="saveDesignation()">Save</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('department') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('department', trans('staff.department'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('department',$departments ,null, ['id' => 'all_department','class' => 'form-control select2','onchange' => 'addDepartment(this.value)']); ?>

                        <span class="help-block"><?php echo e($errors->first('department', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('designation') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('designation', trans('staff.designation'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('designation', [],null, ['class' => 'form-control select2','onchange' => 'addDesignation(this.value)','id'=>'all_designation']); ?>

                        <span class="help-block"><?php echo e($errors->first('designation', ':message')); ?></span>
                    </div>
                </div>
            </div>
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
        <h2><?php echo e(trans('staff.permissions')); ?></h2>
        <div class="row form-panel-event">
            <div class="col-md-12">
                <div class="panel-content">
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
                        <div class="col-sm-4 col-lg-3">
                            <h5 class="m-t-20"><?php echo e(trans('staff.reports')); ?></h5>
                            <div class="input-group">
                                <label>
                                    <input type="checkbox" name="permissions[]" value="reports.read"
                                           class='icheckgreen'
                                           <?php if(isset($staff) && $staff->hasAccess(['reports.read'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.read')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="reports.write"
                                           class='icheckblue'
                                           <?php if(isset($staff) && $staff->hasAccess(['reports.write'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.write')); ?> </label>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="reports.delete"
                                           class='icheckred'
                                           <?php if(isset($staff) && $staff->hasAccess(['reports.delete'])): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('staff.delete')); ?> </label>
                            </div>
                        </div>
                    </div>
                    <table class="table package-margin-top">
                        <thead>
                        <tr>
                            <th><h5><?php echo e(trans('staff.event')); ?></h5></th>
                            <th>
                                <div class="input-group">
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event.read"
                                               class='icheckgreen'
                                               <?php if(isset($staff) && $staff->hasAccess(['event.read'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.read')); ?> </label>
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event.write"
                                               class='icheckblue'
                                               <?php if(isset($staff) && $staff->hasAccess(['event.write'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.write')); ?> </label>
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event.delete"
                                               class='icheckred'
                                               <?php if(isset($staff) && $staff->hasAccess(['event.delete'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.delete')); ?> </label>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><h5><?php echo e(trans('event.discussion')); ?></h5></td>
                            <td>
                                <div class="input-group">
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event_discussion.read"
                                               class='icheckgreen'
                                               <?php if(isset($staff) && $staff->hasAccess(['event_discussion.read'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.read')); ?> </label>
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event_discussion.write"
                                               class='icheckblue'
                                               <?php if(isset($staff) && $staff->hasAccess(['event_discussion.write'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.write')); ?> </label>
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event_discussion.delete"
                                               class='icheckred'
                                               <?php if(isset($staff) && $staff->hasAccess(['event_discussion.delete'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.delete')); ?> </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><h5><?php echo e(trans('event.task')); ?></h5></td>
                            <td>
                                <div class="input-group">
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event_task.read"
                                               class='icheckgreen'
                                               <?php if(isset($staff) && $staff->hasAccess(['event_task.read'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.read')); ?> </label>
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event_task.write"
                                               class='icheckblue'
                                               <?php if(isset($staff) && $staff->hasAccess(['event_task.write'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.write')); ?> </label>
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event_task.delete"
                                               class='icheckred'
                                               <?php if(isset($staff) && $staff->hasAccess(['event_task.delete'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.delete')); ?> </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><h5><?php echo e(trans('event.note')); ?></h5></td>
                            <td>
                                <div class="input-group">
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event_note.read"
                                               class='icheckgreen'
                                               <?php if(isset($staff) && $staff->hasAccess(['event_note.read'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.read')); ?> </label>
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event_note.write"
                                               class='icheckblue'
                                               <?php if(isset($staff) && $staff->hasAccess(['event_note.write'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.write')); ?> </label>
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event_note.delete"
                                               class='icheckred'
                                               <?php if(isset($staff) && $staff->hasAccess(['event_note.delete'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.delete')); ?> </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><h5><?php echo e(trans('event.payment')); ?></h5></td>
                            <td>
                                <div class="input-group">
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event_payment.read"
                                               class='icheckgreen'
                                               <?php if(isset($staff) && $staff->hasAccess(['event_payment.read'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.read')); ?> </label>
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event_payment.write"
                                               class='icheckblue'
                                               <?php if(isset($staff) && $staff->hasAccess(['event_payment.write'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.write')); ?> </label>
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="event_payment.delete"
                                               class='icheckred'
                                               <?php if(isset($staff) && $staff->hasAccess(['event_payment.delete'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.delete')); ?> </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><h5><?php echo e(trans('event.docs')); ?></h5></td>
                            <td>
                                <div class="input-group">
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="docs.read"
                                               class='icheckgreen'
                                               <?php if(isset($staff) && $staff->hasAccess(['docs.read'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.read')); ?> </label>
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="docs.write"
                                               class='icheckblue'
                                               <?php if(isset($staff) && $staff->hasAccess(['docs.write'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.write')); ?> </label>
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="docs.delete"
                                               class='icheckred'
                                               <?php if(isset($staff) && $staff->hasAccess(['docs.delete'])): ?> checked <?php endif; ?>>
                                        <?php echo e(trans('staff.delete')); ?> </label>
                                </div>
                                <div class="table-penal">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="m-t-20"><?php echo e(trans('staff.bookingOrder')); ?></h5>
                                            <div class="input-group">
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_bookingorder.read"
                                                           class='icheckgreen'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_bookingorder.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_bookingorder.write"
                                                           class='icheckblue'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_bookingorder.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_bookingorder.delete"
                                                           class='icheckred'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_bookingorder.delete'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.delete')); ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="m-t-20"><?php echo e(trans('staff.proposal')); ?></h5>
                                            <div class="input-group">
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_proposal.read"
                                                           class='icheckgreen'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_proposal.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_proposal.write"
                                                           class='icheckblue'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_proposal.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_proposal.delete"
                                                           class='icheckred'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_proposal.delete'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.delete')); ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="m-t-20"><?php echo e(trans('staff.staffs')); ?></h5>
                                            <div class="input-group">
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_staffs.read"
                                                           class='icheckgreen'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_staffs.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_staffs.write"
                                                           class='icheckblue'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_staffs.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_staffs.delete"
                                                           class='icheckred'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_staffs.delete'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.delete')); ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="m-t-20"><?php echo e(trans('staff.photography')); ?></h5>
                                            <div class="input-group">
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_photography.read"
                                                           class='icheckgreen'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_photography.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_photography.write"
                                                           class='icheckblue'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_photography.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_photography.delete"
                                                           class='icheckred'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_photography.delete'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.delete')); ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="m-t-20"><?php echo e(trans('staff.entertainment')); ?></h5>
                                            <div class="input-group">
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_entertainment.read"
                                                           class='icheckgreen'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_entertainment.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_entertainment.write"
                                                           class='icheckblue'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_entertainment.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_entertainment.delete"
                                                           class='icheckred'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_entertainment.delete'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.delete')); ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="m-t-20"><?php echo e(trans('staff.decoration')); ?></h5>
                                            <div class="input-group">
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_decoration.read"
                                                           class='icheckgreen'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_decoration.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_decoration.write"
                                                           class='icheckblue'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_decoration.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_decoration.delete"
                                                           class='icheckred'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_decoration.delete'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.delete')); ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="m-t-20"><?php echo e(trans('staff.contract')); ?></h5>
                                            <div class="input-group">
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_contract.read"
                                                           class='icheckgreen'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_contract.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_contract.write"
                                                           class='icheckblue'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_contract.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_contract.delete"
                                                           class='icheckred'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_contract.delete'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.delete')); ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="m-t-20"><?php echo e(trans('staff.menu')); ?></h5>
                                            <div class="input-group">
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_menu.read"
                                                           class='icheckgreen'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_menu.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_menu.write"
                                                           class='icheckblue'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_menu.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_menu.delete"
                                                           class='icheckred'
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_menu.delete'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.delete')); ?> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
            $('#staff').on('submit',function(e){
                if($('#all_department').val() <= 0 || $('#all_designation').val() <= 0){
                    e.preventDefault();
                    toastr['error']('Select department or designation');
                }
            });
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
                                regexp: /^\d{5,10}?$/,
                                message: 'The phone number can only consist of 10 numbers.'
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

            $('#all_department').select2({
                placeholder: "<?php echo e(trans('staff.select_department')); ?>",
                theme: 'bootstrap'
            }).find("option:first").attr({
                selected: false
            });

            $('#all_designation').select2({
                placeholder: "<?php echo e(trans('staff.select_designation')); ?>",
                theme: 'bootstrap'
            }).find("option:first").attr({
                selected: false
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

        function addDepartment(id){
            if(id == 0){
                $('#all_designation').html('');
                $('#department').modal('show');
            }else if(id == -1){
                $('#all_designation').html('');
                $('#department').modal('hide');
            }else{
                getFilterDepartment(id);
            }
        }

        function addDesignation(id){
            if(id == 0){
                $('#desig_department').val($('#all_department').val()).change();
                $('#designation').modal('show');
            }
        }

        function saveDepartment(){
            var dp_name = $('#department_name').val();
            if(dp_name.trim() == ''){
                toastr['error']('Enter Department Name');
                return;
            }
            $.ajax({
                url : '<?php echo e(url('staff/addDepartment')); ?>',
                type : "post",
                data : {name : dp_name ,_token : '<?php echo e(csrf_token()); ?>'},
                dataType : "json",
                success : function(data){
                    if(data > 0){
                        toastr['success']('Department added successfully');
                        $('#desig_department').append('<option value='+data+'>'+dp_name+'</option>');
                        $('#all_department').append('<option value='+data+'>'+dp_name+'</option>');
                        $('#department_name').val('');
                        $('#department').modal('hide');
                    }else{
                        toastr['error']('Some Error Occurred');
                    }
                }
            });
        }

        function saveDesignation(){
            var d_id = $('#desig_department').val();
            var ds_name = $('#desig_name').val();

            if(d_id <= 0){
                toastr['error']('Select a department');
                return;
            }

            if(ds_name.trim() == ''){
                toastr['error']('Enter Designation Name');
                return;
            }
            $.ajax({
                url : '<?php echo e(url('staff/addDesignation')); ?>',
                type : "post",
                data : {id: d_id,name : ds_name ,_token : '<?php echo e(csrf_token()); ?>'},
                dataType : "json",
                success : function(data){
                    if(data > 0){
                        toastr['success']('Designation added successfully');
                        $('#all_designation').append('<option value='+data+'>'+ds_name+'</option>');
                        $('#desig_name').val('');
                        $('#designation').modal('hide');
                    }else{
                        toastr['error']('Some Error Occurred');
                    }
                }
            });
        }

        function getFilterDepartment(id) {
            $.ajax({
                url : '<?php echo e(url('staff/getFilterDepartment')); ?>',
                type : "get",
                data : {id: id,_token : '<?php echo e(csrf_token()); ?>'},
                dataType : "json",
                success : function(data){
                    var html = [];
                    if(data != ''){
                        $.each(data,function(key,value){
                            html.push({id : key,text : value});
                        });
                        html.sort(function(a, b){return a.id-b.id});
                        $('#all_designation').select2({
                            data : html,
                            placeholder: "<?php echo e(trans('staff.select_designation')); ?>",
                            theme: 'bootstrap'
                        }).find("option:first").attr({
                            selected: false
                        });
                    }
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
