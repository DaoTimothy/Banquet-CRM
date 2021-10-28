<style>
    @import  url(https://fonts.googleapis.com/css?family=Poppins:400,500,600);

    html {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
    }
    .table-border {
        border: 1px solid #808080;
        border-collapse: collapse;
    }

    .td-padding {
        padding: 10px 5px;
    }

    .pdf-first-top-margin {
        margin-top: 30px;
    }

    table {
        width: 100%;
    }

    .praposal-aboutus-content {
        margin-top: 10px;
    }

    .pdf-box {
        border: 1px solid black;
        margin-top: 25px;
    }

    .pdf-sub-img {
        width: 200px;
    }

    .sub-table {
        padding: 5px 25px
    }

    .table-title {
        background-color: #CCCCCC;
    }

    .sign-content {
        width: 33%;
        text-align: center;
    }

    .pdf-sign {
        padding-top: 100px;
    }

    .onePagePdf {
        page-break-after: always;
        width: 100%;
    }

    .booking_form_page .pdf-content-top-margin {
        background-color: #f4f5f9;
        border: 1px solid #cccccc;
        font-size: 15px;
        margin: 30px 0 0;
        padding: 10px 15px;
    }


    .booking_form_page .pdf-content-top-margin {
        background-color: #f4f5f9;
        border: 1px solid #cccccc;
        float: left;
        font-size: 18px;
        margin: 10px 0 0;
        padding: 10px 15px;
        width: 100%;
    }

    .booking_bill_type {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        border-bottom: 1px solid #cccccc;
        border-color: rgba(0, 0, 0, 0) #cccccc #cccccc;
        border-image: none;
        border-left: 1px solid #cccccc;
        border-right: 1px solid #cccccc;
        margin-bottom: 20px;
        padding: 15px;
    }

    .booking_form_page h2 {
        margin-top: 30px;
    }

    .booking_form_page h3 {
        background-color: #f4f6f9;
        border: 1px solid #cccccc;
        font-size: 18px;
        margin: 0;
        padding: 10px 15px;
    }

    .booking_form_page .praposal-aboutus-content td {
        padding: 0;
    }
    .booking_form_page .praposal-aboutus-topic-content td {
        padding: 0;
    }

    .booking_form_page thead {
        background: #ffffff;
    }

    .booking_form_page .praposal-aboutus-content td.table-border.td-padding {
        padding: 15px 10px;
    }

    .table.table-bordered.table-border {
        margin-bottom: 20px;
    }

    .table-border {
        border: 1px solid #dddddd;
        margin-bottom: 20px;
    }

    .pdf-hr {
        border-color: #808080;
        border-image: none;
        border-style: solid;
        border-width: 5px 0 0;
        margin-bottom: 18px;
        margin-top: 18px;
    }

    .table.table-bordered.table-border tr td {
        padding: 10px;
    }

    .invoice_pdf_table .pdf-header-color {
        background-color: #f4f6f9;
    }

    .table > thead > tr > th, .table > thead > tr > td, .table > tbody > tr > th, .table > tbody > tr > td, .table > tfoot > tr > th, .table > tfoot > tr > td {
        border-bottom: 1px solid #dddddd;
        line-height: 1.42857;
        padding: 15px 10px;
        vertical-align: top;
        font-size: 12px;
    }

    .banquetid_table table {
        border: 1px solid #cccccc;
        margin: 0 0 10px;
    }

    .banquetid_table table tr td {
        padding: 5px 15px;
    }

    .banquetid_table h3 {
        background-color: #f4f6f9;
        border: 1px solid #cccccc;
        font-size: 14px;
        margin: 0;
        padding: 10px 15px;
    }

</style>
<?php
$currency = \App\Models\Setting::where('setting_key','currency')->get();
$currency_position = \App\Models\Setting::where('setting_key','currency_position')->get();
$pdf_logo = \App\Models\Setting::where('setting_key','pdf_logo')->get();

$pdf_logo = (count($pdf_logo) > 0 ? trim(unserialize($pdf_logo->pluck("setting_value")->toArray()[0])) : '');
$currency = (count($currency) > 0) ? ((trim(unserialize($currency->pluck("setting_value")->toArray()[0]) == 'USD')) ? '$' : '£') : '$';
$currency_position = (count($currency_position) > 0) ? unserialize($currency_position->pluck("setting_value")->toArray()[0]) : 'left';
?>

<div class="invoice_pdf_table">
<table>
    <tr>
        <td>
            <img src="<?php echo e(url('uploads/site/'.$pdf_logo)); ?>" height="100px" width="400px" alt="img" align="center" class="pdf-img">
        </td>
        <td>
            <table class="text-right">
                <tr><td class="pdf_title">Invoice number : <?php echo e($event->id.''.str_replace("-",'',date('d-m-Y',strtotime($event->booking->from_date))) . '' . str_replace(":",'',str_replace( "pm",'',str_replace("am",'',$event->start_time)))); ?></td></tr>
                <tr><td><?php echo e(($event->logistics->function_address != NULL ? $event->logistics->function_address : 'No Address Provided')); ?></td></tr>
                <tr><td><?php echo e(($event->lead ? $event->lead->mobile: 'No Contact Provided')); ?></td></tr>
                <tr><td><b>Invoice Date : <?php echo e($event->booking->from_date); ?></b></td></tr>
                <tr><td><b>Invoice Due Date : <?php echo e(date('d/m/Y',strtotime($event->deposit->due_date))); ?></b></td></tr>
                
                
                
            </table>
        </td>
    </tr>
</table>


<hr class="pdf-hr">

<table>
    <tr>
        <td>
            <table class="table table-bordered table-border">
                <tbody>
                <tr class="pdf-header-color table-title td-padding table-border">
                    <td class="table-border td-padding"><b>Banquet's Name</b></td>
                    
                    <td class="table-border td-padding"><b>Address of the Banquet</b></td>
                   
                    
                   
                </tr>
                <tr>
                    <?php
                        $temp = explode(' ', ucwords($event->contactus->event_type_trashed->name));
                        $result = '';
                        foreach($temp as $t)
                            $result .= $t[0];
                        $final_name = $result .'_Event_' . str_replace("-",'',date('d-m-Y',strtotime($event->booking->from_date))) . '' . str_replace(":",'',str_replace( "pm",'',str_replace("am",'',$event->start_time)));
                    ?>
                    <td class="table-border td-padding"><?php echo e($final_name); ?></td>
                    
                    <td class="table-border td-padding"><?php echo e(($event->logistics->function_address != NULL ? $event->logistics->function_address : 'No Address Provided')); ?></td>
                    
                    
                    
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td class="pdf-box-content" style="padding:0;">
            <table class="banquetid_table">
                <tr>
                    <td><h3><b>Banquet's Booked ID</b></h3></td>
                </tr>
                <tr>
                    <td>
                        <table class="pdf_extra_dec">
                            <tr>
                                <td><b>Address : </b><?php echo e(($event->logistics->function_address != NULL ? $event->logistics->function_address : 'No Address Provided')); ?></td>
                            </tr>
                            <tr>
                                <td><b>Booked For : </b><?php echo e($event->booking->booking_name); ?></td>
                            </tr>
                            <tr>
                                <td><b>Contact Number : </b><?php echo e(($event->lead ? $event->lead->mobile: 'No Contact Provided')); ?></td>
                            </tr>
                            <tr>
                                <td><b>Payment Mode : </b><?php echo e($event->financials->depositType != NULL ? $event->financials->depositType->name : 'No Payment Method Selected'); ?></td>
                            </tr>
                            <tr>
                                <td><b>Amount Given in Advance : </b>
                                    <?php if($currency_position == 'left'): ?>
                                        <?php echo e($currency); ?> <?php echo e($event->financials->deposit_amount); ?>

                                    <?php else: ?>
                                        <?php echo e($event->financials->deposit_amount); ?> <?php echo e($currency); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Date of The Event : </b><?php echo e($event->booking->from_date); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="pdf-box-content-2">
            <table class="table table-bordered table-border">
                <tbody>
                <tr class="pdf-header-color table-title td-padding table-border">
                    <td class=" td-padding"><b>Rooms</b></td>
                    
                    
                </tr>
                <?php $rooms = \App\Models\EventRooms::whereIn('id',explode(",",$event->rooms))->get(); ?>

                <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class=" td-padding"><?php echo e($room->room_name); ?></td>
                        
                        
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </td>
    </tr>
    <?php $subtotal = 0;?>
    <tr>
        <td class="pdf-box-content-2">
            <table class="table table-bordered table-border">
                <tbody>
                <tr class="pdf-header-color table-title td-padding table-border">
                    <td class="td-padding" colspan="3"><b>Food</b></td>
                    <td class="td-padding" align="right"><b>Total Amount</b></td>
                </tr>
                    <?php if(count($event->event_menu) >0 ): ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="td-padding" colspan="3"><?php echo e($menu->name); ?></td>
                                <?php $allTotal = 0; ?>
                                <?php $__currentLoopData = $menu->sub_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($menu_items_id[$sub_menu->id])): ?>
                                        <?php if(count($menu_items_id[$sub_menu->id])): ?>
                                            <?php $total = 0; ?>
                                            <?php $__currentLoopData = $sub_menu->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk =>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(in_array($items->id,explode(",",$menu_items_id[$sub_menu->id]))): ?>
                                                    <?php $total = $total + $items->price ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php $allTotal = $allTotal + $total ?>
                                            <?php $subtotal = $subtotal + $total ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($currency_position == 'left'): ?>
                                    <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($allTotal); ?></td>
                                <?php else: ?>
                                    <td class="td-padding" align="right">$<?php echo e($allTotal); ?> <?php echo e($currency); ?></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td class="pdf-box-content-2">
            <table class="table table-bordered table-border">
                <tbody>
                <tr class="pdf-header-color table-title td-padding table-border">
                    <td class="td-padding"><b>Estimated Bills</b></td>
                    
                    <td class="td-padding" align="right"><b>Total</b></td>
                </tr>
                <tr>
                    <td class="td-padding">Equipment</td>
                    <?php if($event->event_equipment->equipment_type != NULL || $event->event_equipment->equipment_type != ''): ?>
                        <?php $total = 0; ?>
                        <?php $equipment = \App\Models\Equipments::whereIn('id', explode(",", $event->event_equipment->equipment_type))->get() ?>
                        <?php $__currentLoopData = $equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $total = $total + $value->price ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td class="td-padding" align="right">$<?php echo e($total); ?></td>
                        <?php $subtotal = $subtotal + $total ?>
                    <?php endif; ?>
                </tr>
                <tr>
                    <td class="td-padding">Catering</td>
                    <?php if(count($event->event_menu) > 0): ?>
                        <?php if($event->event_menu[0]->caterer_id != NULL || $event->event_menu[0]->caterer_id != ''): ?>
                            <?php $caterer = \App\Models\EventCaterers::where('id', $event->event_menu[0]->caterer_id)->first() ?>
                            <?php if($currency_position == 'left'): ?>
                                <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($caterer->price); ?></td>
                            <?php else: ?>
                                <td class="td-padding" align="right"><?php echo e($caterer->price); ?> <?php echo e($currency); ?></td>
                            <?php endif; ?>
                            <?php $subtotal = $subtotal + $caterer->price ?>
                        <?php else: ?>
                            <?php if($currency_position == 'left'): ?>
                                <td class="td-padding" align="right"><?php echo e($currency); ?> 0</td>
                            <?php else: ?>
                                <td class="td-padding" align="right">0 <?php echo e($currency); ?></td>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </tr>
                <tr>
                    <td class="td-padding">Food and Beverage Agreement</td>
                    <?php if($event->financials->food_beverage_min != NULL || $event->financials->food_beverage_min != ''): ?>
                        <?php if($currency_position == 'left'): ?>
                            <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($event->financials->food_beverage_min); ?></td>
                        <?php else: ?>
                            <td class="td-padding" align="right"><?php echo e($event->financials->food_beverage_min); ?> <?php echo e($currency); ?></td>
                        <?php endif; ?>
                        <?php $subtotal = $subtotal + $event->financials->food_beverage_min  ?>
                    <?php else: ?>
                        <?php if($currency_position == 'left'): ?>
                            <td class="td-padding" align="right"><?php echo e($currency); ?> 0</td>
                        <?php else: ?>
                            <td class="td-padding" align="right">0 <?php echo e($currency); ?></td>
                        <?php endif; ?>
                    <?php endif; ?>
                </tr>
                <tr>
                    <td class="td-padding">Rental Fees</td>
                    <?php if($event->financials->rental_fee != NULL || $event->financials->rental_fee != ''): ?>
                        <?php if($currency_position == 'left'): ?>
                            <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($event->financials->rental_fee); ?></td>
                        <?php else: ?>
                            <td class="td-padding" align="right"><?php echo e($event->financials->rental_fee); ?> <?php echo e($currency); ?></td>
                        <?php endif; ?>
                        <?php $subtotal = $subtotal + $event->financials->rental_fee  ?>
                    <?php else: ?>
                        <?php if($currency_position == 'left'): ?>
                            <td class="td-padding" align="right"><?php echo e($currency); ?> 0</td>
                        <?php else: ?>
                            <td class="td-padding" align="right">0 <?php echo e($currency); ?></td>
                        <?php endif; ?>
                    <?php endif; ?>
                </tr>
                <tr>
                    <td class="td-padding">photography</td>
                    <?php if($event->event_photographers->photographer_id != NULL || $event->event_photographers->photographer_id != ''): ?>
                        <?php if($currency_position == 'left'): ?>
                            <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($event->event_photographers->photographers->price); ?></td>
                        <?php else: ?>
                            <td class="td-padding" align="right"><?php echo e($event->event_photographers->photographers->price); ?> <?php echo e($currency); ?> </td>
                        <?php endif; ?>
                        <?php $subtotal = $subtotal + $event->event_photographers->photographers->price  ?>
                    <?php else: ?>
                        <?php if($currency_position == 'left'): ?>
                            <td class="td-padding" align="right"><?php echo e($currency); ?> 0</td>
                        <?php else: ?>
                            <td class="td-padding" align="right">0 <?php echo e($currency); ?></td>
                        <?php endif; ?>
                    <?php endif; ?>

                </tr>
                <tr>
                    <td class="td-padding">Decoration</td>
                    <?php if($event->event_decorator->decorator_id != NULL || $event->event_decorator->decorator_id != ''): ?>
                        <?php if($currency_position == 'left'): ?>
                            <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($event->event_decorator->decorator->price); ?></td>
                        <?php else: ?>
                            <td class="td-padding" align="right"><?php echo e($event->event_decorator->decorator->price); ?> <?php echo e($currency); ?></td>
                        <?php endif; ?>
                        <?php $subtotal = $subtotal + $event->event_decorator->decorator->price  ?>
                    <?php else: ?>
                        <?php if($currency_position == 'left'): ?>
                            <td class="td-padding" align="right"><?php echo e($currency); ?> 0</td>
                        <?php else: ?>
                            <td class="td-padding" align="right">0 <?php echo e($currency); ?></td>
                        <?php endif; ?>
                    <?php endif; ?>
                </tr>
                <tr>
                    <td class="td-padding">Entertainment</td>
                    <?php if($event->event_entertainment->entertainment_id != NULL || $event->event_entertainment->entertainment_id != ''): ?>
                        <?php if($currency_position == 'left'): ?>
                            <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($event->event_entertainment->entertainment->price); ?></td>
                        <?php else: ?>
                            <td class="td-padding" align="right"><?php echo e($event->event_entertainment->entertainment->price); ?> <?php echo e($currency); ?></td>
                        <?php endif; ?>
                        <?php $subtotal = $subtotal + $event->event_entertainment->entertainment->price  ?>
                    <?php else: ?>
                        <?php if($currency_position == 'left'): ?>
                            <td class="td-padding" align="right"><?php echo e($currency); ?> 0</td>
                        <?php else: ?>
                            <td class="td-padding" align="right">0 <?php echo e($currency); ?></td>
                        <?php endif; ?>
                    <?php endif; ?>
                </tr>
                <tr>
                    <td class="td-padding">Others</td>
                    <?php if($event->event_miscellaneous): ?>
                        <?php if($event->event_miscellaneous->miscellaneous != NULL || $event->event_entertainment->miscellaneous != '' || $event->event_entertainment->miscellaneous != 0): ?>
                            <?php $others = \App\Models\Miscellaneous::whereIn('id',explode(",",$event->event_miscellaneous->miscellaneous))->get() ?>
                            <?php $other_total = 0 ?>
                            <?php $__currentLoopData = $others; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $other_total = $other_total + $values->price ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($currency_position == 'left'): ?>
                                <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($other_total); ?></td>
                            <?php else: ?>
                                <td class="td-padding" align="right"><?php echo e($other_total); ?> <?php echo e($currency); ?></td>
                            <?php endif; ?>
                            <?php $subtotal = $subtotal + $other_total  ?>
                        <?php else: ?>
                            <?php if($currency_position == 'left'): ?>
                                <td class="td-padding" align="right"><?php echo e($currency); ?> 0</td>
                            <?php else: ?>
                                <td class="td-padding" align="right">0 <?php echo e($currency); ?></td>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </tr>
                <tr class="g_total">
                    <td class="td-padding">Subtotal</td>
                    
                    <?php if($currency_position == 'left'): ?>
                        <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($subtotal); ?></td>
                    <?php else: ?>
                        <td class="td-padding" align="right"><?php echo e($subtotal); ?> <?php echo e($currency); ?></td>
                    <?php endif; ?>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td class="pdf-box-content-2">
            <table class="table table-bordered table-border">
                <tbody>
                <tr>
                    <td class="td-padding"><b>Sales Tax</b></td>
                    <td class="td-padding">-</td>
                    <td class="td-padding" align="right"><?php echo e(Settings::get('sales_tax')); ?>%</td>
                </tr>
                <tr>
                    <td class="td-padding"><b>Grand Total</b></td>
                    <td class="td-padding">-</td>
                    <?php $grand_total = $subtotal + (($subtotal * Settings::get('sales_tax')) / 100) ?>
                    <?php if($currency_position == 'left'): ?>
                        <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($grand_total); ?></td>
                    <?php else: ?>
                        <td class="td-padding" align="right"><?php echo e($grand_total); ?> <?php echo e($currency); ?></td>
                    <?php endif; ?>
                </tr>

                <tr>
                    <td class="td-padding">Deposit 1 (Due <?php echo e(date('d/m/Y',strtotime($event->deposit->due_date))); ?>)</td>
                    <td class="td-padding">-</td>
                    <?php if($currency_position == 'left'): ?>
                        <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($event->financials->deposit_amount); ?></td>
                    <?php else: ?>
                        <td class="td-padding" align="right"><?php echo e($event->financials->deposit_amount); ?> <?php echo e($currency); ?></td>
                    <?php endif; ?>
                </tr>

                <tr>
                    <td class="td-padding">Deposit 2 (Due <?php echo e(date('d/m/Y',strtotime($event->deposit->sec_deposit_due))); ?>)</td>
                    <td class="td-padding">-</td>
                    <?php if($currency_position == 'left'): ?>
                        <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($event->deposit->sec_deposit); ?></td>
                    <?php else: ?>
                        <td class="td-padding" align="right"><?php echo e($event->deposit->sec_deposit); ?> <?php echo e($currency); ?></td>
                    <?php endif; ?>
                </tr>

                <tr>
                    <td class="td-padding"><b>Estimated Amount Due</b></td>
                    <td class="td-padding"><b>-</b></td>
                    <?php if($currency_position == 'left'): ?>
                        <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($event->financials->amount_due); ?></td>
                    <?php else: ?>
                        <td class="td-padding" align="right"><?php echo e($event->financials->amount_due); ?> <?php echo e($currency); ?></td>
                    <?php endif; ?>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>



<table align="center" class="pdf-sign">
    <tr>
        <td class="sign-content">
            <hr>
            <span><?php echo e($event->user->first_name); ?> <?php echo e($event->user->last_name); ?></span>
        </td>

        <td class="sign-content">
            <hr>
            <span><?php echo e($event->user->first_name); ?> <?php echo e($event->user->last_name); ?> Signature</span>
        </td>
        <td class="sign-content">
            <hr>
            <span>Date</span>
        </td>
    </tr>
</table>

</div>




