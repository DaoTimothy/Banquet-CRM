<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-4 col-md-2">
            <a class="thumbnail">
            <?php if(isset($user_data->user_avatar)): ?>
                <img src="<?php echo e(url('uploads/avatar/'.$user_data->user_avatar)); ?>" alt="User Image" class="img-rounded">
            <?php else: ?>
                <img src="<?php echo e(url('uploads/avatar/user.png')); ?>" alt="User Image" class="img-rounded">
            <?php endif; ?>
            </a>
        </div>
        <div class="col-sm-7 col-md-9 col-sm-offset-1">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td><b><?php echo e(trans('profile.first_name')); ?></b></td>
                        <td><a href="#"> <?php echo e($user_data->first_name); ?></a></td>
                    </tr>
                    <tr>
                        <td><b><?php echo e(trans('profile.last_name')); ?></b></td>
                        <td><a href="#"> <?php echo e($user_data->last_name); ?></a></td>
                    </tr>
                    <tr>
                        <td><b><?php echo e(trans('profile.email')); ?></b></td>
                        <td><a href="#"><?php echo e($user_data->email); ?></a></td>
                    </tr>
                    <tr>
                        <td><b><?php echo e(trans('profile.phone_number')); ?></b></td>
                        <td><a href="#"> <?php echo e($user_data->phone_number); ?></a></td>
                    </tr>
                    </tbody>
                </table>
                <a href="<?php echo e(url('account')); ?>" class="btn btn-success change-prof">
                    <i class="fa fa-pencil-square-o"></i> <?php echo e(trans('profile.change_profile')); ?></a>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>