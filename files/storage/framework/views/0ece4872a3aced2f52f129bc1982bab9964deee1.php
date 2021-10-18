<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <a href="#" class="btn btn-primary invoice-send" data-toggle="modal" data-target="#modal-send_by_email"
           onclick="create_pdf(<?php echo e($invoice->id); ?>)"><i class="fa fa-envelope-o"></i> <?php echo e(trans('invoice.email_send')); ?></a>
        <a href="<?php echo e(url('invoice/'.$invoice->id.'/print_quot')); ?>" class="btn btn-primary" target=""><i
                    class="fa fa-print"></i> <?php echo e(trans('invoice.print')); ?></a>
        <?php if(strtotime(date("m/d/Y"))>strtotime("+".$invoice->payment_term."",strtotime($invoice->due_date))): ?>
            <button type="button" class="btn btn-danger invoice-send"><?php echo e(trans('invoice.invoice_expired')); ?></button>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="details">
                <?php echo $__env->make('user/'.$type.'/_details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
    <!-- START MODAL SEND BY EMAIL CONTENT -->
    <div class="modal fade" id="modal-send_by_email" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="fa fa-times-circle-o"></i>
                    </button>
                    <h4 class="modal-title"><strong><?php echo e(trans('invoice.email_send')); ?></strong></h4>
                </div>
                <?php echo Form::open(['url' => $type, 'method' => 'post', 'files'=> true, 'id'=>'send_invoice', 'name'=>"send_invoice"]); ?>

                <?php echo Form::hidden('invoice_id', $invoice->id, ['class' => 'form-control', 'id'=>"invoice_id"]); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <?php echo Form::label('email_subject', trans('invoice.subject'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('email_subject', "Demo Company Invoice (Ref ".$invoice->invoice_number.')'
                            , ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('recipients', trans('invoice.recipients'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::select('recipients[]', isset($email_recipients)?$email_recipients:null, null, ['id'=>'recipients','class' => 'form-control select2']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="control-label"></label>
                       <div name="message_body" id="message_body" cols="80" rows="10" class="cke-editor resize_vertical">
                       	<p>Hello <?php echo e((isset($invoice->customer)?$invoice->customer->full_name:"")); ?>,</p>
                        <p>Here is your order confirmation from Demo Company : </p>
                        <strong>REFERENCES</strong>
                        <p>Order number : <strong><?php echo e($invoice->invoice_number); ?></strong></p>
                        <p>Order total: <strong><?php echo e($invoice->grand_total); ?></strong></p>
                        <p>Order date: <?php echo e(date('m/d/Y H:i', strtotime($invoice->date))); ?></p>
                       </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo e(trans('invoice.file')); ?></label>
                        <a href="" id="pdf_url" target="_blank"></a>
                        <input type="hidden" name="invoice_pdf" id="invoice_pdf" value=""
                               class="form-control">
                    </div>
                </div>
                <div class="modal-footer text-right">
                        <button type="submit"
                                class="btn btn-primary sendmail"><?php echo e(trans('invoice.send')); ?></button>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
            $("#recipients").select2({
                placeholder:"<?php echo e(trans('quotation.recipients')); ?>",
                theme: 'bootstrap'
            });
        });
        function create_pdf(quotation_id) {
            $.ajax({
                type: "GET",
                url: "<?php echo e(url('invoice' )); ?>/" + quotation_id + "/ajax_create_pdf",
                data: {'_token': '<?php echo e(csrf_token()); ?>'},
                success: function (msg) {
                    if (msg != '') {
                        $("#pdf_url").attr("href", msg)
                        var index = msg.lastIndexOf("/") + 1;
                        var filename = msg.substr(index);
                        $("#pdf_url").html(filename);
                        $("#quotation_pdf").val(filename);
                    }
                }
            });
        }
        $("#recipients").select2({
            placeholder:"<?php echo e(trans('quotation.recipients')); ?>",
            theme: 'bootstrap'
        });
        $("#send_invoice").bootstrapValidator({
            fields: {
                'recipients[]': {
                    validators: {
                        notEmpty: {
                            message: 'The recipients field is required'
                        }
                    }
                },
                message_body:{
                    validators: {
                        notEmpty: {
                            message: 'The message field is required'
                        }
                    }
                }
            }
        }).on('success.form.bv', function(e) {
            e.preventDefault();
            $.post( "<?php echo e(url('invoice/send_invoice')); ?>", $('#send_invoice').serialize())
                .done(function( msg ) {
                    $('body,html').animate({scrollTop: 0}, 200);
                    $("#sendby_ajax").html(msg);
                    $("#modal-send_by_email").modal('hide');
                });
            setTimeout(function(){
                $("#sendby_ajax").hide();
            },5000);
        });

        $("#modal-send_by_email").on('hide.bs.modal', function () {
            $("#recipients").find("option").attr('selected',false);
            $("#recipients").select2({
                placeholder:"<?php echo e(trans('quotation.recipients')); ?>",
                theme: 'bootstrap'
            });
            $("#send_invoice").data('bootstrapValidator').resetForm();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>