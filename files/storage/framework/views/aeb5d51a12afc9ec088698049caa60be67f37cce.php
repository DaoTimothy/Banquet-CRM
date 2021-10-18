<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/editor.css')); ?>" type="text/css" rel="stylesheet"/>
    
<?php $__env->stopSection(); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($event)): ?>
            <?php echo Form::model($event, ['url' => $type . '/' . $event->id, 'method' => 'put', 'id'=>'event', 'files'=> true]); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type. '/store', 'method' => 'post', 'files'=> true,'id'=>'event']); ?>

        <?php endif; ?>

        <div class="panel-group">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons">assignment_ind</i>
                    <b><?php echo e(trans('event.bookingDetails')); ?></b>
                </h4>
            </div>
            <div id="booking_detail">
                <div class="event_collapse_padding">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group <?php echo e($errors->has('booking') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('booking', trans('event.booking'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('booking', (isset($event) ? $event->booking->booking_name : null), ['class' => 'form-control', 'placeholder'=>'Booking']); ?>

                                    <span class="help-block"><?php echo e($errors->first('booking', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('from_date') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('from_date', trans('event.eventDate'), ['class' => 'control-label required']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><?php echo e(trans('event.from')); ?></span>
                                    <?php echo Form::text('from_date', (isset($event) ? $event->booking->from_date : null), ['class' => 'form-control',"id"=>"from_date","placeholder"=>"Select From Date"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('from_date', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('to_date') ? 'has-error' : ''); ?>">
                                <div class="input-group" style="margin-top: 24px">
                                    <span class="input-group-addon" id="basic-addon1"><?php echo e(trans('event.to')); ?></span>
                                    <?php echo Form::text('to_date', (isset($event) ? $event->booking->to_date : null), ['class' => 'form-control',"id"=>"to_date","placeholder"=>"Select To Date"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('to_date', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('location') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('location', trans('event.location'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::select('location',isset($locations)?$locations:[0=>trans('-- Select --')], (isset($event) ? $event->booking->location_id : null), ['id'=>'location', 'class' => 'form-control select2']); ?>

                                    <span class="help-block"><?php echo e($errors->first('location', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('country_id') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('country_id', trans('lead.country'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::select('country_id', $countries, null, ['id'=>'country_id', 'class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('country_id', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('state_id') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('state_id', trans('lead.state'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::select('state_id', isset($event)?$states:[0=>trans('lead.select_state')], null, ['id'=>'state_id', 'class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('state_id', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?php echo e($errors->has('city_id') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('city_id', trans('lead.city'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::select('city_id', isset($event)?$cities:[0=>trans('lead.select_city')], null, ['id'=>'city_id', 'class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('city_id', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons">details</i>
                    <b><?php echo e(trans('event.eventDetail')); ?></b>
                </h4>
            </div>
            <div id="event_detail">
                <div class="event_collapse_padding">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group <?php echo e($errors->has('event_name') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('event_name', trans('event.name'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('event_name', (isset($event) ? $event->name : null), ['class' => 'form-control', 'placeholder'=>'Name']); ?>

                                    <span class="help-block"><?php echo e($errors->first('event_name', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('event_start_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('event_start_time', trans('event.eventTime'), ['class' => 'control-label required']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><?php echo e(trans('event.from')); ?></span>
                                    <?php echo Form::text('event_start_time', (isset($event) ? $event->start_time : null), ['class' => 'form-control',"id"=>"start_time","placeholder"=>"Select Event Start Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('event_start_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('event_end_time') ? 'has-error' : ''); ?>">
                                <div class="input-group" style="margin-top: 24px">
                                    <span class="input-group-addon" id="basic-addon1"><?php echo e(trans('event.to')); ?></span>
                                    <?php echo Form::text('event_end_time', (isset($event) ? $event->end_time : null), ['class' => 'form-control',"id"=>"end_time","placeholder"=>"Select Event End Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('event_end_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>

                    <div id="demo" class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('setup') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('setup', trans('event.setup'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('setup', (isset($event) ? $event->setuptear->setup : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('setup', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('teardown') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('teardown', trans('event.tearDown'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('teardown', (isset($event) ? $event->setuptear->teardown : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('teardown', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group required <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('status', trans('event.eventStatus'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <div class="input-group">
                                        <label>
                                            <input type="radio" name="status" value="CLOSE"
                                                   class='icheckblue'
                                                   <?php if(isset($event) && $event->status == 'CLOSE'): ?> checked <?php endif; ?>>
                                            <?php echo e(trans('event.close')); ?>

                                        </label>
                                        <label>
                                            <input type="radio" name="status" value="LOST"
                                                   class='icheckblue'
                                                   <?php if(isset($event) && $event->status == 'LOST'): ?> checked <?php endif; ?>>
                                            <?php echo e(trans('event.lost')); ?>

                                        </label>
                                        <label>
                                            <input type="radio" name="status" value="PROSPECT"
                                                   class='icheckblue'
                                                   <?php if(isset($event) && $event->status == 'PROSPECT'): ?> checked <?php endif; ?>>
                                            <?php echo e(trans('event.prospect')); ?>

                                        </label>
                                        <label>
                                            <input type="radio" name="status" value="TENATIVE"
                                                   class='icheckblue'
                                                   <?php if(isset($event) && $event->status == 'TENATIVE'): ?> checked <?php endif; ?>>
                                            <?php echo e(trans('event.tentative')); ?>

                                        </label>
                                        <label>
                                            <input type="radio" name="status" value="DEFINITE"
                                                   class='icheckblue'
                                                   <?php if(isset($event) && $event->status == 'DEFINITE'): ?> checked <?php endif; ?>>
                                            <?php echo e(trans('event.definite')); ?>

                                        </label>
                                    </div>

                                    <span class="help-block"><?php echo e($errors->first('status', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($event)) {
                            $room_data = explode(",", $event->rooms);
                        }
                        ?>
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('room') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('room', trans('event.room'), ['class' => 'control-label required']); ?>

                                <div class="form-group">
                                    <?php if(count($event_rooms) > 0): ?>
                                        <?php $__currentLoopData = $event_rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rooms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label>
                                                <input type="checkbox" value="<?php echo e($rooms['id']); ?>" name="room[]" id="all_day" class='icheck'
                                                       <?php if(isset($room_data) && in_array($rooms['id'],$room_data)): ?>checked <?php endif; ?>>
                                                <?php echo e($rooms['room_name']); ?>

                                            </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <label>
                                            <?php echo e(trans('event.noRoomAvailabel')); ?>

                                        </label>
                                    <?php endif; ?>
                                </div>
                                <span class="help-block"><?php echo e($errors->first('room', ':message')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <i class="material-icons">contacts</i>
                        <b><?php echo e(trans('event.contact')); ?></b>
                    </div>
                </div>
            </div>
            <div id="contact_us">
                <div class="event_collapse_padding">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><?php echo e(trans('event.addAContact')); ?></button>

                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" align="center"><?php echo e(trans('event.manageContactAc')); ?></h4>
                                </div>
                                <div class="modal-body">
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#newContactDiv" style="margin-bottom: 10px">
                                        <div class="row">
                                            <div class="col-md-6 text-left">
                                                <i class="material-icons">contacts</i> <?php echo e(trans('event.addContact')); ?>

                                            </div>
                                            <div class="col-md-6 text-right">
                                                <i class="fa fa-fw fa-chevron-down"></i>
                                                <i class="fa fa-fw fa-chevron-right"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="collapse multi-collapse" id="newContactDiv">
                                        <div class="event_collapse_padding">
                                            <h4 class="modal-title"> <?php echo e(trans('event.addContact')); ?></h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group required <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                                        <?php echo Form::label('name', trans('event.name'), ['class' => 'control-label required']); ?>

                                                        <div class="controls">
                                                            <?php echo Form::text('name', null, ['class' => 'form-control','id'=>'contact_name']); ?>

                                                            <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group required <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                                                        <?php echo Form::label('email', trans('event.email'), ['class' => 'control-label required']); ?>

                                                        <div class="controls">
                                                            <?php echo Form::text('email', null, ['class' => 'form-control','id'=>'contact_email']); ?>

                                                            <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group required <?php echo e($errors->has('contact') ? 'has-error' : ''); ?>">
                                                        <?php echo Form::label('contact', trans('event.contact'), ['class' => 'control-label required']); ?>

                                                        <div class="controls">
                                                            <?php echo Form::text('contact', null, ['class' => 'form-control','id'=>'contact_phone']); ?>

                                                            <span class="help-block"><?php echo e($errors->first('contact', ':message')); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-warning" onclick="addContact()" style="margin-top: 23px"><?php echo e(trans('event.save')); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="pdf-hr">
                                    </div>
                                    <table class="table table-bordered" id="contact_table">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(trans('event.name')); ?></th>
                                            <th><?php echo e(trans('event.email')); ?></th>
                                            <th><?php echo e(trans('event.phone')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($event)): ?>
                                            <?php if(count($event->contacts) > 0): ?>
                                                <?php $__currentLoopData = $event->contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($contacts->name); ?></td>
                                                        <td><?php echo e($contacts->email); ?></td>
                                                        <td><?php echo e($contacts->contact); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('expected_guest') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('expected_guest', trans('event.expectedGuest'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('expected_guest', (isset($event) ? $event->contactus->expected_guest : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('expected_guest', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('guaranteed_guest') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('guaranteed_guest', trans('event.guaranteedGuest'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('guaranteed_guest', (isset($event) ? $event->contactus->guarnteed_guest : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('guaranteed_guest', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group <?php echo e($errors->has('owner') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('owner', trans('event.owner'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::select('owner', isset($owner)?$owner:[0=>trans('-- Select --')], (isset($event) ? $event->owner_id : null),['class' => 'form-control select2']); ?>

                                    <span class="help-block"><?php echo e($errors->first('owner', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?php echo e($errors->has('lead_source') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('lead_source', trans('event.leadSource'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::select('lead_source', isset($leadSource)?$leadSource:[0=>trans('-- Select --')], (isset($event) ? $event->leadsources_id : null),['class' => 'form-control select2']); ?>

                                    <span class="help-block"><?php echo e($errors->first('lead_source', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group <?php echo e($errors->has('type_event') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('type_event', trans('event.typeOfEvent'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::select('type_event', isset($event_type)?$event_type:[0=>trans('-- Select --')], (isset($event) ? $event->contactus->type_event_id : null),['class' => 'form-control select2']); ?>

                                    <span class="help-block"><?php echo e($errors->first('type_event', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?php echo e($errors->has('manager') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('manager', trans('event.manager'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::select('manager[]', isset($managers)?$managers:[0=>trans('-- Select --')], (isset($event) ? explode(",",$event->contactus->manager) : null),['class' => 'form-control select2',"id"=>"managers","multiple","multiple"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('manager', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7" align="right">
                            <a align="right" class="fa fa-plus-circle" data-toggle="modal" data-target="#man"><?php echo e(trans('event.addManager')); ?></a>
                        </div>
                    </div>

                    <div class="modal fade" id="man" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><?php echo e(trans('event.addNewManager')); ?></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group required <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                        <?php echo Form::label('name', trans('event.name'), ['class' => 'control-label required']); ?>

                                        <div class="controls">
                                            <?php echo Form::text('name', null, ['class' => 'form-control','id'=>'manager_name']); ?>

                                            <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group required <?php echo e($errors->has('gender') ? 'has-error' : ''); ?>">
                                        <?php echo Form::label('gender', trans('event.gender'), ['class' => 'control-label required']); ?>

                                        <div class="controls">
                                            <div class="input-group">
                                                <label>
                                                    <input type="radio" name="manager_gender" value="Male" class='icheckblue'>
                                                    <?php echo e(trans('event.male')); ?>

                                                </label>
                                                <label>
                                                    <input type="radio" name="manager_gender" value="Female" class='icheckblue'>
                                                    <?php echo e(trans('event.female')); ?>

                                                </label>
                                            </div>

                                            <span class="help-block"><?php echo e($errors->first('gender', ':message')); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group required <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                                        <?php echo Form::label('email', trans('event.mail'), ['class' => 'control-label required']); ?>

                                        <div class="controls">
                                            <?php echo Form::text('email', null, ['class' => 'form-control','id'=>'manager_email']); ?>

                                            <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group required <?php echo e($errors->has('contact') ? 'has-error' : ''); ?>">
                                        <?php echo Form::label('contact', trans('event.contact'), ['class' => 'control-label required']); ?>

                                        <div class="controls">
                                            <?php echo Form::text('contact', null, ['class' => 'form-control','id'=>'manager_contact']); ?>

                                            <span class="help-block"><?php echo e($errors->first('contact', ':message')); ?></span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" onclick="addManager()"> <?php echo e(trans('event.submit')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#financials">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <P class="event-collapse-title"><i class="material-icons">monetization_on</i> <?php echo e(trans('event.financial')); ?></P>
                    </div>
                    <div class="col-md-6 text-right">
                        <label class="doitlater">
                            <input type="checkbox" value="1" name="financials_doitlater" id="financials_doitlater" class='icheck'> <?php echo e(trans('event.doItLater')); ?>

                        </label>
                        <i class="fa fa-fw fa-chevron-down"></i>
                        <i class="fa fa-fw fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div id="financials" class="<?php echo e($errors->has('food_beverage_min') ? '' : 'collapse multi-collapse'); ?>">
                <div class="event_collapse_padding">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('food_beverage_min') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('food_beverage_min', trans('event.foodBeverageMin'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('food_beverage_min', (isset($event) ? $event->financials->food_beverage_min : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('food_beverage_min', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('grand_total') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('grand_total', trans('event.grandTotal'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('grand_total', (isset($event) ? $event->financials->grand_total : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('grand_total', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('rental_fee') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('rental_fee', trans('Rental Fee'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('rental_fee', (isset($event) ? $event->financials->rental_fee : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('rental_fee', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('amount_due') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('amount_due', trans('event.amountDue'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('amount_due', (isset($event) ? $event->financials->amount_due : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('amount_due', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('deposit_amounts') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('deposit_amounts', trans('event.depositAmounts'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('deposit_amounts', (isset($event) ? $event->financials->deposit_amount : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('deposit_amounts', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('price_per_amount') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('price_per_amount', trans('event.pricePerPersons'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('price_per_amount', (isset($event) ? $event->financials->price_per_persons : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('price_per_amount', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('actual_amount') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('actual_amount', trans('event.actualAmount'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('actual_amount', (isset($event) ? $event->financials->actual_amount : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('actual_amount', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('deposit_types') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('deposit_types', trans('event.depositType'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::select('deposit_types', isset($deposit_type)?$deposit_type:[trans('-- Select --')], (isset($event) ? $event->financials->deposit_type : null),['class' => 'form-control select2','id'=>'deposit_type']); ?>

                                    <span class="help-block"><?php echo e($errors->first('deposit_types', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#deposite_payment">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <P class="event-collapse-title"><i class="material-icons">payment</i> <?php echo e(trans('event.depositPayment')); ?></P>
                    </div>
                    <div class="col-md-6 text-right">
                        <label class="doitlater">
                            <input type="checkbox" value="1" name="deposit_doitlater" id="deposit_doitlater" class='icheck'>
                            <?php echo e(trans('event.doItLater')); ?>

                        </label>
                        <i class="fa fa-fw fa-chevron-down"></i>
                        <i class="fa fa-fw fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div id="deposite_payment" class="collapse multi-collapse">
                <div class="event_collapse_padding">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('deposit_date') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('deposit_date', trans('event.depositDue'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('deposit_date', (isset($event) ? $event->deposit->deposit_due : null), ['class' => 'form-control',"id"=>"deposit_date","placeholder"=>"Select Due Date"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('deposit_date', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('deposit_2_date') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('deposit_2_date', trans('event.2ndDepositDueDate'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('deposit_2_date', (isset($event) ? $event->deposit->sec_deposit_due : null), ['class' => 'form-control',"id"=>"deposit_2_date","placeholder"=>"Select 2nd Due Date"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('deposit_2_date', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('2nd_deposit') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('2nd_deposit', trans('event.2ndDeposit'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('2nd_deposit', (isset($event) ? $event->deposit->sec_deposit : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('2nd_deposit', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('balance_due_date') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('balance_due_date', trans('event.balanceDueDate'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('balance_due_date', (isset($event) ? $event->deposit->balance_due : null), ['class' => 'form-control',"id"=>"balance_due_date","placeholder"=>"Select Balance Due Date"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('balance_due_date', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#any_kids">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <P class="event-collapse-title"><i class="material-icons">face</i> Any Kids</P>
                    </div>
                    <div class="col-md-6 text-right">
                        <label class="doitlater">
                            <input type="checkbox" value="1" name="kids_doitlater" id="kids_doitlater" class='icheck'>
                            <?php echo e(trans('event.doItLater')); ?>

                        </label>
                        <i class="fa fa-fw fa-chevron-down"></i>
                        <i class="fa fa-fw fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div id="any_kids" class="collapse multi-collapse">
                <div class="event_collapse_padding">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('under_12_year') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('under_12_year', trans('event.under12Years'), ['class' => 'control-label']); ?>

                                <div class="controls">
                                    <?php echo Form::text('under_12_year', (isset($event) ? $event->kids->under_12_years : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('under_12_year', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('under_5_year') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('under_5_year', trans('event.under5Years'), ['class' => 'control-label']); ?>

                                <div class="controls">
                                    <?php echo Form::text('under_5_year', (isset($event) ? $event->kids->under_5_years : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('under_5_year', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#event_food">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <P class="event-collapse-title"><i class="material-icons">room_service</i> <?php echo e(trans('event.menu')); ?></P>
                    </div>
                    <div class="col-md-6 text-right">
                        <label class="doitlater">
                            <input type="checkbox" value="1" name="event_food_doitlater" id="event_food_doitlater" class='icheck'>
                            <?php echo e(trans('event.doItLater')); ?>

                        </label>
                        <i class="fa fa-fw fa-chevron-down"></i>
                        <i class="fa fa-fw fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div id="event_food" class="collapse multi-collapse">
                <div class="event_collapse_padding">
                    <div id="new_food_menu">
                        <?php if(isset($event)): ?>
                            <?php if(count($event->event_menu) > 0): ?>
                                <?php $__currentLoopData = $selected_menu_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div id="food-menu-content_<?php echo e($key); ?>" class="row">
                                        <div class="col-md-3">
                                            <?php if($key == 0): ?>
                                                <div class="form-group <?php echo e($errors->has('menu') ? 'has-error' : ''); ?>">
                                                    <?php echo Form::label('main_menu', trans('event.menu'), ['class' => 'control-label required']); ?>

                                                    <div class="controls">
                                                        <?php echo Form::select('main_menu_'.$key,$main_menu, $menu->main_menu_id,['class' => 'form-control select2',"id"=>"main_menu_".$key,'onchange'=>'filterMenuType()']); ?>

                                                        <span class="help-block"><?php echo e($errors->first('menu', ':message')); ?></span>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="controls add-menu-type-margin">
                                                    <?php echo Form::select('main_menu_'.$key,$main_menu, $menu->main_menu_id,['class' => 'form-control select2',"id"=>"main_menu_".$key,'onchange'=>'filterMenuType()']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('menu', ':message')); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-4">
                                            <?php if($key == 0): ?>
                                                <div class="form-group required <?php echo e($errors->has('menuType') ? 'has-error' : ''); ?>">
                                                    <?php echo Form::label('menuType', trans('event.menuTypes'), ['class' => 'control-label required']); ?>

                                                    <div class="controls">
                                                        <?php $menu_type = \App\Models\MenuType::where('main_menu_id',$menu->main_menu_id)->get()->pluck("name","id")   ; ?>
                                                        <?php echo Form::select('menuType_'.$key,$menu_type, $menu->menu_type,['class' => 'form-control select2',"id"=>"menuType_".$key,'onchange'=>'filterSubMenuAndItems()']); ?>

                                                        <span class="help-block"><?php echo e($errors->first('menuType', ':message')); ?></span>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="controls add-menu-type-margin">
                                                    <?php $menu_type = \App\Models\MenuType::where('main_menu_id',$menu->main_menu_id)->get()->pluck("name","id")   ; ?>
                                                    <?php echo Form::select('menuType_'.$key,$menu_type, $menu->menu_type,['class' => 'form-control select2',"id"=>"menuType_".$key,'onchange'=>'filterSubMenuAndItems()']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('menuType', ':message')); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" data-toggle="modal" data-target="#menuItemModel_<?php echo e($key); ?>" class="btn btn-primary add-menu-food"
                                                    id="MenuItem_<?php echo e($key); ?>"><?php echo e(trans('event.menuItems')); ?>

                                            </button>
                                            <div class="modal fade" id="menuItemModel_<?php echo e($key); ?>" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><?php echo e(trans('event.menuItems')); ?></h4>
                                                        </div>
                                                        <div class="modal-body" id="menu_items_data_<?php echo e($key); ?>">
                                                            <?php $count = $key ?>
                                                            <?php $sub_menu_data = \App\Models\SubMenu::where('menu_type',$menu->menu_type)->get(); ?>
                                                            <?php $__currentLoopData = $sub_menu_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#subMenuItem_<?php echo e($key); ?>_<?php echo e($count); ?>">
                                                                    <div class="row"><div class="col-md-6 text-left"><b><?php echo e($sub_menu->name); ?></b></div>
                                                                        <div class="col-md-6 text-right"><i class="fa fa-fw fa-chevron-down"></i><i class="fa fa-fw fa-chevron-right"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div id="subMenuItem_<?php echo e($key); ?>_<?php echo e($count); ?>" class="collapse multi-collapse">
                                                                    <div class="event_collapse_padding">
                                                                        <div class="row"><div class="col-md-12">
                                                                                <div class="form-group required">
                                                                                    <?php echo Form::label('room', trans('event.subMenuItems'), ['class' => 'control-label']); ?>

                                                                                    <?php $menu_items = \App\Models\Menus::where('sub_menu_id',$sub_menu->id)->get() ?>
                                                                                    <?php $event_menu = \App\Models\EventMenus::select('menu_items')->where('sub_menu_id',$sub_menu->id)->where('event_id',$event->id)->first()->toArray(); ?>
                                                                                    <div class="form-group">
                                                                                        <?php $__currentLoopData = $menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <label>
                                                                                                <input type="checkbox" value="<?php echo e($items->id); ?>" name="menuItems_<?php echo e($key); ?>_<?php echo e($count); ?>[]"
                                                                                                       <?php if(in_array($items->id,explode(",",$event_menu['menu_items']))): ?> checked <?php endif; ?> class="icheck"> <?php echo e($items->name); ?>

                                                                                            </label>
                                                                                            <input type="hidden" name="sub_menu_id_<?php echo e($key); ?>_<?php echo e($count); ?>" value="<?php echo e($items->sub_menu_id); ?>">
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php $count = $count + 1;?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($key != 0): ?>
                                            <div class="col-md-1">
                                                <div class="staff-show-detail">
                                                    <a onclick="removeContent('<?php echo e($key); ?>')"><i class="fa fa-fw fa-trash fa-lg text-danger"></i></a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div id="food-menu-content_0" class="row">
                                    <div class="col-md-3">
                                        <div class="form-group <?php echo e($errors->has('menu') ? 'has-error' : ''); ?>">
                                            <?php echo Form::label('main_menu', trans('event.menu'), ['class' => 'control-label required']); ?>

                                            <div class="controls">
                                                <?php echo Form::select('main_menu_0',$main_menu, null,['class' => 'form-control select2',"id"=>"main_menu_0",'onchange'=>'filterMenuType()']); ?>

                                                <span class="help-block"><?php echo e($errors->first('menu', ':message')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group required <?php echo e($errors->has('menuType') ? 'has-error' : ''); ?>">
                                            <?php echo Form::label('menuType', trans('event.menuTypes'), ['class' => 'control-label required']); ?>

                                            <div class="controls">
                                                <?php echo Form::select('menuType_0',[], null,['class' => 'form-control select2',"id"=>"menuType_0",'onchange'=>'filterSubMenuAndItems()']); ?>

                                                <span class="help-block"><?php echo e($errors->first('menuType', ':message')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="staff-show-detail">
                                            <button type="button" data-toggle="modal" data-target="#menuItemModel_0" class="btn btn-primary add-menu-food"
                                                    id="MenuItem_0"><?php echo e(trans('event.menuItems')); ?>

                                            </button>
                                            <div class="modal fade" id="menuItemModel_0" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><?php echo e(trans('event.menuItems')); ?></h4>
                                                        </div>
                                                        <div class="modal-body" id="menu_items_data_0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div id="food-menu-content_0" class="row">
                                <div class="col-md-3">
                                    <div class="form-group <?php echo e($errors->has('menu') ? 'has-error' : ''); ?>">
                                        <?php echo Form::label('main_menu', trans('event.menu'), ['class' => 'control-label required']); ?>

                                        <div class="controls">
                                            <?php echo Form::select('main_menu_0',$main_menu, null,['class' => 'form-control select2',"id"=>"main_menu_0",'onchange'=>'filterMenuType()']); ?>

                                            <span class="help-block"><?php echo e($errors->first('menu', ':message')); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group required <?php echo e($errors->has('menuType') ? 'has-error' : ''); ?>">
                                        <?php echo Form::label('menuType', trans('event.menuTypes'), ['class' => 'control-label required']); ?>

                                        <div class="controls">
                                            <?php echo Form::select('menuType_0',[], null,['class' => 'form-control select2',"id"=>"menuType_0",'onchange'=>'filterSubMenuAndItems()']); ?>

                                            <span class="help-block"><?php echo e($errors->first('menuType', ':message')); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="staff-show-detail">
                                        <button type="button" data-toggle="modal" data-target="#menuItemModel_0" class="btn btn-primary add-menu-food"
                                                id="MenuItem_0"><?php echo e(trans('event.menuItems')); ?>

                                        </button>
                                        <div class="modal fade" id="menuItemModel_0" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><?php echo e(trans('event.menuItems')); ?></h4>
                                                    </div>
                                                    <div class="modal-body" id="menu_items_data_0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        
                            
                            
                                
                                    
                                    
                                        
                                            
                                            
                                        
                                        
                                            
                                                
                                                
                                                    
                                                    
                                                
                                            
                                            
                                                
                                                
                                                    
                                                    
                                                
                                            
                                            
                                                
                                                
                                                    
                                                    
                                                
                                            
                                        
                                        
                                            
                                        
                                    
                                
                            
                        
                        
                            
                            
                                
                                    
                                    
                                        
                                            
                                            
                                        
                                        
                                            
                                                
                                                
                                                    
                                                    
                                                
                                            
                                            
                                                
                                                
                                                    
                                                    
                                                
                                            
                                            
                                                
                                                
                                                    
                                                    
                                                
                                            
                                            
                                                
                                                
                                                    
                                                    
                                                
                                            
                                            
                                                
                                                
                                                    
                                                    
                                                
                                            
                                            
                                                
                                            
                                        
                                    
                                
                            
                        
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-primary" id="btn_add_food_menu"><?php echo e(trans('event.add')); ?></button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('caterers') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('caterers', trans('Caterers'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::select('caterers', isset($caterers)?$caterers:[trans('-- Select --')], (isset($event) && $event->event_menu && count($event->event_menu) > 0 ? $event->event_menu[0]->caterer_id : null),['class' => 'form-control select2','id'=>'caterers']); ?>

                                    <span class="help-block"><?php echo e($errors->first('caterers', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('service_type') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('service_type', trans('Service Type'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::select('service_type', isset($service_type)?$service_type:[trans('-- Select --')], (isset($event) && $event->event_menu && count($event->event_menu) > 0 ? $event->event_menu[0]->service_type_id : null),['class' => 'form-control select2','id'=>'service_type']); ?>

                                    <span class="help-block"><?php echo e($errors->first('service_type', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('head_table') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('head_table',trans('Table'), ['class' => 'control-label required']); ?>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="1" name="head_table[]" id="all_day" class='icheck'
                                                   <?php if(isset($event) && count($event->event_menu) > 0 && $event->event_menu[0]->head_table != NULL): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Head Table')); ?>

                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <label>
                                                <input type="radio" name="head_table_count" value="16"
                                                       class='icheckblue'
                                                       <?php if(isset($event) && count($event->event_menu) > 0 && $event->event_menu[0]->head_table == 16): ?> checked <?php endif; ?>>
                                                <?php echo e(trans('16')); ?>

                                            </label>
                                            <label>
                                                <input type="radio" name="head_table_count" value="18"
                                                       class='icheckblue'
                                                       <?php if(isset($event) && count($event->event_menu) > 0 && $event->event_menu[0]->head_table == 18): ?> checked <?php endif; ?>>
                                                <?php echo e(trans('18')); ?>

                                            </label>
                                            <label>
                                                <input type="radio" name="head_table_count" value="20"
                                                       class='icheckblue'
                                                       <?php if(isset($event) && count($event->event_menu) > 0 && $event->event_menu[0]->head_table == 20): ?> checked <?php endif; ?>>
                                                <?php echo e(trans('20')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="1" name="dinning_table[]" id="all_day" class='icheck'
                                                   <?php if(isset($event) && count($event->event_menu) > 0 && $event->event_menu[0]->dinning_table != NULL): ?>checked <?php endif; ?>>
                                            <?php echo e(trans('Dining Table')); ?>

                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <label>
                                                <input type="radio" name="dinning_table_count" value="16"
                                                       class='icheckblue'
                                                       <?php if(isset($event) && count($event->event_menu) > 0 && $event->event_menu[0]->dinning_table == 16): ?> checked <?php endif; ?>>
                                                <?php echo e(trans('16')); ?>

                                            </label>
                                            <label>
                                                <input type="radio" name="dinning_table_count" value="18"
                                                       class='icheckblue'
                                                       <?php if(isset($event) && count($event->event_menu) > 0 && $event->event_menu[0]->dinning_table == 18): ?> checked <?php endif; ?>>
                                                <?php echo e(trans('18')); ?>

                                            </label>
                                            <label>
                                                <input type="radio" name="dinning_table_count" value="20"
                                                       class='icheckblue'
                                                       <?php if(isset($event) && count($event->event_menu) > 0 && $event->event_menu[0]->dinning_table == 20): ?> checked <?php endif; ?>>
                                                <?php echo e(trans('20')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#eating_times">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <P class="event-collapse-title"><i class="material-icons">timelapse</i> Eating Times</P>
                    </div>
                    <div class="col-md-6 text-right">
                        <label class="doitlater">
                            <input type="checkbox" value="1" name="eating_doitlater" id="eating_doitlater" class='icheck'>
                            Do It Later
                        </label>
                        <i class="fa fa-fw fa-chevron-down"></i>
                        <i class="fa fa-fw fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div id="eating_times" class="collapse multi-collapse">
                <div class="event_collapse_padding">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('service_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('service_time', trans('Service Time'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('service_time', (isset($event) ? $event->eating_times->service_time : null), ['class' => 'form-control',"id"=>"service_time","placeholder"=>"Select Service Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('service_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('canapes') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('canapes', trans('Canapes'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('canapes', (isset($event) ? $event->eating_times->canapes : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('canapes', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($event)) {
                        $mrs = ($event->eating_times->morning_snacks_time == NULL) ? '' : explode("_", $event->eating_times->morning_snacks_time);
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('morning_start_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('morning_start_time', trans('Morning Snacks'), ['class' => 'control-label required']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">From</span>
                                    <?php echo Form::text('morning_start_time',(isset($mrs) ? (is_array($mrs) ? $mrs[0] : '') :null) , ['class' => 'form-control',"id"=>"morning_start_time","placeholder"=>"Select Snacks Start Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('time1', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-top: 5px">
                            <div class="form-group required <?php echo e($errors->has('morning_end_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('', null, ['class' => 'control-label']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">To</span>
                                    <?php echo Form::text('morning_end_time', (isset($mrs) ? (is_array($mrs) ? $mrs[0] : '') :null), ['class' => 'form-control',"id"=>"morning_end_time","placeholder"=>"Select Snacks End Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('morning_end_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($event)) {
                            $mrt = ($event->eating_times->morning_tea_time == NULL) ? '' : explode("_", $event->eating_times->morning_tea_time);
                        }
                        ?>
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('mr_tea_start_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('mr_tea_start_time', trans('Morning Tea/Coffee'), ['class' => 'control-label required']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">From</span>
                                    <?php echo Form::text('mr_tea_start_time', (isset($mrt) ? (is_array($mrt) ? $mrt[0] : '') :null), ['class' => 'form-control',"id"=>"mr_tea_start_time","placeholder"=>"Select Lunch Start Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('mr_tea_start_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('mr_tea_end_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('', null, ['class' => 'control-label']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">To</span>
                                    <?php echo Form::text('mr_tea_end_time', (isset($mrt) ? (is_array($mrt) ? $mrt[1] : '') :null), ['class' => 'form-control',"id"=>"mr_tea_end_time","placeholder"=>"Select Lunch End Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('mr_tea_end_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($event)) {
                        $lt = ($event->eating_times->lunch_time == NULL) ? '' : explode("_", $event->eating_times->lunch_time);
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('lunch_start_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('lunch_start_time', trans('Lunch'), ['class' => 'control-label required']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">From</span>
                                    <?php echo Form::text('lunch_start_time', (isset($lt) ? (is_array($lt) ? $lt[0] : '') :null), ['class' => 'form-control',"id"=>"lunch_start_time","placeholder"=>"Select Lunch Start Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('lunch_start_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('lunch_end_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('', null, ['class' => 'control-label']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">To</span>
                                    <?php echo Form::text('lunch_end_time', (isset($lt) ? (is_array($lt) ? $lt[0] : '') :null), ['class' => 'form-control',"id"=>"lunch_end_time","placeholder"=>"Select Lunch End Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('lunch_end_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($event)) {
                            $evt = ($event->eating_times->evening_tea_time == NULL) ? '' : explode("_", $event->eating_times->evening_tea_time);
                        }
                        ?>
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('af_tea_start_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('af_tea_start_time', trans('Afternoon Tea/Coffee'), ['class' => 'control-label required']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">From</span>
                                    <?php echo Form::text('af_tea_start_time', (isset($evt) ? (is_array($evt) ? $evt[0] : '') :null), ['class' => 'form-control',"id"=>"af_tea_start_time","placeholder"=>"Select Lunch Start Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('af_tea_start_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('af_tea_end_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('', null, ['class' => 'control-label']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">To</span>
                                    <?php echo Form::text('af_tea_end_time', (isset($evt) ? (is_array($evt) ? $evt[1] : '') :null), ['class' => 'form-control',"id"=>"af_tea_end_time","placeholder"=>"Select Lunch End Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('af_tea_end_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($event)) {
                        $evs = ($event->eating_times->evening_snacks_time == NULL ? '' : explode("_", $event->eating_times->evening_snacks_time));
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('evening_start_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('evening_start_time', trans('Evening Snacks'), ['class' => 'control-label required']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">From</span>
                                    <?php echo Form::text('evening_start_time', (isset($evs) ? (is_array($evs) ? $evs[0] : '') :null), ['class' => 'form-control',"id"=>"evening_start_time","placeholder"=>"Select Lunch Start Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('evening_start_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('evening_end_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('', null, ['class' => 'control-label']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">To</span>
                                    <?php echo Form::text('evening_end_time', (isset($evs) ? (is_array($evs) ? $evs[1] : '') :null), ['class' => 'form-control',"id"=>"evening_end_time","placeholder"=>"Select Lunch End Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('evening_end_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($event)) {
                            $dt = ($event->eating_times->dinner_time == NULL ? '' : explode("_", $event->eating_times->dinner_time));
                        }
                        ?>
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('dinner_start_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('dinner_start_time', trans('Dinner'), ['class' => 'control-label required']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">From</span>
                                    <?php echo Form::text('dinner_start_time', (isset($dt) ? (is_array($dt) ? $dt[0] : '') :null), ['class' => 'form-control',"id"=>"dinner_start_time","placeholder"=>"Select Lunch Start Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('dinner_start_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group required <?php echo e($errors->has('dinner_end_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('', null, ['class' => 'control-label']); ?>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">To</span>
                                    <?php echo Form::text('dinner_end_time', (isset($dt) ? (is_array($dt) ? $dt[1] : '') :null), ['class' => 'form-control',"id"=>"dinner_end_time","placeholder"=>"Select Lunch End Time"]); ?>

                                    <span class="help-block"><?php echo e($errors->first('dinner_end_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#equipment_requirements">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <P class="event-collapse-title"><i class="material-icons">widgets</i> Equipment Requirement</P>
                    </div>
                    <div class="col-md-6 text-right">
                        <label class="doitlater">
                            <input type="checkbox" value="1" name="equipment_requirements_doitlater" id="equipment_requirements_doitlater" class='icheck'>
                            Do It Later
                        </label>
                        <i class="fa fa-fw fa-chevron-down"></i>
                        <i class="fa fa-fw fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div id="equipment_requirements" class="collapse multi-collapse">
                <div class="event_collapse_padding">
                    <?php
                    if (isset($event)) {
                        $equip = explode(',', $event->event_equipment->equipment_type);
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php if(count($equipment) > 0): ?>
                                    <?php $__currentLoopData = $equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label>
                                            <input type="checkbox" value="<?php echo e($eq['id']); ?>" name="equipment[]" id="all_day" class='icheck'
                                                   <?php if(isset($equip) && in_array($eq['id'],$equip)): ?>checked <?php endif; ?>>
                                            <?php echo e($eq['name']); ?>

                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <label>
                                        No Equipment Availabel
                                    </label>
                                <?php endif; ?>
                            </div>
                            <span class="help-block"><?php echo e($errors->first('equipment', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#event_photography">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <P class="event-collapse-title"><i class="material-icons">monochrome_photos</i> Event Photography</P>
                    </div>
                    <div class="col-md-6 text-right">
                        <label class="doitlater">
                            <input type="checkbox" value="1" name="event_photography_doitlater" id="event_photography_doitlater" class='icheck'>
                            Do It Later
                        </label>
                        <i class="fa fa-fw fa-chevron-down"></i>
                        <i class="fa fa-fw fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div id="event_photography" class="collapse multi-collapse">
                <div class="event_collapse_padding">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('photo', trans('Shot List For Photographer'), ['class' => 'control-label']); ?>

                                <div class="controls">
                                    <?php echo Form::select('photo', isset($photo)?$photo:[trans('-- Select --')], (isset($event) ? $event->event_photographers->photographer_id : null),['class' => 'form-control select2']); ?>

                                    <span class="help-block"><?php echo e($errors->first('photo', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($event)) {
                        $photo_service = explode(",", $event->event_photographers->service_needed);
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" value="Hire Photographer" name="photographer[]" id="all_day" class='icheck'
                                           <?php if(isset($photo_service) && in_array("Hire Photographer",$photo_service)): ?>checked <?php endif; ?>>
                                    <?php echo e(trans('Hire Photographer')); ?>

                                </label><br>
                            </div>
                            <span class="help-block"><?php echo e($errors->first('hire_photographer', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#event_decorator">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <P class="event-collapse-title"><i class="material-icons">brightness_high</i> Event Decorator</P>
                    </div>
                    <div class="col-md-6 text-right">
                        <label class="doitlater">
                            <input type="checkbox" value="1" name="event_decorator_doitlater" id="event_decorator_doitlater" class='icheck'>
                            Do It Later
                        </label>
                        <i class="fa fa-fw fa-chevron-down"></i>
                        <i class="fa fa-fw fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div id="event_decorator" class="collapse multi-collapse">
                <div class="event_collapse_padding">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('decorator') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('decorator', trans('Decorator'), ['class' => 'control-label']); ?>

                                <div class="controls">
                                    <?php echo Form::select('decorator', isset($decorator)?$decorator:[trans('-- Select --')], (isset($event) ? $event->event_decorator->decorator_id : null),['class' => 'form-control select2']); ?>

                                    <span class="help-block"><?php echo e($errors->first('decorator', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($event)) {
                        $decorator_service = explode(",", $event->event_decorator->service_needed);
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo Form::label('decorator', trans('Decor'), ['class' => 'control-label']); ?>

                                <br><br>
                                <label>
                                    <input type="checkbox" value="Set Theme" name="decor[]" id="all_day" class='icheck'
                                           <?php if(isset($decorator_service) && in_array("Set Theme",$decorator_service)): ?>checked <?php endif; ?>>
                                    <?php echo e(trans('Set Theme')); ?>

                                </label><br>
                                <span class="help-block"><?php echo e($errors->first('set_theme', ':message')); ?></span>
                                <label>
                                    <input type="checkbox" value="Entrances and Exits" name="decor[]" id="all_day" class='icheck'
                                           <?php if(isset($decorator_service) && in_array("Entrances and Exits",$decorator_service)): ?>checked <?php endif; ?>>
                                    <?php echo e(trans('Entrances and Exits')); ?>

                                </label><br>
                                <span class="help-block"><?php echo e($errors->first('entrances_exits', ':message')); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <br><br>
                                <label>
                                    <input type="checkbox" value="Speaker Platform" name="decor[]" id="all_day" class='icheck'
                                           <?php if(isset($decorator_service) && in_array("Speaker Platform",$decorator_service)): ?>checked <?php endif; ?>>
                                    <?php echo e(trans('Speaker Platform')); ?>

                                </label><br>
                                <span class="help-block"><?php echo e($errors->first('speaker_platform', ':message')); ?></span>
                                <label>
                                    <input type="checkbox" value="Dining Tables" name="decor[]" id="all_day" class='icheck'
                                           <?php if(isset($decorator_service) && in_array("Dining Tables",$decorator_service)): ?>checked <?php endif; ?>>
                                    <?php echo e(trans('Dining Tables')); ?>

                                </label><br>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <br><br>
                                <label>
                                    <input type="checkbox" value="Head Table" name="decor[]" id="all_day" class='icheck'
                                           <?php if(isset($decorator_service) && in_array("Head Table",$decorator_service)): ?>checked <?php endif; ?>>
                                    <?php echo e(trans('Head Table')); ?>

                                </label><br>
                                <span class="help-block"><?php echo e($errors->first('head_table', ':message')); ?></span>
                                <label>
                                    <input type="checkbox" value="Hospitality Suite" name="decor[]" id="all_day" class='icheck'
                                           <?php if(isset($decorator_service) && in_array("Hospitality Suite",$decorator_service)): ?>checked <?php endif; ?>>
                                    <?php echo e(trans('Hospitality Suite')); ?>

                                </label><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#entertainment">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <P class="event-collapse-title"><i class="material-icons">child_care</i> Entertainment</P>
                    </div>
                    <div class="col-md-6 text-right">
                        <label class="doitlater">
                            <input type="checkbox" value="1" name="entertainment_doitlater" id="entertainment_doitlater" class='icheck'>
                            Do It Later
                        </label>
                        <i class="fa fa-fw fa-chevron-down"></i>
                        <i class="fa fa-fw fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div id="entertainment" class="collapse multi-collapse">
                <div class="event_collapse_padding">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('entertainment') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('entertainment', trans('Entertainment'), ['class' => 'control-label']); ?>

                                <div class="controls">
                                    <?php echo Form::select('entertainment', isset($entertainment)?$entertainment:[trans('-- Select --')], (isset($event) ? $event->event_entertainment->entertainment_id : null),['class' => 'form-control select2']); ?>

                                    <span class="help-block"><?php echo e($errors->first('entertainment', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($event)) {
                        $entertainment_data = explode(",", $event->event_entertainment->service_needed);
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo Form::label('decorator', trans('Type'), ['class' => 'control-label']); ?>

                                <br><br>
                                <label>
                                    <input type="checkbox" value="Music" name="entertain[]" id="all_day" class='icheck'
                                           <?php if(isset($entertainment_data) && in_array("Music",$entertainment_data)): ?>checked <?php endif; ?>>
                                    <?php echo e(trans('Music')); ?>

                                </label><br>
                            </div>
                            <span class="help-block"><?php echo e($errors->first('music', ':message')); ?></span>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <br><br>
                                <label>
                                    <input type="checkbox" value="Magic" name="entertain[]" id="all_day" class='icheck'
                                           <?php if(isset($entertainment_data) && in_array("Magic",$entertainment_data)): ?>checked <?php endif; ?>>
                                    <?php echo e(trans('Magic')); ?>

                                </label><br>
                            </div>
                            <span class="help-block"><?php echo e($errors->first('magic', ':message')); ?></span>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <br><br>
                                <label>
                                    <input type="checkbox" value="Dance" name="entertain[]" id="all_day" class='icheck'
                                           <?php if(isset($entertainment_data) && in_array("Dance",$entertainment_data)): ?>checked <?php endif; ?>>
                                    <?php echo e(trans('Dance')); ?>

                                </label><br>
                            </div>
                            <span class="help-block"><?php echo e($errors->first('dance', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#guest_pickup">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <P class="event-collapse-title"><i class="material-icons">directions_car</i> Guest Pickups</P>
                    </div>
                    <div class="col-md-6 text-right">
                        <label class="doitlater">
                            <input type="checkbox" value="1" name="logistics_doitlater" id="guest_pickup_doitlater" class='icheck'>
                            Do It Later
                        </label>
                        <i class="fa fa-fw fa-chevron-down"></i>
                        <i class="fa fa-fw fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div id="guest_pickup" class="collapse multi-collapse">
                <div class="event_collapse_padding">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group required <?php echo e($errors->has('guest_pick') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('guest_pick', trans('Company'), ['class' => 'control-label']); ?>

                                <div class="controls">
                                    <?php echo Form::select('guest_pick', isset($transport)?$transport:[trans('-- Select --')], (isset($event) ? $event->logistics->transportation_id : null),['class' => 'form-control select2']); ?>

                                    <span class="help-block"><?php echo e($errors->first('guest_pick', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('time_of_departure') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('time_of_departure', trans('Time Of Departure'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('time_of_departure', (isset($event) ? $event->logistics->time_of_departure : null), ['class' => 'form-control','id'=>'time_of_departure']); ?>

                                    <span class="help-block"><?php echo e($errors->first('time_of_departure', ':message')); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('van_choice') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('van_choice', trans('Van Choice'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('van_choice', (isset($event) ? $event->logistics->van_choice : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('van_choice', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('arrival_time') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('arrival_time', trans('Arrival Time'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('arrival_time', (isset($event) ? $event->logistics->arrival_time : null), ['class' => 'form-control','id'=>'arrival_time']); ?>

                                    <span class="help-block"><?php echo e($errors->first('arrival_time', ':message')); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('contact_on_day') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('contact_on_day', trans('Contact on the day'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('contact_on_day', (isset($event) ? $event->logistics->contact_on_day : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('contact_on_day', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group <?php echo e($errors->has('staff_choice') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('staff_choice', trans('Staff Choice'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::select('staff_choice[]',isset($staffs)?$staffs:null, (isset($event) ? ($event->logistics->staff_choice == NULL ? null : explode(",",$event->logistics->staff_choice)) : null),['class' => 'form-control','id'=>'staff_choice','multiple'=>'multiple']); ?>

                                    <span class="help-block"><?php echo e($errors->first('staff_choice', ':message')); ?></span>
                                </div>
                            </div>
                            <a class="fa fa-plus-circle add_item" data-toggle="modal" data-target="#staff_value"> Add Value</a>
                        </div>

                        <div class="modal fade" id="staff_value" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add New Staff</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group required <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                            <?php echo Form::label('name', trans('Name'), ['class' => 'control-label required']); ?>

                                            <div class="controls">
                                                <?php echo Form::text('name', null, ['class' => 'form-control','id'=>'staff_name']); ?>

                                                <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group required <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                                            <?php echo Form::label('email', trans('Email'), ['class' => 'control-label required']); ?>

                                            <div class="controls">
                                                <?php echo Form::text('email', null, ['class' => 'form-control','id'=>'staff_email']); ?>

                                                <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group required <?php echo e($errors->has('contact') ? 'has-error' : ''); ?>">
                                            <?php echo Form::label('contact', trans('Contact'), ['class' => 'control-label required']); ?>

                                            <div class="controls">
                                                <?php echo Form::text('contact', null, ['class' => 'form-control','id'=>'staff_contact']); ?>

                                                <span class="help-block"><?php echo e($errors->first('contact', ':message')); ?></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" onclick="addStaff()">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group required <?php echo e($errors->has('contact') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('contact', trans('Contact Phone'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('contact', (isset($event) ? $event->logistics->contact_phone : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('contact', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group required <?php echo e($errors->has('function_address') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('function_address', trans('Function Address'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('function_address', (isset($event) ? $event->logistics->function_address : null), ['class' => 'form-control']); ?>

                                    <span class="help-block"><?php echo e($errors->first('function_address', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#valet_parking">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <P class="event-collapse-title"><i class="material-icons">pin_drop</i> Valet Parking</P>
                    </div>
                    <div class="col-md-6 text-right">
                        <label class="doitlater">
                            <input type="checkbox" value="1" name="valet_parking_doitlater" id="valet_parking_doitlater" class='icheck'>
                            Do It Later
                        </label>
                        <i class="fa fa-fw fa-chevron-down"></i>
                        <i class="fa fa-fw fa-chevron-right"></i>
                    </div>
                </div>

            </div>
            <div id="valet_parking" class="collapse multi-collapse">
                <div class="event_collapse_padding">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group required <?php echo e($errors->has('parking') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('parking', trans('Valet Parking'), ['class' => 'control-label']); ?>

                                <div class="controls">
                                    <?php echo Form::select('parking', isset($parking)?$parking:[trans('-- Select --')], (isset($event) ? $event->event_parking->parking_id : null),['class' => 'form-control select2']); ?>

                                    <span class="help-block"><?php echo e($errors->first('parking', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="additional_information">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <b>Additional Information</b>
                    </h4>
                </div>
                <div class="event_collapse_padding">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group required <?php echo e($errors->has('message') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('message', trans('Message'), ['class' => 'control-label required']); ?>

                                <div class="controls">
                                    <?php echo Form::text('message', null, ['class' => 'form-control', 'id' => 'txtEditor']); ?>

                                    <span class="help-block"><?php echo e($errors->first('message', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="form-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-primary"><?php echo e(trans('SAVE')); ?></button>
                                    <a href="<?php echo e(route($type.'.index')); ?>" class="btn btn-primary"><?php echo e(trans('CANCEL')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="menuCount" name="menuCount" value="">
        <?php echo Form::close(); ?>

    </div>
</div>


<?php $__env->startSection('scripts'); ?>
    <script>
        var count = <?php echo e((isset($event) ? count($selected_menu_data) - 1  : 0)); ?>;
        var count_stack = Array.from(Array(count + 1).keys());
        $('#menuCount').val(count_stack);
        $(document).ready(function () {
            $("#btn_add_food_menu").click(function () {
                count = count + 1;
                var html = '<div id="food-menu-content_'+count+'" class="row">' +
                    '<div class="col-md-3">' +
                    '<div class="controls add-menu-type-margin">' +
                    '<select name="main_menu_'+count+'" class="form-control select2" id="main_menu_'+count+'" onchange="filterMenuType('+count+')">';
                    <?php $__currentLoopData = $main_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            html += '<option value=<?php echo e($key); ?>><?php echo e($value); ?></option>';
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    html += '</select></div>' +
                        '</div>' +
                        '<div class="col-md-4">' +
                        '<div class="controls add-menu-type-margin">' +
                        '<select name="menuType_'+count+'" class="form-control select2" id="menuType_'+count+'" onchange="filterSubMenuAndItems('+count+')"></select>'+
                        '</div>' +
                        '</div>' +
                        '<div class="col-md-3">' +
                        '<button type="button" data-toggle="modal" data-target="#menuItemModel_'+count+'" class="btn btn-primary add-menu-food" id="MenuItem_'+count+'">Menu Item' +
                        '</button>' +
                        '<div class="modal fade" id="menuItemModel_'+count+'" role="dialog">' +
                        '<div class="modal-dialog">' +
                        '<div class="modal-content">' +
                        '<div class="modal-header">' +
                        '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
                        '<h4 class="modal-title">Menu Items</h4>' +
                        '</div>';

                        html+= '<div class="modal-body" id="menu_items_data_'+count+'">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-md-1">' +
                            '<div class="staff-show-detail">' +
                            '<a onclick="removeContent(' + count + ')"><i class="fa fa-fw fa-trash fa-lg text-danger"></i></a>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                $("#new_food_menu").append(html);
                $('#main_menu_'+count).select2({
                    theme: "bootstrap",
                    placeholder: "Select Menu"
                }).trigger('change');
                count_stack.push(count);
                $('#menuCount').val(count_stack);
            });
        });

        function removeContent(id){
            $('#food-menu-content_' + id).remove();
        }
    </script>

    <script>
        var addManagerUrl = '<?php echo e(url('event/addManager')); ?>';
        var foodCategoryUrl = '<?php echo e(url('event/foodCategory')); ?>';
        var menuChoiceUrl = '<?php echo e(url('event/menuChoice')); ?>';
        var addContactUrl = '<?php echo e(url('event/addContact')); ?>';
        var addStaffUrl = '<?php echo e(url('event/addStaff')); ?>';
        var token = '<?php echo e(csrf_token()); ?>';
    </script>
    <script src="<?php echo e(asset('js/event.js')); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('js/editor.js')); ?>" type="text/javascript"></script>

    <script>
        $(function () {
            $("#txtEditor").Editor();
            <?php if(isset($event)): ?>
                $("#txtEditor").Editor("setText",'<?php echo e($event->additional->message); ?>');
            <?php endif; ?>

            $("#from_date").datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $("#to_date").datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $("#event_start_date").datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $("#balance_due_date").datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $("#deposit_date").datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $("#deposit_2_date").datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $("#start_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#end_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#service_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#morning_start_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#morning_end_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#lunch_start_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#lunch_end_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#mr_tea_start_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#mr_tea_end_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#evening_start_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#evening_end_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#af_tea_start_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#af_tea_end_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#dinner_start_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#dinner_end_time").datetimepicker({
                format: "HH:mm a"
            });
            $("#time_of_departure").datetimepicker({
                format: "HH:mm a"
            });
            $("#arrival_time").datetimepicker({
                format: "HH:mm a"
            });
        });

        $(document).submit(function () {
            $("#txtEditor").val($("#txtEditor").Editor("getText"));
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.icheck').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            $('.icheckblue').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            $("#staff_choice").select2({
                placeholder: "<?php echo e(trans('salesteam.staff_members')); ?>",
                theme: 'bootstrap'
            }).find("option:first").attr({
                selected: false
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
            $(".select2_class").select2({
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
        <?php if(isset($meeting)): ?>
        $('#starting_date').datetimepicker({
            format: '<?php echo e(isset($jquery_date_time)?$jquery_date_time:"MMMM D,GGGG H:mm"); ?>',
            useCurrent: false,
            minDate: '<?php echo e($meeting->updated_at); ?>',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        }).on("dp.change", function (e) {
            $('#ending_date').data("DateTimePicker").minDate(e.date);
            $('#meeting').bootstrapValidator('revalidateField', 'starting_date');
        });
        $('#ending_date').datetimepicker({
            minDate: '<?php echo e($meeting->updated_at); ?>',
            format: '<?php echo e(isset($jquery_date_time)?$jquery_date_time:"MMMM D,GGGG H:mm"); ?>',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        }).on("dp.change", function (e) {
            $('#starting_date').data("DateTimePicker").maxDate(e.date);
            $('#meeting').bootstrapValidator('revalidateField', 'ending_date');
        });
        <?php else: ?>
        $('#starting_date').datetimepicker({
            format: '<?php echo e(isset($jquery_date_time)?$jquery_date_time:"MMMM D,GGGG H:mm"); ?>',
            useCurrent: false,
            minDate: moment(),
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        }).on("dp.change", function (e) {
            $('#ending_date').data("DateTimePicker").minDate(e.date);
            $('#meeting').bootstrapValidator('revalidateField', 'starting_date');

        });
        $('#ending_date').datetimepicker({
            useCurrent: false,
            minDate: moment(),
            format: '<?php echo e(isset($jquery_date_time)?$jquery_date_time:"MMMM D,GGGG H:mm"); ?>',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        }).on("dp.change", function (e) {
            $('#starting_date').data("DateTimePicker").maxDate(e.date);
            $('#meeting').bootstrapValidator('revalidateField', 'ending_date');
        });

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

        <?php if(!isset($event)): ?>
            $(function(){
                $('#main_menu_0').trigger('change');
            });
        <?php endif; ?>

        function filterMenuType(id){
            if(!id){
                id = 0;
            }
            var main_menu_id = $('#main_menu_'+id).val();

            $.ajax({
                url:'<?php echo e(url($type . '/filterMenuType')); ?>',
                type:"get",
                data:{id:main_menu_id,_token:'<?php echo e(csrf_token()); ?>'},
                success:function(data){
                    $('#menuType_'+id).empty();
                    $('#menuType_'+id).val();
                    $('#menuType_'+id).select2({
                        theme: "bootstrap",
                        placeholder: "Select Menu Type"
                    });
                    $.each(data, function (val, text) {
                        $('#menuType_'+id).append($('<option></option>').val(val).html(text).attr('selected',0));
                    });
                }
            });
        }

        function filterSubMenuAndItems(id){
            if(!id){
                id = 0;
            }
            var menu_type = $('#menuType_'+id).val();

            $.ajax({
                url:'<?php echo e(url($type . '/filterSubMenuAndItems')); ?>',
                type:"get",
                data:{id:menu_type,_token:'<?php echo e(csrf_token()); ?>'},
                success:function(data){
                    var html = '';
                    var count = id;
                    var value = '';
                    $.each(data.menu_items, function(val,text){
                        $.each(text,function(val1,text1){
                            html += '<div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#subMenuItem_'+id+'_'+count+'">' +
                                    '<div class="row"><div class="col-md-6 text-left"><b>'+val1+'</b></div>'+
                                    '<div class="col-md-6 text-right"><i class="fa fa-fw fa-chevron-down"></i><i class="fa fa-fw fa-chevron-right"></i></div>'+
                                    '</div></div>';
                            html += '<div id="subMenuItem_'+id+'_'+count+'" class="collapse multi-collapse">'+
                                '<div class="event_collapse_padding">'+
                                '<div class="row"><div class="col-md-12">'+
                                '<div class="form-group required">'+
                                '<?php echo Form::label('room', trans('event.subMenuItems'), ['class' => 'control-label']); ?>'+
                                '<div class="form-group">';
                            $.each(text1,function(val2,text2){
                                html +='<label><input type="checkbox" value="'+text2.id+'" name="menuItems_'+id+'_'+count+'[]" class="icheck"> '+
                                        text2.name +
                                        '</label>';
                                html += '<input type="hidden" name="sub_menu_id_'+id+'_'+count+'" value="'+text2.sub_menu_id+'">';
                            });
                            html += '</div></div></div></div></div></div>';
                            count = count + 1;
                        });
                    });
                    $('#menu_items_data_'+id).html(html);
                    $('#menuItemModel_'+id).modal('show');
                    $('.icheck').iCheck({
                        checkboxClass: 'icheckbox_minimal-blue',
                        radioClass: 'iradio_minimal-blue'
                    });
                }
            });
        }
    </script>

<?php $__env->stopSection(); ?>