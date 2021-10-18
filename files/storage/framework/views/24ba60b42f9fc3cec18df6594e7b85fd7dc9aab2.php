<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/bootstrap-tagsinput.css')); ?>" rel="stylesheet">
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-primary">
        <div class="panel-body">
            <?php echo Form::open(['url' => $type.'/invite', 'method' => 'post', 'files'=> true]); ?>

            <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                <?php echo Form::label('email', trans('staff.emails'), ['class' => 'control-label']); ?>

                <div class="controls">
                    <?php echo Form::text('emails', null, ['class' => 'form-control','data-role'=>'tagsinput']); ?>

                    <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <button type="submit" class="btn btn-success"><i
                                class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                    <a href="<?php echo e(route($type.'.index')); ?>" class="btn btn-warning"><i
                                class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                </div>
            </div>
            <?php echo Form::close(); ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                    <table id="invite_staff" class="table table-striped table-bordered dataTable no-footer">
                        <thead>
                            <th><?php echo e(trans('staff.email')); ?></th>
                            <th><?php echo e(trans('staff.send_invitation')); ?></th>
                            <th><?php echo e(trans('staff.accept_invitation')); ?></th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $user_data->invite; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->email); ?></td>
                                    <td><?php echo e($item->created_at->format($date_format)); ?></td>
                                    <td><?php echo e($item->claimed_at); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/bootstrap-tagsinput.js')); ?>"></script>
    <script>
        $('#invite_staff').DataTable({
            "pagination": true
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>