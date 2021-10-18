<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('option.category')); ?></label>
                    <div class="controls">
                        <?php if(isset($option)): ?>
                            <?php echo e($option->category); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('option.title')); ?></label>
                    <div class="controls">
                        <?php if(isset($option)): ?>
                            <?php echo e($option->title); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('option.value')); ?></label>
                    <div class="controls">
                        <?php if(isset($option)): ?>
                            <?php echo e($option->value); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="controls">
                <?php if(@$action == 'show'): ?>
                    <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php else: ?>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?></button>
                    <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>