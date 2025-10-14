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
                                                    <th> Trip Topic </th>
                                                    <th> Type </th>
                                                    <th> Start Date </th>
                                                    <th> End Date </th>
                                                    <th> Pick Up</th>
                                                    <th> Drop </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trips as $trip)
                                                <tr>
                                                    <td>{{ $trip->name }}</td>
                                                    <td>{{ $trip->type }} </td>
                                                    <td>{{ $trip->start_date }}</td>
                                                    <td>{{ $trip->end_date }}</td>
                                                    <td>{{ $trip->pickup }}</td>
                                                    <td>{{ $trip->drop_up }}</td>
                                                    <td>
                                                        <button class="btn btn-primary" onclick="endTrip('{{ $trip->id }}')">End Trip</button>
                                                        <a href="/tripdetails/{{ $trip->id }}" class="btn btn-success">More Details</a>
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

    function endTrip(tripid) {
        $.ajax({
            url: '/endtrip',
            type: 'GET',
            data: {
                tripid: tripid,
            },
            success: function(response) {
                location.reload();
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