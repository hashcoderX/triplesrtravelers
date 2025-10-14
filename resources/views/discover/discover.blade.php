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
                                    <h4 class="card-title">Register New Article</h4>

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

                                    <form class="forms-sample" action="/newarticle" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Topic <span class="acspan">*</span></label>
                                            <input type="text" class="form-control" id="topic" name="topic" style="color: gray;" placeholder="Topic">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Description <span class="acspan">*</span></label>
                                            <input type="text" class="form-control" id="googlemap_location" name="googlemap_location" style="color: gray;" placeholder="Google Map Location">
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
                                        <h4 class="card-title mb-1">Destination</h4>
                                        <p class="text-muted mb-1">Actions</p>
                                        <p class="text-muted mb-1">Important data Sets</p>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            
                                        </div>
                                        <a href="" class="btn btn-outline-primary btn-fw">Load All Destination</a>
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