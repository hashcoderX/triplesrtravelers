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

                <div class="row mt-2">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            @if(!empty($enquaryimages->image_one))
                            <div class="carousel-item active">
                                <img src="{{ asset($enquaryimages->image_one) }}" class="d-block w-100" alt="...">
                            </div>
                            @endif

                            @if(!empty($enquaryimages->image_two))
                            <div class="carousel-item {{ empty($enquaryimages->image_one) ? 'active' : '' }}">
                                <img src="{{ asset($enquaryimages->image_two) }}" class="d-block w-100" alt="...">
                            </div>
                            @endif

                            @if(!empty($enquaryimages->image_three))
                            <div class="carousel-item {{ empty($enquaryimages->image_one) && empty($enquaryimages->image_two) ? 'active' : '' }}">
                                <img src="{{ asset($enquaryimages->image_three) }}" class="d-block w-100" alt="...">
                            </div>
                            @endif

                            @if(!empty($enquaryimages->image_four))
                            <div class="carousel-item {{ empty($enquaryimages->image_one) && empty($enquaryimages->image_two) && empty($enquaryimages->image_three) ? 'active' : '' }}">
                                <img src="{{ asset($enquaryimages->image_four) }}" class="d-block w-100" alt="...">
                            </div>
                            @endif

                            @if(!empty($enquaryimages->image_five))
                            <div class="carousel-item {{ empty($enquaryimages->image_one) && empty($enquaryimages->image_two) && empty($enquaryimages->image_three) && empty($enquaryimages->image_four) ? 'active' : '' }}">
                                <img src="{{ asset($enquaryimages->image_five) }}" class="d-block w-100" alt="...">
                            </div>
                            @endif

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>