<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Payment History</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th> Payment Id </th>
                            <th> Date </th>
                            <th> Discount </th>
                            <th> Paid Amount </th>
                            <th> Intrest Pay </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be dynamically inserted here -->
                        @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->date_time }}</td>
                            <td>{{ number_format($payment->discount,2) }}</td>
                            <td>{{ number_format($payment->payamount,2) }}</td>
                            <td>{{ number_format($payment->intrest_pay,2) }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>