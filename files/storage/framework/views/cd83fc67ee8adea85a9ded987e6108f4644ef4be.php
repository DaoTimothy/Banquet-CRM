<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="calendar">
        <div class="page-header clearfix">
            <div class="pull-right">
                <?php if($user_data->hasAccess(['meetings.read']) || $user_data->hasAccess(['opportunities.read'])  || $user_data->inRole('admin')): ?>
                    <a href="<?php echo e(url($type.'/'.$opportunity->id)); ?>" class="btn btn-success">
                        <i class="fa fa-list"></i> <?php echo e(trans('opportunity.lists')); ?></a>
                <?php endif; ?>
                <?php if($user_data->hasAccess(['meetings.write']) || $user_data->hasAccess(['opportunities.write'])  || $user_data->inRole('admin')): ?>
                    <a href="<?php echo e(url($type.'/'.$opportunity->id.'/create')); ?>" class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i> <?php echo e(trans('meeting.create_meeting')); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div id="calendar"></div>
        <div id="fullCalModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                            <span class="sr-only">close</span></button>
                        <h4 id="modalTitle" class="modal-title"></h4>
                    </div>
                    <div id="modalBody" class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(trans('table.close')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                "header": {
                    "left": "prev,next today",
                    "center": "title",
                    "right": "month,agendaWeek,agendaDay"
                },
                "eventLimit": true,
                "firstDay": 1,
                "eventClick": function(event){
                    $('#modalTitle').html(event.title);
                    $('#modalBody').html(event.description);
                    $('#fullCalModal').modal();
                },
                "eventSources": [
                    {
                        url: "<?php echo e(url('opportunitymeeting/'.$opportunity->id.'/calendarData')); ?>",
                        type: 'POST',
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                        error: function() {
                            alert('there was an error while fetching events!');
                        }
                    }
                ]

            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>