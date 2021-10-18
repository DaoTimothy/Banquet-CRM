<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">event_note</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right"><i class="fa fa-fw fa-chevron-up clickable"></i></span>
        </div>
        <div class="panel-body">
            <div class="calendar">
                <div class="calendar_box">
                    <div id="calendar"></div>
                    <div id="fullCalModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span> <span class="sr-only">close</span></button>
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
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            var date = new Date();
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
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
                        url:"<?php echo e(url('calendar/events')); ?>",
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