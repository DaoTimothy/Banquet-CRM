<div class="panel panel-primary">
    <div class="panel-body">

        <div class="row">
            <div class="col-sm-3 col-md-12 col-lg-12">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail form_Blade" data-trigger="fileinput" style="width: 180px">
                        <?php if(isset($customer->company_avatar) && $customer->company_avatar!=""): ?>
                            <img src="<?php echo e(url('uploads/avatar/thumb_'.$customer->company_avatar)); ?>"
                                 alt="Image" class="ima-responsive" width="300">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-panel-view">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('last_name', trans('customer.full_name'), ['class' => 'control-label']); ?>

                    <div><?php echo e($customer->title.''.$customer->first_name .' '. $customer->last_name); ?></div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('email', trans('customer.email'), ['class' => 'control-label']); ?>

                    <div><?php echo e($customer->website); ?></div>
                </div>
            </div>
            <div class="col-sm-4 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('mobile', trans('customer.mobile'), ['class' => 'control-label']); ?>

                    <div><?php echo e($customer->mobile); ?></div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('additional_info', trans('customer.address'), ['class' => 'control-label']); ?>

                    <div><?php echo e($customer->address); ?></div>
                </div>
            </div>
        </div>
        <div class="row form-panel-view">
            <div class="col-sm-4 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('job_position', trans('customer.job_position'), ['class' => 'control-label']); ?>

                    <div><?php echo e($customer->job_position); ?></div>
                </div>
            </div>
            <div class="col-sm-4 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('company_id', trans('customer.company'), ['class' => 'control-label']); ?>

                    <div><?php echo e((isset($customer))?$customer->company->name:null); ?></div>
                </div>
            </div>
            <div class="col-sm-4 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('company_id', trans('customer.sales_team_id'), ['class' => 'control-label']); ?>

                    <div><?php echo e(($customer->salesTeam) ? $customer->salesTeam->salesteam : ''); ?></div>
                </div>
            </div>
        </div>
        
            
                
                    
                        
                        
                        
                        
                    
                    
                        
                            
                                
                            
                        
                        
                            
                                
                            
                        
                        
                            
                                
                            
                        
                        
                            
                                
                            
                        
                    
                
            
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="controls">
                        <?php if(@$action == 'show'): ?>
                            <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                        class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                        <?php elseif(@$action == 'lost' || @$action == 'won'): ?>
                            <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                        class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                            <button type="submit" class="btn btn-success"><i
                                        class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?>

                            </button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-warning right-margin"><i class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?> </button>
                            <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>