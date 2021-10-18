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
<h2 align="center"><b>Photographer Contract</b></h2>
<table>
    <tr>
        <td>
            <h3 class="pdf-content-top-margin"><b>Photographer Information</b></h3>
        </td>
    </tr>
</table>
<table class="table table-bordered table-border">
    <tbody>
    <tr>
        <td class="table-border td-padding"><b>Name</b></td>
        <td class="table-border td-padding"><?php echo e(($event->event_photographers->photographers) ? $event->event_photographers->photographers->name : 'No Photographer Selected'); ?></td>
    </tr>
    <tr>
        <td class="table-border td-padding"><b>Address</b></td>
        <td class="table-border td-padding"><?php echo e(($event->event_photographers->photographers) ? $event->event_photographers->photographers->address : 'No Photographer Selected'); ?></td>
    </tr>
    <tr>
        <td class="table-border td-padding"><b>Phone</b></td>
        <td class="table-border td-padding"><?php echo e(($event->event_photographers->photographers) ? $event->event_photographers->photographers->phone : 'No Photographer Selected'); ?></td>
    </tr>

    <tr>
        <td class="table-border td-padding"><b>Email</b></td>
        <td class="table-border td-padding"><?php echo e(($event->event_photographers->photographers) ? $event->event_photographers->photographers->email : 'No Photographer Selected'); ?></td>
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
        <td class="table-border td-padding"><?php echo e(($event->eating_times->evening_snacks_time != NULL || $event->eating_times->evening_snacks_time != '' ? explode("_",$event->eating_times->evening_snacks_time)[0] : 'No Time Provided')); ?> To <?php echo e(($event->eating_times->evening_snacks_time != NULL || $event->eating_times->evening_snacks_time != '' ? explode("_",$event->eating_times->evening_snacks_time)[1] : 'No Time Provided')); ?></td>
        <td class="table-border td-padding"></td>
    </tr>

    <tr>
        <td class="table-border td-padding"><b>Number of people in Total</b></td>
        <td class="table-border td-padding" colspan="3"><?php echo e(($event->contactus->expected_guest != NULL || $event->contactus->expected_guest != '' ? $event->contactus->expected_guest : 'No Guest List Provided')); ?></td>
    </tr>
    </tbody>
</table>
<table>
    <tr>
        <td>
            <h3 class="pdf-content-top-margin"><b>Photography Service</b></h3>
        </td>
    </tr>
</table>
<table class="table table-bordered table-border">
    <tbody>
        <?php if(count($event->event_photographers) > 0): ?>
            <?php $services = explode(",",$event->event_photographers->service_needed) ?>
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="table-border td-padding"><b><?php echo e($value); ?></b></td>
                    
                    
                    
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </tbody>
</table>

    
        
    
    
        
    


<table>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Wedding Photography Contract terms</b></h3></td>
                </tr>
                <tr>
                    <td>
                        <?php echo e($event->event_photographers->wedding_photography_contract_terms); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Payment</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_photographers->payment); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Cancellation</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_photographers->cancellation); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Reschedule</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_photographers->reschedule); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Liability</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_photographers->liability); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Responsibilities</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_photographers->responsibilities); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Coverage</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_photographers->coverage); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Image Processing</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_photographers->image_processing); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Model Release</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_photographers->model_release); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Copyright</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_photographers->copyrite); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Unauthorized Reproduction</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_photographers->unauthorized_reproduction); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <h3><b>Approval</b></h3>
            <p><?php echo e($event->event_photographers->approval); ?></p>
        </td>
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

<table class="pdf-ty">
    <tr align="center">
        <td><h4><b>Thanks You for valuable business !</b></h4></td>
    </tr>
</table>
