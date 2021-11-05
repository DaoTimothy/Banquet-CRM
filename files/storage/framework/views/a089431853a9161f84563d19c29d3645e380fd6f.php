<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="<?php echo e(asset('css/editor.css')); ?>" type="text/css" rel="stylesheet"/>

</head>
<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="details defaultbox">
                    <h3><b>Event Information</b></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <b>Name</b>
                            <p><?php echo e($event->name); ?></p>
                        </div>
                        <div class="col-md-4">
                            <b>Location</b>
                            <p><?php echo e($event->booking->location->name); ?></p>
                        </div>
                        <div class="col-md-4">
                            <b>Booking</b>
                            <p><?php echo e($event->booking->booking_name); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <b>Rooms</b>
                            <p><?php echo e(implode(",",\App\Models\EventRooms::select('room_name')->whereIn('id',explode(",",$event->rooms))->get()->pluck('room_name')->toArray())); ?></p>
                        </div>
                        <div class="col-md-4">
                            <b>When</b>
                            <p><?php echo e(date('D,M d,Y',strtotime($event->start_date))); ?> - <?php echo e(date('h:i a',strtotime($event->start_time))); ?>

                                to <?php echo e(date('h:i a',strtotime($event->end_time))); ?></p>
                        </div>

                        <div class="col-md-4">
                            <b>Status</b>
                            <p><?php echo e($event->status); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                </div>
                <div class="details" style="border: 1px solid #B7B7B7;padding: 10px;">
                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="pill" href="#home"><?php echo e(trans('event.details')); ?></a></li>
                        <li><a data-toggle="pill" href="#doc"><?php echo e(trans('event.docs')); ?></a></li>
                        <li><a data-toggle="pill" href="#dis"><?php echo e(trans('event.discussion')); ?></a></li>
                        <li><a data-toggle="pill" href="#task"><?php echo e(trans('event.task')); ?></a></li>
                        <li><a data-toggle="pill" href="#note"><?php echo e(trans('event.note')); ?></a></li>
                        <li><a data-toggle="pill" href="#payment"><?php echo e(trans('event.payment')); ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="details">
                                <h3><b>Contacts</b></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Account</b>
                                        <div class="contorls">
                                            <p><?php echo e($event->name); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Contact</b>
                                        <div class="controls">
                                            <?php if(count($event->contact) > 0): ?>
                                                <?php $__currentLoopData = $event->contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <p><?php echo e($value->name); ?><br><?php echo e($value->contact); ?><br><?php echo e($value->email); ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            No Contact Added
                                                    <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <h3><b>Additional Information</b></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <b>Expected Guests</b>
                                        <p><?php echo e($event->contactus->expected_guest); ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Owner</b>
                                        <p><?php echo e($event->owner->name); ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Guaranteed Guests</b>
                                        <p><?php echo e($event->contactus->guarnteed_guest); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <b>Lead Source</b>
                                        <p><?php echo e($event->leadSources->name); ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Type Of Event</b>
                                        <p><?php echo e($event->contactus->event_type->name); ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Manager</b>
                                        <p><?php echo e(implode(",",\App\Models\Managers::whereIn('id',explode(",",$event->contactus->manager))->get()->pluck("name")->toArray())); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <b>Created At</b>
                                        <p><?php echo e(date('D, M d,Y h:i a',strtotime($event->created_at))); ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Updated At</b>
                                        <p><?php echo e(($event->updated_at != NULL ? date('D, M d,Y h:i a',strtotime($event->updated_at)) : date('D, M d,Y h:i a',strtotime($event->created_at)))); ?></p>
                                    </div>
                                </div>

                                <h3><b>Financials</b></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <b>Food & Beverage Min</b>
                                        <p>$<?php echo e(($event->financials && $event->financials->food_beverage_min != NULL) ? $event->financials->food_beverage_min : '0'); ?></p>
                                    </div>

                                    <div class="col-md-4">
                                        <b>Grand Total</b>
                                        <p>$<?php echo e(($event->financials && $event->financials->grand_total != NULL) ? $event->financials->grand_total : '0'); ?></p>

                                    </div>
                                    <div class="col-md-4">
                                        <b>Rental Fee</b>
                                        <p>$<?php echo e(($event->financials && $event->financials->rental_fee != NULL) ? $event->financials->rental_fee :'0'); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <b>Amount Due</b>
                                        <p>$<?php echo e(($event->financials && $event->financials->amount_due != NULL) ? $event->financials->amount_due :'0'); ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Deposit Amounts </b>
                                        <p>$<?php echo e(($event->financials && $event->financials->deposit_amount!= NULL) ? $event->financials->deposit_amount:'0'); ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Price Per Persons:</b>
                                        <p>$<?php echo e(($event->financials && $event->financials->price_per_persons!= NULL) ? $event->financials->price_per_persons:'0'); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <b>Actual Amounts</b>
                                        <p>$<?php echo e(($event->financials && $event->financials->actual_amount!= NULL) ? $event->financials->actual_amount:'0'); ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Deposit Type</b>
                                        <p><?php echo e(($event->financials) ? (($event->financials->depositType) ? $event->financials->depositType->name :'No Type Selected'):'No Type Selected'); ?></p>
                                    </div>
                                </div>

                                <h3><b>Deposit & Payment</b></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>Deposit Due</b>
                                        <p><?php echo e(($event->deposit && $event->deposit->deposit_due != NULL) ?  date('D d,Y',strtotime($event->deposit->deposit_due)) : 'No Due Date Selected'); ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <b>2nd Deposit Due Date</b>
                                        <p><?php echo e(($event->deposit && $event->deposit->sec_deposit_due != NULL) ? date('D d,Y',strtotime($event->deposit->sec_deposit_due)):'No Due Date Selected'); ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <b>2nd Deposit</b>
                                        <p>$<?php echo e(($event->deposit && $event->deposit->sec_deposit != NULL) ? $event->deposit->sec_deposit:'0'); ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Balance Due Date</b>
                                        <p><?php echo e(($event->deposit && $event->deposit->balance_due != NULL) ? date('D d,Y',strtotime($event->deposit->balance_due)):'No Due Date Selected'); ?></p>
                                    </div>
                                </div>

                                <h3><b>Any Kids</b></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Under 12 years</b>
                                        <div class="controls">
                                            <p><?php echo e((($event->kids && $event->kids->under_12_years != NULL) ? $event->kids->under_12_years : 0)); ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <b>Under 5 years</b>
                                        <div class="controls">
                                            <p><?php echo e((($event->kids && $event->kids->under_5_years != NULL) ? $event->kids->under_5_years : 0)); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <h3><b>Eating Times</b></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>Service Time</b>
                                        <div class="controls">
                                            <p><?php echo e(($event->eating_times && $event->eating_times->service_time != NULL) ? $event->eating_times->service_time:'No Time Set'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Canapes</b>
                                        <div class="controls">
                                            <p><?php echo e(($event->eating_times && $event->eating_times->canapes != NULL) ? $event->eating_times->canapes:'Not Time Set'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Morning Snacks</b>
                                        <div class="controls">
                                            <?php if(($event->eating_times) && $event->eating_times->morning_snacks_time != NULL): ?>
                                                <?php $data = explode('_', $event->eating_times->morning_snacks_time); ?>
                                                <p><?php echo e($data[0] .' TO ' .$data[1]); ?></p>
                                            <?php else: ?>
                                                <p>No Time Set</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Morning Tea/Coffee</b>
                                        <div class="controls">
                                            <?php if(($event->eating_times) && $event->eating_times->morning_tea_time != NULL): ?>
                                                <?php $data = explode('_', $event->eating_times->morning_tea_time); ?>
                                                <p><?php echo e($data[0] .' TO '.$data[1]); ?></p>
                                            <?php else: ?>
                                                <p>No Time Set</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>Lunch</b>
                                        <div class="controls">
                                            <?php if(($event->eating_times) && $event->eating_times->lunch_time != NULL): ?>
                                                <?php $data = explode('_', $event->eating_times->lunch_time); ?>
                                                <p><?php echo e($data[0] .' TO '.$data[1]); ?></p>
                                            <?php else: ?>
                                                <p>No Time Set</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Afternoon Tea/Coffee</b>
                                        <div class="controls">
                                            <?php if(($event->eating_times) && $event->eating_times->evening_tea_time != NULL): ?>
                                                <?php $data = explode('_', $event->eating_times->evening_tea_time); ?>
                                                <p><?php echo e($data[0] .' TO '.$data[1]); ?></p>
                                            <?php else: ?>
                                                <p>No Time Set</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Evening Snacks</b>
                                        <div class="controls">
                                            <?php if(($event->eating_times) && $event->eating_times->evening_snacks_time != NULL): ?>
                                                <?php $data = explode('_', $event->eating_times->evening_snacks_time); ?>
                                                <p><?php echo e($data[0] .' TO '.$data[1]); ?></p>
                                            <?php else: ?>
                                                <p>No Time Set</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Dinner</b>
                                        <div class="controls">
                                            <?php if(($event->eating_times) && $event->eating_times->dinner_time != NULL): ?>
                                                <?php $data = explode('_', $event->eating_times->dinner_time); ?>
                                                <p><?php echo e($data[0] .' TO '.$data[1]); ?></p>
                                            <?php else: ?>
                                                <p>No Time Set</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <h3><b>Logistics</b></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <b>Time Of Departure</b>
                                        <div class="controls">
                                            <p><?php echo e(($event->logistics && $event->logistics->time_of_departure != NULL) ? $event->logistics->time_of_departure:'No Time Set'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Van Choice</b>
                                        <div class="controls">
                                            <p><?php echo e(($event->logistics &&$event->logistics->van_choice != NULL) ? $event->logistics->van_choice:'No Vehicle Selected'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Arrival Time</b>
                                        <div class="controls">
                                            <p><?php echo e(($event->logistics && $event->logistics->arrival_time != NULL) ? $event->logistics->arrival_time:'No Time Set'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <b>Contact On the day</b>
                                        <div class="controls">
                                            <p><?php echo e(($event->logistics &&$event->logistics->contact_on_day != NULL) ? $event->logistics->contact_on_day:'No Contact Added'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Staff Choice</b>
                                        <div class="controls">
                                            <p><?php echo e(($event->logistics &&$event->logistics->staff_choice != NULL) ? $event->logistics->staff_choice:'No Staff Selected'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Contact Phone</b>
                                        <div class="controls">
                                            <p><?php echo e(($event->logistics && $event->logistics->contact_phone != NULL) ? $event->logistics->contact_phone:'No Contact Added'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Function Address</b>
                                        <div class="controls">
                                            <p><?php echo e(($event->logistics && $event->logistics->function_address != NULL) ? $event->logistics->function_address:'No Address Added'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="doc" class="tab-pane fade">
                            <div align="right">
                                <ul>
                                    <li style="display: inline;">
                                        <button type="submit" class="btn btn-success" form="event"><?php echo e(trans('Delete List')); ?></button>
                                    </li>
                                    <li style="display: inline;"><a href="<?php echo e(url($type.'/'.$event->id.'/createDocument')); ?>"
                                                                    class="btn btn-success"><?php echo e(trans('Add a Document to this event')); ?></a></li>
                                </ul>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-left">
                                            <h3><b>Documents</b></h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-right">
                                            <h3><b>Grand Total : </b>$<?php echo e(($event->financials) ? $event->financials->grand_total :'0'); ?></h3>
                                            <h3><b>Amount Due : </b>$<?php echo e(($event->financials) ? $event->financials->amount_due:'0'); ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="border: 1px solid #000000">
                                <table class="table table-striped">
                                    <thead>
                                    <tr style="background:grey">
                                        <th>Sr No</th>
                                        <th>Document Name</th>
                                        <th>Document tpye</th>
                                        <th>Status</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($event->event_document) > 0): ?>
                                        <?php $__currentLoopData = $event->event_document; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $documents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key + 1); ?></td>
                                                <td><?php echo e($documents->name); ?></td>
                                                <td><?php echo e($documents->doc_type); ?></td>
                                                <td><?php echo e($documents->status); ?></td>
                                                <td colspan="3">
                                                    <ul>
                                                        <li style="display: inline;"><a type="button" class="btn btn-success" data-toggle="modal"
                                                                                        data-target="#share"><?php echo e(trans('Share')); ?></a></li>
                                                        <li style="display: inline;"><a href="<?php echo e(url($type.'/'.$event->id.'/edit')); ?>" class="btn btn-success"><?php echo e(trans('Edit')); ?></a>
                                                        </li>
                                                        <li style="display: inline;"><a href="<?php echo e(url($type.'/'.$event->id.'/'.strtolower($documents->name).'pdf')); ?>"
                                                                                        class="btn btn-success"><?php echo e(trans('View')); ?></a></li>
                                                        <li style="display: inline;"><a href="<?php echo e(url($type.'/'.$event->id.'/'.strtolower($documents->name).'pdf?download=pdf')); ?>"
                                                                                        class="btn btn-success"><?php echo e(trans('Download')); ?></a></li>
                                                    </ul>
                                                    
                                                    
                                                    
                                                    
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">No Document Created</td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="modal fade" id="share" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <div align="center">
                                                <h4 class="modal-title">Share</h4>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div align="center">
                                                <div class="nav nav-pills">
                                                    <a data-toggle="pill" href="#reciept">Recipients</a> - </li>
                                                    <a data-toggle="pill" href="#temp">Template</a> - </li>
                                                    <a data-toggle="pill" href="#msg">Message</a></li>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="tab-content">
                                                <div id="reciept" class="tab-pane fade in active">
                                                    <label>
                                                        <input type="checkbox" value="1" class='icheck'>
                                                        Make this staff-only Message
                                                    </label>
                                                    <h3>Customer</h3>
                                                    <hr>
                                                    <p>Which contacts should receive this message?</p>
                                                    <label>
                                                        <input type="checkbox" value="1" class='icheck'>
                                                        John Deo
                                                    </label>

                                                    <h3>Staff</h3>
                                                    <hr>
                                                    <p>Which staff should receive replies?</p>
                                                    <div class="controls">
                                                        <?php echo Form::select('menu_choice[]',isset($menus)?$menus:[0=>trans('-- Select --')], null,['class' => 'form-control select2',"id"=>"menu_choice",'multiple'=>'multiple']); ?>

                                                        <span class="help-block"><?php echo e($errors->first('menu_choice', ':message')); ?></span>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-toggle="pill" data-target="#temp">Next</button>
                                                    </div>
                                                </div>
                                                <div id="temp" class="tab-pane fade">
                                                    <P>You will be able to make changes to the template once selected.Alternately,you can use the blank template.</P>
                                                    <h3>General Email Template</h3>
                                                    <hr>
                                                    <div class="form-group <?php echo e($errors->has('template') ? 'has-error' : ''); ?>">
                                                        <?php echo Form::label('template', trans('Template'), ['class' => 'control-label required']); ?>

                                                        <div class="controls">
                                                            <?php echo Form::select('template', isset($lead)?$states:[0=>trans('template')], null, ['id'=>'state_id', 'class' => 'form-control']); ?>

                                                            <span class="help-block"><?php echo e($errors->first('template', ':message')); ?></span>
                                                        </div>
                                                    </div>

                                                    <h3>Your Email Template</h3>
                                                    <hr>
                                                    <p>Visit your email template under your profile setting to create a personal email template.</p>

                                                    <h3>Blank Template</h3>
                                                    <hr>
                                                    <button class="btn btn-success">Use a Blank Template</button>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-toggle="pill" data-target="#reciept">previous</button>
                                                        <button type="button" class="btn btn-warning" data-toggle="pill" data-target="#msg">Next</button>
                                                    </div>
                                                </div>
                                                <div id="msg" class="tab-pane fade">
                                                    <p>This message will be categorized under Contract Disscussion.</p>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="<?php echo e($errors->has('subject') ? 'has-error' : ''); ?>">
                                                                <?php echo Form::label('subject', trans('Subject'), ['class' => 'control-label required']); ?>

                                                                <div class="controls">
                                                                    <?php echo Form::text('subject', null, ['class' => 'form-control','placeholder' => 'Blueware Restaurant : Contract Comment[Web,Dec 20,2017]']); ?>

                                                                    <span class="help-block"><?php echo e($errors->first('subject', ':message')); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group required <?php echo e($errors->has('billing_notes') ? 'has-error' : ''); ?>">
                                                                <?php echo Form::label('billing_notes', trans('Billing Notes'), ['class' => 'control-label required']); ?>

                                                                <div class="controls">
                                                                    <?php echo Form::textarea('billing_notes', null, ['class' => 'form-control','id'=> 'text']); ?>

                                                                    <span class="help-block"><?php echo e($errors->first('billing_notes', ':message')); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5"><h3>Include the following Documents</h3></div>
                                                        <div class="col-md-6 text-left">
                                                            <button type="button" class="btn btn-success">Add Documents</button>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group">
                                                        <input type="checkbox">Contract
                                                        <input type="checkbox">Banquet event order
                                                        <input type="checkbox">Menu
                                                        <input type="checkbox">Invoice
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5"><h3>File Attachments</h3></div>
                                                        <div class="col-md-6 text-left">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" multiple/></span>
                                                                <span class="fileinput-filename"></span><span class="fileinput-new">No file chosen</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="drag-drop-container">
                                                        <b>Click or Drag/Drop Files to Upload</b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-toggle="pill" data-target="#temp">previous</button>
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            

                            
                            
                            
                            
                            
                            
                            
                            

                            
                            
                            
                            
                            
                            
                            
                            

                            
                            
                            
                            
                            
                            
                            

                            
                            
                        </div>
                        <div id="dis" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <h3>Discussion</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#start_discussion">Start Discussion</button>
                                </div>
                            </div>

                            <div class="modal fade" id="start_discussion" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h2 class="modal-title" align="center"><b>Start Discussion</b></h2>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group <?php echo e($errors->has('subject') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('subject', trans('Subject'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::text('subject', null, ['class' => 'form-control', 'placeholder'=>'Subject','id'=>'discussion_subject']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('subject', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group required <?php echo e($errors->has('task_desc') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('discuss_discription', trans('Discussion Description'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::textarea('discuss_discription', null, ['class' => 'form-control','id'=>'discussion_details']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('discuss_discription', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo e($errors->has('recipients') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('recipients', trans('Recipients'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::select('recipients[]',isset($staffs)?$staffs:[0=>trans('-- Select --')], null,['class' => 'form-control select2',"id"=>"discussion_users",'multiple'=>'multiple']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('recipients', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" id="discussion_file"/></span>
                                                <span class="fileinput-filename"></span><span class="fileinput-new">No file chosen</span>
                                            </div>
                                            <div align="left">
                                                <span><a class="btn btn-success" data-dismiss="modal"><?php echo e(trans('CANCEL')); ?></a></span>
                                                <span> <a class="btn btn-success" onclick="addDiscussion()"><?php echo e(trans('SAVE')); ?></a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-group" id="accordion">
                                <?php if(count($event->discussion) > 0): ?>
                                    <?php $__currentLoopData = $event->discussion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($key); ?>">
                                                        <span class="discuss-button">Staff</span>General Discussion</a>
                                                </h4>
                                            </div>
                                            <div id="collapse<?php echo e($key); ?>" class="panel-collapse collapse">
                                                <div class="panel-body row">
                                                    <div class="col-md-1">
                                                        <img class="discuss-user-dp" src="/uploads/avatar/<?php echo e($user_data->user_avatar); ?>">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <p><b><?php echo e($user_data->first_name . ' ' . $user_data->last_name); ?></b> <?php echo e(date('i',strtotime($value->created_at))); ?> munites
                                                            ago <?php echo e(count(explode(",",$value->recipients))); ?> recipients</p><br>
                                                        <b><?php echo e($value->subject); ?></b><br>
                                                        <p><?php echo e($value->description); ?>

                                                        </p>
                                                        <p>
                                                            Sincerely,<br>
                                                            <?php echo e($user_data->first_name . ' ' . $user_data->last_name); ?><br>
                                                            <b><?php echo e($user_data->email); ?></b><br>
                                                            <?php echo e($value->phone_number); ?><br>
                                                        </p>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <img class="discuss-user-dp" width="100%" height="40%" src="<?php echo e(($value->media != NULL ? $value->media : null)); ?>">
                                                        </div>
                                                        <div class="col-md-11">
                                                            <div class="controls">
                                                                <?php echo Form::textarea('msg', null, ['class' => 'form-control','placeholder'=> 'Enter your comment here...']); ?>

                                                                <span class="help-block"><?php echo e($errors->first('msg', ':message')); ?></span>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 text-left">
                                                                    <a href="#" class="btn btn-success"><?php echo e(trans('Add Attachment')); ?></a>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <a href="#" class="btn btn-success"><?php echo e(trans('Use Email Editor')); ?></a>
                                                                </div>
                                                            </div>
                                                            <h3>Recipients</h3>
                                                            <?php $recipients = \App\Models\User::whereIn('id', explode(",", $value->recipients))->get() ?>
                                                            <?php $__currentLoopData = $recipients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <input type="checkbox" value="<?php echo e($user->id); ?>"><?php echo e($user->first_name); ?><br>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <br>
                                                            <a href="#" class="btn btn-success"><?php echo e(trans('Send')); ?></a>
                                                            <a href="#" class="btn btn-success"><?php echo e(trans('Cancle')); ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                No Discussion Started
                                            </h4>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div id="task" class="tab-pane fade">
                            <div align="right">
                                <ul>
                                    <li style="display: inline;">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#">Delete List</button>
                                    </li>
                                    <li style="display: inline;">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTask">Add Task</button>
                                    </li>
                                </ul>
                            </div>
                            <h3>Task List</h3>
                            <hr>
                            <table border="0" id="taskTable">
                                <?php if(count($event->tasks) > 0): ?>
                                    <?php $__currentLoopData = $event->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tasks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td><b><?php echo e($tasks->task_description); ?></b><br><?php echo e(date('h:i a',strtotime($tasks->created_at))); ?></td>
                                            <td><?php echo e($tasks->priority); ?></td>
                                            <td><b><?php echo e($tasks->userAssignes->name); ?></b>(<?php echo e($event->name); ?>)</td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4">No Tasks Assigned</td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                            <div class="modal fade" id="addTask" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h2 class="modal-title" align="center"><b>Add Task</b></h2>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group required <?php echo e($errors->has('task_desc') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('task_desc', trans('Task Description'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::textarea('task_desc', null, ['class' => 'form-control','id'=>'taskDescription']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('task_desc', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo e($errors->has('associated_to') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('associated_to', trans('Associated To'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::select('associated_to', [$event->id => $event->name], $event->id, ['id'=>'associated_to', 'class' => 'form-control']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('associated_to', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo e($errors->has('assigned_to') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('assigned_to', trans('Assigned To'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::select('assigned_to', isset($assignees)?$assignees:[0=>trans('Assigned To')], null, ['id'=>'assigned_to', 'class' => 'form-control']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('assigned_to', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group required <?php echo e($errors->has('due_date') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('due_date', trans('Deadline'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::date('due_date', null, ['class' => 'form-control','id'=>'task_due_date']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('due_date', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo e($errors->has('priority') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('priority', trans('Priority'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::select('priority', ['low'=>'Low','medium'=>'Medium','high'=>'High'], null, ['id'=>'task_priority', 'class' => 'form-control']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('priority', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div align="left">
                                                <span><a class="btn btn-success" data-dismiss="modal"><?php echo e(trans('CANCEL')); ?></a></span>
                                                <span> <a onclick="saveTasks()" class="btn btn-success"><?php echo e(trans('SAVE')); ?></a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="note" class="tab-pane fade">
                            <div align="right">
                                <ul>
                                    <li style="display: inline">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#">Delete List</button>
                                    </li>
                                    <li style="display: inline">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addNote">Add Notes</button>
                                    </li>
                                </ul>
                            </div>
                            <h3><b>Note</b></h3>
                            <div id="noteTable">
                                <?php if(count($event->notes) > 0): ?>
                                    <?php $__currentLoopData = $event->notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <hr>
                                            <p><?php echo e($note->note); ?></p>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div>
                                        <hr>
                                        <p>No Notes Added</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="modal fade" id="addNote" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" align="center">Notes</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group required <?php echo e($errors->has('note') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('note', trans('Note'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::textarea('note', null, ['class' => 'form-control','id'=>'noteDescription']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('note', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div align="left">
                                                <a class="btn btn-success" data-dismiss="modal"><i class="fa fa-arrow-left"> <?php echo e(trans('BACK')); ?></i></a></span>
                                                <span> <a class="btn btn-success" onclick="addNote()"><?php echo e(trans('SAVE')); ?></a></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="payment" class="tab-pane fade">
                            <div align="right">
                                <ul>
                                    <li style="display: inline">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#">Delete List</button>
                                    </li>
                                    <li style="display: inline">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#payModal">Add Payment</button>
                                    </li>
                                </ul>
                            </div>
                            <h3>Payment</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"><b>Customer-Facing-Time</b></div>
                                <div class="col-md-2"><b>Amount</b></div>
                                <div class="col-md-2"><b>Due</b></div>
                                <div class="col-md-1"><b>Status</b></div>
                                <div class="col-md-1"><b>Method</b></div>
                                <div class="col-md-1"><b>ID</b></div>
                                <div class="col-md-3"><b>Action</b></div>
                            </div>
                            <input type="hidden" id="payment_id_edit" value="">
                            <div id="paymentTable">
                                <?php if(count($event->event_document) > 0): ?>
                                    <?php $__currentLoopData = $event->event_document; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(count($documents->payment) > 0): ?>
                                            <?php $__currentLoopData = $documents->payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row payment" id="payment_<?php echo e($payments->id); ?>">
                                                    <div class="col-md-2"><?php echo e($payments->customer_facing_title); ?></div>
                                                    <div class="col-md-2">$<?php echo e($payments->amount); ?></div>
                                                    <div class="col-md-2"><?php echo e(date('D d,Y',strtotime($payments->created_at))); ?></div>
                                                    <div class="col-md-1">Paid</div>
                                                    <div class="col-md-1"><?php echo e(($payments->paymentMethod == NULL) ? '' : $payments->paymentMethod->select_payment_method); ?></div>
                                                    <div class="col-md-1"><?php echo e($payments->id); ?></div>
                                                    <div class="col-md-3 row">
                                                        
                                                        
                                                        <button type="button" class="btn btn-success" onclick="editPayment('<?php echo e($payments->id); ?>')">Edit</button>
                                                        <button type="button" class="btn btn-success" onclick="deletePayment('<?php echo e($payments->id); ?>')">Delete</button>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="row payment">
                                        <div class="col-md-2">No Payments Done</div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="modal fade" id="payModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" align="center">New Payment</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group <?php echo e($errors->has('amount') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('amount', trans('Amount'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::select('amount', ["0"=>"Select Amount","2000"=>"2000","5000"=>"50000","10000"=>"10000"], null, ['id'=>'payment_amount', 'class' => 'form-control','onchange'=>'setCustomAmount(this.options[this.selectedIndex].value)']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('amount', ':message')); ?></span>
                                                </div>
                                            </div>

                                            <div class="form-group required">
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input id="custom_amount" type="text" class="form-control" name="email" placeholder="Amount">
                                                </div>
                                            </div>

                                            <div class="form-group <?php echo e($errors->has('doc_id') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('doc_id', trans('Show on Document Id'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::select('doc_id', $doc, null, ['id'=>'doc_id', 'class' => 'form-control']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('doc_id', ':message')); ?></span>
                                                </div>
                                            </div>

                                            <div class="form-group required <?php echo e($errors->has('payment_dead_line') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('payment_dead_line', trans('Deadline'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::date('payment_dead_line', null, ['class' => 'form-control','id'=>'payment_dead_line']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('payment_dead_line', ':message')); ?></span>
                                                </div>
                                            </div>

                                            <div class="form-group required <?php echo e($errors->has('payment_title') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('payment_title', trans('Customer-facing Title'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::text('payment_title', null, ['class' => 'form-control','id'=>'payment_title']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('payment_title', ':message')); ?></span>
                                                </div>
                                            </div>


                                            <div class="form-group required <?php echo e($errors->has('payment_note') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('payment_note', trans('Internal Note'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::text('payment_note', null, ['class' => 'form-control','id'=>'payment_note']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('payment_note', ':message')); ?></span>
                                                </div>
                                            </div>

                                            <div class="form-group <?php echo e($errors->has('payment_method') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('payment_method', trans('Payment Method'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::select('payment_method', $deposit_type, null, ['id'=>'payment_method', 'class' => 'form-control']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('payment_method', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div align="left">
                                                <button type="button" class="btn btn-warning" onclick="savePayment()">SAVE</button>
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">CANCEL</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="pay" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" align="center">Pay</h4>
                                            <center><span>Payment total:$500.00</span></center>
                                        </div>
                                        <div class="modal-body">

                                            <div class="controls">
                                                <?php echo Form::select('method', isset($lead)?$states:[0=>trans('-- Select Payment Method --')], null, ['id'=>'state_id', 'class' => 'form-control']); ?>

                                                <span class="help-block"><?php echo e($errors->first('method', ':message')); ?></span>
                                            </div>

                                            <div align="left">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Submit</button>
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">CANCEL</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startSection('scripts'); ?>
        <script src="<?php echo e(asset('js/editor.js')); ?>" type="text/javascript"></script>

        <script>
            $(document).ready(function () {
                $("#text").Editor();

                $("#discussion_users").select2({
                    placeholder: "<?php echo e(trans('salesteam.staff_members')); ?>",
                    theme: 'bootstrap'
                }).find("option:first").attr({
                    selected: false
                });
            });

            function saveTasks() {
                var taskDescription = $('#taskDescription').val();
                var associated_to = $('#associated_to').val();
                var assignee = $('#assigned_to').val();
                var due_date = $('#task_due_date').val();
                var priority = $('#task_priority').val();

                $.ajax({
                    url: '<?php echo e(url($type.'/addTask')); ?>',
                    type: "POST",
                    data: {
                        event_id: '<?php echo e($event->id); ?>',
                        task_description: taskDescription,
                        associated_to: associated_to,
                        assigned_to: assignee,
                        dead_line: due_date,
                        priority: priority,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function (data) {
                        var html = "<tr><td><input type='checkbox'></td>" +
                            "<td><b>" + taskDescription + "</b><br>" + data.date + "</td>" +
                            "<td>" + priority + "</td>" +
                            "<td><b>" + data.user + "</b>(<?php echo e($event->name); ?>)</td>" +
                            "</tr>";
                        $('#taskTable').append(html);
                        $('#addTask').modal('hide');
                    }
                });
            }

            function addNote() {
                var noteDescription = $('#noteDescription').val();

                $.ajax({
                    url: '<?php echo e(url($type.'/addNote')); ?>',
                    type: "POST",
                    data: {event_id: '<?php echo e($event->id); ?>', note_description: noteDescription, _token: '<?php echo e(csrf_token()); ?>'},
                    success: function (data) {
                        var html = "<div>" +
                            "<hr>" +
                            "<p>" + noteDescription + "</p>" +
                            "</div>";

                        $('#noteTable').append(html);
                        $('#addNote').modal('hide');
                    }
                });
            }

            function savePayment() {
                var amount = $('#custom_amount').val();
                var document = $('#doc_id').val();
                var dead_line = $('#payment_dead_line').val();
                var title = $('#payment_title').val();
                var note = $('#payment_note').val();
                var type = $('#payment_method').val();
                var id = $('#payment_id_edit').val();

                if (amount == '') {
                    $.notify('Enter Some Amount');
                    return;
                }

                if (document == '') {
                    $.notify('Select a document for payment');
                    return;
                }

                if (dead_line == '') {
                    $.notify('Select a deal line');
                    return;
                }

                if (title == '') {
                    $.notify('Enter Some title');
                    return;
                }

                if (type == '') {
                    $.notify('Select a payment method');
                    return;
                }

                if (id != '') {
                    $.ajax({
                        url: '<?php echo e(url($type.'/updatePayment')); ?>',
                        type: "POST",
                        data: {id: id, amount: amount, document: document, dead_line: dead_line, title: title, note: note, type: type, _token: '<?php echo e(csrf_token()); ?>'},
                        success: function (data) {
                            var html =
                                '<div class="col-md-2">' + title + '</div>' +
                                '<div class="col-md-2">' + amount + '</div>' +
                                '<div class="col-md-2">' + data.date + '</div>' +
                                '<div class="col-md-1">Paid</div>' +
                                '<div class="col-md-1">' + type + '</div>' +
                                '<div class="col-md-1">' + data.id + '</div>' +
                                '<div class="col-md-3 row">' +
                                '<button type="button" class="btn btn-success" onclick="editPayment(' + data.id + ')">Edit</button>' +
                                '<button type="button" class="btn btn-success" onclick="deletePayment(' + data.id + ')">Delete</button>' +
                                '</div>';

                            $('#payment_' + id).html(html);
                            $('#payModal').modal('hide');
                        }
                    });
                } else {
                    $.ajax({
                        url: '<?php echo e(url($type.'/addPayment')); ?>',
                        type: "POST",
                        data: {amount: amount, document: document, dead_line: dead_line, title: title, note: note, type: type, _token: '<?php echo e(csrf_token()); ?>'},
                        success: function (data) {
                            var html = '<div class="row payment" id="payment_' + data.id + '">' +
                                '<div class="col-md-2">' + title + '</div>' +
                                '<div class="col-md-2">' + amount + '</div>' +
                                '<div class="col-md-2">' + data.date + '</div>' +
                                '<div class="col-md-1">Paid</div>' +
                                '<div class="col-md-1">' + type + '</div>' +
                                '<div class="col-md-1">' + data.id + '</div>' +
                                '<div class="col-md-3 row">' +
                                '<button type="button" class="btn btn-success" onclick="editPayment(' + data.id + ')">Edit</button>' +
                                '<button type="button" class="btn btn-success" onclick="deletePayment(' + data.id + ')">Delete</button>' +
                                '</div>' +
                                '</div>';

                            $('#paymentTable').append(html);
                            $('#payModal').modal('hide');
                        }
                    });
                }
            }

            function editPayment(id) {
                $('#payment_id_edit').val(id);
                $.ajax({
                    url: '<?php echo e(url($type.'/editPayment')); ?>',
                    type: "POST",
                    data: {id: id, _token: '<?php echo e(csrf_token()); ?>'},
                    success: function (data) {
                        $('#custom_amount').val(data.data.amount);
                        $('#doc_id').val(data.data.doc_id);
                        $('#payment_dead_line').val(data.data.due_date);
                        $('#payment_title').val(data.data.customer_facing_title);
                        $('#payment_note').val(data.data.note);
                        $('#payment_method').val(data.data.payment_method);
                        $('#payModal').modal('show');
                    }
                });
            }

            function deletePayment(id) {
                $.ajax({
                    url: '<?php echo e(url($type.'/deletePayment')); ?>',
                    type: "POST",
                    data: {id: id, _token: '<?php echo e(csrf_token()); ?>'},
                    success: function (data) {
                        $('#payment_' + data.id).remove();
                    }
                });
            }

            function setCustomAmount(value) {
                $('#custom_amount').val(value);
            }

            function addDiscussion() {
                var subject = $('#discussion_subject').val();
                var details = $('#discussion_details').val();
                var users = $('#discussion_users').val();
                var file = $('#discussion_file').prop('files');
                if (file.length != 0) {
                    var fileReader = new FileReader();
                    fileReader.readAsDataURL($('#discussion_file').prop('files')[0]);
                    fileReader.onload = function () {
                        if (subject == '') {
                            $.notify('Enter discussion subject');
                            return;
                        }

                        if (details == '') {
                            $.notify('Enter some details');
                            return;
                        }

                        if (users == null) {
                            $.notify('Select at least one recipient');
                            return;
                        }

                        $.ajax({
                            url: '<?php echo e(url($type.'/addDiscussion')); ?>',
                            type: "POST",
                            data: {event_id: '<?php echo e($event->id); ?>', subject: subject, details: details, users: users, file: fileReader.result, _token: '<?php echo e(csrf_token()); ?>'},
                            success: function (data) {
                                if (data.id != '')
                                    location.reload();
                                else {
                                    $.notify('Sorry something went wrong');
                                    return;
                                }
                            }
                        });
                    };
                } else {
                    if (subject == '') {
                        $.notify('Enter discussion subject');
                        return;
                    }

                    if (details == '') {
                        $.notify('Enter some details');
                        return;
                    }

                    if (users == null) {
                        $.notify('Select at least one recipient');
                        return;
                    }

                    $.ajax({
                        url: '<?php echo e(url($type.'/addDiscussion')); ?>',
                        type: "POST",
                        data: {event_id: '<?php echo e($event->id); ?>', subject: subject, details: details, users: users, file: null, _token: '<?php echo e(csrf_token()); ?>'},
                        success: function (data) {
                            if (data.id != '')
                                location.reload();
                            else {
                                $.notify('Sorry something went wrong');
                                return;
                            }
                        }
                    });
                }
            }
        </script>
<?php $__env->stopSection(); ?>