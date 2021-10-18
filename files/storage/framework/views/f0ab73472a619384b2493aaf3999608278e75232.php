<div class="panel panel-primary cnts">
    <div class="panel-body">
        <div class="form_box">
        <div class="row form-panel">
            <div class="col-sm-6 col-lg-3">
                <?php echo Form::label('client_name', trans('lead.client_name'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->client_name); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <?php echo Form::label('email', trans('lead.email'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->email); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <?php echo Form::label('phone', trans('lead.phone'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->mobile); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <?php echo Form::label('lead_owner', trans('event.lead_owner'), ['class' => 'control-label']); ?>

                <?php if($lead->salesPerson): ?>
                    <div><?php echo e($lead->salesPerson->first_name); ?> <?php echo e($lead->salesPerson->left_name); ?></div>
                <?php else: ?>
                    <div></div>
                <?php endif; ?>
            </div>
            <div class="col-md-12 m-t-20">

                <a href="<?php echo e(url('leadcall/' . $lead->id )); ?>" class="btn btn-primary call-summary">
                    <i class="fa fa-phone"></i> <b><?php echo e($lead->calls()->count()); ?></b> <?php echo e(trans("table.calls")); ?>

                </a>
                <?php if($lead->priority != 'Converted'): ?>
                    <a href="<?php echo e(url('event/create/'. $lead->id)); ?>" class="btn btn-primary call-summary">
                        <i class="fa fa-handshake-o"></i> <?php echo e(trans("table.convert_to_event")); ?>

                    </a>
                <?php endif; ?>
            </div>

        </div>
        </div>

        <div class="form_box">
        <div class="row form-panel">
            <h4><?php echo e(trans('lead.event_details')); ?></h4>
            <div class="col-sm-6 col-lg-3">
                <?php echo Form::label('event_type', trans('lead.event_type'), ['class' => 'control-label']); ?>

                <?php if($lead->eventTypeTrashed): ?>
                    <div><?php echo e($lead->eventTypeTrashed->name); ?></div>
                <?php else: ?>
                    <div></div>
                <?php endif; ?>
            </div>
            <div class="col-sm-6 col-lg-3">
                <?php echo Form::label('location', trans('event.location'), ['class' => 'control-label', 'placeholder'=>'select']); ?>

                <?php if($lead->locationTrashed): ?>
                    <div><?php echo e($lead->locationTrashed->name); ?></div>
                <?php else: ?>
                    <div></div>
                <?php endif; ?>
            </div>
            <div class="col-sm-6 col-lg-3">
                <?php echo Form::label('eventDate', trans('event.eventDate'), ['class' => 'control-label', 'placeholder'=>'select']); ?>

                <div><?php echo e($lead->event_date); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <?php echo Form::label('start_time', trans('lead.start_time'), ['class' => 'control-label', 'placeholder'=>'select']); ?>

                <div><?php echo e($lead->start_time); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <?php echo Form::label('end_date', trans('event.end_date'), ['class' => 'control-label', 'placeholder'=>'select']); ?>

                <div><?php echo e($lead->event_end_date); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <?php echo Form::label('end_time', trans('lead.end_time'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->end_time); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <?php echo Form::label('expectedGuests', trans('event.expectedGuests'), ['class' => 'control-label', 'placeholder'=>'select']); ?>

                <div>Veg <?php echo e($lead->expected_guests_veg); ?></div>
                <div>Non Veg <?php echo e($lead->expected_guests_non_veg); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <?php echo Form::label('budget', trans('event.budget'), ['class' => 'control-label', 'placeholder'=>'select']); ?>

                <div><?php echo e($lead->budget); ?></div>
            </div>
            <div class="col-md-8 m-t-20">
                <?php echo Form::label('additionl_info', trans('lead.additionl_info'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->additionl_info); ?></div>
            </div>
        </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="controls">
                        <?php if($action == 'show'): ?>
                            <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                        class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                        <?php else: ?>
                            <button type="submit" class="btn btn-warning right-margin"><i
                                        class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?></button>
                            <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                        class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>