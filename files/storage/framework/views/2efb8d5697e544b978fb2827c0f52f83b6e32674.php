<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-lg-12 act_log">
        <div class="cnts">
            <div class="row">
                <div class="col-md-12">
                    <h4><?php echo e(trans('dashboard.actlog')); ?></h4>
                </div>
            </div>
            <div class="log_body">
                <div class="steamline">
                    <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($activities['type'] == 'event'): ?>

                            <div class="bnq-item create_event">
                                <div class="bnq-left"> <img class="img-circle" alt="user" src="<?php echo e(($activities['image'] != '') ? url('uploads/avatar/'.$activities['image']) : url('uploads/avatar/user.png')); ?>"> </div>
                                <div class="bnq-right">
                                    <div><a class="name-info new_lead" href="<?php echo e(url('staff/'.$activities['user_id'].'/show')); ?>"><?php echo e($activities['user']); ?></a> <span class="bnq-date"> <?php echo e($activities['time_diff']); ?></span></div>
                                    <?php if($activities['status'] == 'created'): ?>
                                        <p>Created Event for <b><?php echo e($activities['client']); ?></b> <?php echo e($activities['event_type']); ?></p>
                                    <?php else: ?>
                                        <p><b>Updated Event,</b> <?php echo e($activities['key']); ?> to <?php echo e($activities['new_value']); ?> for <b><?php echo e($activities['client']); ?>'s</b> <?php echo e($activities['event_type']); ?></p>
                                    <?php endif; ?>
                                    <p><b>Venue - </b> <?php echo e($activities['location']); ?></p>
                                    <?php if(Sentinel::getUser()->hasAccess(['event.read']) || Sentinel::inRole('admin')): ?>
                                        <p><a href="<?php echo e(url('event/'.$activities['id'].'/show')); ?>" class="text-info">View</a></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="bnq-item">
                                <div class="bnq-left"> <img class="img-circle" alt="user" src="<?php echo e(($activities['image'] != '') ? url('uploads/avatar/'.$activities['image']) : url('uploads/avatar/user.png')); ?>"> </div>
                                <div class="bnq-right">
                                    <div><a class="name-info new_lead" href="<?php echo e(url('staff/'.$activities['user_id'].'/show')); ?>"><?php echo e($activities['user']); ?></a> <span class="bnq-date"> <?php echo e($activities['time_diff']); ?></span></div>
                                    <?php if($activities['status'] == 'created'): ?>
                                        <p>Created new lead for <b><?php echo e($activities['client']); ?></b> <?php echo e($activities['event_type']); ?></p>
                                    <?php else: ?>
                                        <p><b>Updated Lead,</b> <?php echo e($activities['key']); ?> to <?php echo e($activities['new_value']); ?> for <b><?php echo e($activities['client']); ?>'s</b> <?php echo e($activities['event_type']); ?></p>
                                    <?php endif; ?>
                                    <?php if($activities['priority'] == 'Open'): ?>
                                        <p>
                                            <a href="#" class="text-info low">Open</a>
                                            <?php if(Sentinel::getUser()->hasAccess(['leads.read']) || Sentinel::inRole('admin')): ?>
                                                <a href="<?php echo e(url('lead/'.$activities['id'].'/show')); ?>" class="text-info">View</a>
                                            <?php endif; ?>
                                        </p>
                                    <?php elseif($activities['priority'] == 'Approached'): ?>
                                        <p>
                                            <a href="#" class="text-info high">Approached</a>
                                            <?php if(Sentinel::getUser()->hasAccess(['leads.read']) || Sentinel::inRole('admin')): ?>
                                                <a href="<?php echo e(url('lead/'.$activities['id'].'/show')); ?>" class="text-info">View</a>
                                            <?php endif; ?>
                                        </p>
                                    <?php elseif($activities['priority'] == 'Converted'): ?>
                                        <p>
                                            <a href="#" class="text-info low">Converted</a>
                                            <?php if(Sentinel::getUser()->hasAccess(['leads.read']) || Sentinel::inRole('admin')): ?>
                                                <a href="<?php echo e(url('lead/'.$activities['id'].'/show')); ?>" class="text-info">View</a>
                                            <?php endif; ?>
                                        </p>
                                    <?php else: ?>
                                        <p>
                                            <a href="#" class="text-info v_high">Do Not Contact</a>
                                            <?php if(Sentinel::getUser()->hasAccess(['leads.read']) || Sentinel::inRole('admin')): ?>
                                                <a href="<?php echo e(url('lead/'.$activities['id'].'/show')); ?>" class="text-info">View</a>
                                            <?php endif; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        </div></div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>