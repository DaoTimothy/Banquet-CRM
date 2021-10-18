<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <?php if($user_data->hasAccess(['event.write']) || $user_data->inRole('admin')): ?>
            <div class="pull-right">
                <a href="#" class="btn btn-primary">
                    <i class="icon-deletecolor"></i> <?php echo e(trans('Delete List')); ?></a>
                <a href="<?php echo e($type.'/create'); ?>" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('New Event')); ?></a>
            </div>
        <?php endif; ?>
    </div>
    <div class="panel panel-default">   
        <div class="panel-heading">
            <span class="nav-icon"></span>
            <h4 class="panel-title">
                <i class="material-icons">star</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right">
                <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('Event Name')); ?></th>
                        <th><?php echo e(trans('Event')); ?></th>
                        <th><?php echo e(trans('Event Planners')); ?></th>
                        <th><?php echo e(trans('Date')); ?></th>
                        <th><?php echo e(trans('Time')); ?></th>
                        <th><?php echo e(trans('Room')); ?></th>
                        <th><?php echo e(trans('Venue')); ?></th>
                        <th><?php echo e(trans('Contact')); ?></th>
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