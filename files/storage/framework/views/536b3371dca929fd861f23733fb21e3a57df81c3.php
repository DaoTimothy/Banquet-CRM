<style>
    .table-border {
        border: 1px solid #808080;
        border-collapse: collapse;
    }

    .td-padding {
        padding: 10px 5px;
    }

    table {
        width: 100%;
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

    .onePagePdf {
        page-break-after: always;
        width: 100%;
    }
</style>
<div class="onePagePdf">
    <table>
        <tr>
            <td>
                <img src="http://banquetcrm.it/uploads/site/logo.png" height="100px" width="400px" alt="img" align="center" class="pdf-img">
            </td>
            <td>
                <table>
                    <tr>
                        <td><b> Address : </b><?php echo e(($event->logistics->function_address != NULL ? $event->logistics->function_address : 'No Address Provided')); ?></td>
                    </tr>
                    <tr>
                        <td><b> Phone : </b> <?php echo e(($event->logistics->contact_phone != NULL ? $event->logistics->contact_phone : 'No Contact Provided')); ?></td>
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
            <td class="table-border td-padding"><?php echo e($event->contactus->event_type->name); ?></td>
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
<table>
    <?php if(count($event->event_menu) >0 ): ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="pdf-box-content">
                    <table>
                        <tr>
                            <td><h3><b><?php echo e($menu->name); ?></b></h3></td>
                        </tr>
                        <tr>
                            <td>
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
                                        <tr>
                                            <td class="table-border td-padding"><b><?php echo e($sub_menu->name); ?></b></td>
                                            <td class="table-border td-padding">
                                                <?php $totalItems = 0; ?>
                                                <?php $total = 0; ?>
                                                <?php $__currentLoopData = $sub_menu->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(in_array($items->id,$menu_items_id)): ?>
                                                        <?php echo e($items->name); ?>

                                                        <?php $totalItems = $totalItems + 1 ?>
                                                        <?php $total = $total + $items->price ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td class="table-border td-padding"><?php echo e($totalItems); ?></td>
                                            <td class="table-border td-padding"><?php echo e($event->contactus->expected_guest); ?></td>
                                            <td class="table-border td-padding" align="right"><?php echo e($total); ?></td>
                                            <?php $allTotal = $allTotal + $total ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="pdf-header-color table-title td-padding">
                                        <td class="table-border td-padding"><b>Total</b></td>
                                        <td class="table-border td-padding" align="right" colspan="4"><b>$<?php echo e($allTotal); ?></b></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <tr>
        <td class="pdf-box-content">
            <table>
                <tr>
                    <td><h3><b>Estimated Billing</b></h3></td>
                </tr>
                <tr>
                    <td class="pdf-box-content-2">
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
                                    <td class="td-padding" align="right">$<?php echo e($total); ?></td>
                                    <?php $subtotal = $subtotal + $total ?>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <td class="td-padding">Catering</td>
                                <?php if(count($event->event_menu) > 0): ?>
                                    <?php if($event->event_menu[0]->caterer_id != NULL || $event->event_menu[0]->caterer_id != ''): ?>
                                        <?php $caterer = \App\Models\EventCaterers::where('id', $event->event_menu[0]->caterer_id)->first() ?>
                                        <td class="td-padding" align="right">$<?php echo e($caterer->price); ?></td>
                                        <?php $subtotal = $subtotal + $caterer->price ?>
                                    <?php else: ?>
                                        <td class="td-padding" align="right">$0</td>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <td class="td-padding">Food and Beverage Agreement</td>
                                <?php if($event->financials->grand_total != NULL || $event->financials->grand_total != ''): ?>
                                    <td class="td-padding" align="right">$<?php echo e($event->financials->grand_total); ?></td>
                                    <?php $subtotal = $subtotal + $event->financials->grand_total  ?>
                                <?php else: ?>
                                    <td class="td-padding" align="right">$0</td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <td class="td-padding">Subtotal</td>
                                
                                <td class="td-padding" align="right">$<?php echo e($subtotal); ?></td>
                            </tr>
                            
                                
                                
                                <?php //$subtotal = $subtotal + 652 ?>
                                
                            

                            
                                
                                
                                <?php //$subtotal = $subtotal + 152 ?>
                                
                            

                            
                                
                                
                                <?php //$subtotal = $subtotal + 00 ?>
                                
                            

                            
                                
                                
                                <?php //$subtotal = $subtotal + 158 ?>
                                
                            
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table>
    <tr>
        <td class="pdf-box-content" align="right">Subtotal: $<?php echo e($subtotal); ?></td>
    </tr>
    <tr>
        <?php $grandtotal = ($subtotal * unserialize(\App\Models\Setting::where("setting_key","sales_tax")->get()->pluck("setting_value")->toArray()[0])) / 100 ?>
        <td align="right" class="pdf-box-content">Sales tax(<?php echo e(unserialize(\App\Models\Setting::where("setting_key","sales_tax")->get()->pluck("setting_value")->toArray()[0])); ?>%):$<?php echo e($grandtotal); ?></td>
    </tr>
    <tr>
        <td align="right" class="pdf-box-content"><b>Total</b>: $<?php echo e($subtotal + $grandtotal); ?></td>
    </tr>
</table>
<h2 align="center"><b>Terms & Conditions</b></h2>
<hr class="pdf-hr">
<p align="center"><?php echo e($event->additional->message); ?></p>


<table align="center" class="pdf-sign">
    <tr>
        <td class="sign-content">
            <hr>
            <span><?php echo e($event->owner->name); ?></span>
        </td>

        <td class="sign-content">
            <hr>
            <span><?php echo e($event->owner->name); ?> Signature</span>
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
            <span>Representative Name</span>
        </td>

        <td class="sign-content">
            <hr>
            <span>Representative Signature</span>
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