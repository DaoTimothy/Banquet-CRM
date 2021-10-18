<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($category)): ?>
            <?php echo Form::model($category, ['url' => $type . '/' . $category->id, 'method' => 'put', 'files'=> true, 'id'=>'category']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type, 'method' => 'post', 'files'=> true, 'id'=>'category']); ?>

        <?php endif; ?>
        <div class="form-group required <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
            <?php echo Form::label('name', trans('category.name'), ['class' => 'control-label required']); ?>

            <div class="controls">
                <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

                <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                <a href="<?php echo e(route($type.'.index')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
            </div>
        </div>
        <!-- ./ form actions -->

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
            $("#category").bootstrapValidator({
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'The Category name field is required'
                            },
                            stringLength: {
                                min: 3,
                                message: 'The Category name must be minimum 3 characters.'
                            }
                        }
                    }
                }
            });
        });
    </script>
    <?php $__env->stopSection(); ?>
