<div class="panel panel-primary">
    <div class="panel-body">

        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo e(url('leadcall/' . $lead->id )); ?>" class="btn btn-primary call-summary">
                    <i class="fa fa-phone"></i> <b><?php echo e($lead->calls()->count()); ?></b> <?php echo e(trans("table.calls")); ?>

                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 m-t-20">
                <?php echo Form::label('company_name', trans('lead.company_name'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->company_name); ?></div>
            </div>
            <div class="col-sm-4 m-t-20">
                <?php echo Form::label('function', trans('Function Type'), ['class' => 'control-label', 'placeholder'=>'select']); ?>

                <div><?php echo e($lead->function); ?></div>
            </div>
            <div class="col-sm-4 m-t-20">
                <?php echo Form::label('product_name', trans('lead.product_name'), ['class' => 'control-label' ]); ?>

                <div><?php echo e($lead->product_name); ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 m-t-20">
                <?php echo Form::label('additionl_info', trans('lead.additionl_info'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->additionl_info); ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 m-t-30">
                <h4><?php echo e(trans('lead.personalInfo')); ?></h4>
            </div>
            <div class="col-sm-6 col-lg-3 m-t-20">
                <?php echo Form::label('client_name', trans('lead.agent_name'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->title.' '.$lead->client_name); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3 m-t-20">
                <?php echo Form::label('country_id', trans('lead.country'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->country->name); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3 m-t-20">
                <?php echo Form::label('state_id', trans('lead.state'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->state->name); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3 m-t-20">
                <?php echo Form::label('city_id', trans('lead.city'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->city->name); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3 m-t-20">
                <?php echo Form::label('phone', trans('lead.phone'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->phone); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3 m-t-20">
                <?php echo Form::label('mobile', trans('lead.mobile'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->mobile); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3 m-t-20">
                <?php echo Form::label('email', trans('lead.email'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->email); ?></div>
            </div>
            <div class="col-sm-6 col-lg-3 m-t-20">
                <?php echo Form::label('priority', trans('lead.priority'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->priority); ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 m-t-20">
                <?php echo Form::label('address', trans('lead.address'), ['class' => 'control-label']); ?>

                <div><?php echo e($lead->address); ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 margin-top">
                <div class="form-group">
                    <div class="controls">
                        <?php if($action == 'show'): ?>
                            <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                        class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                        <?php else: ?>
                            <button type="submit" class="btn btn-danger"><i
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