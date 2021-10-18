<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($salesteam)): ?>
            <?php echo Form::model($salesteam, ['url' => $type . '/' . $salesteam->id, 'method' => 'put', 'files'=> true, 'id'=>'sales_team']); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type, 'method' => 'post', 'files'=> true, 'id'=>'sales_team']); ?>

        <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required <?php echo e($errors->has('salesteam') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('salesteam', trans('salesteam.salesteam'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('salesteam', null, ['class' => 'form-control', 'placeholder'=>'Sales team']); ?>

                            <span class="help-block"><?php echo e($errors->first('salesteam', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required <?php echo e($errors->has('team_leader') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('team_leader', trans('salesteam.banquet_manager'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('team_leader', $staffs, null, ['id'=>'team_leader', 'class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('team_leader', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group required <?php echo e($errors->has('team_members') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('team_members', trans('salesteam.staff_members'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('team_members[]', $staffs, isset($salesteam_stafs)?$salesteam_stafs:null, ['id'=>'team_members', 'multiple'=>'multiple', 'class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('team_members', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required <?php echo e($errors->has('invoice_target') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('invoice_target', trans('salesteam.invoice_target'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('invoice_target', null, ['class' => 'form-control', 'placeholder'=>'Invoice Target']); ?>

                            <span class="help-block"><?php echo e($errors->first('invoice_target', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group required <?php echo e($errors->has('commision') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('commision', trans('salesteam.commision'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('commision', null, ['class' => 'form-control', 'placeholder'=>'Commision in %']); ?>

                            <span class="help-block"><?php echo e($errors->first('commision', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group required <?php echo e($errors->has('notes') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('notes', trans('salesteam.notes'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::textarea('notes', null, ['class' => 'form-control resize_vertical','placeholder'=>'About Team']); ?>

                        <span class="help-block"><?php echo e($errors->first('notes', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?>

                        </button>
                        <a href="<?php echo e(route($type.'.index')); ?>" class="btn btn-warning"><i
                                    class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ form actions -->



        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {
            $('.icheck').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            function MainStaffChange(){
                $("#team_leader").select2({
                    placeholder:"<?php echo e(trans('salesteam.main_staff')); ?>",
                    theme: 'bootstrap'
                }).on("change",function(){
                    var MainStaff=$(this).select2("val");
                    var staffMembers=$("#team_members").find("option[value='"+MainStaff+"']").val();
                    $("#team_members").find("option").prop('disabled',false);
                    $("#team_members").find("option").attr('selected',false);
                    $("#team_members").select2({
                        placeholder:"<?php echo e(trans('salesteam.staff_members')); ?>",
                        theme: 'bootstrap'
                    });
                    if(MainStaff=staffMembers){
                        $("#team_members").find("option[value='"+MainStaff+"']").prop('disabled',true);
                    }
                });
            }
            MainStaffChange();
            $("#team_members").select2({
                placeholder:"<?php echo e(trans('salesteam.staff_members')); ?>",
                theme: 'bootstrap'
            }).find("option:first").attr({
                selected:false
            });
            var MainStaff=$("#team_leader").select2("val");
            var staffMembers=$("#team_members").find("option[value='"+MainStaff+"']").val();
            if(MainStaff=staffMembers){
                $("#team_members").find("option[value='"+MainStaff+"']").prop('disabled',true);
            }

//            Form validations
            $("#sales_team").bootstrapValidator({
                fields: {
                    salesteam: {
                        validators: {
                            notEmpty: {
                                message: 'The salesteam field is required.'
                            },
                            stringLength: {
                                min: 3,
                                message: 'The salesteam must be minimum 3 characters.'
                            }
                        }
                    },
                    team_leader: {
                        validators: {
                            notEmpty: {
                                message: 'The main staff field is required.'
                            }
                        }
                    },
                    "team_members[]": {
                        validators: {
                            notEmpty: {
                                message: 'The staff members field is required.'
                            }
                        }
                    },
                    invoice_target: {
                        validators: {
                            notEmpty: {
                                message: 'The invoice target field is required.'
                            },
                            regexp: {
                                regexp: /^\d{1,11}(\.\d{1,2})?$/,
                                message: 'Invoice target is not valid and contains numbers only.'
                            }
                        }
                    },
                    commision: {
                        validators: {
                            notEmpty: {
                                message: 'The commision target field is required.'
                            },
                            regexp: {
                                regexp: /^\d{1,11}(\.\d{1,2})?$/,
                                message: 'Commision is not valid and contains numbers only.'
                            }
                        }
                    }
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>