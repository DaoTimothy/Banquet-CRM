<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-send_by_email"
           onclick="create_pdf(<?php echo e($saleorder->id); ?>)"><i class="fa fa-envelope-o"></i> <?php echo e(trans('quotation.send_email')); ?>

        </a>
        <a href="<?php echo e(url('sales_order/'.$saleorder->id.'/print_quot')); ?>" class="btn btn-primary"><i
                    class="fa fa-print"></i> <?php echo e(trans('quotation.print')); ?></a>
        <?php if(strtotime(date("m/d/Y"))>strtotime($saleorder->payment_term,strtotime($saleorder->exp_date))): ?>
            <button type="button" class="btn btn-danger"><?php echo e(trans('quotation.expired')); ?></button>
        <?php else: ?>
            <?php if($user_data->hasAccess(['invoices.write']) && $saleorder->status == trans('sales_order.send_salesorder') || $user_data->inRole('admin') && $saleorder->status == trans('sales_order.salesorder_sent')): ?>
                <a href="<?php echo e(url('sales_order/'.$saleorder->id.'/make_invoice')); ?>" class="btn btn-primary"><i
                            class="fa fa-share"></i> <?php echo e(trans('quotation.invoice')); ?></a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <!-- ./ notifications -->
    <?php echo $__env->make('user/'.$type.'/_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if($user_data->inRole('admin')): ?>
        <fieldset>
            <legend><?php echo e(trans('profile.history')); ?></legend>
            <ul>
                <?php $__currentLoopData = $saleorder->revisionHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($history->userResponsible()->first_name); ?> changed <?php echo e($history->fieldName()); ?>

                        from <?php echo e($history->oldValue()); ?> to <?php echo e($history->newValue()); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </fieldset>
        <?php endif; ?>

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
                    <div id="sendby_ajax center-edit">
                    </div>
                    <div class="modal-body">
                        <?php echo Form::open(['url' => $type.'/send_saleorder', 'method' => 'post', 'files'=> true, 'id'=>'send_saleorder', 'name'=>"send_saleorder"]); ?>

                        <?php echo Form::hidden('saleorder_id', $saleorder->id, ['class' => 'form-control', 'id'=>"saleorder_id"]); ?>


                        <div class="form-group">
                            <?php echo Form::label('email_subject', trans('quotation.subject'), ['class' => 'control-label']); ?>

                            <div class="controls">
                                <?php echo Form::text('email_subject', "Order (Ref ".$saleorder->sale_number.')'
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
                       	<p>
                            Hello <?php echo e((isset($saleorder->customer)?$saleorder->customer->full_name:"")); ?>

                            ,</p>
                            <p>Here is your order confirmation from Demo Company: </p>
                            <p class="show-para-inv">
                                &nbsp;&nbsp;<strong>REFERENCES</strong><br>
                                &nbsp;&nbsp;Order number:
                                <strong><?php echo e($saleorder->sale_number); ?></strong><br>
                                &nbsp;&nbsp;Order total: <strong><?php echo e($saleorder->grand_total); ?></strong><br>
                                &nbsp;&nbsp;Order date: <?php echo e(date('m/d/Y H:i', strtotime($saleorder->date))); ?>

                                <br>
                                </p>
                       </textarea>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="control-label"><?php echo e(trans('quotation.file')); ?></label>
                            <a href="" id="pdf_url" target="_blank"></a>
                            <input type="hidden" name="saleorder_pdf" id="saleorder_pdf" value=""
                                   class="form-control">
                        </div>
                        <div class="modal-footer text-center">
                            <div id="sendby_submitbutton">
                                <button type="submit"
                                        class="btn btn-embossed btn-primary sendmail"><?php echo e(trans('quotation.send')); ?></button>
                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>