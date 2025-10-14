<x-app-layout>

    <style>
        .disabled {
            opacity: 0.5;
            /* Adjust the opacity as desired */
            pointer-events: none;
            /* Prevent pointer events */
        }
    </style>

    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <div class="leftsidebar">

            @include('layouts.leftsidebar')
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('layouts.mainnavbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h4 class="card-title">Our Employees</h4> -->
                                    <div class="table-responsive">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Customer</h4>
                                                <div class="preview-item border-bottom mt-4">

                                                    <div class="preview-item-content d-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                                <h6 id="customerids" style="display: none;">{{ $customer->id }}</h6>
                                                                <h6 class="preview-subject">{{ $customer->full_name }}</h6>
                                                                <p class="text-muted text-small"> {{ $customer->nic }} </p>
                                                                <p class="text-muted text-small">{{ $customer->telephone_no }}</p>
                                                                <p class="text-muted text-small" id="registerdate">{{ $customer->reg_date }}</p>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accountbalance">
                                                <h3>Account Balance - Rs. {{ number_format($customerAccount->accountbalance, 2) }}</h3>
                                                <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="setcustomerid('{{ $customer->id }}')">Update Account Balance</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 grid-margin stretch-card">

                            <div class="card">
                                <div class="d-flex flex-row justify-content-between">
                                    <h4 class="card-title p-2">Transaction History</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th> # id</th>
                                                <th> Date </th>
                                                <th> Amount </th>
                                                <th> Pay Amount </th>
                                                <th> Balance </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transactionhistorys as $transactionhistory)
                                            <tr>
                                                <td>{{ $transactionhistory->id }}</td>
                                                <td>{{ $transactionhistory->date_time }}</td>
                                                <td>{{ number_format($transactionhistory->amount, 2) }}</td>
                                                <td>{{ number_format($transactionhistory->payamount, 2) }}</td>
                                                <td>{{ number_format($transactionhistory->balance, 2) }}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex mt-3">
                                        {{ $transactionhistorys->links('pagination::bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h4 class="card-title">Our Employees</h4> -->
                                    <div class="table-responsive">
                                        <div class="card">
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addcash" onclick="readytopay()">Do Payments</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 grid-margin stretch-card">

                            <div class="card">
                                <div class="d-flex flex-row justify-content-between">
                                    <h4 class="card-title p-2">Pending Cash</h4>
                                </div>
                                <div class="table-responsive">


                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>
            <!-- main-panel ends -->



        </div>
        <!-- page-body-wrapper ends -->
    </div>
</x-app-layout>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Customer Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="/updatecustomeraccount" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Customer Id</label>
                                <input type="text" class="form-control" id="customerid" name="customerid" style="color: gray;" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Start Type</label>
                                <select name="starttype" id="starttype" class="form-control">
                                    <option value="credit">Credit</option>
                                    <option value="debit">Debit</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Starting Amount</label>
                                <input type="number" class="form-control" id="starting_amount" name="starting_amount" style="color: gray;">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: white;">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>

<div class="modal fade" id="addcash" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Cash</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Customer Id</label>
                                <input type="text" class="form-control" id="customeridmakepay" name="customeridmakepay" style="color: gray;" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Pay Type</label>
                                <select name="paytype" id="paytype" class="form-control">
                                    <option value="cash">Cash</option>
                                    <option value="card">Card</option>
                                    <option value="bank deposit">Bank deposit</option>
                                    <option value="cheqe">Cheqe</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Paid Amount</label>
                                <input type="number" class="form-control" id="paidamount" name="paidamount" style="color: gray;">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: white;">Close</button>
                                <button type="button" class="btn btn-primary" onclick="addPayment()">Add Payment</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>

<script>
    function refresh() {
        location.reload();
    }

    function setcustomerid(customerid) {
        document.getElementById('customerid').value = customerid;
    }

    function readytopay() {
        var customerids = document.getElementById('customerids').innerHTML;
        document.getElementById('customeridmakepay').value = customerids;
    }

    function addPayment() {
        var customerid = document.getElementById('customeridmakepay').value;
        var paytype = document.getElementById('paytype').value;
        var paidamount = document.getElementById('paidamount').value;

        var paymentData = {
            customerid: customerid,
            paytype: paytype,
            paidamount: paidamount,
        };

        $.ajax({
            url: '/savepayment', // Adjust to your server endpoint
            type: 'POST',
            data: JSON.stringify(paymentData),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // alert(response.invoiceno);
                printReport(response.paymentid);
                location.reload();
            },
            // error: function(error) {
            //     alert('Error saving estimation.');
            // }
        });
    }

    function printReport(payid) {
        $.ajax({
            url: '/getpaymentreport',
            type: 'get',
            data: {
                payid: payid,
            },

            success: function(response) {
                if (response.html) { // Ensure the HTML content is retrieved correctly
                    var mywindow = window.open('', 'Rent a Car Management System', 'height=600,width=800');
                    mywindow.document.write('<html><head><title>Bill</title>'); // Add a title if needed
                    mywindow.document.write('</head><body>');
                    mywindow.document.write(response.html); // Print the HTML content from the response
                    mywindow.document.write('</body></html>');

                    mywindow.document.close(); // Necessary for some browsers
                    mywindow.focus(); // Ensure the window is focused

                    mywindow.print(); // Trigger the print dialog
                    mywindow.close(); // Close the window after printing
                } else {
                    alert('No data found to print.');
                }
            },
            error: function() {
                alert('An error occurred while processing the request.');
            }
        });
    }
</script>