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
                                    <h4 class="card-title">Register New Hotel</h4>

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

                                    <form class="forms-sample" action="/savehotel" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Hotel Name <span class="acspan">*</span></label>
                                            <input type="text" class="form-control" id="hotelname" name="hotelname" style="color: gray;" placeholder="Hilton Colombo">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hotel Type <span class="acspan">*</span></label>
                                            <select name="hoteltype" id="hoteltype" class="form-control">
                                                <option value="">Select Hotel Type</option>
                                                @foreach ($hotelcategories as $hotelcategori)
                                                <option value="{{ $hotelcategori->category  }}">{{ $hotelcategori->category  }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Google Map Location <span class="acspan">*</span></label>
                                            <input type="text" class="form-control" id="googlemap_location" name="googlemap_location" style="color: gray;" placeholder="Google Map Location">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Province <span class="acspan">*</span></label>
                                            <select name="province" id="province" class="form-control" style="color: gray;">
                                                <option value="">Select Province</option>
                                                @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">District <span class="acspan">*</span></label>
                                            <select name="district" id="district" class="form-control">
                                                <option>Select District</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">City <span class="acspan">*</span></label>
                                            <select name="city" id="city" class="form-control">
                                                <option>Select City</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">About The Hotel <span class="acspan">*</span></label>
                                            <textarea name="abouthotel" id="abouthotel" cols="30" rows="10" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Room Only Price <span class="acspan">*</span></label>
                                            <input type="number" class="form-control" id="room_only_price" name="room_only_price" placeholder="Room Only Price" style="color: gray;">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">B&B Price <span class="acspan">*</span></label>
                                            <input type="number" class="form-control" id="bnbprice" name="bnbprice" placeholder="B&B Price" style="color: gray;">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">HB Price <span class="acspan">*</span></label>
                                            <input type="number" class="form-control" id="hbprice" name="hbprice" placeholder="HB Price" style="color: gray;">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">FB Price <span class="acspan">*</span></label>
                                            <input type="number" class="form-control" id="fbprice" name="fbprice" placeholder="FB Price" style="color: gray;">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">All Inclusive <span class="acspan">*</span></label>
                                            <input type="number" class="form-control" id="allinclusiveprice" name="allinclusiveprice" placeholder="All Inclusive Price" style="color: gray;">
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
                                        <h4 class="card-title mb-1">Hotels</h4>
                                        <p class="text-muted mb-1">Actions</p>
                                        <p class="text-muted mb-1">Important data Sets</p>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            @foreach($hotels as $hotel)
                                            <div class="preview-list">
                                                <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <h6 class="preview-subject">{{ $hotel->name  }}</h6>
                                                            <p class="text-muted mb-0">{{ $hotel->type }}</p>
                                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                                <p class="text-muted mt-1">Reg Date - {{ $hotel->reg_date }}</p>
                                                            </div>

                                                        </div>
                                                        <div class="flex-grow">

                                                        </div>


                                                        <a class="btn btn-outline-success btn-fw" href="/hoteldetails/{{ $hotel->id }}">View Hotel & Upload Images</a>


                                                    </div>

                                                </div>

                                            </div>
                                            @endforeach
                                        </div>
                                        <a href="/hotellist" class="btn btn-outline-primary btn-fw">Load All Hotels</a>
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