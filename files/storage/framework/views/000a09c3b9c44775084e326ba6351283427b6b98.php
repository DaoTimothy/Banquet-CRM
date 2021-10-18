<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/icheck.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <div class="nav-tabs-custom" id="user_tabs">
            <ul class="nav nav-tabs Set-list">
                <li class="active">
                    <a href="#general"
                       data-toggle="tab" title="<?php echo e(trans('staff.info')); ?>"><i
                                class="material-icons md-24">info</i></a>
                </li>
                <li>
                    <a href="#logins"
                       data-toggle="tab" title="<?php echo e(trans('staff.login')); ?>"><i
                                class="material-icons md-24">lock</i></a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="row form-panel-view">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail form_Blade" data-trigger="fileinput" style="width: 180px">
                                    <?php if(isset($staff->avatar)): ?>
                                        <img src="<?php echo e($staff->avatar); ?>" alt="avatar" width="300px">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="title"><?php echo e(trans('staff.full_name')); ?></label>
                                : <?php echo e($staff->full_name); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="title"><?php echo e(trans('staff.phone_number')); ?></label>
                                : <?php echo e($staff->phone_number); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="title"><?php echo e(trans('staff.email')); ?></label>
                                : <?php echo e($staff->email); ?>

                            </div>
                        </div>
                    </div>
                    <h2><?php echo e(trans('staff.permissions')); ?></h2>
                    <div class="row form-panel-view">
                        <div class="col-md-12">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-4">
                                        <h5 class="m-t-20"><?php echo e(trans('staff.sales_teams')); ?></h5>
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="sales_team.read"
                                                       class='icheckgreen' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['sales_team.read'])): ?> checked <?php endif; ?>>
                                                <i class="success"></i> <?php echo e(trans('staff.read')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="sales_team.write"
                                                       class='icheckblue' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['sales_team.write'])): ?> checked <?php endif; ?>>
                                                <i class="warning"></i> <?php echo e(trans('staff.write')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="sales_team.delete"
                                                       class='icheckred' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['sales_team.delete'])): ?> checked <?php endif; ?>>
                                                <i class="danger"></i> <?php echo e(trans('staff.delete')); ?> </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <h5 class="m-t-20"><?php echo e(trans('staff.leads')); ?></h5>
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="leads.read"
                                                       class='icheckgreen' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['leads.read'])): ?> checked <?php endif; ?>>
                                                <i class="success"></i> <?php echo e(trans('staff.read')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="leads.write"
                                                       class='icheckblue' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['leads.write'])): ?> checked <?php endif; ?>>
                                                <i class="warning"></i> <?php echo e(trans('staff.write')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="leads.delete"
                                                       class='icheckred' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['leads.delete'])): ?> checked <?php endif; ?>>
                                                <i class="danger"></i> <?php echo e(trans('staff.delete')); ?> </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <h5 class="m-t-20"><?php echo e(trans('staff.opportunities')); ?></h5>
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="opportunities.read"
                                                       class='icheckgreen' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['opportunities.read'])): ?> checked <?php endif; ?>>
                                                <i class="success"></i> <?php echo e(trans('staff.read')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="opportunities.write"
                                                       class='icheckblue' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['opportunities.write'])): ?> checked <?php endif; ?>>
                                                <i class="warning"></i> <?php echo e(trans('staff.write')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="opportunities.delete"
                                                       class='icheckred' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['opportunities.delete'])): ?> checked <?php endif; ?>>
                                                <i class="danger"></i> <?php echo e(trans('staff.delete')); ?> </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <h5 class="m-t-20"><?php echo e(trans('staff.logged_calls')); ?></h5>
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="logged_calls.read"
                                                       class='icheckgreen' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['logged_calls.read'])): ?> checked <?php endif; ?>>
                                                <i class="success"></i> <?php echo e(trans('staff.read')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="logged_calls.write"
                                                       class='icheckblue' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['logged_calls.write'])): ?> checked <?php endif; ?>>
                                                <i class="warning"></i> <?php echo e(trans('staff.write')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="logged_calls.delete"
                                                       class='icheckred' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['logged_calls.delete'])): ?> checked <?php endif; ?>>
                                                <i class="danger"></i> <?php echo e(trans('staff.delete')); ?> </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <h5 class="m-t-20"><?php echo e(trans('staff.meetings')); ?></h5>
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="meetings.read"
                                                       class='icheckgreen' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['meetings.read'])): ?> checked <?php endif; ?>>
                                                <i class="success"></i> <?php echo e(trans('staff.read')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="meetings.write"
                                                       class='icheckblue' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['meetings.write'])): ?> checked <?php endif; ?>>
                                                <i class="warning"></i> <?php echo e(trans('staff.write')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="meetings.delete"
                                                       class='icheckred' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['meetings.delete'])): ?> checked <?php endif; ?>>
                                                <i class="danger"></i> <?php echo e(trans('staff.delete')); ?> </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <h5 class="m-t-20"><?php echo e(trans('staff.products')); ?></h5>
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="products.read"
                                                       class='icheckgreen' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['products.read'])): ?> checked <?php endif; ?>>
                                                <i class="success"></i> <?php echo e(trans('staff.read')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="products.write"
                                                       class='icheckblue' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['products.write'])): ?> checked <?php endif; ?>>
                                                <i class="warning"></i> <?php echo e(trans('staff.write')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="products.delete"
                                                       class='icheckred' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['products.delete'])): ?> checked <?php endif; ?>>
                                                <i class="danger"></i> <?php echo e(trans('staff.delete')); ?> </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-4">
                                        <h5 class="m-t-20"><?php echo e(trans('staff.quotations')); ?></h5>
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="quotations.read"
                                                       class='icheckgreen' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['quotations.read'])): ?> checked <?php endif; ?>>
                                                <i class="success"></i> <?php echo e(trans('staff.read')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="quotations.write"
                                                       class='icheckblue' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['quotations.write'])): ?> checked <?php endif; ?>>
                                                <i class="warning"></i> <?php echo e(trans('staff.write')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="quotations.delete"
                                                       class='icheckred' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['quotations.delete'])): ?> checked <?php endif; ?>>
                                                <i class="danger"></i> <?php echo e(trans('staff.delete')); ?> </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <h5 class="m-t-20"><?php echo e(trans('staff.sales_orders')); ?></h5>
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="sales_orders.read"
                                                       class='icheckgreen' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['sales_orders.read'])): ?> checked <?php endif; ?>>
                                                <i class="success"></i> <?php echo e(trans('staff.read')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="sales_orders.write"
                                                       disabled
                                                       class='icheckblue'
                                                       <?php if(isset($staff) && $staff->hasAccess(['sales_orders.write'])): ?> checked <?php endif; ?>>
                                                <i class="warning"></i> <?php echo e(trans('staff.write')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="sales_orders.delete"
                                                       disabled
                                                       class='icheckred'
                                                       <?php if(isset($staff) && $staff->hasAccess(['sales_orders.delete'])): ?> checked <?php endif; ?>>
                                                <i class="danger"></i> <?php echo e(trans('staff.delete')); ?> </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <h5 class="m-t-20"><?php echo e(trans('staff.invoices')); ?></h5>
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="invoices.read"
                                                       class='icheckgreen' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['invoices.read'])): ?> checked <?php endif; ?>>
                                                <i class="success"></i> <?php echo e(trans('staff.read')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="invoices.write"
                                                       class='icheckblue' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['invoices.write'])): ?> checked <?php endif; ?>>
                                                <i class="warning"></i> <?php echo e(trans('staff.write')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="invoices.delete"
                                                       class='icheckred' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['invoices.delete'])): ?> checked <?php endif; ?>>
                                                <i class="danger"></i> <?php echo e(trans('staff.delete')); ?> </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <h5 class="m-t-20"><?php echo e(trans('staff.staff')); ?></h5>
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="staff.read"
                                                       class='icheckgreen' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['staff.read'])): ?> checked <?php endif; ?>>
                                                <i class="success"></i> <?php echo e(trans('staff.read')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="staff.write"
                                                       class='icheckblue' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['staff.write'])): ?> checked <?php endif; ?>>
                                                <i class="warning"></i> <?php echo e(trans('staff.write')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="staff.delete"
                                                       class='icheckred' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['staff.delete'])): ?> checked <?php endif; ?>>
                                                <i class="danger"></i> <?php echo e(trans('staff.delete')); ?> </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <h5 class="m-t-20"><?php echo e(trans('staff.companies')); ?></h5>
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="contacts.read"
                                                       class='icheckgreen' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['contacts.read'])): ?> checked <?php endif; ?>>
                                                <i class="success"></i> <?php echo e(trans('staff.read')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="contacts.write"
                                                       class='icheckblue' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['contacts.write'])): ?> checked <?php endif; ?>>
                                                <i class="warning"></i> <?php echo e(trans('staff.write')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="contacts.delete"
                                                       class='icheckred' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['contacts.delete'])): ?> checked <?php endif; ?>>
                                                <i class="danger"></i> <?php echo e(trans('staff.delete')); ?> </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-3">
                                        <h5 class="m-t-20"><?php echo e(trans('staff.reports')); ?></h5>
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="reports.read"
                                                       class='icheckgreen' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['reports.read'])): ?> checked <?php endif; ?>>
                                                <?php echo e(trans('staff.read')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="reports.write"
                                                       class='icheckblue' disabled
                                                       <?php if(isset($staff) && $staff->hasAccess(['reports.write'])): ?> checked <?php endif; ?>>
                                                <?php echo e(trans('staff.write')); ?> </label>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="reports.delete"
                                                       class='icheckred' disabled
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
                                                           class='icheckgreen' disabled
                                                           <?php if(isset($staff) && $staff->hasAccess(['event.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event.write"
                                                           class='icheckblue' disabled
                                                           <?php if(isset($staff) && $staff->hasAccess(['event.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event.delete"
                                                           class='icheckred' disabled
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
                                                           class='icheckgreen' disabled
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_discussion.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_discussion.write"
                                                           class='icheckblue' disabled
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_discussion.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_discussion.delete"
                                                           class='icheckred' disabled
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
                                                           class='icheckgreen' disabled
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_task.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_task.write"
                                                           class='icheckblue' disabled
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_task.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_task.delete"
                                                           class='icheckred' disabled
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
                                                           class='icheckgreen' disabled
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_note.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_note.write"
                                                           class='icheckblue' disabled
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_note.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_note.delete"
                                                           class='icheckred' disabled
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
                                                           class='icheckgreen' disabled
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_payment.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_payment.write"
                                                           class='icheckblue' disabled
                                                           <?php if(isset($staff) && $staff->hasAccess(['event_payment.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="event_payment.delete"
                                                           class='icheckred' disabled
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
                                                           class='icheckgreen' disabled
                                                           <?php if(isset($staff) && $staff->hasAccess(['docs.read'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.read')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="docs.write"
                                                           class='icheckblue' disabled
                                                           <?php if(isset($staff) && $staff->hasAccess(['docs.write'])): ?> checked <?php endif; ?>>
                                                    <?php echo e(trans('staff.write')); ?> </label>
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="docs.delete"
                                                           class='icheckred' disabled
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
                                                                       class='icheckgreen' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_bookingorder.read'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.read')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_bookingorder.write"
                                                                       class='icheckblue' disabled
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
                                                                       class='icheckgreen' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_proposal.read'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.read')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_proposal.write"
                                                                       class='icheckblue' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_proposal.write'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.write')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_proposal.delete"
                                                                       class='icheckred' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_proposal.delete'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.delete')); ?> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5 class="m-t-20"><?php echo e(trans('staff.staffs')); ?></h5>
                                                        <div class="input-group">
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_staffs.read"
                                                                       class='icheckgreen' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_staffs.read'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.read')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_staffs.write"
                                                                       class='icheckblue' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_staffs.write'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.write')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_staffs.delete"
                                                                       class='icheckred' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_staffs.delete'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.delete')); ?> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5 class="m-t-20"><?php echo e(trans('staff.photography')); ?></h5>
                                                        <div class="input-group">
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_photography.read"
                                                                       class='icheckgreen' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_photography.read'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.read')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_photography.write"
                                                                       class='icheckblue' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_photography.write'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.write')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_photography.delete"
                                                                       class='icheckred' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_photography.delete'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.delete')); ?> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5 class="m-t-20"><?php echo e(trans('staff.entertainment')); ?></h5>
                                                        <div class="input-group">
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_entertainment.read"
                                                                       class='icheckgreen' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_entertainment.read'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.read')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_entertainment.write"
                                                                       class='icheckblue' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_entertainment.write'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.write')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_entertainment.delete"
                                                                       class='icheckred' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_entertainment.delete'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.delete')); ?> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5 class="m-t-20"><?php echo e(trans('staff.decoration')); ?></h5>
                                                        <div class="input-group">
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_decoration.read"
                                                                       class='icheckgreen' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_decoration.read'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.read')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_decoration.write"
                                                                       class='icheckblue' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_decoration.write'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.write')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_decoration.delete"
                                                                       class='icheckred' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_decoration.delete'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.delete')); ?> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5 class="m-t-20"><?php echo e(trans('staff.contract')); ?></h5>
                                                        <div class="input-group">
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_contract.read"
                                                                       class='icheckgreen' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_contract.read'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.read')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_contract.write"
                                                                       class='icheckblue' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_contract.write'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.write')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_contract.delete"
                                                                       class='icheckred' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_contract.delete'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.delete')); ?> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5 class="m-t-20"><?php echo e(trans('staff.menu')); ?></h5>
                                                        <div class="input-group">
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_menu.read"
                                                                       class='icheckgreen' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_menu.read'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.read')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_menu.write"
                                                                       class='icheckblue' disabled
                                                                       <?php if(isset($staff) && $staff->hasAccess(['event_menu.write'])): ?> checked <?php endif; ?>>
                                                                <?php echo e(trans('staff.write')); ?> </label>
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" value="event_menu.delete"
                                                                       class='icheckred' disabled
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
                </div>
                <div class="tab-pane" id="logins">
                    <div class="m-t-30">
                        <table id="login_details" class="table table-striped table-bordered dataTable no-footer">
                            <thead>
                            <th><?php echo e(trans('staff.date_time')); ?></th>
                            <th><?php echo e(trans('staff.ip_address')); ?></th>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $staff->logins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $login): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($login->created_at->format(Settings::get('date_format').' '. Settings::get('time_format'))); ?></td>
                                    <td><?php echo e($login->ip_address); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 m-t-10">
                <div class="form-group">
                    <div class="controls">
                        <?php if(@$action == 'show'): ?>
                            <a href="<?php echo e(url($type)); ?>" class="btn btn-warning m-t-10"><i
                                        class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                        <?php else: ?>
                            <button type="submit" class="btn btn-danger m-t-10"><i
                                        class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?></button>
                            <a href="<?php echo e(url($type)); ?>" class="btn btn-warning m-t-10"><i
                                        class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/icheck.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
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
            $(".icheckbox_minimal-red.checked,.icheckbox_minimal-green.checked,.icheckbox_minimal-blue.checked").removeClass("disabled")
            $('#login_details').DataTable({
                "pagination": true
            });
        });
    </script>
<?php $__env->stopSection(); ?>
