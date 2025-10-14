<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3>Searching Results</h3>
                <div class="preview-list">

                    <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-primary">
                                <i class="mdi mdi-file-document"></i>
                            </div>
                        </div>
                        <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                                <h6 class="preview-subject">Vehicle No - <span id="vehicleno">{{ $enquary->vehicleno }}</span></h6>
                                <p class="text-muted mb-0">Enquary ID - <span id="claimid">{{ $enquary->id }}</span></p>
                                <p class="text-muted mb-0">Description - <span id="description">{{ $enquary->vehiclebrand ." ".$enquary->vehiclemodel }}</span></p>
                                <p class="text-muted mb-0">Meeter Reading - <span id="customer">{{ $enquary->meeter_reading }}Km</span></p>
                                <p class="text-muted mb-0">Customer - <span id="customer">{{ $enquary->customername }}</span></p>
                                <p class="text-muted mb-0">Date - <span id="customer">{{ $enquary->date_time }}</span></p>
                            </div>
                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <a class="badge badge-outline-primary" href="/addestimation/{{ $enquary->id }}">Add Estimation</a>
                                <a class="badge badge-outline-primary" href="/secoundpageenquary/{{ $enquary->id }}">Enquary Advance Setting</a>
                                <a class="badge badge-outline-success" href="/enquaryadvanceview/{{ $enquary->id }}">View</a>
                            </div>

                        </div>
                    </div>


                </div>
            </div>



        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">

    </div>

    <!-- myvehicles -->

</div>