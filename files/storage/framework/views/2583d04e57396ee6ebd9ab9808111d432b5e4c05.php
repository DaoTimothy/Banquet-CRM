<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($emailTemplate)): ?>
            <?php echo Form::model($emailTemplate, ['url' => $type . '/' . $emailTemplate->id, 'method' => 'put', 'files'=> true]); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type, 'method' => 'post', 'files'=> true]); ?>

        <?php endif; ?>
        <div class="form-group required <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
            <?php echo Form::label('title', trans('email_template.title'), ['class' => 'control-label  required']); ?>

            <div class="controls">
                <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

                <span class="help-block"><?php echo e($errors->first('title', ':message')); ?></span>
            </div>
        </div>
        <div class="form-group required <?php echo e($errors->has('text') ? 'has-error' : ''); ?>">
            <?php echo Form::label('text', trans('email_template.text'), ['class' => 'control-label required']); ?>

            <div class="controls">
                <?php echo Form::textarea('text', null, ['class' => 'form-control resize_vertical']); ?>

                <span class="help-block"><?php echo e($errors->first('text', ':message')); ?></span>
            </div>
        </div>
        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <button type="submit" class="btn btn-success"><i
                            class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                            class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
            </div>
        </div>
        <!-- ./ form actions -->

        <?php echo Form::close(); ?>

    </div>
</div>
