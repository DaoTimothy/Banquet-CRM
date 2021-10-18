<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($invoice)): ?>
            <?php echo Form::model($invoice, ['url' => $type . '/' . $invoice->id, 'method' => 'put', 'id'=>'invoice','files'=> true]); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type, 'method' => 'post', 'files'=> true, 'id'=>'invoice']); ?>

        <?php endif; ?>
            <div id="sendby_ajax"></div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('customer_id') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('customer_id', trans('invoice.agent_name'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('customer_id', $customers, (isset($invoice->customer_id)?$invoice->customer_id:null), ['id'=>'customer_id','class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('customer_id', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('sales_team_id') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('sales_team_id', trans('invoice.sales_team_id'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('sales_team_id', $salesteams, (isset($invoice)?$invoice->sales_team_id:null), ['id'=>'sales_team_id','class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('sales_team_id', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('sales_person_id') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('sales_person_id', trans('salesteam.main_staff'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::select('sales_person_id', $staffs, null, ['id'=>'sales_person_id','class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('sales_person_id', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                    <div class="form-group required <?php echo e($errors->has('qtemplate_id') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('qtemplate_id', trans('invoice.quotation_template'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::select('qtemplate_id', $qtemplates, null, ['class' => 'form-control']); ?>

                            <span class="help-block"><?php echo e($errors->first('qtemplate_id', ':message')); ?></span>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('invoice_date') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('invoice_date', trans('invoice.invoice_date'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('invoice_date', null, ['class' => 'form-control date']); ?>

                        <span class="help-block"><?php echo e($errors->first('invoice_date', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group required <?php echo e($errors->has('due_date') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('due_date', trans('invoice.due_date'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('due_date', null, ['class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('due_date', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group required <?php echo e($errors->has('payment_term') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('payment_term', trans('invoice.payment_term'), ['class' => 'control-label required']); ?>

                        <div class="controls">

                            <select name="payment_term" id="payment_term" class="form-control">
                                <option value=""></option>
                                <?php if(Settings::get('payment_term1')!='0'): ?>
                                    <option value="<?php echo e(Settings::get('payment_term1')); ?> <?php echo e(trans('invoice.days')); ?>"
                                            <?php if(isset($invoice) && Settings::get('payment_term1') ." Days" == $invoice->payment_term): ?> selected <?php endif; ?>><?php echo e(Settings::get('payment_term1')); ?> <?php echo e(trans('invoice.days')); ?></option>
                                <?php endif; ?>
                                <?php if(Settings::get('payment_term2')!='0'): ?>
                                    <option value="<?php echo e(Settings::get('payment_term2')); ?> <?php echo e(trans('invoice.days')); ?>"
                                            <?php if(isset($invoice) && Settings::get('payment_term2') ." Days" == $invoice->payment_term): ?> selected <?php endif; ?>><?php echo e(Settings::get('payment_term2')); ?> <?php echo e(trans('invoice.days')); ?></option>
                                <?php endif; ?>
                                <?php if(Settings::get('payment_term3')!='0'): ?>
                                    <option value="<?php echo e(Settings::get('payment_term3')); ?> <?php echo e(trans('invoice.days')); ?>"
                                            <?php if(isset($invoice) && Settings::get('payment_term3') ." Days" == $invoice->payment_term): ?> selected <?php endif; ?>><?php echo e(Settings::get('payment_term3')); ?> <?php echo e(trans('invoice.days')); ?></option>
                                <?php endif; ?>
                                <option value="0 <?php echo e(trans('quotation.days')); ?>"
                                        <?php if(isset($invoice) && $invoice->payment_term==0): ?> selected <?php endif; ?>><?php echo e(trans('invoice.immediate_payment')); ?></option>
                            </select>
                            <span class="help-block"><?php echo e($errors->first('payment_term', ':message')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group required <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('status', trans('invoice.status'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <div class="input-group">
                                <label>
                                    <input type="radio" name="status" value="<?php echo e(trans('invoice.open_invoice')); ?>"
                                           class='icheckblue'
                                           <?php if(isset($invoice) && $invoice->status == 'Open Invoice'): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('invoice.open_invoice')); ?>

                                </label>
                                <label>
                                    <input type="radio" name="status" value="<?php echo e(trans('invoice.overdue_invoice')); ?>"
                                           class='icheckblue'
                                           <?php if(isset($invoice) && $invoice->status == 'Overdue Invoice'): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('invoice.overdue_invoice')); ?>

                                </label>
                                <label>
                                    <input type="radio" name="status" value="<?php echo e(trans('invoice.paid_invoice')); ?>"
                                           class='icheckblue'
                                           <?php if(isset($invoice) && $invoice->status == 'Paid Invoice'): ?> checked <?php endif; ?>>
                                    <?php echo e(trans('invoice.paid_invoice')); ?>

                                </label>
                            </div>

                            <span class="help-block"><?php echo e($errors->first('status', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12">
                <label class="control-label required"><?php echo e(trans('quotation.products')); ?>

                    <span><?php echo $errors->first('products'); ?></span></label>
                <div class="<?php echo e($errors->has('product_id.*') ? 'has-error' : ''); ?>">
                    <span class="help-block"><?php echo e($errors->first('product_id.*', ':message')); ?></span>
                </div>
                <div class="<?php echo e($errors->has('product_id') ? 'has-error' : ''); ?>">
                    <span class="help-block"><?php echo e($errors->first('product_id', ':message')); ?></span>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="detailes-tr">
                            <th><?php echo e(trans('invoice.product')); ?></th>
                            <th><?php echo e(trans('invoice.description')); ?></th>
                            <th><?php echo e(trans('invoice.quantity')); ?></th>
                            <th><?php echo e(trans('invoice.unit_price')); ?></th>
                            <th><?php echo e(trans('invoice.subtotal')); ?></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="InputsWrapper">
                        <?php if(isset($invoice) && $invoice->products->count()>0): ?>
                            <?php $__currentLoopData = $invoice->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $variants): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="remove_tr">
                                    <td>
                                        <input type="hidden" name="product_id[]" id="product_id<?php echo e($index); ?>"
                                               value="<?php echo e($variants->product_id); ?>"
                                               readOnly>
                                        <input type="hidden" name="product_name[]" id="product_name<?php echo e($index); ?>"
                                               value="<?php echo e($variants->product_name); ?>"
                                               readOnly>
                                        <select name="product_list" id="product_list<?php echo e($index); ?>" class="form-control select2 product_list"
                                                data-search="true" onchange="product_value(<?php echo e($index); ?>);">
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($product->id . '_' . $product->product_name . '_' . $product->sale_price . '_' . $product->description . '_' . $product->quantity_on_hand); ?>"
                                                        <?php if($product->id == $variants->product_id): ?> selected="selected" <?php endif; ?>>
                                                    <?php echo e($product->product_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    <td><textarea name=description[]" id="description<?php echo e($index); ?>" rows="2"
                                                  class="form-control resize_vertical" readOnly><?php echo e($variants->description); ?></textarea>
                                    </td>
                                    <td><input type="text" name="quantity[]" id="quantity<?php echo e($index); ?>"
                                               value="<?php echo e($variants->quantity); ?>"
                                               class="form-control number"
                                               onkeyup="product_price_changes('quantity<?php echo e($index); ?>','price<?php echo e($index); ?>','sub_total<?php echo e($index); ?>');">
                                    </td>
                                    <td><?php echo e($variants->price); ?><input type="hidden" name="price[]" id="price<?php echo e($index); ?>"
                                                                   value="<?php echo e($variants->price); ?>"
                                                                   class="form-control"></td>
                                    <input type="hidden" name="taxes[]" id="taxes<?php echo e($index); ?>"
                                           value="<?php echo e(floatval(Settings::get('sales_tax'))); ?>" class="form-control"></td>
                                    <td><input type="text" name="sub_total[]" id="sub_total<?php echo e($index); ?>"
                                               value="<?php echo e($variants->sub_total); ?>"
                                               class="form-control" readOnly></td>
                                    <td><a href="javascript:void(0)" class="delete removeclass"><i
                                                    class="fa fa-fw fa-trash fa-lg text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <button type="button" id="AddMoreFile"
                        class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> <?php echo e(trans('invoice.add_product')); ?></button>
                <div class="row">&nbsp;</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group required <?php echo e($errors->has('total') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('total', trans('invoice.total'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('total', null, ['class' => 'form-control','readonly']); ?>

                        <span class="help-block"><?php echo e($errors->first('total', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group required <?php echo e($errors->has('tax_amount') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('tax_amount', trans('invoice.tax_amount').' ('.floatval(Settings::get('sales_tax')).'%)', ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('tax_amount', null, ['class' => 'form-control','readonly']); ?>

                        <span class="help-block"><?php echo e($errors->first('tax_amount', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group required <?php echo e($errors->has('grand_total') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('grand_total', trans('invoice.grand_total'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('grand_total', null, ['class' => 'form-control','readonly']); ?>

                        <span class="help-block"><?php echo e($errors->first('grand_total', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group required <?php echo e($errors->has('discount') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('discount', trans('invoice.discount').' (%)', ['class' => 'control-label']); ?>

                    <div class="controls">
                        <input type="text" name="discount" id="discount"
                               value="<?php echo e((isset($invoice)?$invoice->discount:"0.00")); ?>"
                               class="form-control number"
                               onkeyup="update_total_price();">
                        <span class="help-block"><?php echo e($errors->first('discount', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group required <?php echo e($errors->has('final_price') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('final_price', trans('invoice.final_price'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('final_price', null, ['class' => 'form-control','readonly']); ?>

                        <span class="help-block"><?php echo e($errors->first('final_price', ':message')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <button type="submit" class="btn btn-success"><i
                            class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-warning"><i
                            class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
            </div>
        </div>
        <!-- ./ form actions -->
        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
            $("#customer_id").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('invoice.agent_name')); ?>"
            });
            $("#sales_person_id").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('salesteam.main_staff')); ?>"
            });
            $("#sales_team_id").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('invoice.sales_team_id')); ?>"
            });
            $("#qtemplate_id").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('invoice.quotation_template')); ?>"
            });
            $("#payment_term").select2({
                theme:"bootstrap",
                placeholder:"<?php echo e(trans('invoice.payment_term')); ?>"
            });
            $("#recipients").select2({
                placeholder:"<?php echo e(trans('quotation.recipients')); ?>",
                theme: 'bootstrap'
            });

            $("#invoice").bootstrapValidator({
                fields: {
                    customer_id: {
                        validators: {
                            notEmpty: {
                                message: 'The agent name field is required.'
                            }
                        }
                    },
                    sales_team_id: {
                        validators: {
                            notEmpty: {
                                message: 'The sales team field is required.'
                            }
                        }
                    },
                    sales_person_id: {
                        validators: {
                            notEmpty: {
                                message: 'The main staff field is required.'
                            }
                        }
                    },
                    invoice_date: {
                        validators: {
                            notEmpty: {
                                message: 'The invoice date field is required.'
                            }
                        }
                    },
                    due_date: {
                        validators: {
                            notEmpty: {
                                message: 'The due date field is required.'
                            }
                        }
                    },
                    payment_term: {
                        validators: {
                            notEmpty: {
                                message: 'The payment term field is required.'
                            }
                        }
                    },
                    status: {
                        validators: {
                            notEmpty: {
                                message: 'The invoice status field is required.'
                            }
                        }
                    },
                    product_list: {
                        validators: {
                            notEmpty: {
                                message: 'The products field is required.'
                            }
                        }
                    }
                }
            });

        });
        $(function () {
            update_total_price();
            $('#qtemplate_id').change(function () {
                if ($(this).val() > 0) {
                    $.ajax({
                        type: "GET",
                        url: '<?php echo e(url("quotation/ajax_qtemplates_products")); ?>/' + $(this).val(),
                        success: function (data) {
                            content_data = '';
                            $.each(data, function (i, item) {
                                content_data += makeContent(FieldCount, item);
                                FieldCount++;
                            });
                            $("#InputsWrapper").html(content_data);
                            update_total_price();
                        }
                    });
                }
                setTimeout(function(){
                    $(".product_list").select2({
                        theme:"bootstrap",
                        placeholder:"Product"
                    })
                },100);
            });
        });
        function product_value(FieldCount) {
            var all_Val = $("#product_list" + FieldCount).val();
            var res = all_Val.split("_");
            $('#product_id' + FieldCount).val(res[0]);
            $('#product_name' + FieldCount).val(res[1]);
            $('#quantity' + FieldCount).val(res[4]);
            $('#price' + FieldCount).val(res[2]);
            $('#description' + FieldCount).val(res[3]);
            var quantity=$('#quantity'+FieldCount).val();
            var price=$('#price'+FieldCount).val();
            $('#sub_total' + FieldCount).val(price*quantity);
            update_total_price();
        }
        function product_price_changes(quantity, product_price, sub_total_id) {
            var no_quantity = $("#" + quantity).val();
            if(no_quantity.length < 1) {
                no_quantity = 0;
            }
            var no_product_price = $("#" + product_price).val();
            if(no_product_price.length < 1) {
                no_product_price = 0;
            }

            var sub_total = parseFloat(no_quantity * no_product_price);

            var tax_amount = 0;
            tax_amount = (sub_total * <?php echo e(floatval(Settings::get('sales_tax'))); ?>) / 100;
            $('#taxes').val(tax_amount.toFixed(2));

            $('#' + sub_total_id).val(sub_total);
            update_total_price();

        }

        function update_total_price() {
            var sub_total = 0;
            $('#total').val(0);
            $('#tax_amount').val(0);
            $('#grand_total').val(0);
            $('#final_price').val(0);
            var sub = 0;
            $('input[name^="sub_total"]').each(function () {
                sub = $(this).val();
                if(sub.length < 1) {
                    sub = 0;
                }
                sub_total += parseFloat(sub);
                $('#total').val(sub_total.toFixed(2));

                var tax_per = <?php echo e(floatval(Settings::get('sales_tax'))); ?>;
                var tax_amount = 0;

                tax_amount = (sub_total * tax_per) / 100;
                $('#tax_amount').val(tax_amount.toFixed(2));
                var grand_total = 0;
                grand_total = sub_total + tax_amount;
                $('#grand_total').val(grand_total.toFixed(2));
                var discount = $("#discount").val();
                discount_amount = (grand_total * discount) / 100;
                final_price = grand_total - discount_amount;
                $('#final_price').val(final_price.toFixed(2));
            });
        }

        function makeContent(number, item) {
            item = item || '';

            var content = '<tr class="remove_tr"><td>';
            content += '<input type="hidden" name="product_id[]" id="product_id' + number + '" value="' + ((typeof item.product_id == 'undefined') ? '' : item.product_id) + '" readOnly>';
            content += '<input type="hidden" name="product_name[]" id="product_name' + number + '" value="' + ((typeof item.product_name == 'undefined') ? '' : item.product_name) + '" readOnly>';
            content += '<select name="product_list" id="product_list' + number + '" class="form-control product_list" data-search="true" onchange="product_value(' + number + ');">' +
                '<option value=""></option>';
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                content += '<option value="<?php echo e($product->id . '_' . $product->product_name . '_' . $product->sale_price . '_' . $product->description.'_'.$product->quantity_on_hand); ?>"';
            if (item.product_id ==<?php echo e($product->id); ?>) {
                content += 'selected';
            }
            content += '>' +
                '<?php echo e($product->product_name); ?></option>';
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                content += '</select>' +
                '<td><textarea name=description[]" id="description' + number + '" rows="2" class="form-control resize_vertical" readOnly>' + ((typeof item.description == 'undefined') ? '' : item.description) + '</textarea>' +
                '</td>' +
                '<td><input type="text" name="quantity[]" id="quantity' + number + '" value="' + ((typeof item.quantity == 'undefined') ? '' : item.quantity) + '" class="form-control number" onkeyup="product_price_changes(\'quantity' + number + '\',\'price' + number + '\',\'sub_total' + number + '\');"></td>' +
                '<td><input type="text" name="price[]" id="price' + number + '" value="' + ((typeof item.price == 'undefined') ? '' : item.price) + '" class="form-control" readOnly>' +
                '<input type="hidden" name="taxes[]" id="taxes' + number + '" value="<?php echo e(floatval(Settings::get('sales_tax'))); ?>" class="form-control" readOnly></td>' +
                '<td><input type="text" name="sub_total[]" id="sub_total' + number + '" value="' + ((typeof item.sub_total == 'undefined') ? '' : item.sub_total) + '" class="form-control" readOnly></td>' +
                '<td><a href="javascript:void(0)" class="delete removeclass" title="<?php echo e(trans('table.delete')); ?>"><i class="fa fa-fw fa-trash fa-lg text-danger"></i></a></td>' +
                '</tr>';
            return content;
        }

        var FieldCount = 1; //to keep track of text box added
        var MaxInputs = 50; //maximum input boxes allowed
        var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
        var AddButton = $("#AddMoreFile"); //Add button ID

        var x = InputsWrapper.length; //initlal text box count


        $("#total").val("0");

        $(AddButton).click(function (e)  //on add input button click
        {
            setTimeout(function(){
                $(".product_list").select2({
                    theme:"bootstrap",
                    placeholder:"Product"
                });
            });
            FieldCount++; //text box added increment
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                content = makeContent(FieldCount);
                $(InputsWrapper).append(content);
                x++; //text box increment
                $('.number').keypress(function (event) {
                    if (event.which < 46
                            || event.which > 59) {
                        event.preventDefault();
                    } // prevent if not number/dot

                    if (event.which == 46
                            && $(this).val().indexOf('.') != -1) {
                        event.preventDefault();
                    } // prevent if already dot
                });
            }
            return false;
        });

        $(InputsWrapper).on("click", ".removeclass", function (e) { //user click on remove text
            $(this).closest(".remove_tr").remove();
            update_total_price();
            return false;
        });

        function create_pdf(quotation_id) {
            $.ajax({
                type: "GET",
                url: "<?php echo e(url('invoice' )); ?>/" + quotation_id + "/ajax_create_pdf",
                data: {'_token': '<?php echo e(csrf_token()); ?>'},
                success: function (msg) {
                    if (msg != '') {
                        $("#pdf_url").attr("href", msg);
                        var index = msg.lastIndexOf("/") + 1;
                        var filename = msg.substr(index);
                        $("#pdf_url").html(filename);
                        $("#invoice_pdf").val(filename);
                    }
                }
            });
        }
        $("form[name='send_invoice']").submit(function (e) {
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "<?php echo e(url('invoice/send_invoice')); ?>",
                type: "POST",
                data: formData,
                async: false,
                success: function (msg) {
                    $('body,html').animate({scrollTop: 0}, 200);
                    $("#sendby_ajax").html(msg);
                },
                cache: false,
                contentType: false,
                processData: false
            });
            e.preventDefault();
        });


        $('#form').on('keyup keypress', function (e) {
            var code = e.keyCode || e.which;
            if (code == 13) {
                e.preventDefault();
                return false;
            }
        });


        <?php if(isset($invoice)): ?>
        $('#invoice_date').datetimepicker({
            format: '<?php echo e(isset($jquery_date)?$jquery_date:"MMMM D,GGGG"); ?>',
            minDate:'<?php echo e($invoice->updated_at->toDateString()); ?>',
            useCurrent: false,
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        }).on("dp.change", function (e) {
            $('#due_date').data("DateTimePicker").minDate(e.date);
            var nextActionVal = moment($("#invoice_date").val(),"<?php echo e($jquery_date); ?>");
            var expectedClosingVal= moment($("#due_date").val(),"<?php echo e($jquery_date); ?>");
            var difference = expectedClosingVal.diff(nextActionVal);
            var days = moment.duration(difference, "ms")._data.days;
            if(days<0){
                $("#due_date").val('');
                $('#invoice').bootstrapValidator('revalidateField', 'due_date');
            }
            $('#invoice').bootstrapValidator('revalidateField', 'invoice_date');
        });
        $('#due_date').datetimepicker({
            format: '<?php echo e(isset($jquery_date)?$jquery_date:"MMMM D,GGGG"); ?>',
            minDate:'<?php echo e($invoice->updated_at->toDateString()); ?>',
            useCurrent: false,
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        }).on("dp.change", function (e) {
            $('#invoice_date').data("DateTimePicker").maxDate(e.date);
            $('#invoice').bootstrapValidator('revalidateField', 'due_date');
        });
        <?php else: ?>
        $('#invoice_date').datetimepicker({
            format: '<?php echo e(isset($jquery_date)?$jquery_date:"MMMM D,GGGG"); ?>',
            useCurrent: false,
            minDate:moment().format('<?php echo e($jquery_date); ?>'),
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        }).on("dp.change", function (e) {
            $('#due_date').data("DateTimePicker").minDate(e.date);
            $('#invoice').bootstrapValidator('revalidateField', 'invoice_date');
        });
        $('#due_date').datetimepicker({
            format: '<?php echo e(isset($jquery_date)?$jquery_date:"MMMM D,GGGG"); ?>',
            useCurrent: false,
            minDate:moment().format('<?php echo e($jquery_date); ?>'),
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        }).on("dp.change", function (e) {
            $('#invoice_date').data("DateTimePicker").maxDate(e.date);
            $('#invoice').bootstrapValidator('revalidateField', 'due_date');
        });
        <?php endif; ?>

        <?php if(old('payment_term')): ?>
        $("#payment_term").find("option[value='"+'<?php echo e(old("payment_term")); ?>'+"']").attr('selected',true);
        <?php endif; ?>
        $("#sales_team_id").change(function(){
            ajaxMainStaffList($(this).val());
        });
        <?php if(old('sales_person_id')): ?>
        ajaxMainStaffList(<?php echo e(old('sales_team_id')); ?>);
        <?php endif; ?>
        function ajaxMainStaffList(id){
            $.ajax({
                type: "GET",
                url: '<?php echo e(url('opportunity/ajax_main_staff_list')); ?>',
                data: {'id': id, _token: '<?php echo e(csrf_token()); ?>' },
                success: function (data) {
                    $("#sales_person_id").empty();
                    var teamLeader;
                    $.each(data.main_staff, function (val, text) {
                        teamLeader =data.team_leader;
                        $('#sales_person_id').append($('<option></option>').val(val).html(text));
                    });
                    $("#sales_person_id").find("option[value='"+teamLeader+"']").attr('selected',true);
                    $("#sales_person_id").find("option[value!='"+teamLeader+"']").attr('selected',false);
                    $("#sales_person_id").select2({
                        theme:'bootstrap',
                        placeholder:"<?php echo e(trans('salesteam.main_staff')); ?>"
                    });
                    $('#invoice').bootstrapValidator('revalidateField', 'sales_person_id');
                }
            });
        }
        $("#customer_id").change(function(){
            ajaxSalesTeamList($(this).val());
        });
        <?php if(old('sales_team_id')): ?>
        ajaxSalesTeamList(<?php echo e(old('customer_id')); ?>);
        <?php endif; ?>
        <?php if(!isset($invoice)): ?>
        $("#sales_team_id").empty();
        $("#sales_person_id").empty();
        <?php endif; ?>
        function ajaxSalesTeamList(id){
            $.ajax({
                type: "GET",
                url: '<?php echo e(url('quotation/ajax_sales_team_list')); ?>',
                data: {'id': id, _token: '<?php echo e(csrf_token()); ?>' },
                success: function (data) {
                    $("#sales_team_id").empty();
                    $.each(data.sales_team, function (val, text) {
                        $('#sales_team_id').append($('<option></option>').val(val).html(text));
                    });
                    $("#sales_team_id").find("option[value='"+data.agent_name+"']").attr('selected',true);
                    $("#sales_team_id").find("option[value!='"+data.agent_name+"']").attr('selected',false);
                    $("#sales_team_id").select2({
                        theme:'bootstrap',
                        placeholder:"<?php echo e(trans('quotation.sales_team_id')); ?>"
                    });
                    ajaxMainStaffList(data.agent_name);
                    $('#invoice').bootstrapValidator('revalidateField', 'sales_team_id');
                }
            });
        }


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
            $.post( "<?php echo e(url('invoice/send_invoice')); ?>",
                $('#send_invoice').serialize()
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
            $("#send_invoice").data('bootstrapValidator').resetForm();
        });
        $('.icheckblue').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        $('.icheckblue').on('ifChecked',function(){
            $("#invoice").bootstrapValidator('revalidateField', 'status');
        });
    </script>
<?php $__env->stopSection(); ?>