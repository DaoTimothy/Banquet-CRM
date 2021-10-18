<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-send_by_email"
           onclick="create_pdf(<?php echo e($quotation->id); ?>)"><i
                    class="fa fa-envelope-o"></i> <?php echo e(trans('quotation.send_email')); ?>

        </a>
        <a href="<?php echo e(url('quotation/'.$quotation->id.'/print_quot')); ?>" class="btn btn-primary">
            <i class="fa fa-print"></i> <?php echo e(trans('quotation.print')); ?>

        </a>
        <?php if(strtotime(date("m/d/Y"))>strtotime("+".$quotation->payment_term."",strtotime($quotation->exp_date))): ?>
            <button type="button" class="btn btn-danger m-b-10"><?php echo e(trans('quotation.expired')); ?></button>
        <?php else: ?>
            <?php if($user_data->hasAccess(['invoices.write']) && $quotation->status == 'Quotation Accepted' || $user_data->inRole('admin') && $quotation->status == 'Quotation Accepted'): ?>
                <a href="<?php echo e(url('quotation/'.$quotation->id.'/make_invoice')); ?>" class="btn btn-primary">
                    <i class="fa fa-share"></i> <?php echo e(trans('quotation.invoice')); ?>

                </a>
            <?php endif; ?>
            <?php if($user_data->hasAccess(['sales_orders.write']) && $quotation->status == 'Quotation Accepted' || $user_data->inRole('admin') && $quotation->status == 'Quotation Accepted'): ?>
                <a href="<?php echo e(url('quotation/'.$quotation->id.'/confirm_sales_order' )); ?>"
                   class="btn btn-primary m-b-10">
                    <i class="fa fa-check"></i> <?php echo e(trans("table.confirm_sales_order")); ?>

                </a>
            <?php endif; ?>
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
                    <h4 class="modal-title">
                        <strong><?php echo e(trans('quotation.send')); ?> </strong><?php echo e(trans('quotation.by_email')); ?>

                    </h4>
                </div>
                <div id="sendby_ajax" class="center-edit"></div>
                <div class="modal-body">
                    <?php echo Form::open(['url' => $type.'/send_quotation', 'method' => 'post', 'files'=> true, 'id'=>'send_quotation', 'name'=>"send_quotation"]); ?>

                     <?php echo Form::hidden('quotation_id', $quotation->id, ['class' => 'form-control', 'id'=>"quotation_id"]); ?>

                    <div class="form-group">
                        <?php echo Form::label('email_subject', trans('quotation.subject'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('email_subject', "Quotation (Ref ".$quotation->quotations_number.')'
                            , ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('recipients', trans('quotation.recipients'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::select('recipients[]', isset($email_recipients)?$email_recipients:null, null, ['id'=>'recipients','class' => 'form-control select2']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="control-label"></label>
                       <textarea name="message_body" id="message_body" cols="80" rows="10" class="cke-editor resize_vertical">
                       	Hello <?php echo e((isset($quotation->customer)?$quotation->customer->full_name:"")); ?> ,
                        Here is your order confirmation from Demo Company
                        REFERENCES
                        Order number : <?php echo e($quotation->quotations_number); ?>

                        Order total: <?php echo e($quotation->grand_total); ?>

                        Order date: <?php echo e(date('m/d/Y H:i', strtotime($quotation->date))); ?>

                       </textarea>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo e(trans('quotation.file')); ?></label>
                        <a href="" id="pdf_url" target="_blank"></a>
                        <input type="hidden" name="quotation_pdf" id="quotation_pdf" value=""
                               class="form-control">
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit"
                                class="btn btn-embossed btn-primary sendmail"><?php echo e(trans('quotation.send')); ?></button>
                    </div>
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
                url: "<?php echo e(url('quotation' )); ?>/" + quotation_id + "/ajax_create_pdf",
                data: {'_token': '<?php echo e(csrf_token()); ?>'},
                success: function (msg) {
                    if (msg != '') {
                        $("#pdf_url").attr("href", msg);
                        var index = msg.lastIndexOf("/") + 1;
                        var filename = msg.substr(index);
                        $("#pdf_url").html(filename);
                        $("#quotation_pdf").val(filename);
                    }
                }
            });
        }
        $("#send_quotation").bootstrapValidator({
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
            $.post( "<?php echo e(url('quotation/send_quotation')); ?>",
                $('#send_quotation').serialize()
            )
                .done(function( msg ) {
                    $('body,html').animate({scrollTop: 0}, 200);
                    $("#sendby_ajax").html(msg);
                    setTimeout(function(){
                        $("#sendby_ajax").hide();
                    },5000);
                    $("#modal-send_by_email").modal('hide');
                });
        });
        $("#modal-send_by_email").on('hide.bs.modal', function () {
            $("#recipients").find("option").attr('selected',false);
            $("#recipients").select2({
                placeholder:"<?php echo e(trans('quotation.recipients')); ?>",
                theme: 'bootstrap'
            });
            $("#send_quotation").data('bootstrapValidator').resetForm();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>