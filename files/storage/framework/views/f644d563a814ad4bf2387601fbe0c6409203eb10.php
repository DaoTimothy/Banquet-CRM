<div class="panel panel-primary">
    <div class="panel-body">
        <div class="form-group">
            <h2><?php echo e($company->name); ?></h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3><?php echo e(trans('company.cash_information')); ?></h3>
                <hr>

                <div class="row">
                    <div class="col-sm-3 col-md-4 col-lg-2">
                        <div><strong><?php echo e(trans('company.total_invoices')); ?></strong></div>
                        <div> $ <?php echo e(isset($total_invoices)?$total_invoices:0); ?></div>
                    </div>
                    <div class="col-sm-3 col-md-4 col-lg-2">
                        <div><strong><?php echo e(trans('company.open_invoices')); ?></strong></div>
                        <div> $ <?php echo e(isset($open_invoices)?$open_invoices:0); ?> </div>
                    </div>
                    <div class="col-sm-3 col-md-4 col-lg-2">
                        <div><strong><?php echo e(trans('company.overdue_invoices')); ?></strong></div>
                        <div> $ <?php echo e(isset($overdue_invoices)?$overdue_invoices:0); ?> </div>
                    </div>
                    <div class="col-sm-3 col-md-4 col-lg-2">
                        <div><strong><?php echo e(trans('company.paid_invoices')); ?></strong></div>
                        <div> $ <?php echo e(isset($paid_invoices)?$paid_invoices:0); ?> </div>
                    </div>
                    <div class="col-sm-3 col-md-4 col-lg-2">
                        <div><strong><?php echo e(trans('company.quotations_total')); ?></strong></div>
                        <div> $ <?php echo e(isset($quotations_total)?$quotations_total:0); ?> </div>
                    </div>
                    <div class="col-sm-3 col-md-4 col-lg-2">
                        <div><strong><?php echo e(trans('company.total_sales_orders')); ?></strong></div>
                        <div> $ <?php echo e(isset($salesorder_total)?$salesorder_total:0); ?> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 m-t-10">
                <h3><?php echo e(trans('company.company_activities')); ?></h3>
                <hr>

                <div class="row">
                    <div class="infobox col-sm-3 col-md-4 col-lg-2">
                        <div><strong><?php echo e(trans('company.calls')); ?></strong></div>
                        <div><?php echo e($calls); ?></div>
                    </div>
                    <div class="infobox col-sm-3 col-md-4 col-lg-2">
                        <div><strong><?php echo e(trans('company.salesorder')); ?></strong></div>
                        <div><?php echo e(isset($salesorder)?$salesorder:0); ?></div>
                    </div>
                    <div class="infobox col-sm-3 col-md-4 col-lg-2">
                        <div class="txt"><strong><?php echo e(trans('company.invoices')); ?></strong></div>
                        <div><?php echo e(isset($invoices)?$invoices:0); ?></div>
                    </div>
                    <div class="infobox col-sm-3 col-md-4 col-lg-2">
                        <div><strong><?php echo e(trans('company.quotations')); ?></strong></div>
                        <div><?php echo e(isset($quotations)?$quotations:0); ?></div>
                    </div>
                    <div class="infobox col-sm-3 col-md-4 col-lg-2">
                        <div><strong><?php echo e(trans('company.emails')); ?></strong></div>
                        <div><?php echo e(isset($emails)?$emails:0); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group m-t-10">
            <div class="controls">
                <?php if(@$action == 'show'): ?>
                    <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php else: ?>
                    <button type="submit" class="btn btn-danger"><i
                                class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?>

                    </button>
                    <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
