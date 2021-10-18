<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($qtemplate)): ?>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <?php echo Form::label('quotation_template', trans('qtemplate.quotation_template'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo e($qtemplate->quotation_template); ?>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <?php echo Form::label('quotation_duration', trans('qtemplate.quotation_duration'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo e($qtemplate->quotation_duration); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="control-label"><?php echo e(trans('qtemplate.products')); ?></label>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="detailes-tr">
                                <th><?php echo e(trans('qtemplate.product')); ?></th>
                                <th><?php echo e(trans('qtemplate.description')); ?></th>
                                <th><?php echo e(trans('qtemplate.quantity')); ?></th>
                                <th><?php echo e(trans('qtemplate.unit_price')); ?></th>
                                <th><?php echo e(trans('qtemplate.subtotal')); ?></th>
                            </tr>
                            </thead>
                            <tbody id="InputsWrapper">
                            <?php if(isset($qtemplate) && $qtemplate->products->count()>0): ?>
                                <?php $__currentLoopData = $qtemplate->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $variants): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <?php echo Form::label('total', trans('qtemplate.total'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo e($qtemplate->total); ?>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <?php echo Form::label('tax_amount', trans('qtemplate.tax_amount'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo e($qtemplate->tax_amount); ?>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <?php echo Form::label('grand_total', trans('qtemplate.grand_total'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo e($qtemplate->grand_total); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="title"><?php echo e(trans('qtemplate.terms_and_conditions')); ?></label>
                        <div class="controls">
                            <?php echo e($qtemplate->terms_and_conditions); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <?php if(@$action == 'show'): ?>
                        <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.close')); ?></a>
                    <?php else: ?>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?></button>
                        <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>