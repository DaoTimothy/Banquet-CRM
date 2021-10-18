<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <a href="<?php echo e(url('opportunitycall/' . $opportunity->id )); ?>" class="btn btn-primary">
                        <i class="fa fa-phone"></i>  <b><?php echo e($opportunity->calls()->count()); ?></b> <?php echo e(trans("table.calls")); ?>

                    </a>
                    <a href="<?php echo e(url('opportunitymeeting/' . $opportunity->id )); ?>" class="btn btn-primary">
                        <i class="fa fa-users"></i>  <b><?php echo e($opportunity->meetings()->count()); ?></b> <?php echo e(trans("opportunity.meetings")); ?>

                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <?php echo Form::label('product_name', trans('opportunity.opportunity_name'), ['class' => 'control-label']); ?>

                    <div>
                        <?php echo e($opportunity->opportunity); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <?php echo Form::label('stages', trans('opportunity.stages'), ['class' => 'control-label']); ?>

                    <div>
                        <?php echo e($opportunity->stages); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                <?php echo Form::label('stages', trans('opportunity.expected_revenue'), ['class' => 'control-label']); ?>

                    <div>
                        <?php echo e($opportunity->expected_revenue); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <?php echo Form::label('stages', trans('opportunity.probability'), ['class' => 'control-label']); ?>

                    <div>
                        <?php echo e($opportunity->probability); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <?php echo Form::label('stages', trans('company.company_name'), ['class' => 'control-label']); ?>

                    <div>
                        <?php echo e(isset($opportunity->companies->name)?$opportunity->companies->name:null); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <?php echo Form::label('stages', trans('lead.agent_name'), ['class' => 'control-label']); ?>

                    <div>
                        <?php echo e(isset($opportunity->customer->full_name)?$opportunity->customer->full_name:null); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <?php echo Form::label('sales_team_id', trans('salesteam.sales_team_id'), ['class' => 'control-label']); ?>

                    <div>
                        <?php echo e($opportunity->salesTeam->salesteam); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <?php echo Form::label('stages', trans('salesteam.main_staff'), ['class' => 'control-label']); ?>

                    <div>
                        <?php echo e(isset($opportunity->staffs->full_name)?$opportunity->staffs->full_name:null); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group ">
                    <?php echo Form::label('additional_info', trans('opportunity.next_action'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($opportunity->next_action); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group ">
                    <?php echo Form::label('additional_info', trans('opportunity.expected_closing'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($opportunity->expected_closing); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group ">
                    <?php echo Form::label('additional_info', trans('opportunity.additional_info'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($opportunity->additional_info); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <?php if(@$action == 'lost'): ?>
                    <?php echo Form::model($opportunity, ['url' => $type . '/' . $opportunity->id.'/opportunity_archive/', 'id' => 'opportunity_lost','method' => 'post', 'files'=> true]); ?>

                    <div class="form-group <?php echo e($errors->has('lost_reason') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('lost_reason', trans('opportunity.lost_reason'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('lost_reason', $lost_reason, null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('lost_reason', ':message')); ?></span>
                        </div>
                    </div>
                    <div class="controls">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?>

                        </button>
                        <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                    class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                    </div>
                    <?php echo Form::close(); ?>

                <?php endif; ?>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="controls">
                        <?php if(@$action == 'show'): ?>
                            <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                        class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                        <?php elseif(@$action == 'won'): ?>
                            <?php if($user_data->hasAccess(['quotations.write']) || $user_data->inRole('admin')): ?>
                                <a href="<?php echo e(url($type . '/'.$opportunity->id.'/convert_to_quotation/')); ?>"
                                   class="btn btn-primary" target=""><?php echo e(trans('opportunity.convert_to_quotation')); ?></a>
                            <?php endif; ?>
                            <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                        class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                        <?php elseif(@$action == 'lost'): ?>
                        <?php else: ?>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?>

                            </button>
                            <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                        class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
           $("#lost_reason").select2({
               theme:"bootstrap",
               placeholder:"<?php echo e(trans('opportunity.lost_reason')); ?>"
           });
            $("#opportunity_lost").bootstrapValidator({
                fields: {
                    lost_reason: {
                        validators: {
                            notEmpty: {
                                message: 'The Lost Reason field is required.'
                            }
                        }
                    }
                }
            });
        });
    </script>
    <?php $__env->stopSection(); ?>