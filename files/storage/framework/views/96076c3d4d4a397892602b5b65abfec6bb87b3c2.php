<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($meeting)): ?>
            <?php echo Form::model($meeting, ['url' => $type . '/' . $opportunity->id. '/' . $meeting->id, 'id' => 'opportunity_meeting', 'method' => 'put', 'files'=> true]); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type. '/' . $opportunity->id, 'id' => 'opportunity_meeting', 'method' => 'post', 'files'=> true]); ?>

        <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group <?php echo e($errors->has('meeting_subject') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('meeting_subject', trans('meeting.meeting_subject'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('meeting_subject', null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('meeting_subject', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group <?php echo e($errors->has('company_attendees') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('company_attendees', trans('meeting.company_attendees'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('company_attendees[]', $company_customer, (isset($meeting)?$company_attendees:null), ['id'=>'attendees','multiple'=>'multiple', 'class' => 'form-control select2']); ?>

                            <span class="help-block"><?php echo e($errors->first('company_attendees', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('responsible_id') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('responsible_id', trans('salesteam.main_staff'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('responsible_id', $main_staff, null, ['id'=>'responsible_id', 'class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('responsible_id', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('staff_attendees') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('staff_attendees', trans('meeting.staff_attendees'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::select('staff_attendees[]', $main_staff, (isset($meeting)?$staff_attendees:null), ['id'=>'staff_attendees','multiple'=>'multiple', 'class' => 'form-control select2']); ?>

                            <span class="help-block"><?php echo e($errors->first('staff_attendees', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('starting_date') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('starting_date', trans('meeting.starting_date'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('starting_date', null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('starting_date', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('ending_date') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('ending_date', trans('meeting.ending_date'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('ending_date', null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('ending_date', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group <?php echo e($errors->has('location') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('location', trans('meeting.location'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('location', null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('location', ':message')); ?></span>
                        </div>
                    </div>
                    <div class="form-group <?php echo e($errors->has('meeting_description') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('meeting_description', trans('meeting.meeting_description'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::textarea('meeting_description', null, ['class' => 'form-control resize_vertical']); ?>

                            <span class="help-block"><?php echo e($errors->first('meeting_description', ':message')); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="icheckblue" id="all_day" value="1" name="all_day"
                                   <?php if(isset($meeting) && $meeting->all_day==1): ?>checked <?php endif; ?>><i
                                    class="primary"></i> <?php echo e(trans('meeting.all_day')); ?>

                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('privacy') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('privacy', trans('meeting.privacy'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::select('privacy', $privacy, null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('privacy', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group <?php echo e($errors->has('show_time_as') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('show_time_as', trans('meeting.show_time_as'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::select('show_time_as', $show_times, null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('show_time_as', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Form Actions -->
                    <div class="form-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                            <a href="<?php echo e(url($type.'/'.$opportunity->id)); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
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
            $("#privacy").select2({
                theme:'bootstrap'
            });
            $("#show_time_as").select2({
                theme:'bootstrap'
            });
            function MainStaffChange(){
                <?php if(!isset($meeting)): ?>
                var teamLeader='<?php echo e($opportunity->salesteam); ?>';
                $("#responsible_id").find("option[value='"+teamLeader+"']").attr('selected',true);
                $("#responsible_id").find("option[value!='"+teamLeader+"']").attr('selected',false);
                        <?php endif; ?>
                $("#responsible_id").select2({
                    placeholder:"<?php echo e(trans('salesteam.main_staff')); ?>",
                    theme: 'bootstrap'
                }).on("change",function(){
                    var MainStaff=$(this).select2("val");
                    var staffMembers=$("#staff_attendees").find("option[value='"+MainStaff+"']").val();
                    $("#staff_attendees").find("option").prop('disabled',false);
                    $("#staff_attendees").find("option").attr('selected',false);
                    $("#staff_attendees").select2({
                        placeholder:"<?php echo e(trans('salesteam.staff_members')); ?>",
                        theme: 'bootstrap'
                    });
                    if(MainStaff=staffMembers){
                        $("#staff_attendees").find("option[value='"+MainStaff+"']").prop('disabled',true);
                    }
                });
            }
            MainStaffChange();
            $("#staff_attendees").select2({
                placeholder:"<?php echo e(trans('salesteam.staff_members')); ?>",
                theme: 'bootstrap'
            }).find("option:first").attr({
                selected:false
            });
            var MainStaff=$("#responsible_id").select2("val");
            var staffMembers=$("#staff_attendees").find("option[value='"+MainStaff+"']").val();
            if(MainStaff=staffMembers){
                $("#staff_attendees").find("option[value='"+MainStaff+"']").prop('disabled',true);
            }

            <?php if(isset($meeting)): ?>
            if($(".icheckbox_minimal-blue").hasClass('checked')){
                $("#show_time_as").find("option:contains('Free')").remove();
            }
            <?php endif; ?>
            $('#all_day').on('ifChecked', function(event){
                $("#show_time_as").find("option:contains('Busy')").attr('selected',true);
                $("#show_time_as").find("option:contains('Free')").remove();
            });
            $('#all_day').on('ifUnchecked', function(event){
                $("#show_time_as").prepend('<option value="Free" selected><?php echo e(trans("Free")); ?></option>');
                $("#show_time_as").find("option:contains('Busy')").attr('selected',false);
            });
            <?php if(isset($meeting)): ?>
            $('#starting_date').datetimepicker({
                format: '<?php echo e(isset($jquery_date_time)?$jquery_date_time:"MMMM D,GGGG H:mm"); ?>',
                useCurrent: false,
                minDate:'<?php echo e($meeting->updated_at); ?>',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            }).on("dp.change", function (e) {
                $('#ending_date').data("DateTimePicker").minDate(e.date);
                var nextActionVal = moment($("#starting_date").val(),"<?php echo e($jquery_date_time); ?>");
                var expectedClosingVal= moment($("#ending_date").val(),"<?php echo e($jquery_date_time); ?>");
                var difference = expectedClosingVal.diff(nextActionVal);
                var days = moment.duration(difference, "ms")._data.minutes;
                if(days<0){
                    $("#ending_date").val('');
                    $('#opportunity_meeting').bootstrapValidator('revalidateField', 'ending_date');
                }
                $('#opportunity_meeting').bootstrapValidator('revalidateField', 'starting_date');
            });
            $('#ending_date').datetimepicker({
                minDate:'<?php echo e($meeting->updated_at); ?>',
                format: '<?php echo e(isset($jquery_date_time)?$jquery_date_time:"MMMM D,GGGG H:mm"); ?>',
                useCurrent: false,
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            }).on("dp.change", function (e) {
                $('#starting_date').data("DateTimePicker").maxDate(e.date);
                $('#opportunity_meeting').bootstrapValidator('revalidateField', 'ending_date');
            });
            <?php else: ?>
            $('#starting_date').datetimepicker({
                format: '<?php echo e(isset($jquery_date_time)?$jquery_date_time:"MMMM D,GGGG H:mm"); ?>',
                useCurrent: false,
                minDate:moment(),
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            }).on("dp.change", function (e) {
                $('#ending_date').data("DateTimePicker").minDate(e.date);
                $('#opportunity_meeting').bootstrapValidator('revalidateField', 'starting_date');

            });
            $('#ending_date').datetimepicker({
                useCurrent: false,
                minDate:moment(),
                format: '<?php echo e(isset($jquery_date_time)?$jquery_date_time:"MMMM D,GGGG H:mm"); ?>',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            }).on("dp.change", function (e) {
                $('#starting_date').data("DateTimePicker").maxDate(e.date);
                $('#opportunity_meeting').bootstrapValidator('revalidateField', 'ending_date');
            });
            <?php endif; ?>

            $("#opportunity_meeting").bootstrapValidator({
                fields: {
                    meeting_subject: {
                        validators: {
                            notEmpty: {
                                message: 'The meeting subject field is required.'
                            }
                        }
                    },
                    responsible_id: {
                        validators: {
                            notEmpty: {
                                message: 'The main staff field is required.'
                            }
                        }
                    },
                    'company_attendees[]': {
                        validators: {
                            notEmpty: {
                                message: 'The company attendees field is required.'
                            }
                        }
                    },
                    starting_date: {
                        validators: {
                            notEmpty: {
                                message: 'The starting date field is required.'
                            }
                        }
                    },
                    ending_date: {
                        validators: {
                            notEmpty: {
                                message: 'The ending date field is required.'
                            }
                        }
                    },
                    location: {
                        validators: {
                            notEmpty: {
                                message: 'The location field is required.'
                            }
                        }
                    }
                }
            });
            $('.icheckblue').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
        });
    </script>
<?php $__env->stopSection(); ?>
