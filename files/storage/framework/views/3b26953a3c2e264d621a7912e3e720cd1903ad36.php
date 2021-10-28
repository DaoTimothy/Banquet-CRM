<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('meeting.meeting_subject')); ?></label>
                    <div class="controls">
                        <?php echo e($meeting->meeting_subject); ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('salesteam.main_staff')); ?></label>
                    <div class="controls">
                        <?php echo e(isset($meeting->responsible->full_name)?$meeting->responsible->full_name:null); ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('meeting.company_attendees')); ?></label>
                    <div class="controls">
                        <?php if(isset($meeting)): ?>
                            <?php $__currentLoopData = explode(',',$meeting->company_attendees); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company_attendees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($user->where('id',$company_attendees)->first()->full_name); ?>

                                <?php if(!@$loop->last): ?>
                                    ,
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('meeting.staff_attendees')); ?></label>
                    <div class="controls">
                        <?php if(isset($meeting)): ?>
                            <?php $__currentLoopData = explode(',',$meeting->staff_attendees); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff_attendees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($user->where('id',$staff_attendees)->first()->full_name); ?>

                                <?php if(!@$loop->last): ?>
                                    ,
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('meeting.starting_date')); ?></label>
                    <div class="controls">
                        <?php echo e($meeting->starting_date); ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('meeting.ending_date')); ?></label>
                    <div class="controls">
                        <?php echo e($meeting->ending_date); ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('meeting.location')); ?></label>
                    <div class="controls">
                        <?php echo e($meeting->location); ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('meeting.privacy')); ?></label>
                    <div class="controls">
                        <?php echo e($meeting->privacy); ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('meeting.show_time_as')); ?></label>
                    <div class="controls">
                        <?php echo e($meeting->show_time_as); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('meeting.meeting_description')); ?></label>
                    <div class="controls">
                        <?php echo e($meeting->meeting_description); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="controls">
                <?php if(@$action == 'show'): ?>
                    <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php else: ?>
                    <button type="submit" class="btn btn-warning right-margin"><i class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?></button>
                    <button href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>