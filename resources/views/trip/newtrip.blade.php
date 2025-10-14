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

                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Register New Trip</h4>

                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <form class="forms-sample" action="/savetrip" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Trip Title <span class="acspan">*</span></label>
                                            <input type="text" class="form-control" id="trip_title" name="trip_title" style="color: gray;" placeholder="Trip Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Specification <span class="acspan">*</span></label>
                                            <input type="text" class="form-control" id="specification" name="specification" style="color: gray;" placeholder="Specipication">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Trip Category <span class="acspan">*</span></label>
                                            <select name="triptype" id="triptype" class="form-control" required>
                                                <option value="">-- Select Trip Type --</option>
                                                @foreach ($tripcategories as $category)
                                                <option value="{{ $category->category }}">{{ $category->category }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Trip Start Date <span class="acspan">*</span></label>
                                            <input type="date" class="form-control" id="trip_start" name="trip_start" style="color: gray;">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Trip End Date <span class="acspan">*</span></label>
                                            <input type="date" class="form-control" id="trip_end" name="trip_end" style="color: gray;">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">About The Trip <span class="acspan">*</span></label>
                                            <textarea name="about_trip" id="about_trip" cols="30" rows="10" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Per Adult Price <span class="acspan">*</span></label>
                                            <input type="number" class="form-control" id="per_adult_price" name="per_adult_price" style="color: gray;">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Per Child Price <span class="acspan">*</span></label>
                                            <input type="number" class="form-control" id="per_child_price" name="per_child_price" style="color: gray;">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Pick Up Location <span class="acspan">*</span></label>
                                            <input type="text" class="form-control" id="pickuplocation" name="pickuplocation" style="color: gray;">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Drop Location <span class="acspan">*</span></label>
                                            <input type="text" class="form-control" id="drop_location" name="drop_location" style="color: gray;">
                                        </div>

                                        <button class="btn btn-dark">Cancel</button>
                                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- myvehicles -->
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Trip</h4>
                                        <p class="text-muted mb-1">Actions</p>
                                        <p class="text-muted mb-1">Important data Sets</p>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            @foreach($trips as $trip)
                                            <div class="preview-list">
                                                <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <h6 class="preview-subject">{{ $trip->name  }}</h6>
                                                            <p class="text-muted mb-0">{{ $trip->type }}</p>
                                                            <p class="text-muted mb-0">Start Date - {{ $trip->start_date }}</p>
                                                            <p class="text-muted mb-0">End Date - {{ $trip->end_date }}</p>
                                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                                <p class="text-muted mt-1">Max Count - {{ $trip->max_passenger }}</p>
                                                            </div>

                                                        </div>
                                                        <div class="flex-grow">

                                                        </div>


                                                        <a class="btn btn-outline-success btn-fw" href="/trip/{{ $trip->id }}">View Trip & Upload Images</a>


                                                    </div>

                                                </div>

                                            </div>
                                            @endforeach
                                        </div>
                                        <a href="/triplist" class="btn btn-outline-primary btn-fw">Load All Trips</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- end  -->




                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <!-- footer   -->

                <!-- End Footer  -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</x-app-layout>


<!-- Modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    document.getElementById('province').addEventListener('change', function() {
        let provinceId = this.value;

        fetch(`/get-districts/${provinceId}`)
            .then(response => response.json())
            .then(data => {
                let districtSelect = document.getElementById('district');
                districtSelect.innerHTML = `<option value="">Select District</option>`;

                data.forEach(d => {
                    districtSelect.innerHTML += `<option value="${d.id}">${d.name_en}</option>`;
                });

                // Clear city dropdown
                document.getElementById('city').innerHTML = `<option value="">Select City</option>`;
            });
    });

    document.getElementById('district').addEventListener('change', function() {
        let districtId = this.value;

        fetch(`/get-cities/${districtId}`)
            .then(response => response.json())
            .then(data => {
                let citySelect = document.getElementById('city');
                citySelect.innerHTML = `<option value="">Select City</option>`;

                data.forEach(c => {
                    citySelect.innerHTML += `<option value="${c.id}">${c.name_en}</option>`;
                });
            });
    });
</script>