<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <a href="#" class="btn btn-primary m-b-10" data-toggle="modal" data-target="#modal-send_by_email"
           onclick="create_pdf(<?php echo e($quotation->id); ?>)"><i class="fa fa-envelope-o"></i> <?php echo e(trans('quotation.send_email')); ?>

        </a>
        <a href="<?php echo e(url('quotation/'.$quotation->id.'/print_quot')); ?>" class="btn btn-primary m-b-10">
            <i class="fa fa-print"></i> <?php echo e(trans('quotation.print')); ?>

        </a>
        <?php if(strtotime(date("m/d/Y"))>strtotime("+".$quotation->payment_term."",strtotime($quotation->exp_date))): ?>
            <button type="button" class="btn btn-danger m-b-10"><?php echo e(trans('quotation.expired')); ?></button>
        <?php else: ?>
            
                
                    
                
            
            <?php if($user_data->hasAccess(['sales_orders.write']) && $quotation->status == 'Quotation Accepted' || $user_data->inRole('admin') && $quotation->status == 'Quotation Accepted'): ?>
                <a href="<?php echo e(url('quotation/'.$quotation->id.'/confirm_sales_order' )); ?>" class="btn btn-primary m-b-10">
                    <i class="fa fa-check"></i> <?php echo e(trans("table.confirm_sales_order")); ?>

                </a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <!-- ./ notifications -->
    <?php echo $__env->make('user/'.$type.'/_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if($user_data->inRole('admin')): ?>
        <fieldset>
            <legend><?php echo e(trans('profile.history')); ?></legend>
            <ul>
                <?php $__currentLoopData = $quotation->revisionHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($history->userResponsible()->first_name . ' '. trans('dashboard.changed') . ' '. $history->fieldName()); ?>

                        <?php if($history->fieldName() == 'sales_person'
                           && !is_null(\App\Models\User::find($history->oldValue()))
                           && !is_null(\App\Models\User::find($history->newValue()))): ?>
                            <?php echo e(trans('dashboard.from').' '. \App\Models\User::find($history->oldValue())->full_name.
                            ' '. trans('dashboard.from').' '. \App\Models\User::find($history->newValue())->full_name); ?>

                        <?php elseif($history->fieldName() == 'sales_team'
                            && !is_null(\App\Models\Salesteam::find($history->oldValue()))
                            && !is_null(\App\Models\Salesteam::find($history->newValue()))): ?>)
                        <?php echo e(trans('dashboard.from').' '. \App\Models\Salesteam::find($history->oldValue())->salesteam.
                        ' '. trans('dashboard.from').' '. \App\Models\Salesteam::find($history->newValue())->salesteam); ?>

                        <?php else: ?> <?php echo e(trans('dashboard.from').' '. $history->oldValue().' '. trans('dashboard.from').' '. $history->newValue()); ?>

                        <?php endif; ?></li>
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
                       	<p>
                            Hello <?php echo e((isset($quotation->customer)?$quotation->customer->full_name:"")); ?>

                            ,</p>
                            <p>Here is your order confirmation from Demo Company: </p>
                            <p class="show-para-inv">
                                &nbsp;&nbsp;<strong>REFERENCES</strong><br>
                                &nbsp;&nbsp;Order number:
                                <strong><?php echo e($quotation->quotations_number); ?></strong><br>
                                &nbsp;&nbsp;Order total: <strong><?php echo e($quotation->grand_total); ?></strong><br>
                                &nbsp;&nbsp;Order date: <?php echo e(date('m/d/Y H:i', strtotime($quotation->date))); ?>

                                <br>
                            </p>
                       </textarea>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="control-label"><?php echo e(trans('quotation.file')); ?></label>
                            <a href="" id="pdf_url" target="_blank"></a>
                            <input type="hidden" name="quotation_pdf" id="quotation_pdf" value=""
                                   class="form-control">
                        </div>
                        <div class="modal-footer text-center">
                            <div id="sendby_submitbutton">
                                <button type="submit"
                                        class="btn btn-embossed btn-primary sendmail"><?php echo e(trans('quotation.send')); ?></button>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>