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

    .pdf-box-content-2 {
        padding: 10px 0;
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
<h3><b>Banquet Invoice:</b></h3>
<hr class="pdf-hr">
<table>
    <tr>
        <td>
            <table class="table table-bordered table-border">
                <tbody>
                <tr class="pdf-header-color table-title td-padding table-border">
                    <td class="table-border td-padding"><b>Banquet's Name</b></td>
                    <td class="table-border td-padding"><b>Invoice Date</b></td>
                    <td class="table-border td-padding"><b>Address of the Banquet</b></td>
                    <td class="table-border td-padding"><b>Invoice Date Due</b></td>
                    <td class="table-border td-padding"><b>Contact Number</b></td>
                    <td class="table-border td-padding"><b>Invoice number</b></td>
                </tr>
                <tr>
                    <td class="table-border td-padding">Wedding</td>
                    <td class="table-border td-padding">22/11/2018</td>
                    <td class="table-border td-padding">3589 Timber Ridge Road 84471</td>
                    <td class="table-border td-padding">22/11/2018</td>
                    <td class="table-border td-padding">9852014763</td>
                    <td class="table-border td-padding">1234</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td class="pdf-box-content">
            <table>
                <tr>
                    <td><h3><b>Banquet's Booked ID</b></h3></td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td><b>Address : </b></td>
                            </tr>
                            <tr>
                                <td><b>Booked For : </b></td>
                            </tr>
                            <tr>
                                <td><b>Contact Number : </b></td>
                            </tr>
                            <tr>
                                <td><b>Payment Mode : </b></td>
                            </tr>
                            <tr>
                                <td><b>Amount Given in Advance : </b></td>
                            </tr>
                            <tr>
                                <td><b>Date of The Event : </b></td>
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
                    <td class=" td-padding"><b>Room</b></td>
                    <td class="td-padding"><b>Price Per Person</b></td>
                    <td class="td-padding" align="right"><b>Total Amount</b></td>
                </tr>
                <tr>
                    <td class=" td-padding">Room A</td>
                    <td class="td-padding">$52.00</td>
                    <td class="td-padding" align="right">$52.00</td>
                </tr>
                <tr>
                    <td class=" td-padding">Room B</td>
                    <td class="td-padding">$32.00</td>
                    <td class="td-padding" align="right">$52.00</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td class="pdf-box-content-2">
            <table class="table table-bordered table-border">
                <tbody>
                <tr class="pdf-header-color table-title td-padding table-border">
                    <td class="td-padding" colspan="3"><b>Food</b></td>
                    <td class="td-padding" align="right"><b>Total Amount</b></td>
                </tr>
                <tr>
                    <td class="td-padding" colspan="3">Lunch</td>
                    <td class="td-padding" align="right">$52.00</td>
                </tr>
                <tr>
                    <td class="td-padding" colspan="3">Dinner</td>
                    <td class="td-padding" align="right">$52.00</td>
                </tr>
                <tr>
                    <td class="td-padding" colspan="3">Snacks</td>
                    <td class="td-padding" align="right">$52.00</td>
                </tr>
                <tr>
                    <td class="td-padding" colspan="3">Beverage</td>
                    <td class="td-padding" align="right">$52.00</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td class="pdf-box-content-2">
            <table class="table table-bordered table-border">
                <tbody>
                <tr class="pdf-header-color table-title td-padding table-border">
                    <td class="td-padding" colspan="3"><b>Other Items</b></td>
                    <td class="td-padding" align="right"><b>Total Amount</b></td>
                </tr>
                <tr>
                    <td class="td-padding" colspan="3">Decoration</td>
                    <td class="td-padding" align="right">$52.00</td>
                </tr>
                <tr>
                    <td class="td-padding" colspan="3">Equipment</td>
                    <td class="td-padding" align="right">$52.00</td>
                </tr>
                <tr>
                    <td class="td-padding" colspan="3">Food and Beverage Arrangement</td>
                    <td class="td-padding" align="right">$52.00</td>
                </tr>
                <tr>
                    <td class="td-padding" colspan="3">photography</td>
                    <td class="td-padding" align="right">$52.00</td>
                </tr>
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
                    <td class="td-padding"><b>Discount</b></td>
                    <td class="td-padding" align="right"><b>Total</b></td>
                </tr>
                <tr>
                    <td class="td-padding">Room Rental</td>
                    <td class="td-padding">$5.00</td>
                    <td class="td-padding" align="right">$25.00</td>
                </tr>
                <tr>
                    <td class="td-padding">Equipment</td>
                    <td class="td-padding">$5.00</td>
                    <td class="td-padding" align="right">$5,002.00</td>
                </tr>
                <tr>
                    <td class="td-padding">Catering</td>
                    <td class="td-padding">-</td>
                    <td class="td-padding" align="right">$5,002.00</td>

                </tr>
                <tr>
                    <td class="td-padding">Food and Beverage Arrangment</td>
                    <td class="td-padding">$5.00</td>
                    <td class="td-padding" align="right">$5,002.00</td>
                </tr>

                <tr>
                    <td class="td-padding">Photography</td>
                    <td class="td-padding">$5.00</td>
                    <td class="td-padding" align="right">$5,002.00</td>
                </tr>
                <tr>
                    <td class="td-padding">Decoration</td>
                    <td class="td-padding">-</td>
                    <td class="td-padding" align="right">$5,002.00</td>
                </tr>
                <tr>
                    <td class="td-padding">Entertainment</td>
                    <td class="td-padding">-</td>
                    <td class="td-padding" align="right">$5,002.00</td>
                </tr>
                <tr>
                    <td class="td-padding">Subtotal</td>
                    <td class="td-padding">-</td>
                    <td class="td-padding" align="right">$5,02.00</td>
                </tr>
                <tr>
                    <td class="td-padding"><b>State Sales Tax</b></td>
                    <td class="td-padding">7.0%</td>
                    <td class="td-padding" align="right">$652.00</td>
                </tr>

                <tr>
                    <td class="td-padding"><b>Administration Fee</b></td>
                    <td class="td-padding">3.0%</td>
                    <td class="td-padding" align="right">$152.00</td>
                </tr>

                <tr>
                    <td class="td-padding"><b>Gratuity</b></td>
                    </td>
                    <td class="td-padding">-</td>
                    <td class="td-padding" align="right">$00.00</td>
                </tr>

                <tr>
                    <td class="td-padding"><b>Administration Fee</b></td>
                    <td class="td-padding">-</td>
                    <td class="td-padding" align="right">$158.00</td>
                </tr>

                <tr>
                    <td class="td-padding"><b>Grand Total</b></td>
                    <td class="td-padding">-</td>
                    <td class="td-padding" align="right"><b>$2,582.00</b></td>
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
                    <td class="td-padding">Deposit 1 (Due 10/1/2018)</td>
                    <td class="td-padding">Paid</td>
                    <td class="td-padding" align="right">$652.00</td>
                </tr>

                <tr>
                    <td class="td-padding">Deposit 1 (Due 10/1/2018)</td>
                    <td class="td-padding">Unpaid</td>
                    <td class="td-padding" align="right">$652.00</td>
                </tr>

                <tr>
                    <td class="td-padding"><b>Estimated Amount Due</b></td>
                    <td class="td-padding"><b>Unpaid</b></td>
                    <td class="td-padding" align="right">$2,158.00</td>
                </tr>

                <tr>
                    <td class="td-padding">Price Per Person</td>
                    <td class="td-padding">-</td>
                    <td class="td-padding" align="right">$00.00</td>
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

