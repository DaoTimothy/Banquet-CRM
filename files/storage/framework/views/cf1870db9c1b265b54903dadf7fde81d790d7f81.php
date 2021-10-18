<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tagsinput.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
    </div>
    <div class="panel panel-primary">
        <div class="panel-body">
            <?php if(isset($data)): ?>
                <?php echo Form::model($data, ['url' => $type . '/' . $data->id .'/updateRoom', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']); ?>

            <?php else: ?>
                <?php echo Form::open(['url' => $type.'/storeRoom', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']); ?>

            <?php endif; ?>
                <div class="row form-panel-event">
                    <div class="col-md-12">
                        <div class="form-group required">
                            <?php echo Form::label('hotelName', trans('eventSetting.hotelName'), ['class' => 'control-label']); ?>

                            <div class="controls">
                                <?php echo Form::select('hotelName',$hotels ,(isset($data) ? $data->hotel_id : null), ['class' => 'form-control select2','id'=>'hotelName']); ?>

                            </div>
                        </div>
                    </div>
                    <?php if(isset($data)): ?>
                        <div class="col-md-12">
                            <div class="form-group required <?php echo e($errors->has('room') ? 'has-error' : ''); ?>">
                                <?php echo Form::label('room', trans('eventSetting.room'), ['class' => 'control-label']); ?>

                                <div class="controls">
                                    <?php echo Form::text('room', $data->room_name , ['class' => 'form-control','id'=>'room']); ?>

                                    <span class="help-block"><?php echo e($errors->first('location', ':message')); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div id="addMore">
                            <div class="col-md-12" id="add_more_0">
                                <div class="form-group required <?php echo e($errors->has('room') ? 'has-error' : ''); ?>">
                                    <?php echo Form::label('room[]', trans('eventSetting.room'), ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::text('room[]', null , ['class' => 'form-control','id'=>'room']); ?>

                                        <span class="help-block"><?php echo e($errors->first('location', ':message')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(!isset($data)): ?>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-success" id="btnAddPhotographerPackages" style="width: 15%"><?php echo e(trans('event.add')); ?></button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            <!-- Form Actions -->
            <div class="form-group">
                <div class="controls">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?php echo e(trans('eventSetting.add')); ?></button>
                    <a href="<?php echo e(url($type.'/eventRoom')); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                </div>
            </div>
            <!-- ./ form actions -->
            <input type="hidden" id="supplierPackages" name="supplierPackages" value="">
            <?php echo Form::close(); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/tagsinput.js')); ?>"></script>

    <script>
        $(function(){
            $("#hotelName").select2({
                theme: "bootstrap",
                placeholder: "<?php echo e(trans('eventSetting.hotelName')); ?>"
            });

            $('#eventSetting').on('submit',function (event) {
                if($('#hotelName').val() == '' && $('#hotelName').val() == 0){
                    toastr["error"]("Select hotel");
                    event.preventDefault();
                    return;
                }
                if ($("#room").val() == '') {
                    toastr["error"]("Enter Room Name");
                    event.preventDefault();
                    return;
                }
            });
        })
    </script>

    <script>
        var count = 0;
        var count_stack = Array.from(Array(count + 1).keys());
        $(document).ready(function () {
            $("#btnAddPhotographerPackages").click(function () {
                count = count + 1;
                var html = '<div id="add_more_'+count+'"><div class="col-md-10">' +
                            '<div class="form-group required <?php echo e($errors->has('room') ? 'has-error' : ''); ?>">' +
                            '<div class="controls">' +
                            '<?php echo Form::text('room[]', null , ['class' => 'form-control','id'=>'room']); ?>' +
                            '<span class="help-block"><?php echo e($errors->first('location', ':message')); ?></span>' +
                            '</div>' +
                            '</div>' +
                            '</div>'+
                            '<div class="col-md-2">' +
                            '<a onclick="removeContent('+count+')"><i class="fa fa-fw fa-trash fa-lg text-danger kaipan"></i></a>' +
                            '</div></div>';

                $("#addMore").append(html);
                count_stack.push(count);
                $('#supplierPackages').val(count_stack);
            });
        });

        function removeContent(id) {
            $('#add_more_' + id).remove();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>