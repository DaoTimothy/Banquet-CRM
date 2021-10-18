<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('company.company_name')); ?></label>
                    <div class="controls">
                        <?php echo e($call->company_name); ?>

                        <?php if(isset($call)): ?>
                            <?php if(is_int($call->company_id) && $call->company_id>0): ?>
                                <?php echo e($companies[$call->company_id]); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('call.date')); ?></label>
                    <div class="controls">
                        <?php echo e($call->date); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('call.duration')); ?></label>
                    <div class="controls">
                        <?php echo e($call->duration); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('salesteam.main_staff')); ?></label>
                    <div class="controls">
                        <?php if(isset($call)): ?>
                            <?php echo e($call->responsible->full_name); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('call.call_summary')); ?></label>
                    <div class="controls">
                        <?php echo e($call->call_summary); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="controls">
                <?php if(@$action == 'show'): ?>
                    <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php else: ?>
                    <button type="submit" class="btn btn-warning right-margin"><i class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?>

                    </button>
                    <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>