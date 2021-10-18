<style>
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
    <table>
        <tr>
            <td><h3><b>Banquet Proposal</b></h3></td>
        </tr>
        <tr>
            <td>
                <hr class="pdf-hr">
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <table class="praposal-title-content pdf-first-top-margin">
                                <tr>
                                    <td><b>Prepared For,</b></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo e($event->booking->booking_name); ?></b></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="praposal-title-content pdf-first-top-margin">
                                <tr>
                                    <td><b>Prepared By,</b></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo e($user_data->first_name); ?> <?php echo e($user_data->last_name); ?><br></b></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

<div class="onePagePdf">
    <table>
        <tbody>
        <tr>
            <td align="right"><img src="http://banquetcrm.it/uploads/site/logo.png" class="pdf-sub-img"></td>
            <td align="center"><img src="http://banquetcrm.it/uploads/site/logo.png" class="pdf-sub-img"></td>
            <td align="left"><img src="http://banquetcrm.it/uploads/site/logo.png" class="pdf-sub-img"></td>
        </tr>
        </tbody>
    </table>
    <table class="praposal-main-content pdf-first-top-margin">
        <thead>
        <tr>
            <td><span><b><?php echo e(date('D d,Y')); ?></b></span></td>
        </tr>
        <tr>
            <td><p>Dear <b><?php echo e($event->booking->booking_name); ?>,</b></p></td>
        </tr>
        <tr>
            <td>
                <b><?php echo e($user_data->first_name); ?> <?php echo e($user_data->last_name); ?></b> is pleased to provide you with the attached catering proposal for your <b><?php echo e($event->contactus->event_type->name); ?></b>, which is currently scheduled to be held
                on <b><?php echo e(date('D d,Y',strtotime($event->booking->from_date))); ?></b> at <b><?php echo e($event->booking->location->name); ?></b>. We understand that this is a very important occasion and we are committed to giving our utmost attention to
                make this a very memorable and stress free day.
            </td>
        </tr>
        <tr>
            <td>In addition to an assortment of the finest foods and beverages, a knowledgeable and experienced staff, <b><?php echo e($user_data->first_name); ?> <?php echo e($user_data->last_name); ?></b> boasts a wide selection of china
                and silverware. Furthermore, we have strong relationships with the area’s best vendors for any additional needs. Your dedicated event planner will work with you
                to design the best possible event which will reflect your own personal tastes and preferences. We are confident we can deliver all of these services while
                staying within your desired catering budget.
            </td>
        </tr>
        <tr>
            <td>The attached proposal represents <b><?php echo e($user_data->first_name); ?> <?php echo e($user_data->last_name); ?></b>’s formal offer to provide catering services for the event described therein, upon the terms and
                conditions and pricing provided. As planning begins, some of the details in this document will change to suit your preferences and priorities. Consider this
                proposal an initial overview of our offerings in conjunction to your needs, and should you have any questions about the possibilities, please do not hesitate to
                contact me directly at <b><?php echo e($user_data->email); ?></b> or <b><?php echo e($user_data->phone_number); ?></b>.
            </td>
        </tr>
        <tr>
            <td>Thank you for the opportunity to provide you with this catering proposal. We very much look forward to the opportunity to work with you and to make this
                occasion a momentous one.
            </td>
        </tr>
        </thead>
    </table>
    <table class="praposal-main-content pdf-first-top-margin">
        <tr>
            <td><b>Sincerely,</b></td>
        </tr>
        <tr>
            <td><img src="http://banquetcrm.it/uploads/site/logo.png" class="pdf-sub-img"></td>
        </tr>
        <tr>
            <td><b><?php echo e($user_data->first_name); ?> <?php echo e($user_data->last_name); ?></b></td>
        </tr>
    </table>
</div>

<div class="onePagePdf">
    <table>
        <tr>
            <td><h3><b>About Us</b></h3></td>
        </tr>
        <tr>
            <td>
                <hr class="pdf-hr">
            </td>
        </tr>
    </table>
    <table class="praposal-aboutus-content">
        <thead>
        <tr>
            <td><span><b><?php echo e(date('D d,Y')); ?></b></span></td>
        </tr>
        <tr>
            <td><p>Dear <b><?php echo e($event->booking->booking_name); ?>,</b></p></td>
        </tr>
        <tr>
            <td>
                We fulfill distinct event needs with excitement and creativity, the finest
                quality ingredients, and flawless elegance.
            </td>
        </tr>
        <tr>
            <td>You name the celebration, describe the look and feel you are going for, and then relax. And relax some more. <b><?php echo e($user_data->first_name); ?> <?php echo e($user_data->last_name); ?></b> takes care of
                every detail of your memorable event.
            </td>
        </tr>
        <tr>
            <td>With our unparalleled service, you can count on us to provide you with everything you need for your big event. When you hire <b><?php echo e($user_data->first_name); ?> <?php echo e($user_data->last_name); ?></b>
                you rre guaranteed one of the best events you will ever attend.
            </td>
        </tr>
        </thead>
    </table>
    <table class="praposal-aboutus-topic-content pdf-first-top-margin">
        <thead>
        <tr>
            <td><b>Attendance - </b> <?php echo e($event->contactus->expected_guest); ?> people</td>
        </tr>
        <tr>
            <td><b>Event Date - </b> <?php echo e(date('D d,Y',strtotime($event->booking->from_date))); ?></td>
        </tr>
        <tr>
            <td><b>Event Location - </b> <?php echo e($event->booking->location->name); ?></td>
        </tr>
        <tr>
            <td><b>Event Description - </b> <?php echo e($event->additional->message); ?></td>
        </tr>
        <tr>
            <td><b>Budget - </b><?php echo e($event->financials->actual_amount); ?></td>
        </tr>
        </thead>
    </table>
</div>
<div class="onePagePdf">
    <table>
        <tr>
            <td>
                <h3><b>Equipment Rentals</b></h3>
            </td>
        </tr>
    </table>
    <hr class="pdf-hr">
    <table class="praposal-aboutus-content sub-table">
        <tr>
            <td>
                <table class="table table-bordered table-border">
                    <tbody>
                    <tr class="pdf-header-color table-title td-padding table-border">
                        <td class="table-border td-padding"><b>Equipment</b></td>
                        <td class="table-border td-padding"><b>Price</b></td>
                        <td class="table-border td-padding"><b>QTY</b></td>
                        <td class="table-border td-padding"><b>Subtotal</b></td>
                    </tr>
                    <?php $total = 0; ?>
                    <?php if($event->event_equipment->equipment_type != NULL): ?>
                        <?php $equipment = \App\Models\Equipments::whereIn('id',explode(",",$event->event_equipment->equipment_type))->get(); ?>
                        <?php $__currentLoopData = $equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="table-border">
                                <td class="table-border td-padding"><?php echo e($value->name); ?></td>
                                <td class="table-border td-padding"><?php echo e($value->price); ?></td>
                                <td class="table-border td-padding">1</td>
                                <td class="table-border td-padding"><?php echo e($value->price); ?></td>
                            </tr>
                            <?php
                                $total = $total + $value->price;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr class="table-border">
                            <td class="table-border td-padding" colspan="4">No Equipment Selected</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <table class="sub-table">
        <tr align="right">
            <td class="praposal-Equipment-table">
                <b>Total : </b> <?php echo e($total); ?>

            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td><h3><b>Food and Beverage</b></h3></td>
        </tr>
        <tr>
            <td>
                <hr class="pdf-hr">
            </td>
        </tr>
        <tr>
            <td>
                <table class="praposal-aboutus-topic-content">
                    <?php if(count($event->event_menu) > 0): ?>
                        <?php $__currentLoopData = $event->event_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value->food_category != NULL || $value->food_category != ''): ?>
                                <tr>
                                    <td><b><?php echo e($key + 1); ?>. <?php echo e($value->menu_type->name); ?> - </b> <?php echo e($value->menu_type->price_per_person); ?> Per Person</td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td>No Food Selected</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </td>
        </tr>
    </table>
</div>

<div class="onePagePdf">
    <table>
        <tr>
            <td><h3><b>Event Staff</b></h3></td>
        </tr>
    </table>
    <hr class="pdf-hr">
    <table class="praposal-aboutus-content">
        <tbody>
        <tr>
            <td align="center">
                <img src="http://banquetcrm.it/uploads/site/logo.png" class="pdf-sub-img">
            </td>
            <td>
                We pride ourselves with providing you with the absolute best service. This includes ensuring the best staff will be on hand to make your event
                absolutely incredible. You can sit back and relax and let our professional servers, bartenders, and chefs take care of all the work.
            </td>
        </tr>
        </tbody>
    </table>
    <table class="praposal-aboutus-content sub-table">
        <tr>
            <td>
                <table class="table table-bordered table-border">
                    <tbody>
                    <tr class="pdf-header-color table-title td-padding table-border">
                        <td class="table-border td-padding"><b>Staff Member</b></td>
                        
                        
                    </tr>
                    <?php if($event->logistics->staff_choice != NULL): ?>
                        <?php $staff_data = \App\Models\User::whereIn('id',explode(",",$event->logistics->staff_choice))->get(); ?>
                        <?php $__currentLoopData = $staff_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="table-border">
                                <td class="table-border td-padding"><?php echo e($staff->first_name); ?> <?php echo e($staff->last_name); ?></td>
                                
                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr class="table-border">
                            <td class="table-border td-padding" colspan="3">No Staff Selected</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <p>A Designated event planner from <b><?php echo e($event->owner->name); ?></b> will also be provided and will serve as the main point of contact for <b><?php echo e($event->booking->booking_name); ?></b>.</p>
            </td>
        </tr>
    </table>
</div>

<div class="onePagePdf">
    <table>
        <tr>
            <td>
                <h3><b>Decoration</b></h3>
            </td>
        </tr>
    </table>
    <hr class="pdf-hr">
    <table class="praposal-aboutus-content">
        <tbody>
        <tr>
            <td>
                <img src="http://banquetcrm.it/uploads/site/logo.png" class="pdf-sub-img">
            </td>
            <td>
                <table class="praposal-aboutus-topic-content">
                    <?php if($event->event_decorator->decorator_id != NULL || $event->event_decorator->decorator_id != ''): ?>
                        <?php $__currentLoopData = explode(",",$event->event_decorator->service_needed); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><b><?php echo e($key + 1); ?>. </b><?php echo e($value); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td>No Decorator Selected</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <table>
        <tr>
            <td>
                <h3><b>Entertainment</b></h3>
            </td>
        </tr>
    </table>
    <hr class="pdf-hr">
    <table class="pdf-first-top-margin">
        <thead>
        <tr>
            <td>
                Band or DJ – from company that <b><?php echo e(($event->event_entertainment->entertainment_id != null) ? $event->event_entertainment->entertainment->name : 'No Entertainment'); ?></b> chooses. Contract will be separate from any agreement with <b>[Sender.Company]</b>. Please let us know if we
                can assist in helping you find the perfect entertainment.
            </td>
        </tr>
        </thead>
    </table>
</div>

<div class="onePagePdf">
    <table>
        <tr>
            <td>
                <h3><b>Pricing and Terms</b></h3>
            </td>
        </tr>
    </table>
    <hr class="pdf-hr">
    <table class="praposal-aboutus-content sub-table">
        <tr>
            <td>
                <table class="table table-bordered table-border">
                    <tbody>
                    <tr class="pdf-header-color table-title td-padding table-border">
                        <td class="table-border td-padding"><b>Name of Service</b></td>
                        <td class="table-border td-padding"><b>Price</b></td>
                    </tr>
                    
                        
                        
                    
                    <?php $subtotal = 0 ;?>
                    <tr class="table-border">
                        <td class="table-border td-padding">Equipment</td>
                        <?php if($event->event_equipment->equipment_type != NULL || $event->event_equipment->equipment_type != ''): ?>
                            <?php $total=0; ?>
                            <?php $equipment = \App\Models\Equipments::whereIn('id',explode(",",$event->event_equipment->equipment_type))->get() ?>
                            <?php $__currentLoopData = $equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $total = $total + $value->price ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <td class="table-border td-padding">$<?php echo e($total); ?></td>
                            <?php $subtotal = $subtotal + $total ?>
                        <?php endif; ?>
                    </tr>
                    <tr class="table-border">
                        <td class="table-border td-padding">Catering</td>
                        <?php if(count($event->event_menu) > 0): ?>
                            <?php if($event->event_menu[0]->caterer_id != NULL || $event->event_menu[0]->caterer_id != ''): ?>
                                <?php $caterer = \App\Models\EventCaterers::where('id',$event->event_menu[0]->caterer_id)->first() ?>
                                <td class="table-border td-padding">$<?php echo e($caterer->price); ?></td>
                                <?php $subtotal = $subtotal + $caterer->price ?>
                            <?php else: ?>
                                <td class="table-border td-padding">$0</td>
                            <?php endif; ?>
                        <?php endif; ?>
                    </tr>
                    <tr class="table-border">
                        <td class="table-border td-padding">Food and Beverage Agreement</td>
                        <?php if($event->financials->grand_total != NULL || $event->financials->grand_total != ''): ?>
                            <td class="table-border td-padding">$<?php echo e($event->financials->grand_total); ?></td>
                            <?php $subtotal = $subtotal + $event->financials->grand_total  ?>
                        <?php else: ?>
                            <td class="table-border td-padding">$0</td>
                        <?php endif; ?>
                    </tr>
                    <tr class="table-border">
                        <td class="table-border td-padding">photography</td>
                        <?php if($event->event_photographers->photographer_id != NULL || $event->event_photographers->photographer_id != ''): ?>
                            <td class="table-border td-padding">$<?php echo e($event->event_photographers->photographers->price); ?></td>
                            <?php $subtotal = $subtotal + $event->event_photographers->photographers->price  ?>
                        <?php else: ?>
                            <td class="table-border td-padding">$0</td>
                        <?php endif; ?>

                    </tr>
                    <tr class="table-border">
                        <td class="table-border td-padding">Decoration</td>
                        <?php if($event->event_decorator->decorator_id != NULL || $event->event_decorator->decorator_id != ''): ?>
                            <td class="table-border td-padding">$<?php echo e($event->event_decorator->decorator->price); ?></td>
                            <?php $subtotal = $subtotal + $event->event_decorator->decorator->price  ?>
                        <?php else: ?>
                            <td class="table-border td-padding">$0</td>
                        <?php endif; ?>
                    </tr>
                    <tr class="table-border">
                        <td class="table-border td-padding">Entertainment</td>
                        <?php if($event->event_entertainment->entertainment_id != NULL || $event->event_entertainment->entertainment_id != ''): ?>
                            <td class="table-border td-padding">$<?php echo e($event->event_entertainment->entertainment->price); ?></td>
                            <?php $subtotal = $subtotal + $event->event_entertainment->entertainment->price  ?>
                        <?php else: ?>
                            <td class="table-border td-padding">$0</td>
                        <?php endif; ?>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <table class="praposal-aboutus-content sub-table">
        <tr align="right">
            <td><p>Subtotal:$<?php echo e($subtotal); ?></p></td>
        </tr>
        <tr align="right">
            <?php $grandtotal = ($subtotal * unserialize(\App\Models\Setting::where("setting_key","sales_tax")->get()->pluck("setting_value")->toArray()[0])) / 100 ?>
            <td><p>Sales tax(<?php echo e(unserialize(\App\Models\Setting::where("setting_key","sales_tax")->get()->pluck("setting_value")->toArray()[0])); ?>%):$<?php echo e($grandtotal); ?></p></td>
        </tr>
        <tr align="right">
            <td><p><b>Total</b>:$<?php echo e($subtotal + $grandtotal); ?></p></td>
        </tr>
    </table>


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
</div>

