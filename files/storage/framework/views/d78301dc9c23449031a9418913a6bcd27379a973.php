<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        
            
            
                
                
        
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">archive</i>
                <?php echo e($title); ?>

            </h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                </span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        
                        
                        <th><?php echo e(trans('event.eventname')); ?></th>
                        <th><?php echo e(trans('invoices_payment_log.payment_method')); ?></th>
                        <th><?php echo e(trans('invoices_payment_log.payment_date')); ?></th>
                        
                        
                        <th><?php echo e(trans('table.actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>