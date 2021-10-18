<?php $__env->startSection('content'); ?>
    <div class="panel panel-primary">
        <div class="panel-body">
            <?php echo Form::model($user_data, array('url' => url('account/'.$user_data->id), 'method' => 'put', 'files'=> true)); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('user_avatar_file') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('user_avatar_file', trans('profile.avatar'), array('class' => 'control-label')); ?>

                        <div class="controls row" v-image-preview>
                            <div class="col-sm-12">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail form_Blade" data-trigger="fileinput">
                                        <img id="image-preview" width="300">
                                        <?php if(isset($user_data->user_avatar)): ?>
                                            <img src="<?php echo e(url('uploads/avatar/thumb_'.$user_data->user_avatar)); ?>" alt="User Image">
                                        <?php endif; ?>
                                    </div>
                                    <div>
                        <span class="btn btn-default btn-file"><span
                                    class="fileinput-new"><?php echo e(trans('dashboard.select_image')); ?></span>
                            <span class="fileinput-exists"><?php echo e(trans('dashboard.change')); ?></span>
                            <input type="file" name="user_avatar_file"></span>
                                        <a href="#" class="btn btn-default fileinput-exists"
                                           data-dismiss="fileinput"><?php echo e(trans('dashboard.remove')); ?></a>
                                    </div>
                                </div>
                                <span class="help-block"><?php echo e($errors->first('user_avatar_file', ':message')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('first_name', trans('profile.first_name'), array('class' => 'control-label required')); ?>

                        <div class="controls">
                            <?php echo Form::text('first_name', null, array('class' => 'form-control')); ?>

                            <span class="help-block"><?php echo e($errors->first('first_name', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group required <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('last_name', trans('profile.last_name'), array('class' => 'control-label required')); ?>

                        <div class="controls">
                            <?php echo Form::text('last_name', null, array('class' => 'form-control')); ?>

                            <span class="help-block"><?php echo e($errors->first('last_name', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required <?php echo e($errors->has('phone_number') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('phone_number', trans('staff.phone_number'), array('class' => 'control-label required')); ?>

                        <div class="controls">
                            <?php echo Form::text('phone_number', null, array('class' => 'form-control','data-fv-integer' => 'true')); ?>

                            <span class="help-block"><?php echo e($errors->first('phone_number', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group required <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('email', trans('profile.email'), array('class' => 'control-label required')); ?>

                        <div class="controls">
                            <?php echo Form::text('email', null, array('class' => 'form-control')); ?>

                            <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('password', trans('profile.password'), array('class' => 'control-label')); ?>

                        <div class="controls">
                            <?php echo Form::password('password', array('class' => 'form-control')); ?>

                            <span class="help-block"><?php echo e($errors->first('password', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group required <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('password_confirmation', trans('profile.password_confirmation'), array('class' => 'control-label')); ?>

                        <div class="controls">
                            <?php echo Form::password('password_confirmation', array('class' => 'form-control')); ?>

                            <span class="help-block"><?php echo e($errors->first('password_confirmation', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <button type="submit" class="btn btn-success"><i
                                class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-warning"><i
                                class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>