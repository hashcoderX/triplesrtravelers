<div class="row">
    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title"></h4> -->
                <div class="table-responsive">
                    <table class="table">

                        <tr>
                            <th> Invoice No </th>
                            <th> {{ $invoice->id }} </th>
                        </tr>

                        <tr>
                            <th> Customer Name </th>
                            <th> {{ $invoice->customername }} </th>
                        </tr>

                        <tr>
                            <th> Reference </th>
                            <th> {{ $invoice->reference }} </th>
                        </tr>

                        <tr>
                            <th> Total Bill</th>
                            <th> {{ number_format($invoice->net_total,2)}}</th>
                        </tr>

                        <tr>
                            <th> Discount</th>
                            <th> {{ number_format($invoice->discount,2)}}</th>
                        </tr>

                        <tr>
                            <th> Net Total</th>
                            <th> {{ number_format($invoice->net_total,2)}}</th>
                        </tr>

                        <tr>
                            <th> Paid Amount</th>
                            <th> {{ number_format($invoice->paidamount,2)}}</th>
                        </tr>

                        <tr>
                            <th> Balance</th>
                            <th> {{ number_format($invoice->balance,2)}}</th>
                        </tr>

                    </table>

                    <button class="btn btn-success" onclick="printReportX({{ $invoice->id }})">Print</button>

                </div>

            </div>
        </div>

    </div>
</div>