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
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h4 class="card-title">Our Employees</h4> -->



                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> Destination Name </th>
                                                    <th> Content </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($destinations as $destination)
                                                <tr>
                                                    <td>{{ $destination->name }}</td>
                                                    <td>{{ $destination->content }}</td>
                                                    <td>
                                                        <a href="/destinationdetails/{{ $destination->id }}" class="btn btn-primary">More Details</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
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

    <!-- Modal -->


</x-app-layout>

<script>
    function refresh() {
        location.reload();
    }

    function getVehicleDetails(vehicleid) {
        $.ajax({
            url: '/getcardetail',
            type: 'GET',
            data: {
                vehicleid: vehicleid,
            },
            success: function(response) {
                document.getElementById('vehicle_id').value = response.vehicledetails.id;
                document.getElementById('vehicle_no').value = response.vehicledetails.vehical_no;
                document.getElementById('vehicle_type').value = response.vehicledetails.vehical_type;
                document.getElementById('body_type').value = response.vehicledetails.body_type;
                document.getElementById('vehicle_brand').value = response.vehicledetails.vehical_brand;
                document.getElementById('model_vehicle').value = response.vehicledetails.vehical_model;
                document.getElementById('color').value = response.vehicledetails.vehicle_color;
                document.getElementById('fualtype').value = response.vehicledetails.fualtype;
                document.getElementById('meeter_reading').value = response.vehicledetails.meeter;
                document.getElementById('licen_expire_date').value = response.vehicledetails.licen_exp;
                document.getElementById('insurence_expire_date').value = response.vehicledetails.insurence_exp;
            }
        });
    }

    function saveChanges() {
        var vehicleId = document.getElementById('vehicle_id').value;
        var vehicleNo = document.getElementById('vehicle_no').value;
        var vehicle_type = document.getElementById('vehicle_type').value;
        var body_type = document.getElementById('body_type').value;
        var vehicle_brand = document.getElementById('vehicle_brand').value;
        var model_vehicle = document.getElementById('model_vehicle').value;
        var color = document.getElementById('color').value;
        var fualtype = document.getElementById('fualtype').value;
        var meeter_reading = document.getElementById('meeter_reading').value;
        var licen_expire_date = document.getElementById('licen_expire_date').value;
        var insurence_expire_date = document.getElementById('insurence_expire_date').value;

        var data = {
            vehicleId: vehicleId,
            vehicleNo: vehicleNo,
            vehicle_type: vehicle_type,
            body_type: body_type,
            vehicle_brand: vehicle_brand,
            model_vehicle: model_vehicle,
            color: color,
            fualtype: fualtype,
            meeter_reading: meeter_reading,
            licen_expire_date: licen_expire_date,
            insurence_expire_date: insurence_expire_date,
        };

        $.ajax({
            url: '/updatevehiclebasic',
            type: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(error);
                // Optionally, you can display an error message to the user
            }
        });
    }
</script>