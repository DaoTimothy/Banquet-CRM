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
<table>
    <tr>
        <td>
            <img src="<?php echo e(url('uploads/site/'.$pdf_logo)); ?>" height="100px" width="400px" alt="img" align="center" class="pdf-img">
        </td>
        <td>
            <table class="text-right">
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

<h3 class="pdf-content-top-margin"><b>Your Information</b></h3>
<table class="table table-bordered table-border" align="center">
    <tbody>
    <tr class="table-border">
        <td class="table-border td-padding"><b>Full Name</b></td>
        <td class="table-border td-padding"><?php echo e($event->booking->booking_name); ?></td>
        <td class="table-border td-padding"><b>Date</b></td>
        <td class="table-border td-padding"><?php echo e(date('D d,Y',strtotime($event->booking->from_date))); ?></td>
    </tr>
    <tr class="table-border">
        <td class="table-border td-padding"><b>Contact Person</b></td>
        <td class="table-border td-padding"><?php echo e(($event->lead ? $event->lead->client_name: 'No Contact Provided')); ?></td>
        <td class="table-border td-padding"><b>Phone</b>
        <td class="table-border td-padding"><?php echo e(($event->lead ? $event->lead->mobile: 'No Contact Provided')); ?></td>
    </tr>
    
    
    
    
    </tbody>
</table>
<h3 class="pdf-content-top-margin"><b>Your Event Information</b></h3>
<table class="table table-bordered table-border">
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
                : </b><?php echo e(($event->eating_times->service_time != NULL || $event->eating_times->service_time != '' ? $event->eating_times->service_time : 'No Time Provided')); ?></td>
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
<table>
    <tr>
        <td><h2 align="center"><b>Your Menus Includes</b></h2></td>
    </tr>
    <tr>
        <td><hr class="pdf-hr"></td>
    </tr>
</table>
<table>
    <tr>
        <td>
            <table class="table table-bordered table-border">
                <tbody>
                <tr class="pdf-header-color table-title td-padding table-border">
                    <td class="table-border td-padding"><b>QTY</b></td>
                    
                    <td class="table-border td-padding"><b>Catering Name</b></td>
                    <td class="table-border td-padding"><b>Price</b></td>
                    
                </tr>
                <tr class="table-border">
                    <?php $totalFood = 0 ?>
                    <?php if(count($event->event_menu) > 0): ?>
                        <?php $__currentLoopData = $event->event_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $totalFood = $totalFood + count(explode(",",$menu->menu_items)) ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $totalFood = $totalFood * ($event->contactus->expected_guest != NULL || $event->contactus->expected_guest != '' ? $event->contactus->expected_guest : 0) ?>
                    <?php endif; ?>
                    <td class="table-border td-padding"><?php echo e($totalFood); ?></td>
                    

                    <?php if(count($event->event_menu) > 0): ?>
                        <?php $caterer = \App\Models\EventCaterers::where('id', $event->event_menu[0]->caterer_id)->first() ?>
                        <td class="table-border td-padding"><?php echo e($caterer->name); ?></td>
                            <?php if($currency_position == 'left'): ?>
                                <td class="table-border td-padding"><?php echo e($currency); ?> <?php echo e($caterer->price); ?></td>
                            <?php else: ?>
                                <td class="table-border td-padding"><?php echo e($caterer->price); ?> <?php echo e($currency); ?></td>
                            <?php endif; ?>
                        
                    <?php endif; ?>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>

<?php if(count($event->event_menu) > 0 ): ?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3><b><?php echo e($menu->name); ?></b></h3>
        <div class="booking_bill_type">
            <table class="table table-bordered table-border">
            <tbody>
            <tr>
                <td class="table-border td-padding"><b>Date:</b></td>
                <td class="table-border td-padding" colspan="3"><?php echo e(date('D d,Y',strtotime($event->booking->from_date))); ?></td>
                <td class="table-border td-padding"><b>Room:</b></td>
                <td class="table-border td-padding"><?php echo e($event->booking->location->name); ?></td>
            </tr>
            <tr>
                <td class="table-border td-padding"><b>Time:</b></td>
                <td class="table-border td-padding"
                    colspan="3"><?php echo e(($event->eating_times->lunch_time != NULL || $event->eating_times->lunch_time != '' ? explode("_",$event->eating_times->lunch_time)[0] : 'No Time Provided')); ?>

                    To <?php echo e(($event->eating_times->lunch_time != NULL || $event->eating_times->lunch_time != '' ? explode("_",$event->eating_times->lunch_time)[1] : 'No Time Provided')); ?></td>
                <td class="table-border td-padding"><b>No Of Counter:</b></td>
                <td class="table-border td-padding"><?php echo e($event->event_menu[0]->head_table + $event->event_menu[0]->dinning_table); ?></td>
            </tr>
            </tbody>
        </table>
            <table class="table table-bordered table-border">
            <tbody>
            <?php $__currentLoopData = $menu->sub_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($menu_items_id[$sub_menu->id])): ?>
                    <?php if(count($menu_items_id[$sub_menu->id])): ?>
                        <tr>
                            <td class="table-border td-padding"><b><?php echo e($sub_menu->name); ?></b></td>
                            <td class="table-border td-padding">
                                <?php $__currentLoopData = $sub_menu->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(in_array($menu_items->id,explode(",",$menu_items_id[$sub_menu->id]))): ?>
                                        <?php echo e($menu_items->name); ?> ,
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php if($event->event_decorator->decorator_id != NULL || $event->event_decorator->decorator_id != ''): ?>
    <h3><b>Decoration</b></h3>
    <table class="table">
        <tbody>
        <tr>
            <td class="pdf-table-td-padding"><b>Date:</b></td>
            <td class="pdf-table-td-padding" colspan="3"><?php echo e(date('D d,Y',strtotime($event->booking->from_date))); ?></td>
            <td class="pdf-table-td-padding"><b>Company Name:</b></td>
            <td class="pdf-table-td-padding"><?php echo e($event->event_decorator->decorator->name); ?></td>

        </tr>
        <tr>
            <td class="pdf-table-td-padding"><b>Time:</b></td>
            <td class="pdf-table-td-padding" colspan="3"><?php echo e($event->setuptear->setup); ?> To <?php echo e($event->setuptear->teardown); ?></td>
            
            
        </tr>
        </tbody>
    </table>
    <table class="sub-table">
        <tr>
            <td class="pdf-box-content">
                <table class="table table-bordered table-border" align="center">
                    <tbody>
                    <tr class="pdf-header-color table-title td-padding table-border">
                        <td class="table-border td-padding"><b>Decor items</b></td>
                        
                        
                    </tr>
                    <?php if($event->event_decorator->service_needed != NULL || $event->event_decorator->service_needed != ''): ?>
                        <?php $items = explode(",", $event->event_decorator->service_needed) ?>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="table-border">
                                <td class="table-border td-padding"><?php echo e($value); ?></td>
                                
                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr class="table-border">
                            <td class="table-border td-padding">No Item Selected</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
<?php endif; ?>


















































<?php if($event->event_equipment->equipment_type != NULL): ?>
    <table>
        <tr>
            <td>
                <h3><b>Equipment Requirement</b></h3>
            </td>
        </tr>
    </table>
    <table class="table">
        <tbody>
        <tr>
            <td class="pdf-table-td-padding"><b>Date:</b></td>
            <td class="pdf-table-td-padding"><b><?php echo e(date('D d,Y',strtotime($event->booking->from_date))); ?></b> To <b><?php echo e(date('D d,Y',strtotime($event->booking->end_date))); ?></b></td>
            <td class="pdf-table-td-padding"><b>Time:</b></td>
            <td class="pdf-table-td-padding"><?php echo e($event->setuptear->setup); ?></td>
            <td class="pdf-table-td-padding"><b>Room:</b></td>
            <td class="pdf-table-td-padding"><?php echo e($event->rooms); ?></td>
        </tr>
        </tbody>
    </table>
    <table class="sub-table">
        <tr>
            <td class="pdf-box-content">
                <table class="table table-bordered table-border" align="center">
                    <tbody>
                    <tr class="pdf-header-color table-title td-padding table-border">
                        <td class="table-border td-padding"><b>Equipment</b></td>
                        
                        <td class="table-border td-padding"><b>Price</b></td>
                    </tr>
                    <?php $equipments = \App\Models\Equipments::whereIn('id', explode(",", $event->event_equipment->equipment_type))->get() ?>
                    <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="table-border">
                            <td class="table-border td-padding"><?php echo e($value->name); ?></td>
                            
                            <td class="table-border td-padding"><?php echo e($value->price); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
<?php endif; ?>

<?php if($event->event_entertainment->entertainment_id != NULL): ?>
    <table>
        <tr>
            <td>
                <h3><b>Entertainment</b></h3>
            </td>
        </tr>
    </table>
    <table class="table">
        <tbody>
        <tr>
            <td class="pdf-table-td-padding"><b>Date:</b></td>
            <td class="pdf-table-td-padding"><b><?php echo e(date('D d,Y',strtotime($event->booking->from_date))); ?></b> To <b><?php echo e(date('D d,Y',strtotime($event->booking->end_date))); ?></b></td>
            <td class="pdf-table-td-padding"><b>Brand Name:</b></td>
            <td class="pdf-table-td-padding"><?php echo e($event->event_entertainment->entertainment->name); ?></td>
        </tr>
        <tr>
            <td class="pdf-table-td-padding"><b>Time:</b></td>
            <td class="pdf-table-td-padding" colspan="3"><?php echo e($event->setuptear->setup); ?> To <?php echo e($event->setuptear->teardown); ?></td>
            <td class="pdf-table-td-padding"><b>Room:</b></td>
            <td class="pdf-table-td-padding"><?php echo e($event->rooms); ?></td>
        </tr>
        </tbody>
    </table>
    <table class="sub-table">
        <tr>
            <td class="pdf-box-content">
                <table class="table table-bordered table-border" align="center">
                    <tbody>
                    <tr class="pdf-header-color table-title td-padding table-border">
                        <td class="table-border td-padding">Entertainment Type</td>
                        
                        
                    </tr>
                    <?php if($event->event_entertainment->service_needed != NULL): ?>
                        <?php $services = explode(",", $event->event_entertainment->service_needed)  ?>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="table-border">
                                <td class="table-border td-padding"><?php echo e($values); ?></td>
                                
                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr class="table-border">
                            <td class="table-border td-padding" colspan="2">No Item Selected</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
<?php endif; ?>

<?php if($event->event_photographers->photographer_id != NULL): ?>
    <table>
        <tr>
            <td>
                <h3><b>Photography</b></h3>
            </td>
        </tr>
    </table>
    <table class="table table-striped">
        <tbody>
        <tr>
            <td class="pdf-table-td-padding"><b>Date:</b></td>
            <td class="pdf-table-td-padding"><b><?php echo e(date('D d,Y',strtotime($event->booking->from_date))); ?></b> To <b><?php echo e(date('D d,Y',strtotime($event->booking->end_date))); ?></b></td>
            <td class="pdf-table-td-padding"><b>Company Name:</b></td>
            <td class="pdf-table-td-padding"><?php echo e($event->event_photographers->photographers->name); ?></td>
        </tr>
        <tr>
            <td class="pdf-table-td-padding"><b>Time:</b></td>
            <td class="pdf-table-td-padding" colspan="3"><?php echo e($event->setuptear->setup); ?> To <?php echo e($event->setuptear->teardown); ?></td>
            <td class="pdf-table-td-padding"><b>Room:</b></td>
            <td class="pdf-table-td-padding"><?php echo e($event->rooms); ?></td>
        </tr>
        </tbody>
    </table>
    <table class="sub-table">
        <tr>
            <td class="pdf-box-content">
                <table class="table table-bordered table-border" align="center">
                    <tbody>
                    <tr class="pdf-header-color table-title td-padding table-border">
                        <td class="table-border td-padding">Item Name</td>
                        
                    </tr>
                    <?php if($event->event_photographers->service_needed != NULL): ?>
                        <?php $services = explode(",", $event->event_photographers->service_needed) ?>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="table-border">
                                <td class="table-border td-padding"><?php echo e($value); ?></td>
                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr class="table-border">
                            <td class="table-border td-padding">No Service Selected</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
<?php endif; ?>



<table>
    <tr>
        <td>
            <h3><b>Price</b></h3>
        </td>
    </tr>
</table>
<table>
    <tr>
        <td class="pdf-box-content-2">
            <table class="table table-bordered table-border">
                <tbody>
                <tr class="pdf-header-color table-title td-padding table-border">
                    <td class="td-padding"><b>Estimated Bills</b></td>
                    
                    <td class="td-padding" align="right"><b>Total</b></td>
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
                <tr class="g_total">
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
        </td>
    </tr>
    <tr>
        <td class="pdf-box-content-2">
            <table class="table table-bordered table-border">
                <tbody>
                <tr>
                    <td class="td-padding"><b>Grand Total</b></td>
                    <td class="td-padding">-</td>
                    <?php if($currency_position == 'left'): ?>
                        <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($subtotal); ?></td>
                    <?php else: ?>
                        <td class="td-padding" align="right"><?php echo e($subtotal); ?> <?php echo e($currency); ?></td>
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
                        <td class="td-padding" align="right"><?php echo e($currency); ?> <?php echo e($event->deposit->balance_due); ?></td>
                    <?php else: ?>
                        <td class="td-padding" align="right"><?php echo e($event->deposit->balance_due); ?> <?php echo e($currency); ?></td>
                    <?php endif; ?>
                </tr>

                
                    
                    
                    <?php //$price_per = 0; ?>
                    
                    
                    <?php //$price_per = $price_per + $menu->menu_type->price_per_person; ?>
                    
                    
                    
                    
                    
                    
                    
                
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
            <span><?php echo e($event->user->first_name); ?> <?php echo e($event->user->last_name); ?></span>
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

</div>