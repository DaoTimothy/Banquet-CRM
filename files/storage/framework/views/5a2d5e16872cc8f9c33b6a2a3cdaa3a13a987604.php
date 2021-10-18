<style>
    .table-title {
        background-color: #CCCCCC;
    }

    .table-title-padding {
        padding-left: 15px;
        height: 40px;
    }

    .pdf-content-top-margin {
        margin-top: 20px;
    }

    .pdf-sign {
        padding-top: 100px;
    }

    table{
        width: 100%;
    }

    .sign-content{
        width: 33%;
        text-align: center;
    }
</style>
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

<table align="center">
    <tr>
        <td><h3><b>Banquet Event Order</b></h3></td>
    </tr>
    <tr>
        <td>
            <hr class="pdf-hr">
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" align="center">
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td><b>Event : </b><?php echo e($event->name); ?></td>
                            </tr>
                            
                                
                            
                            <tr>
                                <td><b>Contact : </b><?php echo e(($event->logistics->contact_on_day != NULL ? $event->logistics->contact_on_day : 'No Contact Provided')); ?></td>
                            </tr>
                            <tr>
                                <td><b>Phone : </b><?php echo e(($event->logistics->contact_phone != NULL ? $event->logistics->contact_phone : 'No Contact Provided')); ?></td>
                            </tr>
                            
                                
                            
                            <tr>
                                <td><b>Address : </b><?php echo e(($event->logistics->function_address != NULL ? $event->logistics->function_address : 'No Address Provided')); ?></td>
                            </tr>
                            <tr>
                                <td><b>Event Planner : </b><?php echo e($event->owner->name); ?></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td><b>Date : </b><?php echo e(date('D d,Y',strtotime($event->booking->from_date))); ?></td>
                            </tr>
                            <tr>
                                <td><b>Time : </b><?php echo e($event->start_time); ?></td>
                            </tr>
                            <tr>
                                <td><b>Location :</b><?php echo e($event->rooms); ?></td>
                            </tr>
                            <tr>
                                <td><b>Event Type : </b><?php echo e($event->contactus->event_type->name); ?></td>
                            </tr>
                            <tr>
                                <td><b>Guest : </b><?php echo e($event->contactus->expected_guest); ?></td>
                            </tr>
                            <tr>
                                <td><b>GTD Guest : </b><?php echo e($event->contactus->guarnteed_guest); ?></td>
                            </tr>
                            
                                
                            
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<?php if(count($event->event_menu) > 0): ?>
    <?php $__currentLoopData = $event->event_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table align="center" class="pdf-content-top-margin">
            <table class="table" align="center">
                <tbody class="pdf-header-color table-title">
                <tr>
                    <td class="table-title-padding"><b><?php echo e($menus->menu_type->name); ?></b></td>
                </tr>
                </tbody>
                <table class="table" width="100%">
                    <tbody>
                    <tr>
                        
                        <td><b>Item</b></td>
                        <td><b>Price</b></td>
                        
                        
                    </tr>
                    <?php $menu_items = \App\Models\Menus::whereIn('id',explode(",",$menus->menu_choice))->get(); ?>
                    <?php $__currentLoopData = $menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            
                            <td><?php echo e($value->name); ?></td>
                            <td>$<?php echo e($value->price); ?></td>
                            
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </table>
        </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<table align="center" class="pdf-content-top-margin">
    <table class="table" align="center">
        <tbody class="pdf-header-color table-title">
        <tr>
            <td class="table-title-padding"><b>Estimated Billing</b></td>
        </tr>
        </tbody>
        <table class="table">
            <tbody>
            <tr>
                <td><b></b></td>
                
                <td><b>Total</b></td>
            </tr>
            
                
                
                
            
            <?php $subtotal = 0 ;?>
            <tr>
                <td>Equipment</td>
                <?php if($event->event_equipment->equipment_type != NULL || $event->event_equipment->equipment_type != ''): ?>
                    <?php $total=0; ?>
                    <?php $equipment = \App\Models\Equipments::whereIn('id',explode(",",$event->event_equipment->equipment_type))->get() ?>
                    <?php $__currentLoopData = $equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $total = $total + $value->price ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <td> $<?php echo e($total); ?></td>
                    <?php $subtotal = $subtotal + $total ?>
                <?php endif; ?>
            </tr>
            <tr>
                <td>Catering</td>
                <?php if($event->event_menu[0]->caterer_id != NULL || $event->event_menu[0]->caterer_id != ''): ?>
                    <?php $caterer = \App\Models\EventCaterers::where('id',$event->event_menu[0]->caterer_id)->first() ?>
                    <td>$<?php echo e($caterer->price); ?></td>
                    <?php $subtotal = $subtotal + $caterer->price ?>
                <?php else: ?>
                    <td>$0</td>
                <?php endif; ?>
            </tr>
            <tr>
                <td>Food and Beverage Agreement</td>
                <?php if($event->financials->grand_total != NULL || $event->financials->grand_total != ''): ?>
                    <td>$<?php echo e($event->financials->grand_total); ?></td>
                    <?php $subtotal = $subtotal + $event->financials->grand_total  ?>
                <?php else: ?>
                    <td>$0</td>
                <?php endif; ?>
            </tr>
            <tr>
                <td>photography</td>
                <?php if($event->event_photographers->photographer_id != NULL || $event->event_photographers->photographer_id != ''): ?>
                    <td>$<?php echo e($event->event_photographers->photographers->price); ?></td>
                    <?php $subtotal = $subtotal + $event->event_photographers->photographers->price  ?>
                <?php else: ?>
                    <td>$0</td>
                <?php endif; ?>

            </tr>
            <tr>
                <td>Decoration</td>
                <?php if($event->event_decorator->decorator_id != NULL || $event->event_decorator->decorator_id != ''): ?>
                    <td>$<?php echo e($event->event_decorator->decorator->price); ?></td>
                    <?php $subtotal = $subtotal + $event->event_decorator->decorator->price  ?>
                <?php else: ?>
                    <td>$0</td>
                <?php endif; ?>
            </tr>
            <tr>
                <td>Entertainment</td>
                <?php if($event->event_entertainment->entertainment_id != NULL || $event->event_entertainment->entertainment_id != ''): ?>
                    <td>$<?php echo e($event->event_entertainment->entertainment->price); ?></td>
                    <?php $subtotal = $subtotal + $event->event_entertainment->entertainment->price  ?>
                <?php else: ?>
                    <td>$0</td>
                <?php endif; ?>
            </tr>
            <tr>
                <td>Subtotal</td>
                
                <td><?php echo e($subtotal); ?></td>
            </tr>
            <tr>
                <td><b>State Sales Tax</b></td>
                
                <?php $subtotal = $subtotal + 652 ?>
                <td>$652.00</td>
            </tr>

            <tr>
                <td><b>Administration Fee</b></td>
                
                <?php $subtotal = $subtotal + 152 ?>
                <td>$152.00</td>
            </tr>

            <tr>
                <td><b>Gratuity</b></td>
                
                <?php $subtotal = $subtotal + 00 ?>
                <td>$00.00</td>
            </tr>

            <tr>
                <td><b>Grand Total</b></td>
                
                <td><b>$<?php echo e($subtotal); ?></b></td>
            </tr>

            <tr>
                <td>Deposit 1 (Due <?php echo e(date('d/m/Y',strtotime($event->deposit->due_date))); ?>)</td>
                
                <td>$<?php echo e($event->financials->deposit_amount); ?></td>
            </tr>

            <tr>
                <td>Deposit 2 (Due <?php echo e(date('d/m/Y',strtotime($event->deposit->sec_deposit_due))); ?>)</td>
                
                <td>$<?php echo e($event->deposit->sec_deposit); ?></td>
            </tr>

            <tr>
                <td><b>Estimated Amount Due</b></td>
                
                <td>$<?php echo e($event->deposit->balance_due); ?></td>
            </tr>

            <tr>
                <td>Price Per Person</td>
                
                <?php $price_per = 0; ?>
                <?php if(count($event->event_menu) > 0): ?>
                    <?php $__currentLoopData = $event->event_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $price_per = $price_per + $menu->menu_type->price_per_person; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <td>$<?php echo e(round($price_per / count($event->event_menu))); ?></td>
            </tr>
            </tbody>
        </table>
    </table>
</table>

<h2 align="center"><b>Terms & Conditions</b></h2>
<hr class="pdf-hr">
<table>
    <tr>
        <td align="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab accusamus aperiam cum dignissimos eaque, enim error expedita iusto minus modi odit
            omnis quis
            quo quos temporibus veniam, veritatis vitae.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias architecto asperiores aut consectetur cum delectus esse excepturi facere hic
            ipsa, nihil nisi, officia praesentium quia, quidem suscipit veritatis vero.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aspernatur doloremque eum illo illum, incidunt labore, libero natus perferendis perspiciatis
            quia quidem reiciendis similique tempore vel. Distinctio dolor labore nesciunt?
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