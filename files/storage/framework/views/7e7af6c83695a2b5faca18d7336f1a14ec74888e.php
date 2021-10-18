<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('salesteam.salesteam')); ?></label>
                    <div class="controls">
                        <?php echo e($salesteam->salesteam); ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('salesteam.main_staff')); ?></label>
                    <div class="controls">
                        <?php echo e(is_null($salesteam->teamLeader)?"":$salesteam->teamLeader->full_name); ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('salesteam.staff_members')); ?></label>
                    <div class="controls">
                        <?php for($i = 0; $i < count($salesteam->team_members); $i++): ?>
                            <?php echo e($user->where('id',$salesteam->team_members[$i])->first()->full_name); ?>

                            <?php if($i < count($salesteam->team_members) -1): ?>
                                ,
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('salesteam.invoice_target')); ?></label>
                    <div class="controls">
                        <?php echo e($salesteam->invoice_target); ?>

                    </div>
                </div>
            </div>
            
                
                    
                    
                        
                    
                
            
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('salesteam.actual_invoice')); ?></label>
                    <div class="controls">
                        <?php echo e($salesteam->actualInvoice->sum('grand_total')); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('salesteam.notes')); ?></label>
                    <div class="controles">
                        <?php echo e($salesteam->notes); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label" for="title"><?php echo e(trans('salesteam.actual_invoices')); ?></label>
            <div class="controls">
                <ul>
                    <?php $__currentLoopData = $salesteam->actualInvoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('invoice/'.$item->id.'/show')); ?>"><?php echo e($item->invoice_number); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        
            
            
                
                    
                           
                    
                
                    
                           
                    
                
                    
                           
                    
            
        
        <div class="form-group">
            <div class="controls">
                <?php if(@$action == 'show'): ?>
                    <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php else: ?>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?></button>
                    <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="member"></div>
    </div>
</div>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {
            $('.icheck').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });

        });
    </script>
<?php $__env->stopSection(); ?>