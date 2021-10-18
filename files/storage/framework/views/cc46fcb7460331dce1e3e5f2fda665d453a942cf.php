<div class="panel panel-primary cnts">
    <div class="panel-body">
        <?php if(isset($call)): ?>
            <?php echo Form::model($call, ['url' => $type . '/' . $lead->id . '/' . $call->id, 'method' => 'put', 'id'=>'leadcall', 'files'=> true]); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type. '/' . $lead->id , 'method' => 'post', 'id'=>'leadcall', 'files'=> true]); ?>

        <?php endif; ?>
            <div class="form_box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group <?php echo e($errors->has('company_name') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('company_name', trans('call.company_name'), ['class' => 'control-label']); ?>

                            <div class="controls">
                                <?php echo Form::text('company_name', $lead->company_name, ['class' => 'form-control', 'readonly'=>'readonly']); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group <?php echo e($errors->has('date') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('date', trans('call.date'), ['class' => 'control-label required']); ?>

                            <div class="controls">
                                <?php echo Form::text('date', null, ['class' => 'form-control date']); ?>

                                <span class="help-block"><?php echo e($errors->first('date', ':message')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group <?php echo e($errors->has('call_summary') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('call_summary', trans('call.summary'), ['class' => 'control-label required']); ?>

                            <div class="controls">
                                <?php echo Form::text('call_summary', null, ['class' => 'form-control']); ?>

                                <span class="help-block"><?php echo e($errors->first('call_summary', ':message')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group <?php echo e($errors->has('duration') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('duration', trans('call.duration'), ['class' => 'control-label required']); ?>

                            <div class="controls">
                                <?php echo Form::input('number','duration',null, ['class' => 'form-control', 'min'=>'1']); ?>

                                <span class="help-block"><?php echo e($errors->first('duration', ':message')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group <?php echo e($errors->has('resp_staff_id') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('resp_staff_id', trans('salesteam.main_staff'), ['class' => 'control-label required']); ?>

                            <div class="controls">
                                <?php echo Form::select('resp_staff_id', $staffs, null, ['id'=>'resp_staff_id', 'class' => 'form-control']); ?>

                                <span class="help-block"><?php echo e($errors->first('resp_staff_id', ':message')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <button type="submit" class="btn btn-success"><?php echo e(trans('table.submit')); ?></button>
                <a href="<?php echo e(url($type.'/'.$lead->id )); ?>" class="btn btn-warning"><?php echo e(trans('table.cancel')); ?></a>
            </div>
        </div>
        <!-- ./ form actions -->

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
           $("#resp_staff_id").select2({
               theme:"bootstrap",
               placeholder:"<?php echo e(trans('salesteam.main_staff')); ?>"
           });
            $("#leadcall").bootstrapValidator({
                fields: {
                    date: {
                        validators: {
                            notEmpty: {
                                message: 'The date field is required.'
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
                    duration: {
                        validators: {
                            notEmpty: {
                                message: 'The duration field is required.'
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
            $('.date').on('dp.change',function(){
                $('#leadcall').bootstrapValidator('revalidateField', 'date');
            });
        });
    </script>
    <?php $__env->stopSection(); ?>