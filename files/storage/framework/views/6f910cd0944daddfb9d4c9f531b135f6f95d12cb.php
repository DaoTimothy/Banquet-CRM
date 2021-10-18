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
    <h2 align="center"><b>Entertainment Contract</b></h2>
    <table>
        <tr>
            <td>
                <h3 class="pdf-content-top-margin"><b>Entertainer Information</b></h3>
            </td>
        </tr>
    </table>
    <table class="table table-bordered table-border">
        <tbody>
        <tr>
            <td class="table-border td-padding"><b>Name</b></td>
            <td class="table-border td-padding"><?php echo e(($event->event_entertainment->entertainment) ? $event->event_entertainment->entertainment->name : 'No Entertainer Selected'); ?></td>
        </tr>
        <tr>
            <td class="table-border td-padding"><b>Address</b></td>
            <td class="table-border td-padding"><?php echo e(($event->event_entertainment->entertainment) ? $event->event_entertainment->entertainment->address : 'No Entertainer Selected'); ?></td>
        </tr>
        <tr>
            <td class="table-border td-padding"><b>Phone</b></td>
            <td class="table-border td-padding"><?php echo e(($event->event_entertainment->entertainment) ? $event->event_entertainment->entertainment->phone : 'No Entertainer Selected'); ?></td>
        </tr>

        <tr>
            <td class="table-border td-padding"><b>Email</b></td>
            <td class="table-border td-padding"><?php echo e(($event->event_entertainment->entertainment) ? $event->event_entertainment->entertainment->email : 'No Entertainer Selected'); ?></td>
        </tr>
        </tbody>
    </table>
</div>
<table>
    <tr>
        <td>
            <h5>This is entertainment contract is entered into as of <b><?php echo e(date('D d,Y',strtotime($event->booking->from_date))); ?></b> by and between <b><?php echo e($event->owner->name); ?></b>,the
                venue,and <b><?php echo e($event->booking->booking_name); ?></b>,the
                Entertainer.</h5>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Performance Details</b></h3></td>
                </tr>
                <tr>
                    <td>
                        The Entertainment agrees to perform on <b><?php echo e(date('D d,Y',strtotime($event->booking->from_date))); ?></b> at <b><?php echo e($event->booking->location->name); ?></b>, located
                        at <b><?php echo e($event->booking->location->address); ?></b>.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="pdf-box" style="width: 50% !important;">
                <tr>
                    <td class="pdf-box-content">
                        <table>
                            <tr>
                                <td><h5><b>Performance Date : </b></h5></td>
                                <td align="right"><?php echo e(date('D d,Y',strtotime($event->booking->from_date))); ?></td>
                            </tr>
                            <tr>
                                <td><h5><b>Event Name : </b></h5></td>
                                <td align="right"><?php echo e($event->name); ?></td>
                            </tr>
                            <tr>
                                <td><h5><b>Location : </b></h5></td>
                                <td align="right"><?php echo e($event->booking->location->name); ?></td>
                            </tr>
                        </table>
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
                    <td><?php echo e($event->event_entertainment->payment); ?>

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
                    <td><?php echo e($event->event_entertainment->cancellation); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Force Majeure</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_entertainment->force_majeur); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Safety & Security</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_entertainment->safety_and_security); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Indemnification</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_entertainment->indemnification); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><h3><b>Binding Arbitration</b></h3></td>
                </tr>
                <tr>
                    <td><?php echo e($event->event_entertainment->binding_arbitration); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<h3><b>Approval</b></h3>
<p><?php echo e($event->event_entertainment->approval); ?></p>


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