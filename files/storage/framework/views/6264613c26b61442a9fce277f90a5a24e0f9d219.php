<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('invoice.invoice_number')); ?></label>
                    <div class="controls">
                        <?php echo e(isset($invoiceReceivePayment->invoice->invoice_number)?$invoiceReceivePayment->invoice->invoice_number:null); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('invoice.invoice_date')); ?></label>
                    <div class="controls">
                        <?php echo e(isset($invoiceReceivePayment->invoice->invoice_date)?$invoiceReceivePayment->invoice->invoice_date:null); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('invoice.payment_date')); ?></label>
                    <div class="controls">
                        <?php echo e(isset($invoiceReceivePayment->payment_date)?$invoiceReceivePayment->payment_date:null); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('invoices_payment_log.payment_method')); ?></label>
                    <div class="controls">
                        <?php echo e(isset($invoiceReceivePayment->payment_method)?$invoiceReceivePayment->payment_method:null); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <?php echo Form::label('payment_received', trans('invoice.payment_received'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($invoiceReceivePayment->payment_received); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('invoices_payment_log.payment_number')); ?></label>
                    <div class="controls">
                        <?php echo e(isset($invoiceReceivePayment->payment_number)?$invoiceReceivePayment->payment_number:null); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="controls">
                <?php if(@$action == 'show'): ?>
                    <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php else: ?>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?></button>
                    <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>