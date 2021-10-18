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

    .pdf-box {
        border: 1px solid black;
        margin-top: 25px;
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

    .pdf-box-content {
        padding: 0 20px;
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
            <td>
                <h3 class="pdf-content-top-margin"><b>Decorator Information</b></h3>
            </td>
        </tr>
    </table>
    <table class="table table-bordered table-border">
        <tbody>
        <tr>
            <td class="table-border td-padding"><b>Name</b></td>
            <td class="table-border td-padding"><?php echo e(($event->event_decorator->decorator) ? $event->event_decorator->decorator->name : 'No Decorator Selected'); ?></td>
        </tr>
        <tr>
            <td class="table-border td-padding"><b>Address</b></td>
            <td class="table-border td-padding"><?php echo e(($event->event_decorator->decorator) ? $event->event_decorator->decorator->address : 'No Decorator Selected'); ?></td>
        </tr>
        <tr>
            <td class="table-border td-padding"><b>Phone</b></td>
            <td class="table-border td-padding"><?php echo e(($event->event_decorator->decorator) ? $event->event_decorator->decorator->phone : 'No Decorator Selected'); ?></td>
        </tr>

        <tr>
            <td class="table-border td-padding"><b>Email</b></td>
            <td class="table-border td-padding"><?php echo e(($event->event_decorator->decorator) ? $event->event_decorator->decorator->email : 'No Decorator Selected'); ?></td>
        </tr>
        </tbody>
    </table>
    <table>
        <tr>
            <td>
                <h3 class="pdf-content-top-margin"><b>Event Information</b></h3>
            </td>
        </tr>
    </table>
    <table class="table table-bordered table-border">
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
            <td class="table-border td-padding"><b>Canapes : </b><?php echo e(($event->eating_times->canapes != NULL || $event->eating_times->canapes != '' ? $event->eating_times->canapes : 'No Time Provided')); ?></td>
            <td class="table-border td-padding"><b>Main : </b><?php echo e(($event->eating_times->service_time != NULL || $event->eating_times->service_time != '' ? $event->eating_times->service_time : 'No Time Provided')); ?></td>
            <td class="table-border td-padding"><b>Dessert : </b><?php echo e(($event->eating_times->dinner_time != NULL || $event->eating_times->dinner_time != '' ? explode("_",$event->eating_times->dinner_time)[0] : 'No Time Provided')); ?></td>
        </tr>

        <tr>
            <td class="table-border td-padding"><b>Time to snacks Served?</b></td>
            <td class="table-border td-padding"><?php echo e(($event->eating_times->morning_snacks_time != NULL || $event->eating_times->morning_snacks_time != '' ? explode("_",$event->eating_times->morning_snacks_time)[0] : 'No Time Provided')); ?> To <?php echo e(($event->eating_times->morning_snacks_time != NULL || $event->eating_times->morning_snacks_time != '' ? explode("_",$event->eating_times->morning_snacks_time)[1] : 'No Time Provided')); ?></td>
            <td class="table-border td-padding" colspan="2"><?php echo e(($event->eating_times->evening_snacks_time != NULL || $event->eating_times->evening_snacks_time != '' ? explode("_",$event->eating_times->evening_snacks_time)[0] : 'No Time Provided')); ?> To <?php echo e(($event->eating_times->evening_snacks_time != NULL || $event->eating_times->evening_snacks_time != '' ? explode("_",$event->eating_times->evening_snacks_time)[1] : 'No Time Provided')); ?></td>
        </tr>

        <tr>
            <td class="table-border td-padding"><b>Number of people in Total</b></td>
            <td class="table-border td-padding" colspan="3"><?php echo e(($event->contactus->expected_guest != NULL || $event->contactus->expected_guest != '' ? $event->contactus->expected_guest : 'No Guest List Provided')); ?></td>
        </tr>
        </tbody>
    </table>
</div>

<table>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Decoration Contract Terms</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_decorator->decoration_contract_terms); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Decoration Fees</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_decorator->decoration_fees); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Decoration Arrangements</b></h3></td>
                </tr>
                <tr>
                    <td><td><?php echo e($event->event_decorator->decoration_arrangements); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Damage To Property</b></h3></td>
                </tr>
                <tr>
                    <td><td><?php echo e($event->event_decorator->damage_to_property); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Deposit</b></h3></td>
                </tr>
                <tr>
                    <td><td><?php echo e($event->event_decorator->deposit); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Cancellation and Design Change Fees</b></h3></td>
                </tr>
                <tr>
                    <td><td><?php echo e($event->event_decorator->cancellation_and_design_change_fees); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Safety</b></h3></td>
                </tr>
                <tr>
                    <td><td><?php echo e($event->event_decorator->safety); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Material Guarantee</b></h3></td>
                </tr>
                <tr>
                    <td><td><?php echo e($event->event_decorator->material_guarantee); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Making Changes</b></h3></td>
                </tr>
                <tr>
                    <td><td><?php echo e($event->event_decorator->making_changes); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Decoration</b></h3></td>
                </tr>
                <tr>
                    <td>
                        <table class="table table-bordered table-border">
                            <tbody>
                            <tr class="pdf-header-color table-title td-padding table-border">
                                <td class="table-border td-padding"><b>Decoration</b></td>
                                
                            </tr>
                            <?php if($event->event_decorator->service_needed != NULL || $event->event_decorator->service_needed != ''): ?>
                                <?php $items = explode(",",$event->event_decorator->service_needed) ?>
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
        </td>
    </tr>
    
        
            
                
                    
                
                
                    
                
                
                    
                
            
        
    
</table>

<table>
    <tr>
        <td>
            <h3 class="pdf-content-top-margin"><b>Approval</b></h3>
        </td>
    </tr>
    <tr>
        <td>
        <td><?php echo e($event->event_decorator->approval); ?>

        </td>
    </tr>
</table>

<table align="center" class="pdf-sign">
    <tr>
        <td class="sign-content">
            <hr>
            <span><?php echo e($event->owner->name); ?> Name</span>
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

