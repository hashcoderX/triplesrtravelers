<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        @foreach ($enquiries as $enquiry)


        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title"></h4> -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="media">
                            <i class="mdi mdi-flag-variant icon-md text-info d-flex align-self-center mr-3"></i>
                            <div class="media-body">
                                <p class="card-text" id="enquaryid"> <label id="enquaryids">Enquiry - {{ $enquiry->id }}</label> </p>
                                <p class="card-text">Description : {{ $enquiry->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="media mt-2">
                            <i class="mdi mdi-account-star icon-md text-info d-flex align-self-center mr-3"></i>
                            <div class="media-body">
                                <p class="card-text">Date Time : {{ $enquiry->date_time }}</p>
                                <p class="card-text">Meeter Reading : {{ $enquiry->meeter_reading }}</p>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>