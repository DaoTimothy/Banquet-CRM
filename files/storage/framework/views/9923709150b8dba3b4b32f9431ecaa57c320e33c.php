<div class="panel panel-primary">
    <div class="panel-body">
        <?php if(isset($qtemplate)): ?>
            <?php echo Form::model($qtemplate, ['url' => $type . '/' . $qtemplate->id, 'id' => 'qtemplate', 'method' => 'put', 'files'=> true]); ?>

        <?php else: ?>
            <?php echo Form::open(['url' => $type, 'method' => 'post', 'files'=> true, 'id'=>'qtemplate']); ?>

        <?php endif; ?>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="form-group required <?php echo e($errors->has('quotation_template') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('quotation_template', trans('qtemplate.quotation_template'), ['class' => 'control-label required']); ?>

                    <div class="controls">
                        <?php echo Form::text('quotation_template', null, ['class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('quotation_template', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="form-group required <?php echo e($errors->has('quotation_duration') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('quotation_duration', trans('qtemplate.quotation_duration'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::input('number','quotation_duration', null, ['class' => 'form-control']); ?>

                        <span class="help-block"><?php echo e($errors->first('quotation_duration', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="md-check">
                        <input type="checkbox" class="icheckblue" name="immediate_payment" value="1"
                               <?php if(isset($qtemplate) && $qtemplate->immediate_payment=='1'): ?> checked <?php endif; ?>>
                        <i class="primary"></i> <?php echo e(trans('qtemplate.immediate_payment')); ?> </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 <?php echo e($errors->has('product_id') ? 'has-error' : ''); ?>">
                <label class="control-label required"><?php echo e(trans('qtemplate.products')); ?>

                    <span><?php echo $errors->first('products'); ?></span></label>
                <span class="help-block"><?php echo e($errors->first('product_id', ':message')); ?></span>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="detailes-tr">
                            <th><?php echo e(trans('qtemplate.product')); ?></th>
                            <th><?php echo e(trans('qtemplate.description')); ?></th>
                            <th><?php echo e(trans('qtemplate.quantity')); ?></th>
                            <th><?php echo e(trans('qtemplate.unit_price')); ?></th>
                            <th><?php echo e(trans('qtemplate.subtotal')); ?></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="InputsWrapper">
                        <?php if(isset($qtemplate)&& $qtemplate->products->count()>0): ?>
                            <?php $__currentLoopData = $qtemplate->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $variants): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="remove_tr">
                                    <td>
                                        <input type="hidden" name="product_id[]" id="product_id<?php echo e($index); ?>"
                                               value="<?php echo e($variants->product_id); ?>"
                                               readOnly>
                                        <input type="hidden" name="product_name[]" id="product_name<?php echo e($index); ?>"
                                               value="<?php echo e($variants->product_name); ?>"
                                               readOnly>
                                        <select name="product_list" id="product_list<?php echo e($index); ?>" class="form-control product_list"
                                                data-search="true" onchange="product_value(<?php echo e($index); ?>);">
                                            <option value=""></option>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($product->id . '_' . $product->product_name . '_' . $product->sale_price . '_' . $product->description. '_' . $product->quantity_on_hand); ?>"
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
                        class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> <?php echo e(trans('qtemplate.add_product')); ?>

                </button>
                <div class="row">&nbsp;</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group required <?php echo e($errors->has('total') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('total', trans('qtemplate.total'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('total', null, ['class' => 'form-control','readonly']); ?>

                        <span class="help-block"><?php echo e($errors->first('total', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="form-group required <?php echo e($errors->has('tax_amount') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('tax_amount', trans('qtemplate.tax_amount').' ('.floatval(Settings::get('sales_tax')).'%)', ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('tax_amount', null, ['class' => 'form-control','readonly']); ?>

                        <span class="help-block"><?php echo e($errors->first('tax_amount', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="form-group required <?php echo e($errors->has('grand_total') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('grand_total', trans('qtemplate.grand_total'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::text('grand_total', null, ['class' => 'form-control','readonly']); ?>

                        <span class="help-block"><?php echo e($errors->first('grand_total', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">

                <div class="form-group required <?php echo e($errors->has('terms_and_conditions') ? 'has-error' : ''); ?>">
                    <?php echo Form::label('quotation_duration', trans('qtemplate.terms_and_conditions'), ['class' => 'control-label']); ?>

                    <div class="controls">
                        <?php echo Form::textarea('terms_and_conditions', null, ['class' => 'form-control resize_vertical']); ?>

                        <span class="help-block"><?php echo e($errors->first('terms_and_conditions', ':message')); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!-- Form Actions -->
                <div class="form-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success"><i
                                    class="fa fa-check-square-o"></i> <?php echo e(trans('table.ok')); ?></button>
                        <a href="<?php echo e(route($type.'.index')); ?>" class="btn btn-warning"><i
                                    class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ form actions -->

        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
            $(".product_list").select2({
                theme:"bootstrap",
                placeholder:"Product"
            });
            $('.icheckblue').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            $("#qtemplate").bootstrapValidator({
                fields: {
                    quotation_template: {
                        validators: {
                            notEmpty: {
                                message: 'The quotation template field is required.'
                            }
                        }
                    },
                    'product_id[]': {
                        validators: {
                            notEmpty: {
                                message: 'The quotation template field is required.'
                            }
                        }
                    }
                }
            });
        });
        $(function () {
            update_total_price();
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
            var no_product_price = $("#" + product_price).val();

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
            $('input[name^="sub_total"]').each(function () {
                sub_total += parseFloat($(this).val());
                $('#total').val(sub_total.toFixed(2));

                var tax_per = '<?php echo e(floatval(Settings::get('sales_tax'))); ?>';
                var tax_amount = 0;

                tax_amount = (sub_total * tax_per) / 100;
                $('#tax_amount').val(tax_amount.toFixed(2));
                var grand_total = 0;
                grand_total = sub_total + tax_amount;
                $('#grand_total').val(grand_total.toFixed(2));

            });

        }
        var MaxInputs = 50; //maximum input boxes allowed
        var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
        var AddButton = $("#AddMoreFile"); //Add button ID

        var x = InputsWrapper.length; //initlal text box count
        var FieldCount = <?php if(isset($qtemplate)&& $qtemplate->products->count()>0): ?> <?php echo e($qtemplate->products->count()); ?> <?php else: ?> 1 <?php endif; ?>; //to keep track of text box added


        $("#total").val("0");

        $(AddButton).click(function (e)  //on add input button click
        {
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                var content = '';
                content += '<tr class="remove_tr"><td>';
                content += '<input type="hidden" name="product_id[]" id="product_id' + FieldCount + '" value="" readOnly>';
                content += '<input type="hidden" name="product_name[]" id="product_name' + FieldCount + '" value="" readOnly>';
                content += '<select name="product_list" id="product_list' + FieldCount + '" class="form-control product_list" data-search="true" onchange="product_value(' + FieldCount + ');">' +
                        '<option value=""></option>';
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        content += '<option value="<?php echo e($product->id . '_' . $product->product_name . '_' . $product->sale_price . '_' . $product->description . '_' . $product->quantity_on_hand); ?>">' +
                        '<?php echo e($product->product_name); ?></option>';
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        content += '</select>' +
                        '<td><textarea name=description[]" id="description' + FieldCount + '" rows="2" class="form-control resize_vertical" readOnly></textarea>' +
                        '</td>' +
                        '<td><input type="text" name="quantity[]" id="quantity' + FieldCount + '" value="" class="form-control number" onkeyup="product_price_changes(\'quantity' + FieldCount + '\',\'price' + FieldCount + '\',\'sub_total' + FieldCount + '\');"></td>' +
                        '<td><input type="text" name="price[]" id="price' + FieldCount + '" value="" class="form-control" readOnly>' +
                        '<input type="hidden" name="taxes[]" id="taxes' + FieldCount + '" value="<?php echo e(floatval(Settings::get('sales_tax'))); ?>" class="form-control" readOnly></td>' +
                        '<td><input type="text" name="sub_total[]" id="sub_total' + FieldCount + '" value="" class="form-control" readOnly></td>' +
                        '<td><a href="javascript:void(0)" class="delete removeclass" title="<?php echo e(trans('table.delete')); ?>"><i class="fa fa-fw fa-trash fa-lg text-danger"></i></a></td>' +
                        '</tr>';
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
            setTimeout(function(){
                $(".product_list").select2({
                    theme:"bootstrap",
                    placeholder:"Product"
                });
            },100);
            return false;
        });


        $(InputsWrapper).on("click", ".removeclass", function (e) { //user click on remove text
            <?php if(!isset($qtemplate)): ?>
            if (x > 0) {
                $(this).parent().parent().remove(); //remove text box
                x--; //decrement textbox
            }
            <?php else: ?>
                $(this).parent().parent().remove(); //remove text box
            x--; //decrement textbox
            <?php endif; ?>
            update_total_price();
            return false;
        });

        $('#qtemplate').on('keyup keypress', function (e) {
            var code = e.keyCode || e.which;
            if (code == 13) {
                e.preventDefault();
                return false;
            }
        });


    </script>
<?php $__env->stopSection(); ?>