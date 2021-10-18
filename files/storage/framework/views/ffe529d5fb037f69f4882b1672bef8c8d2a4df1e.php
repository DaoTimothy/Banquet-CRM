<div class="panel panel-primary">
    <div class="panel-body">
        <div id="sendby_ajax" class="center-edit"></div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('invoice_number', trans('invoice.invoice_number'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($invoice->invoice_number); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('customer', trans('invoice.agent_name'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e(is_null($invoice->customer)?"":$invoice->customer->full_name); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('sales_team_id', trans('invoice.sales_team_id'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e(is_null($invoice->salesTeam)?"":$invoice->salesTeam->salesteam); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('sales_person_id', trans('salesteam.main_staff'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e(is_null($invoice->salesPerson)?"":$invoice->salesPerson->full_name); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('invoice_date', trans('invoice.invoice_date'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($invoice->invoice_date); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('due_date', trans('invoice.due_date'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($invoice->due_date); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('payment_term', trans('invoice.payment_term'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($invoice->payment_term.' '.trans('invoice.days')); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('status', trans('invoice.status'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e(is_null($invoice->status)?"":$invoice->status); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="control-label"><?php echo e(trans('invoice.products')); ?></label>
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr class="detailes-tr">
                        <th><?php echo e(trans('invoice.product')); ?></th>
                        <th><?php echo e(trans('invoice.description')); ?></th>
                        <th><?php echo e(trans('invoice.quantity')); ?></th>
                        <th><?php echo e(trans('invoice.unit_price')); ?></th>
                        <th><?php echo e(trans('invoice.taxes')); ?></th>
                        <th><?php echo e(trans('invoice.subtotal')); ?></th>
                    </tr>
                    </thead>
                    <tbody id="InputsWrapper">
                    <?php if(isset($invoice) && $invoice->products->count()>0): ?>
                        <?php $__currentLoopData = $invoice->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $variants): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="remove_tr">
                                <td>
                                <?php echo e($variants->product_name); ?>

                                <td>
                                    <?php echo e($variants->description); ?>

                                </td>
                                <td>
                                    <?php echo e($variants->quantity); ?>

                                </td>
                                <td>
                                    <?php echo e($variants->price); ?>

                                </td>
                                <td>
                                    <?php echo e(number_format($variants->quantity * $variants->price * floatval(Settings::get('sales_tax')) / 100, 2,
                        '.', '')); ?></td>
                                <td>
                                    <?php echo e($variants->sub_total); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('total', trans('invoice.total'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($invoice->total); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('total', trans('invoice.tax_amount'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($invoice->tax_amount); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('total', trans('invoice.grand_total'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($invoice->grand_total); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('total', trans('invoice.discount').' (%)', ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($invoice->discount); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('total', trans('invoice.final_price'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($invoice->final_price); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('total', trans('invoice.unpaid_amount'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($invoice->unpaid_amount); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="controls">
                <?php if(@$action == 'show'): ?>
                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary"><i
                                class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php else: ?>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-primary"></i> <?php echo e(trans('table.delete')); ?>

                    </button>
                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary"><i
                                class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
