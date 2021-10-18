<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
    </div>
    <div class="panel panel-primary">
        <div class="panel-body">
            <?php echo Form::open(['url' => $type, 'method' => 'post', 'id' => 'payment_log', 'files'=> true]); ?>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group required <?php echo e($errors->has('invoice_id') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('invoice_id', trans('invoice.invoice_number'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('invoice_id', $invoices, null, ['id'=>'invoice_id', 'class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('invoice_id', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group required <?php echo e($errors->has('payment_date') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('payment_date', trans('invoice.payment_date'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('payment_date', null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('payment_date', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group required <?php echo e($errors->has('payment_method') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('payment_method', trans('invoice.payment_method'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('payment_method', $payment_methods, null, ['id'=>'payment_method', 'class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('payment_method', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group required <?php echo e($errors->has('payment_received') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('payment_received', trans('invoice.payment_received'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('payment_received', null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('payment_received', ':message')); ?></span>
                            <small class="text-danger" id='message'></small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form Actions -->
            <div class="form-group">
                <div class="controls">
                    <button type="submit" class="btn btn-success"><i
                                class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                    <a href="<?php echo e(route($type.'.index')); ?>" class="btn btn-warning"><i
                                class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
            $("#invoice_id").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('invoice.invoice_number')); ?>"
            });
            $("#payment_method").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('invoice.payment_method')); ?>"
            });
            $('#payment_date').datetimepicker({
                format: '<?php echo e(isset($jquery_date)?$jquery_date:"MMMM D,GGGG"); ?>',
                useCurrent: false,
                minDate:moment(),
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            }).on("dp.change", function (e) {
                $("#payment_log").bootstrapValidator('revalidateField','payment_date');
            });
            $("#payment_log").bootstrapValidator({
                fields: {
                    invoice_id: {
                        validators: {
                            notEmpty: {
                                message: 'The invoice number field is required.'
                            }
                        }
                    },
                    payment_date: {
                        validators: {
                            notEmpty: {
                                message: 'The payment date field is required.'
                            }
                        }
                    },
                    payment_method: {
                        validators: {
                            notEmpty: {
                                message: 'The payment method field is required.'
                            }
                        }
                    },
                    payment_received: {
                        validators: {
                            notEmpty: {
                                message: 'The amount received field is required.'
                            }
                        }
                    }
                }
            });
        });
        $("#invoice_id").on("change",function(){
            paymentLog($(this).val());
        });
        function paymentLog(id){
            $.ajax({
                type: "GET",
                url: '<?php echo e(url('invoices_payment_log/payment_logs')); ?>',
                data: {'id': id, _token: '<?php echo e(csrf_token()); ?>' },
                success: function (data) {
                    var unPaid = data.unpaid_amount;
                    $("#payment_received").val(unPaid);
                    $("#payment_log").bootstrapValidator('revalidateField','payment_received');
                    $("#payment_received").on("keyup",function(){
                        if($("#payment_received").val() <= unPaid){
                            $("#message").hide();
                            $('button[type="submit"]').prop('disabled',false)
                        }else{
                            $("#message").show();
                            $("#message").text('Your invoice amout is: '+unPaid);
                            $('button[type="submit"]').prop('disabled',true);
                        }
                    });
                }
            });
        }
        $("#message").hide();
    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>