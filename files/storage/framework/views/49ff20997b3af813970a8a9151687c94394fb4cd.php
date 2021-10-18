<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($option)): ?>
            <?php echo Form::model($option, ['url' => $type . '/' . $option->id, 'method' => 'put', 'files'=> true, 'id'=>'options']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type, 'method' => 'post', 'files'=> true, 'id' => 'options']); ?>

        <?php endif; ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('category') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('type', trans('option.category'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('category', $categories, null, ['id'=>'category', 'class' => 'form-control select2']); ?>

                            <span class="help-block"><?php echo e($errors->first('category', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('title', trans('option.title'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('title', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('value') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('value', trans('option.value'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('value', null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('value', ':message')); ?></span>
                        </div>
                    </div>
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
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
            $("#category").select2({
                theme:"bootstrap",
                placeholder: "<?php echo e(trans('option.category')); ?>"
            });
            <?php if(!isset($option)): ?>
                $("#category").prepend("<option value='' selected><?php echo e(trans('option.category')); ?></option>");
            <?php endif; ?>
            $("#options").bootstrapValidator({
                fields: {
                    category: {
                        validators: {
                            notEmpty: {
                                message: 'The category field is required'
                            }
                        }
                    },
                    title:{
                        validators: {
                            notEmpty: {
                                message: 'The title field is required'
                            }
                        }
                    },
                    value:{
                        validators: {
                            notEmpty: {
                                message: 'The value field is required'
                            }
                        }
                    }
                }
            })
        });
    </script>
    <?php $__env->stopSection(); ?>