<x-frontend-app-layout>
    @include('frontend.navigation')

    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('slider/beach_slider.png') }}" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <div class="herosection text-center">
                        <h1 class="herosection-topic" style="color: white;">Travel To beaches In Sri Lanka</h1>
                        <!-- <p class="heropara">
                            Sri Lanka is home to some of the most stunning beaches in the world, each offering its own charm. From the golden sands of Bentota to the vibrant waves of Arugam Bay, the island’s coastline is perfect for relaxation, water sports, and breathtaking sunsets. Whether you want to surf, snorkel, or simply unwind by the sea, Sri Lanka’s beaches promise an unforgettable experience.
                        </p> -->
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('slider/wild_life_slider.png') }}" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <div class="herosection text-center">
                        <h1 class="herosection-topic" style="color: white;">Discover Sri Lanka’s Wildlife</h1>
                        <!-- <p class="heropara">From pristine beaches to lush mountains, Triple SR Travelers offers unforgettable journeys tailored for you.</p> -->
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('slider/heritage_slider.png') }}" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <div class="herosection text-center">
                        <h1 class="herosection-topic" style="color: white;">Ancient cities & kingdoms</h1>
                        <!-- <p class="heropara">Sri Lanka’s ancient cities and kingdoms tell the story of a proud civilization that flourished for thousands of years. From the grandeur of Anuradhapura and Polonnaruwa, with their majestic stupas, palaces, and reservoirs, to the rock fortress of Sigiriya, these sites reflect the brilliance of ancient rulers in architecture, art, and engineering. Each city was not only a center of governance but also a hub of culture, religion, and innovation. Today, these UNESCO World Heritage sites stand as timeless reminders of Sri Lanka’s rich heritage, attracting travelers eager to explore the roots of the island’s history.</p> -->
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- wrapper  -->
    <div class="wrapper">
        <!-- navigation  -->
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
                <h3>Restaurants</h3>
            </div>

            <div class="row maingap">
                @foreach ($resturents as $resturent)
                <div class="col-3 mb-4">
                    <div class="card h-100 shadow-sm tripmainbox" style="border-radius: 20px; overflow: hidden;">
                        <img src="{{ asset($resturent->firstImage->file_url ?? 'images/default-trip.jpg') }}"
                            alt="{{ $resturent->name ?? 'Hotel Image' }}"
                            class="card-img-top"
                            style="height: 220px; object-fit: cover;">
                        <div class="tripstpoic">{{ $resturent->name }}</div>
                        <div class="subjectbox">
                            {{ $resturent->specification }}
                        </div>
                        <div class="tripsmintro">{{ \Illuminate\Support\Str::limit($resturent->content, 100, '...') }}</div>


                        <!-- <a class="moredetailsbtn" href="/fr/explorehotel/{{ $hotels->id }}">More Detail</a> -->
                    </div>
                </div>
                @endforeach
            </div>
        </section>




        <!-- end wrapper  -->
    </div>
    @include('frontend.footer')
    </x-frontendapp-layout>


    <script>
        function toggleMenu() {
            const navLeft = document.querySelector('.nav-left');
            navLeft.classList.toggle('show');
        }
    </script>