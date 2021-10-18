<li class="dropdown messages-menu">
    <mail-notifications url="<?php echo e(url('/')); ?>" <?php echo e(Sentinel::getUser()->inRole('customer')?'prefix=/customers':'prefix='); ?>></mail-notifications>
</li>

<li class="dropdown notifications-menu">
    <notifications url="<?php echo e(url('/')); ?>"></notifications>
</li>

<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php if($user_data->user_avatar): ?>
            <img src="<?php echo url('/').'/uploads/avatar/'.$user_data->user_avatar; ?>" alt="img"
                 class="img-circle img-responsive pull-left" height="35" width="35"/>
        <?php else: ?>
            <img src="<?php echo e(url('uploads/avatar/user.png')); ?>" alt="img"
                 class="img-circle img-responsive pull-left" height="35" width="35"/>
        <?php endif; ?>
        <div class="riot">
            <div>
                <p class="user_name_max"><?php echo e($user_data->full_name); ?></p>
                <i class="fa fa-caret-down" aria-hidden="true"></i>
            </div>
        </div>
    </a>
    <ul class="dropdown-menu">

        <li class="user-name text-center">
            <p class="name_para"><?php echo e($user_data->full_name); ?></p>
        </li>
        <!-- Menu Body -->
        <li class="p-t-3">

            <a href="<?php echo e(url('profile')); ?>" class="text-primary">

                <?php echo e(trans('My Profile')); ?>

                <i class="fa fa-fw fa-user pull-right "></i>
            </a>
        </li>

    <!-- Menu Footer-->
        <li class="p-t-3">
            <a href="<?php echo e(url('logout')); ?>" class="text-danger">

                <?php echo e(trans('left_menu.logout')); ?>

                <i class="fa fa-fw fa-sign-out pull-right"></i>

            </a>
        </li>
    </ul>
</li>
