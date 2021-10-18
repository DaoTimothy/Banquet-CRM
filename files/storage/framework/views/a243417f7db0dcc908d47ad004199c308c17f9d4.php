<style>
    @import  url(https://fonts.googleapis.com/css?family=Poppins:400,500,600);

    html {
        font-family: 'Poppins', sans-serif;
        font-size:12px;
        color: #53505f;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
    }

    .td-padding {
        padding: 10px 5px;
    }

    .table > thead > tr > th, .table > thead > tr > td, .table > tbody > tr > th, .table > tbody > tr > td, .table > tfoot > tr > th, .table > tfoot > tr > td {
        border-bottom: 1px solid #dddddd;
        padding: 15px 10px;

    }

    .table-bordered {
        border: 1px solid #dddddd;
        border-collapse: collapse!important;
    }

    .pdf-sub-img {
        width: 200px;
    }

    .praposal-title-content {
        margin: 50px 0;
    }

    .praposal-main-content {
        margin-top: 50px;
    }

    table {
        width: 100%;
    }

    .g_total {
        font-size: 22px;
        font-weight: bold;
    }

    .invoice_pdf_table .pdf-header-color {
        background-color: #ffffff;
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

    .pdf-box-content-2 {
        padding: 10px 0;
    }

    .booking_form_page h3 {
        border-bottom: medium none;
        font-size: 16px;
        padding: 10px 15px 10px 0;
        margin: 0;
    }

    .pdf-sign td {
        padding: 20px 10px 0;
        width: 150px;
    }

    .pdf-hr {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        border-color: #808080;
        border-image: none;
        border-style: solid;
        border-width: 5px 0 0;
        margin-bottom: 18px;
        margin-top: 18px;
    }

    hr {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        border-color: #eeeeee currentcolor currentcolor;
        border-image: none;
        border-style: solid none none;
        border-width: 1px 0 0;
        margin-bottom: 18px;
        margin-top: 18px;
    }

    .booking_bill_type {
        border: medium none;
        margin-bottom: 20px;
        padding: 0;
    }

    .booking_form_page h2 {
        margin-top: 30px;
    }

    .text-right {
        text-align: right;
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

<div class="invoice_pdf_table booking_form_page">
<div class="onePagePdf">
    <table>
        <tr>
            <td>
                <img src="<?php echo e(url('uploads/site/'.$pdf_logo)); ?>" height="100px" width="400px" alt="img" align="center" class="pdf-img">
            </td>
            <td>
                <table>
                    <tr>
                        <td><b> Address : </b><?php echo e(($event->logistics->function_address != NULL ? $event->logistics->function_address : 'No Address Provided')); ?></td>
                    </tr>
                    <tr>
                        <td><b> Phone : </b> <?php echo e(($event->lead ? $event->lead->mobile: 'No Contact Provided')); ?></td>
                    </tr>
                    
                    
                    
                </table>
            </td>
        </tr>
    </table>
    <h3><b>Event Information</b></h3>
    <table class="table table-bordered table-border">
        <tbody>
        <tbody>
        <tr>
            <td class="table-border td-padding"><b>Types of Event</b></td>
            <td class="table-border td-padding"><?php echo e($event->contactus->event_type_trashed->name); ?></td>
            <td class="table-border td-padding"><b>Date Of Event</b></td>
            <td class="table-border td-padding"><?php echo e(date('D d,Y',strtotime($event->booking->from_date))); ?></td>
        </tr>
        <tr>
            <td class="table-border td-padding"><b>Address for your event</b></td>
            <td class="table-border td-padding" colspan="3"><?php echo e(($event->logistics->function_address != NULL ? $event->logistics->function_address : 'No Address Provided')); ?></td>
        </tr>
        <tr>
            <td class="table-border td-padding"><b>Our Arrival Time</b></td>
            <td class="table-border td-padding"><?php echo e(($event->logistics->arrival_time != NULL ? $event->logistics->arrival_time : 'No Time Provided')); ?></td>
            <td class="table-border td-padding"><b>Food Service Time</b></td>
            <td class="table-border td-padding"><?php echo e(($event->eating_times->service_time != NULL ? $event->eating_times->service_time : 'No Time Provided')); ?></td>
        </tr>

        <tr>
            <td class="table-border td-padding"><b>Times you would like to meal served?</b></td>
            <td class="table-border td-padding"><b>Canapes
                    : </b><?php echo e(($event->eating_times->canapes != NULL || $event->eating_times->canapes != '' ? $event->eating_times->canapes : 'No Time Provided')); ?></td>
            <td class="table-border td-padding"><b>Main
                    : </b><?php echo e(($event->eating_times->service_time != NULL || $event->eating_times->service_time != '' ? $event->eating_times->service_time : 'No Time Provided')); ?>

            </td>
            <td class="table-border td-padding"><b>Dessert
                    : </b><?php echo e(($event->eating_times->dinner_time != NULL || $event->eating_times->dinner_time != '' ? explode("_",$event->eating_times->dinner_time)[0] : 'No Time Provided')); ?>

            </td>
        </tr>

        <tr>
            <td class="table-border td-padding"><b>Time to snacks Served?</b></td>
            <td class="table-border td-padding"><?php echo e(($event->eating_times->morning_snacks_time != NULL || $event->eating_times->morning_snacks_time != '' ? explode("_",$event->eating_times->morning_snacks_time)[0] : 'No Time Provided')); ?>

                To <?php echo e(($event->eating_times->morning_snacks_time != NULL || $event->eating_times->morning_snacks_time != '' ? explode("_",$event->eating_times->morning_snacks_time)[1] : 'No Time Provided')); ?></td>
            <td class="table-border td-padding"><?php echo e(($event->eating_times->evening_snacks_time != NULL || $event->eating_times->evening_snacks_time != '' ? explode("_",$event->eating_times->evening_snacks_time)[0] : 'No Time Provided')); ?>

                To <?php echo e(($event->eating_times->evening_snacks_time != NULL || $event->eating_times->evening_snacks_time != '' ? explode("_",$event->eating_times->evening_snacks_time)[1] : 'No Time Provided')); ?></td>
            <td class="table-border td-padding"></td>
        </tr>

        <tr>
            <td class="table-border td-padding"><b>Number of people in Total</b></td>
            <td class="table-border td-padding"><?php echo e(($event->contactus->expected_guest != NULL || $event->contactus->expected_guest != '' ? $event->contactus->expected_guest : 'No Guest List Provided')); ?></td>
            <td class="table-border td-padding"><b>How many under
                    12yrs? </b> <?php echo e(($event->kids->under_12_years != NULL || $event->kids->under_12_years != '' ? $event->kids->under_12_years : 'No Children In Event')); ?></td>
            <td class="table-border td-padding"><b>How many under
                    5yrs? </b> <?php echo e(($event->kids->under_5_years != NULL || $event->kids->under_5_years != '' ? $event->kids->under_5_years : 'No Children In Event')); ?></td>
        </tr>
        </tbody>
    </table>
</div>
<h2 align="center"><b>Menu Includes</b></h2>
<hr class="pdf-hr">

    <?php if(count($event->event_menu) >0 ): ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h3><b><?php echo e($menu->name); ?></b></h3>
            <table class="table table-bordered table-border">
                <tbody>
                <?php $allTotal = 0; ?>
                <tr class="pdf-header-color table-title td-padding">
                    <td class="table-border td-padding"><b>Food Type</b></td>
                    <td class="table-border td-padding"><b>Food Items</b></td>
                    <td class="table-border td-padding"><b>No. of Items</b></td>
                    <td class="table-border td-padding"><b>QTY</b></td>
                    <td class="table-border td-padding" align="right"><b>Price</b></td>
                </tr>
                <?php $__currentLoopData = $menu->sub_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($menu_items_id[$sub_menu->id])): ?>
                        <?php if(count($menu_items_id[$sub_menu->id])): ?>
                            <tr>
                                <td class="table-border td-padding"><b><?php echo e($sub_menu->name); ?></b></td>
                                <td class="table-border td-padding">
                                    <?php $totalItems = 0; ?>
                                    <?php $total = 0; ?>
                                    <?php $__currentLoopData = $sub_menu->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk =>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(in_array($items->id,explode(",",$menu_items_id[$sub_menu->id]))): ?>
                                            <?php if($kk != 0): ?>,<?php endif; ?> <?php echo e($items->name); ?>

                                            <?php $totalItems = $totalItems + 1 ?>
                                            <?php $total = $total + $items->price ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td class="table-border td-padding"><?php echo e($totalItems); ?></td>
                                <td class="table-border td-padding"><?php echo e($event->contactus->expected_guest); ?></td>
                                <?php if($currency_position == 'left'): ?>
                                    <td class="table-border td-padding" align="right"><?php echo e($currency); ?> <?php echo e($total); ?></td>
                                <?php else: ?>
                                    <td class="table-border td-padding" align="right"><?php echo e($total); ?> <?php echo e($currency); ?></td>
                                <?php endif; ?>
                                <?php $allTotal = $allTotal + $total ?>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr class="pdf-header-color table-title td-padding">
                    <td class="table-border td-padding"><b>Total</b></td>
                    <?php if($currency_position == 'left'): ?>
                        <td class="table-border td-padding" align="right" colspan="4"><b><?php echo e($currency); ?> <?php echo e($allTotal); ?></b></td>
                    <?php else: ?>
                        <td class="table-border td-padding" align="right" colspan="4"><b><?php echo e($allTotal); ?> <?php echo e($currency); ?></b></td>
                    <?php endif; ?>
                </tr>
                </tbody>
            </table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

        <h3><b>Estimated Billing</b></h3>
        <table class="table table-bordered table-border">
            <tbody>
            <tr class="pdf-header-color table-title td-padding">
                <td class="table-border td-padding"><b>Bills</b></td>
                
                <td class="table-border td-padding" align="right"><b>Total</b></td>
            </tr>
            <?php $subtotal = 0;?>
            <tr>
                <td class="td-padding">Equipment</td>
                <?php if($event->event_equipment->equipment_type != NULL || $event->event_equipment->equipment_type != ''): ?>
                    <?php $total = 0; ?>
                    <?php $equipment = \App\Models\Equipments::whereIn('id', explode(",", $event->event_equipment->equipment_type))->get() ?>
                    <?php $__currentLoopData = $equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $total = $total + $value->price ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($currency_position == 'left'): ?>
                        <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($total); ?></td>
                    <?php else: ?>
                        <td class="td-padding" align="right"><?php echo e($total); ?> <?php echo e($currency); ?></td>
                    <?php endif; ?>
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
                <?php if($event->financials->grand_total != NULL || $event->financials->grand_total != ''): ?>
                    <?php if($currency_position == 'left'): ?>
                        <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($event->financials->grand_total); ?></td>
                    <?php else: ?>
                        <td class="td-padding" align="right"><?php echo e($event->financials->grand_total); ?> <?php echo e($currency); ?></td>
                    <?php endif; ?>
                    <?php $subtotal = $subtotal + $event->financials->grand_total  ?>
                <?php else: ?>
                    <?php if($currency_position == 'left'): ?>
                        <td class="td-padding" align="right"><?php echo e($currency); ?> 0</td>
                    <?php else: ?>
                        <td class="td-padding" align="right">0 <?php echo e($currency); ?></td>
                    <?php endif; ?>
                <?php endif; ?>
            </tr>
            <tr>
                <td class="td-padding">Subtotal</td>
                
                <?php if($currency_position == 'left'): ?>
                    <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($subtotal); ?></td>
                <?php else: ?>
                    <td class="td-padding" align="right"><?php echo e($subtotal); ?> <?php echo e($currency); ?></td>
                <?php endif; ?>
            </tr>
            
            
            
            <?php //$subtotal = $subtotal + 652 ?>
            
            

            
                
                
                <?php //$subtotal = $subtotal + 152 ?>
                
                

            
                
                
                <?php //$subtotal = $subtotal + 00 ?>
                
                

            
                
                
                <?php //$subtotal = $subtotal + 158 ?>
                
                
            </tbody>
        </table>

<table>
    <tr>
        <?php if($currency_position == 'left'): ?>
            <td class="pdf-box-content" align="right">Subtotal: <?php echo e($currency); ?> <?php echo e($subtotal); ?></td>
        <?php else: ?>
            <td class="pdf-box-content" align="right">Subtotal: <?php echo e($subtotal); ?> <?php echo e($currency); ?></td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php $settings_data = \App\Models\Setting::where("setting_key","sales_tax")->get(); ?>
        <?php $grandtotal = ($subtotal * (count($settings_data) > 0 ? unserialize($settings_data->pluck("setting_value")->toArray()[0]) : 0))  / 100 ?>
        <?php if($currency_position == 'left'): ?>
            <td><p>Sales tax(<?php echo e((count($settings_data) > 0) ? unserialize($settings_data->pluck("setting_value")->toArray()[0]) : 0); ?>%): <?php echo e($currency); ?> <?php echo e($grandtotal); ?></p></td>
        <?php else: ?>
            <td><p>Sales tax(<?php echo e((count($settings_data) > 0) ? unserialize($settings_data->pluck("setting_value")->toArray()[0]) : 0); ?>%): <?php echo e($grandtotal); ?> <?php echo e($currency); ?></p></td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php if($currency_position == 'left'): ?>
            <td align="right" class="pdf-box-content"><b>Total</b>: <?php echo e($currency); ?> <?php echo e($subtotal + $grandtotal); ?></td>
        <?php else: ?>
            <td align="right" class="pdf-box-content"><b>Total</b>: <?php echo e($subtotal + $grandtotal); ?> <?php echo e($currency); ?></td>
        <?php endif; ?>
    </tr>
</table>
<h2 align="center"><b>Terms & Conditions</b></h2>
<hr class="pdf-hr">
<p align="center"><?php echo e($event->additional->message); ?></p>


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

<table align="center" class="pdf-sign">
    <tr>
        <td class="sign-content">
            <hr>
            <span><?php echo e(($event->lead ? $event->lead->client_name: 'No Contact Provided')); ?></span>
        </td>

        <td class="sign-content">
            <hr>
            <span><?php echo e(($event->lead ? $event->lead->client_name: 'No Contact Provided')); ?> Signature</span>
        </td>
        <td class="sign-content">
            <hr>
            <span>Date</span>
        </td>
    </tr>
</table>

<table class="pdf-ty">
    <tr align="center">
        <td><h4><b>Thanks You for valuable business !</b></h4></td>
    </tr>
</table>

</div>