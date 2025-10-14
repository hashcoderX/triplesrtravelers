<x-frontend-app-layout>
    @include('frontend.navigation')
    <!-- wrapper  -->
    <div class="wrapper">

        <!-- features section  -->
        <div class="row featurerow">
            <div class="col">
                <a href="/fr/hotels">
                    <div class="featurebox">
                        <div class="circle">
                            <img src="{{ asset('icon/resort.png') }}" style="width: 35px;height: auto;" alt="">
                        </div>
                        <div class="box-top">Save Your Favorite Hotels</div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="/fr/thingstodo">
                    <div class="featurebox">
                        <div class="circle">
                            <img src="{{ asset('icon/inbox.png') }}" style="width: 35px;height: auto;" alt="">
                        </div>
                        <div class="box-top">Things to do places to go memories to make</div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="/fr/resturent">
                    <div class="featurebox">
                        <div class="circle">
                            <img src="{{ asset('icon/restaurant.png') }}" style="width: 35px;height: auto;" alt="">
                        </div>
                        <div class="box-top">Restaurants and more to explore</div>
                    </div>
                </a>
            </div>
            <!-- <div class="col">
                <a href="/fr/trips">
                    <div class="featurebox">
                        <div class="circle">
                            <img src="{{ asset('icon/cruise-ship.png') }}" style="width: 35px;height: auto;" alt="">
                        </div>
                        <div class="box-top">Explore top cruises and boat tours</div>
                    </div>
                </a>
            </div> -->
            <div class="col">
                <a href="https://www.rentway.lk" target="_blank" class="text-decoration-none">
                    <div class="featurebox text-center">
                        <div class="circle mb-2">
                            <img src="{{ asset('icon/car.png') }}" alt="Car Icon" style="width: 35px; height: auto;">
                        </div>
                        <div class="box-top">Find rental cars near you</div>
                    </div>
                </a>
            </div>
        </div>
        <!-- End features section  -->
        <section class="section">
            <div class="subheading">
                {{ $trip->name  }}
            </div>

            <div class="row maingap triprow text-center">
                @foreach ($tripImages as $tripimage)
                <div class="col-md-6 objectbox-trip">
                    <img src="{{ asset($tripimage->file_url) }}" class="img-fluid mx-auto d-block">
                </div>
                @endforeach
            </div>


            <div class="trip-content">
                <div class="tripcontentpera">{{ $trip->content }}</div>
                <div class="thirdcontent">Trip Starting - {{ $trip->start_date }} & Trip End - {{ $trip->end_date }} </div>
                <div class="thirdcontent">Pickup Location - {{ $trip->pickup }} </div>
                <div class="thirdcontent">Drop Location - {{ $trip->drop_up }} </div>

                <button class="purplebtn mt-3" data-bs-toggle="modal" data-bs-target="#tripjoin">I will join the trip</button>
            </div>
        </section>


        <!-- end wrapper  -->
    </div>


    <!-- Modal -->
    <div class="modal fade" id="tripjoin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content stylish-modal">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-4 fw-bold text-white" id="exampleModalLabel">✨ Join With Us</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control cool-input" id="firstname" placeholder="Your First Name">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control cool-input" id="lastname" placeholder="Your Last Name">
                        </div>
                        <div class="col-12">
                            <input type="number" class="form-control cool-input" id="contact_number" placeholder="Contact Number">
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control cool-input" id="geast_email" placeholder="Guest Email">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 justify-content-between">
                    <button type="button" class="btn btn-outline-light px-4 rounded-pill" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success px-4 rounded-pill">Join Now 🚀</button>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.footer')
    </x-frontendapp-layout>


    <script>
        function toggleMenu() {
            const navLeft = document.querySelector('.nav-left');
            navLeft.classList.toggle('show');
        }
    </script>