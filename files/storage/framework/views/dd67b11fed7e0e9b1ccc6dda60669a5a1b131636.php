<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">blur_on</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right">
                <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <div class="contact_list_box">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="width: 100px;"><img class="contact_img" src="<?php echo e($contact->company_avatar != '' ? url('uploads/avatar/'.$contact->company_avatar) : url('uploads/avatar/user.png')); ?>"></td>
                            <td><?php echo e($contact->first_name); ?> <?php echo e($contact->last_name); ?></td>
                            <td><?php echo e($contact->website); ?></td>
                            <td><?php echo e($contact->mobile); ?></td>
                            <td><?php echo e(($contact->company) ? $contact->company->name : 'Personal'); ?></td>
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>