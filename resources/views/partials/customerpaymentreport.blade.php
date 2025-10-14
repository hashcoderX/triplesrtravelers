<style type="text/css">
    .report-container {
        margin: 2px;
    }

    .rep-header {
        display: inline-block;
        float: left;
    }

    .rep-header table {
        width: 100%;
        margin-top: 40px !important;
    }

    .rep-header table tr td {
        width: 33.3%;
        border: 1px solid gray;
        padding: 13px;
    }

    .rep-header table tr td:nth-child(2) {
        text-align: center;
    }

    .table-list {
        width: 100%;
    }

    .table-list thead tr {
        text-align: left;
    }

    .rep-footer {
        bottom: 5px;
    }

    .shopname {
        font-weight: bold;
        font-size: 1.2em;
    }

    .invoicem {
        font-weight: bold;
        font-size: 23px;
    }

    .slogen {
        margin-top: -40px;
    }

    .table-list {
        font-size: 0.8em;
    }

    .header-details {
        font-size: 0.8em;
    }
</style>


<div class="row">
    <center>

        <h2 style="font-size:1.5em;padding:0;margin-top:30px;margin-bottom:0">{{ $company->name }}</h2>
        <p style="font-size:1em;padding:0;margin:0;">{{ $company->address }}</p>
        <p style="font-size:1em;padding:0;margin:0;">{{ $company->email }}</p>
        <p style="font-size:1em;padding:0;margin:0;">{{ $company->contact_no }} </p>
        <p style="font-size:1em;margin-top: -50px;margin-left:460px;position :relative;">{{ $company->reg_no }}</p>

    </center>
</div>

<div class="report-container">
    <div class="row">
        <h2 style='text-align:center;font-size:1.2em;padding-top:20px;'>Payment Confirmation</h2>
        <div class="invoice-container" style="width:100%; font-size:1em; display:flex;">
            <div class="invoice-to" style="width:50%;">
                <p style="line-height: 0.5px;">Payment Customer - {{ $customer->customername }}</p>

                <div class="contactcontainer" id="contactcontainer" style="position :absolute;margin-top:-110px;margin-left:70px;">
                    <p style="line-height: 0.5px;">Payment Id # - {{ $payment->id }}</p>
                    <p style="line-height: 0.5px;">Date - {{ $payment->date_time }} </p>
                    <p style="line-height: 0.5px;">Ref - Post Payment </p>
                    <p style="line-height: 0.5px;">Note - {{ $payment->description }} </p>
                </div>
            </div>


            <div class="invoice-details" style="width:50%; padding-left:200px;">


                <p style="line-height: 0.5px;">Location - Office </p>

            </div>
        </div>
        <div style="display: flex; justify-content: space-between; align-items: flex-start; padding-top: 10px;">
            <!-- Items Table -->
            <table class="table table-list" style="padding-top:5px;">
                <tr>
                    <td>Pay Amount - {{ number_format($payment->payamount,2)  }}</td>
                    <td>Outstanding Balance - {{ number_format($payment->balance,2)  }}</td>
                </tr>
            </table>

            <!-- Summary Table -->

        </div>

        <hr>
        <div class="rep-footer">
            <table style="font-size:1em;">
                <tr>

                    <td style="width:300px;">
                        <br>
                        ........................<br>
                        Issued By

                    </td>
                    <td style="width:300px;">
                        <br>
                        ........................<br>
                        Customer Signature

                    </td>
                </tr>
            </table>
            <hr>
            <div style='position:relative;'>
                <center>

                    <p style="font-size:0.8em;padding:0;margin:0;">Software by Softcodelk (pvt) ltd - Get in touch - 0702932000 / whatsapp - 0713370393</p>
                </center>
            </div>
        </div>

    </div>