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

    .detail-content td {
        padding: 10px 0;
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
                <h3 class="pdf-content-top-margin"><b>Your Information:</b></h3>
            </td>
        </tr>
    </table>
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
            <td class="table-border td-padding"><?php echo e(($event->logistics->contact_on_day != NULL ? $event->logistics->contact_on_day : 'No Contact Provided')); ?></td>
            <td class="table-border td-padding"><b>Phone</b>
            <td class="table-border td-padding"><?php echo e(($event->logistics->contact_phone != NULL ? $event->logistics->contact_phone : 'No Contact Provided')); ?></td>
        </tr>
        
        
        
        
        </tbody>
    </table>
    <table>
        <tr>
            <td>
                <h3 class="pdf-content-top-margin"><b>Your Event Information:</b></h3>
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
            <td class="table-border td-padding"><?php echo e(($event->contactus->expected_guest != NULL || $event->contactus->expected_guest != '' ? $event->contactus->expected_guest : 'No Guest List Provided')); ?></td>
            <td class="table-border td-padding"><b>How many under 12yrs? </b> <?php echo e(($event->kids->under_12_years != NULL || $event->kids->under_12_years != '' ? $event->kids->under_12_years : 'No Children In Event')); ?></td>
            <td class="table-border td-padding"><b>How many under 5yrs? </b> <?php echo e(($event->kids->under_5_years != NULL || $event->kids->under_5_years != '' ? $event->kids->under_5_years : 'No Children In Event')); ?></td>
        </tr>
        </tbody>
    </table>
</div>
<table>
    <tr>
        <td>
            <h2 align="center"><b>Contract Agreement and Banquet Policies</b></h2>
        </td>
    </tr>
</table>
<table class="detail-content">
    <tr>
        <td>
            <h3 class="pdf-content-top-margin"><b>Food And Beverage Service</b></h3>
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
</table>
<table class="detail-content">
    <tr>
        <td>
            <h3 class="pdf-content-top-margin"><b>Administrative Fees</b></h3>
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
</table>
<table class="detail-content">
    <tr>
        <td>
            <h3 class="pdf-content-top-margin"><b>Function Room Assignments</b></h3>
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
</table>
<table class="detail-content">
    <tr>
        <td>
            <h3 class="pdf-content-top-margin"><b>Guarantees</b></h3>
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
</table>
<table class="detail-content">
    <tr>
        <td>
            <h3 class="pdf-content-top-margin"><b>Menu Pricing</b></h3>
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
</table>
<table class="detail-content">
    <tr>
        <td>
            <h3 class="pdf-content-top-margin"><b>Decoration</b></h3>
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
</table>
<table class="detail-content">
    <tr>
        <td>
            <h3 class="pdf-content-top-margin"><b>Security / Parking</b></h3>
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
</table>
<table class="detail-content">
    <tr>
        <td>
            <h3 class="pdf-content-top-margin"><b>Damages</b></h3>
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
</table>
<table class="detail-content">
    <tr>
        <td>
            <h3 class="pdf-content-top-margin"><b>Services / Fees</b></h3>
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
        </td>
    </tr>
    <tr>
        <td>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eius error in mollitia nesciunt numquam officiis soluta voluptates. Asperiores commodi consectetur
            dignissimos dolorum eveniet labore nemo quaerat qui ratione totam?
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
        <td><h4><b>Thanks You!</b></h4></td>
    </tr>
    <tr align="center">
        <td><b>Phone : </b><?php echo e(($event->logistics->contact_phone != NULL ? $event->logistics->contact_phone : 'No Contact Provided')); ?></td>
    </tr>
</table>

