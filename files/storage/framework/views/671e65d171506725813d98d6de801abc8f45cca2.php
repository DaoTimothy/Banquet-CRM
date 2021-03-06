<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/c3.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <div class="pull-right">
            <a href="<?php echo e(url('invoice_delete_list')); ?>" class="btn btn-primary m-b-10"><?php echo e(trans('invoice.delete_list')); ?></a>
            <a href="<?php echo e(url('paid_invoice')); ?>" class="btn btn-primary m-b-10"><?php echo e(trans('invoice.paid_invoice')); ?></a>
            <?php if($user_data->hasAccess(['invoices.write']) || $user_data->inRole('admin')): ?>
                <a href="<?php echo e($type.'/create'); ?>" class="btn btn-primary m-b-10">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('invoice.new')); ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4><?php echo e(trans('invoice.invoiceDetailsForCurrentMonth')); ?></h4>
            <div id="invoice-chart" class="index-invo"></div>
        </div>
        <div class="col-md-6" align="right">
            <ul class="list-inline invoice-list">
                <li>
                    <div class="txt-info"><?php echo e(trans('invoice.invoices_total')); ?></div>
                    <h5 class="number c-red"><?php echo e((Settings::get('currency_position')=='left')?
                        Settings::get('currency').' '.$invoices_total_collection:
                        $invoices_total_collection.' '.Settings::get('currency')); ?> </h5>
                </li>
                <li>
                    <div class="txt"><?php echo e(trans('invoice.open_invoice')); ?></div>
                    <h5 class="number c-green"><?php echo e((Settings::get('currency_position')=='left')?
                        Settings::get('currency').' '.$open_invoice_total:
                        $open_invoice_total.' '.Settings::get('currency')); ?> </h5>
                </li>
                <li>
                    <div class="txt-dang"><?php echo e(trans('invoice.overdue_invoice')); ?></div>
                    <h5 class="number c-red"><?php echo e((Settings::get('currency_position')=='left')?
                        Settings::get('currency').' '.$overdue_invoices_total:
                        $overdue_invoices_total.' '.Settings::get('currency')); ?> </h5>
                </li>
                <li>
                    <div class="txt-succ"><?php echo e(trans('invoice.paid_invoice')); ?></div>
                    <h5 class="number c-blue"><?php echo e((Settings::get('currency_position')=='left')?
                        Settings::get('currency').' '.$paid_invoices_total:
                        $paid_invoices_total.' '.Settings::get('currency')); ?> </h5>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">receipt</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right"><i class="fa fa-fw fa-chevron-up clickable"></i></span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('invoice.invoice_number')); ?></th>
                        <th><?php echo e(trans('invoice.invoice_date')); ?></th>
                        <th><?php echo e(trans('invoice.agent_name')); ?></th>
                        <th><?php echo e(trans('invoice.due_date')); ?></th>
                        <th><?php echo e(trans('invoice.total')); ?></th>
                        <th><?php echo e(trans('invoice.unpaid_amount')); ?></th>
                        <th><?php echo e(trans('invoice.status')); ?></th>
                        <th><?php echo e(trans('invoice.expired')); ?></th>
                        <th><?php echo e(trans('table.actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/d3.v3.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/d3.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/c3.min.js')); ?>"></script>
    <script>

        /*invoice chart*/

        var chart = c3.generate({
            bindto: '#invoice-chart',
            data: {
                columns: [
                    ['Open invoice', <?php echo e($open_invoice_total); ?>],
                    ['Overdue invoice', <?php echo e($overdue_invoices_total); ?>],
                    ['Paid invoice', <?php echo e($paid_invoices_total); ?>]
                ],
                type: 'donut',
                colors: {
                    'Open invoice': '#4FC1E9',
                    'Overdue invoice': '#FD9883',
                    'Paid invoice': '#A0D468'
                }
            }

        });
        $(".sidebar-toggle").on("click", function () {
            setTimeout(function () {
                chart.resize();
            }, 200)
        });
        //c3 customisation

        /* invoice chart end*/
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>