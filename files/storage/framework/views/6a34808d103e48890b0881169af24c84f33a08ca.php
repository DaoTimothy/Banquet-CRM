<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('invoice_number', trans('sales_order.sale_number'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($saleorder->sale_number); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('customer', trans('quotation.agent_name'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e(is_null($saleorder->customer)?"":$saleorder->customer->full_name); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('sales_team_id', trans('quotation.sales_team_id'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e(is_null($saleorder->salesTeam)?"":$saleorder->salesTeam->salesteam); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('sales_person_id', trans('salesteam.main_staff'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e(is_null($saleorder->salesPerson)?"":$saleorder->salesPerson->full_name); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('quotation.date')); ?></label>
                    <div class="controls">
                        <?php echo e($saleorder->date); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('quotation.exp_date')); ?></label>
                    <div class="controls">
                        <?php echo e($saleorder->exp_date); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('payment_term', trans('quotation.payment_term'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($saleorder->payment_term); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="control-label"><?php echo e(trans('quotation.products')); ?></label>
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr class="detailes-tr">
                        <th><?php echo e(trans('quotation.product')); ?></th>
                        <th><?php echo e(trans('quotation.description')); ?></th>
                        <th><?php echo e(trans('quotation.quantity')); ?></th>
                        <th><?php echo e(trans('quotation.unit_price')); ?></th>
                        <th><?php echo e(trans('quotation.taxes')); ?></th>
                        <th><?php echo e(trans('quotation.subtotal')); ?></th>
                    </tr>
                    </thead>
                    <tbody id="InputsWrapper">
                    <?php if(isset($saleorder) && $saleorder->products->count()>0): ?>
                        <?php $__currentLoopData = $saleorder->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $variants): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <?php echo Form::label('total', trans('sales_order.total'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($saleorder->total); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('total', trans('quotation.taxes'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($saleorder->tax_amount); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('total', trans('quotation.grand_total'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($saleorder->grand_total); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('total', trans('quotation.discount').' (%)', ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($saleorder->discount); ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group">
                    <?php echo Form::label('total', trans('quotation.final_price'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo e($saleorder->final_price); ?>

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
                        <button type="submit" class="btn btn-primary"><i
                                class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?></button>
                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary"><i
                                class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>