<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">event_task</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right"><i class="fa fa-fw fa-chevron-up clickable"></i></span>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary todolist">
                        
                        <div class="panel-body">
                            <div class="todolist_list adds">
                                <?php echo Form::open(['class'=>'form', 'id'=>'main_input_box']); ?>

                                <?php echo Form::hidden('task_from_user',Sentinel::getUser()->id, ['id'=>'task_from_user']); ?>

                                <div class="form-group">
                                    <?php echo Form::label('task_description', trans('task.todo_description')); ?>

                                    <?php echo Form::text('task_description', null, ['class' => 'form-control','id'=>'task_description']); ?>

                                </div>
                                <div class="form-group">
                                    <?php echo Form::label('task_deadline', trans('task.deadline')); ?>

                                    <?php echo Form::text('task_deadline', null, ['class' => 'form-control date','id'=>'task_deadline']); ?>

                                </div>
                                <div class="form-group">
                                    <?php echo Form::label('user_id', trans('task.assignee')); ?>

                                    <?php echo Form::select('user_id', $users , Sentinel::getUser()->id, ['class' => 'form-control']); ?>

                                </div>
                                <?php echo Form::hidden('full_name', $user_data->full_name, ['id'=> 'full_name']); ?>

                                <button type="submit" class="btn btn-primary add_button"><?php echo e(trans('task.send')); ?></button>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-success task_succ">
                        <div class="panel-heading task-title">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="inbox" data-size="18" data-color="white" data-hc="white"
                                   data-l="true"></i> <?php echo e(trans('task.todoList')); ?>

                            </h4>
                        </div>
                        <div class="panel-body task-body">
                            <div class="row list_of_items">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/todolist.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.slimscroll.js')); ?>"></script>
    <script>
        var user_list = <?= json_encode($user_list); ?>;

        $(document).ready(function(){
            $("#user_id").find("option:contains('<?php echo e(trans('task.assignee')); ?>')").prop('selected',true);
            $("#user_id").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('task.assignee')); ?>"
            });
            $('#task_deadline').datetimepicker(
                {
                    format: '<?php echo e(isset($jquery_date)?$jquery_date:"MMMM D,GGGG"); ?>',
                    minDate: new Date(),
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    }
                });
            $('.task-body').slimscroll({
                height: '304px',
                size: '5px',
                opacity: 0.2
            });
        });
        $('.icheckgreen').iCheck({
            checkboxClass: 'icheckbox_minimal-green',
            radioClass: 'iradio_minimal-green'
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>