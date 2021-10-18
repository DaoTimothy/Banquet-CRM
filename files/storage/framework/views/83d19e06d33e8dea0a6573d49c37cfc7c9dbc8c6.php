<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($call)): ?>
            <?php echo Form::model($call, ['url' => $type . '/' . $call->id, 'id'=>'call', 'method' => 'put', 'files'=> true]); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type, 'id'=>'call', 'method' => 'post', 'files'=> true]); ?>

        <?php endif; ?>
        <div class="row">
            <div class="col-md-3">
                <?php if(Request::is('call/create')): ?>
                    <div class="form-group <?php echo e($errors->has('company_id') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('company_id', trans('call.company'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('company_id', $companies, null, ['id'=>'company_name', 'class' => 'form-control select2']); ?>

                            <span class="help-block"><?php echo e($errors->first('company_id', ':message')); ?></span>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(isset($call)): ?>
                    <?php if(is_int($call->company_id) && $call->company_id>0): ?>
                        <div class="form-group <?php echo e($errors->has('company_id') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('company_id', trans('call.company'), ['class' => 'control-label required']); ?>

                            <div class="controls">
                                <?php echo Form::select('company_id', $companies, null, ['id'=>'company_name', 'class' => 'form-control select2']); ?>

                                <span class="help-block"><?php echo e($errors->first('company_id', ':message')); ?></span>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="form-group <?php echo e($errors->has('company_name') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('company_name', trans('call.company'), ['class' => 'control-label']); ?>

                            <div class="controls">
                                <?php echo Form::text('company_name', $call->company_name, ['class' => 'form-control', 'readonly'=>'readonly']); ?>

                                <span class="help-block"><?php echo e($errors->first('company_name', ':message')); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('date') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('date', trans('call.date'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('date', isset($call)?null:date('d.m.Y.',strtotime("now")), ['class' => 'form-control date']); ?>

                        <span class="help-block"><?php echo e($errors->first('date', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('duration') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('duration', trans('call.duration'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::input('number','duration',null, ['class' => 'form-control', 'min'=>'1']); ?>

                        <span class="help-block"><?php echo e($errors->first('duration', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group <?php echo e($errors->has('resp_staff_id') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('resp_staff_id', trans('salesteam.main_staff'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('resp_staff_id', $staffs, null, ['id'=>'resp_staff_id', 'class' => 'form-control select2']); ?>

                        <span class="help-block"><?php echo e($errors->first('resp_staff_id', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group <?php echo e($errors->has('call_summary') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('call_summary', trans('call.summary'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('call_summary', null, ['class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('call_summary', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?>

                </button>
                <a href="<?php echo e(route($type.'.index')); ?>" class="btn btn-warning"><i
                            class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
            </div>
        </div>
        <!-- ./ form actions -->

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {
            $("#company_name").select2({
                theme: "bootstrap",
                placeholder: "<?php echo e(trans('call.company')); ?>"
            });
            $("#resp_staff_id").select2({
                theme: "bootstrap",
                placeholder: "<?php echo e(trans('salesteam.main_staff')); ?>"
            });
            $("#call").bootstrapValidator({
                fields: {
                    company_id: {
                        validators: {
                            notEmpty: {
                                message: 'The company field is required.'
                            }
                        }
                    },
                    date: {
                        validators: {
                            notEmpty: {
                                message: 'The date field is required.'
                            }
                        }
                    },
                    duration: {
                        validators: {
                            notEmpty: {
                                message: 'The duration field is required.'
                            }
                        }
                    },
                    call_summary: {
                        validators: {
                            notEmpty: {
                                message: 'The call summary field is required.'
                            }
                        }
                    },
                    resp_staff_id: {
                        validators: {
                            notEmpty: {
                                message: 'The main staff field is required.'
                            }
                        }
                    }
                }
            });
            $("#date").on("dp.change", function () {
                $('#call').bootstrapValidator('revalidateField', 'date');
            })
        });
    </script>
<?php $__env->stopSection(); ?>