<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6 col-md-3 m-t-20">
                <label class="control-label" for="title"><?php echo e(trans('call.date')); ?></label>
                <div class="controls">
                    <?php if(isset($call)): ?>
                        <?php echo e($call->date); ?>

                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 m-t-20">
                <label class="control-label" for="title"><?php echo e(trans('call.summary')); ?></label>
                <div class="controls">
                    <?php if(isset($call)): ?>
                        <?php echo e($call->call_summary); ?>

                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 m-t-20">
                <label class="control-label" for="title"><?php echo e(trans('call.duration')); ?></label>
                <div class="controls">
                    <?php if(isset($call)): ?>
                        <?php echo e($call->duration); ?>

                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 m-t-20">
                <label class="control-label" for="title"><?php echo e(trans('salesteam.main_staff')); ?></label>
                <div class="controls">
                    <?php if(isset($call)): ?>
                        <?php echo e($call->resp_staff->full_name); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="form-group m-t-20">
            <div class="controls">
                <?php if(@$action == 'show'): ?>
                    <a href="<?php echo e(url($type.'/'.$lead->id)); ?>"
                       class="btn btn-primary"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.close')); ?></a>
                <?php else: ?>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?></button>
                    <a href="<?php echo e(url($type.'/'.$lead->id)); ?>"
                    class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>