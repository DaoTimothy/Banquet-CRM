<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($opportunity)): ?>
            <?php echo Form::model($opportunity, ['url' => $type . '/' . $opportunity->id, 'id' => 'opportunity','method' => 'put', 'files'=> true]); ?>


        <?php else: ?>
            <?php echo Form::open(['url' => $type, 'id' => 'opportunity', 'method' => 'post', 'files'=> true]); ?>

        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group <?php echo e($errors->has('opportunity') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('opportunity', trans('opportunity.opportunity_name'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('opportunity', null, ['class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('opportunity', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group <?php echo e($errors->has('stages') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('stages', trans('opportunity.stages'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('stages', $stages, null, ['class' => 'form-control select2']); ?>

                        <span class="help-block"><?php echo e($errors->first('stages', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('expected_revenue') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('expected_revenue', trans('opportunity.expected_revenue'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('expected_revenue', null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('expected_revenue', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('probability') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('probability', trans('opportunity.probability'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::number('probability', null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('probability', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('company_name') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('company_name', trans('company.company_name'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('company_name', $companies, null, [ 'class' => 'form-control select2']); ?>

                            <span class="help-block"><?php echo e($errors->first('company_name', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('customer_id') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('customer_id', trans('lead.agent_name'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('customer_id', isset($opportunity)?$agent_name:[], null, [ 'class' => 'form-control select2']); ?>

                            <span class="help-block"><?php echo e($errors->first('customer_id', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('sales_team_id') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('sales_team_id', trans('salesteam.sales_team_id'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('sales_team_id', $salesteams, null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('staff', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('salesteam') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('salesteam', trans('salesteam.main_staff'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('salesteam',isset($opportunity)?$main_staff:[], null, ['class' => 'form-control select2']); ?>

                            <span class="help-block"><?php echo e($errors->first('salesteam', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('next_action') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('next_action', trans('opportunity.next_action'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('next_action', null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('next_action', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('expected_closing') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('expected_closing', trans('opportunity.expected_closing'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('expected_closing', null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('expected_closing', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group <?php echo e($errors->has('additional_info') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('additional_info', trans('opportunity.additional_info'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('additional_info', null, ['class' => 'form-control resize_vertical']); ?>

                            <span class="help-block"><?php echo e($errors->first('additional_info', ':message')); ?></span>
                        </div>
                </div>
                </div>
                <div class="col-md-12">
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
                </div>
            </div>
        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
            $("#stages").select2({
                theme: 'bootstrap',
                placeholder: "Select Stage"
            });
            $("#customer_id").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('lead.agent_name')); ?>"
            });
            $("#company_name").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('company.company_name')); ?>"
            });
            $("#salesteam").select2({
                theme: 'bootstrap',
                placeholder: "<?php echo e(trans('salesteam.main_staff')); ?>"
            });
            $("#sales_team_id").select2({
                theme: 'bootstrap',
                placeholder: "<?php echo e(trans('salesteam.sales_team_id')); ?>"
            }).find("option:first").attr({
                selected:false
            });
            $("#opportunity").bootstrapValidator({
                fields: {
                    opportunity: {
                        validators: {
                            notEmpty: {
                                message: 'The opportunity name field is required.'
                            },
                            stringLength: {
                                min: 3,
                                message: 'The opportunity name must be minimum 3 characters.'
                            }
                        }
                    },
                    stages: {
                        validators: {
                            notEmpty: {
                                message: 'The stages field is required.'
                            }
                        }
                    },
                    expected_revenue: {
                        validators: {
                            notEmpty: {
                                message: 'The expected revenue field is required.'
                            },
                            regexp: {
                                regexp: /^\d{1,6}(\.\d{1,2})?$/,
                                message: 'The expected revenue contains digits only.'
                            }
                        }
                    },
                    probability: {
                        validators: {
                            notEmpty: {
                                message: 'The probability field is required.'
                            }
                        }
                    },
                    company_name: {
                        validators: {
                            notEmpty: {
                                message: 'The company name field is required.'
                            }
                        }
                    },
                    customer_id: {
                        validators: {
                            notEmpty: {
                                message: 'The agent name field is required.'
                            }
                        }
                    },
                    sales_team_id: {
                        validators: {
                            notEmpty: {
                                message: 'The sales team field is required.'
                            }
                        }
                    },
                    salesteam: {
                        validators: {
                            notEmpty: {
                                message: 'The main staff field is required.'
                            }
                        }
                    },
                    next_action: {
                        validators: {
                            notEmpty: {
                                message: 'The next action field is required.'
                            }
                        }
                    },
                    expected_closing: {
                        validators: {
                            notEmpty: {
                                message: 'The expected closing field is required.'
                            }
                        }
                    }
                }
            });
            //datepickers initialization and logic
            <?php if(isset($opportunity)): ?>
                $('#next_action').datetimepicker({
                    format: '<?php echo e(isset($jquery_date)?$jquery_date:"MMMM D,GGGG"); ?>',
                    minDate:'<?php echo e($opportunity->updated_at->toDateString()); ?>',
                    useCurrent: false,
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    }
                }).on("dp.change", function (e) {
                    $('#expected_closing').data("DateTimePicker").minDate(e.date);
                    var nextActionVal = moment($("#next_action").val(),"<?php echo e($jquery_date); ?>");
                    var expectedClosingVal= moment($("#expected_closing").val(),"<?php echo e($jquery_date); ?>");
                    var difference = expectedClosingVal.diff(nextActionVal);
                    var days = moment.duration(difference, "ms")._data.days;
                    if(days<0){
                        $("#expected_closing").val('');
                        $('#opportunity').bootstrapValidator('revalidateField', 'expected_closing');
                    }

                    $('#opportunity').bootstrapValidator('revalidateField', 'next_action');
                });
                $('#expected_closing').datetimepicker({
                    format: '<?php echo e(isset($jquery_date)?$jquery_date:"MMMM D,GGGG"); ?>',
                    minDate:'<?php echo e($opportunity->updated_at->toDateString()); ?>',
                    useCurrent: false,
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    }
                }).on("dp.change", function (e) {
                    $('#next_action').data("DateTimePicker").maxDate(e.date);
                    $('#opportunity').bootstrapValidator('revalidateField', 'expected_closing');
                });
            <?php else: ?>
                $('#next_action').datetimepicker({
                    format: '<?php echo e(isset($jquery_date)?$jquery_date:"MMMM D,GGGG"); ?>',
                    useCurrent: false,
                    minDate:moment(),
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    }
                }).on("dp.change", function (e) {
                    $('#expected_closing').data("DateTimePicker").minDate(e.date);
                    $('#opportunity').bootstrapValidator('revalidateField', 'next_action');
                });
                $('#expected_closing').datetimepicker({
                    format: '<?php echo e(isset($jquery_date)?$jquery_date:"MMMM D,GGGG"); ?>',
                    useCurrent: false,
                    minDate:moment(),
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    }
                }).on("dp.change", function (e) {
                    $('#next_action').data("DateTimePicker").maxDate(e.date);
                    $('#opportunity').bootstrapValidator('revalidateField', 'expected_closing');
                });
            <?php endif; ?>
        });
        //Stages Select
        $(function () {
            $('#stages').change(function () {
                var stage = $(this).val();
                if (stage == 'New' ) {
                    $('#probability').val(0);
                }
                if (stage == 'Qualification') {
                    $('#probability').val(20);
                }
                if (stage == 'Proposition') {
                    $('#probability').val(40);
                }
                if (stage == 'Negotiation') {
                    $('#probability').val(60);
                }
                $('#opportunity').bootstrapValidator('revalidateField', 'probability');
            });
        });

        $("#company_name").change(function(){
            $('#opportunity').bootstrapValidator('revalidateField', 'customer_id');
            agentList($(this).val());
        });
        <?php if(old('customer_id')): ?>
        agentList(<?php echo e(old('customer_id')); ?>);
        <?php endif; ?>
        function agentList(id){
            $.ajax({
                type: "GET",
                url: '<?php echo e(url('opportunity/ajax_agent_list')); ?>',
                data: {'id': id, _token: '<?php echo e(csrf_token()); ?>' },
                success: function (data) {
                    $("#customer_id").empty();
                    $.each(data, function (val, text) {
                        $('#customer_id').append($('<option></option>').val(val).html(text).attr('selected', val == "<?php echo e(old('customer_id')); ?>" ? true : false));
                    });
                    $("#customer_id").append('<option value="" selected><?php echo e(trans('lead.agent_name')); ?></option>');
                }
            });
        }

        $("#sales_team_id").change(function(){
            ajaxMainStaffList($(this).val());
        });
        <?php if(old('salesteam')): ?>
        ajaxMainStaffList(<?php echo e(old('salesteam')); ?>);
        <?php endif; ?>
        function ajaxMainStaffList(id){
            $.ajax({
                type: "GET",
                url: '<?php echo e(url('opportunity/ajax_main_staff_list')); ?>',
                data: {'id': id, _token: '<?php echo e(csrf_token()); ?>' },
                success: function (data) {
                    $("#salesteam").empty();
                    var teamLeader;
                    $.each(data.main_staff, function (val, text) {
                        teamLeader =data.team_leader;
                        $('#salesteam').append($('<option></option>').val(val).html(text));
                    });
                    $("#salesteam").find("option[value='"+teamLeader+"']").attr('selected',true);
                    $('#opportunity').bootstrapValidator('revalidateField', 'salesteam');
                }
            });
        }

    </script>
<?php $__env->stopSection(); ?>
