<x-app-layout>
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
                    <!-- <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card corona-gradient-card">
                            <div class="card-body py-0 px-0 px-sm-3">
                                <div class="row align-items-center">
                                    <div class="col-4 col-sm-3 col-xl-2">
                                        <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                                    </div>
                                    <div class="col-5 col-sm-7 col-xl-8 p-0">
                                        <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
                                        <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5 unique layouts!</p>
                                    </div>
                                    <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                                        <span>
                                            <a href="https://www.bootstrapdash.com/product/corona-admin-template/" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Upgrade to PRO</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <div class="row">
                        @if (Auth::user()->usertype == 'Admin')
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center align-self-start">
                                                <button class="btn btn-success create-new-button" data-bs-toggle="modal" data-bs-target="#createuser">New User +</button>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mt-2">You can create new Company</h6>
                                </div>
                            </div>
                        </div>
                        @elseif (Auth::user()->usertype == 'User')
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center align-self-start">
                                                <button class="btn btn-success create-new-button" data-bs-toggle="modal" data-bs-target="#">New User +</button>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mt-2">You can create new Company</h6>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New Company</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div id="success-message"></div>

                                    </div>
                                    <div class="modal-body">
                                        <div class="forms-sample">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Company Name</label>
                                                <input type="text" class="form-control" id="companyname" placeholder="Company Name" style="color: gray;">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Reg No</label>
                                                <input type="text" class="form-control" id="regno" placeholder="Reg No" style="color: gray;">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Company Code</label>
                                                <input type="text" class="form-control" id="company_code" placeholder="Company Code" style="color: gray;">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Address</label>
                                                <!-- <input type="text" class="form-control" id="company_code" placeholder="Company Code"> -->
                                                <textarea name="address" id="address" class="form-control" cols="30" rows="5" style="color: gray;"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company Email address</label>
                                                <input type="email" class="form-control" id="email" placeholder="Email" style="color: gray;">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Password</label>
                                                <input type="password" class="form-control" id="password" placeholder="Password" style="color: gray;">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Owner</label>
                                                <input type="text" class="form-control" id="ownername" placeholder="Owner Name" style="color: gray;">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone</label>
                                                <input type="number" class="form-control" id="phone_number" placeholder="Phone Number" style="color: gray;">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mobile Number</label>
                                                <input type="number" class="form-control" id="mobile_number" placeholder="Mobile Number" style="color: gray;">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pay By</label>
                                                <select name="payby" id="payby" class="form-control" style="color: gray;">
                                                    <option value="fullcash">Full Payment</option>
                                                    <option value="monthly">Monthly Payment</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="createNewCompany()">Save</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="createuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div id="success-message"></div>

                                    </div>
                                    <div class="modal-body">
                                        <div class="forms-sample">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Name</label>
                                                <input type="text" class="form-control" id="name" placeholder="User Name" style="color: gray;">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Email</label>
                                                <input type="email" class="form-control" id="email_user" placeholder="Email" style="color: gray;">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Password</label>
                                                <input type="password" class="form-control" id="userpassword" placeholder="Password" style="color: gray;">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="createNewUser()">Save</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>





                    </div>
                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Transaction History</h4>
                                    <canvas id="transaction-history" class="transaction-chart"></canvas>
                                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                        <div class="text-md-center text-xl-left">
                                            <h6 class="mb-1">Transfer to Paypal</h6>
                                            <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                                        </div>
                                        <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                            <h6 class="font-weight-bold mb-0">$236</h6>
                                        </div>
                                    </div>
                                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                        <div class="text-md-center text-xl-left">
                                            <h6 class="mb-1">Tranfer to Stripe</h6>
                                            <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                                        </div>
                                        <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                            <h6 class="font-weight-bold mb-0">$593</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 grid-margin stretch-card">
                            @if (Auth::user()->usertype == 'superAdmin')
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Company List</h4>
                                        <p class="text-muted mb-1"></p>
                                        <p class="text-muted mb-1">Your data status</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="preview-list">
                                                @foreach($companys as $company)
                                                <div class="preview-item">
                                                    <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-warning">
                                                            <i class="mdi mdi-biohazard"></i>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <h6 class="preview-subject">{{ $company->name }}</h6>
                                                            <p>{{ $company->contact_no }} / {{ $company->mobile_number }}</p>
                                                            <p class="text-muted mb-0">{{ $company->email }}</p>
                                                        </div>
                                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                            <a type="button" class="btn btn-outline-info btn-fw" href="/department/{{ $company->id }}">Info</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @elseif (Auth::user()->usertype == 'Admin')
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">User List</h4>
                                        <p class="text-muted mb-1"></p>
                                        <p class="text-muted mb-1">Your data status</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="preview-list">
                                                @foreach($users as $user)
                                                <div class="preview-item">
                                                    <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-warning">
                                                            <i class="mdi mdi-biohazard"></i>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <h6 class="preview-subject">{{ $user->name }}</h6>
                                                            <p>{{ $user->email }}</p>
                                                            <p class="text-muted mb-0">{{ $user->usertype }}</p>
                                                        </div>
                                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                            <a type="button" class="btn btn-outline-info btn-fw" href="">Info</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @elseif (Auth::user()->usertype == 'User')
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">User List</h4>
                                        <p class="text-muted mb-1"></p>
                                        <p class="text-muted mb-1">Your data status</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="preview-list">
                                                @foreach($users as $user)
                                                <div class="preview-item">
                                                    <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-warning">
                                                            <i class="mdi mdi-biohazard"></i>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <h6 class="preview-subject">{{ $user->name }}</h6>
                                                            <p>{{ $user->email }}</p>
                                                            <p class="text-muted mb-0">{{ $user->usertype }}</p>
                                                        </div>
                                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                            <a type="button" class="btn btn-outline-info btn-fw" href="">Info</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-2">Staff Levels</h5>
                                    <button class="btn btn-success create-new-button" data-bs-toggle="modal" data-bs-target="#addstafflevel">Add Staff Level</button>
                                    <div class="table-responsive">
                                        <table class="table table-dark">
                                            <thead>
                                                <tr>
                                                    <th> LVL </th>
                                                    <th> Level Description </th>
                                                    <th> JD/M </th>
                                                    <th> JD/O </th>
                                                    <th> Category </th>
                                                </tr>
                                            </thead>
                                            <tbody>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Oganizational Structure and reporting lines</h5>
                                    <button class="btn btn-outline-info btn-fw " data-bs-toggle="modal" data-bs-target="#privilagesviewModel" style="margin: 10px;">Info</button>
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




    <!-- modal section  -->
    <!-- Modal -->

</x-app-layout>

<script>
    function createNewCompany() {
        var companyname = $('#companyname').val();
        var regno = $('#regno').val();
        var company_code = $('#company_code').val();
        var email = $('#email').val();
        var address = $('#address').val();
        var password = $('#password').val();
        var ownername = $('#ownername').val();
        var phone_number = $('#phone_number').val();
        var mobile_number = $('#mobile_number').val();
        var payby = $('#payby').val();


        // Check if any of the input fields are empty
        if (!companyname || !company_code || !email || !password || !ownername || !mobile_number || !payby) {
            // Display error message if any input field is empty
            $('#success-message').html('<div class="alert alert-danger">Please fill in all required fields.</div>');
            return; // Exit function if any input field is empty
        }

        $.ajax({
            url: '/registercompany',
            type: 'POST',
            data: {
                companyname: companyname,
                regno: regno,
                company_code: company_code,
                email: email,
                address: address,
                password: password,
                ownername: ownername,
                phone_number: phone_number,
                mobile_number: mobile_number,
                payby: payby,
                "_token": "{{ csrf_token() }}",
            },

            success: function(response) {
                // $('#success-message').html('<div class="alert alert-success">' + response.success + '</div>');
                if (response.status === 200) {
                    // Display success message
                    $('#success-message').html('<div class="alert alert-success">' + response.message + '</div>');
                    // alert(response.message);
                    setTimeout(pagereload, 1000);
                } else {
                    // Display error message
                    $('#success-message').html('<div class="alert alert-danger">' + response.message + '</div>');
                    // alert(response.message);
                }

            }, // /success function
            error: function(xhr, status, error) {
                // Handle error if AJAX request fails
                console.error(xhr.responseText);
            }
        });

    }

    function createNewUser() {
        var name = $('#name').val();
        var email_user = $('#email_user').val();
        var userpassword = $('#userpassword').val();

        $.ajax({
            url: '/registeruser',
            type: 'POST',
            data: {
                name: name,
                email_user: email_user,
                userpassword: userpassword,
                "_token": "{{ csrf_token() }}",
            },

            success: function(response) {
                // $('#success-message').html('<div class="alert alert-success">' + response.success + '</div>');
                if (response.status === 200) {
                    // Display success message
                    $('#success-message').html('<div class="alert alert-success">' + response.message + '</div>');
                    // alert(response.message);
                    setTimeout(pagereload, 1000);
                } else {
                    // Display error message
                    $('#success-message').html('<div class="alert alert-danger">' + response.message + '</div>');
                    // alert(response.message);
                }

            }, // /success function
            error: function(xhr, status, error) {
                // Handle error if AJAX request fails
                console.error(xhr.responseText);
            }
        });
    }

    function createUserroll() {
        $.ajax({
            url: '/createUserRoll',
            type: 'GET',
            data: {
                starts: 'yes',

            },

            success: function(response) {
                // $('#success-message').html('<div class="alert alert-success">' + response.success + '</div>');


            }, // /success function
            error: function(xhr, status, error) {
                // Handle error if AJAX request fails
                console.error(xhr.responseText);
            }
        });
    }


    function createLevel() {
        var lvl = $('#lvl').val();
        var leveldescrition = $('#leveldescrition').val();
        var jdmarketing = $('#jdmarketing').val();
        var jdoperation = $('#jdoperation').val();
        var categoarylvl = $('#categoarylvl').val();

        // Check if any of the input fields are empty
        if (!lvl || !leveldescrition || !jdmarketing || !jdoperation || !categoarylvl) {
            // Display error message if any input field is empty
            $('#success-message').html('<div class="alert alert-danger">Please fill in all required fields.</div>');
            return; // Exit function if any input field is empty
        }

        $.ajax({
            url: '/createstafflevel',
            type: 'POST',
            data: {
                lvl: lvl,
                leveldescrition: leveldescrition,
                jdmarketing: jdmarketing,
                jdoperation: jdoperation,
                categoarylvl: categoarylvl,
                "_token": "{{ csrf_token() }}",
            },

            success: function(response) {
                // $('#success-message').html('<div class="alert alert-success">' + response.success + '</div>');
                if (response.status === 200) {
                    // Display success message
                    location.reload();
                    $('#success-message').html('<div class="alert alert-success">' + response.message + '</div>');
                    // alert(response.message);
                } else {
                    // Display error message
                    $('#success-message').html('<div class="alert alert-danger">' + response.message + '</div>');
                    // alert(response.message);
                }

            }, // /success function
            error: function(xhr, status, error) {
                // Handle error if AJAX request fails
                console.error(xhr.responseText);
            }
        });
    }

    function pagereload() {
        location.reload();
    }
</script>