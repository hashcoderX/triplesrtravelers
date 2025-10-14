<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title"></h4> -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="media">
                            <i class="mdi mdi-flag-variant icon-md text-info d-flex align-self-center mr-3"></i>
                            <div class="media-body">
                                <p class="card-text" id="enquaryid" style="display: none;"> <label id="enquaryids">{{ $enquary->id }}</label> </p>
                                <p class="card-text">Vehicle No : <label id="vehicleno">{{ $enquary->vehicleno }}</label></p>
                                <p class="card-text">Brand : {{ $enquary->vehiclebrand }}</p>
                                <p class="card-text">Model : {{ $enquary->vehiclemodel }}</p>
                                <p class="card-text">Meeter Reading : {{ $enquary->meeter_reading }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="media mt-2">
                            <i class="mdi mdi-account-star icon-md text-info d-flex align-self-center mr-3"></i>
                            <div class="media-body">
                                <p class="card-text" id="customername">Customer Name : {{ $enquary->customername }}</p>
                                <p class="card-text" id="customername">NIC : {{ $enquary->nic }}</p>
                                <p class="card-text" id="address"> Address : {{ $enquary->street .",". $enquary->addressline_one .",".$enquary->city}}</p>
                                <p class="card-text" id="contactno"> Contact No : {{ $enquary->contactno }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>