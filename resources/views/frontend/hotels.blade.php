<x-frontend-app-layout>
    @include('frontend.navigation')
    <!-- wrapper  -->
    <div class="wrapper">
        <!-- navigation  -->
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
        <!-- end navigation-->

        <!-- Hero Section -->
        <div class="herosectionforhotel position-relative" style="width: 100%; max-width: 1200px; height: 300px;">

            <!-- Swiper Slider -->
            <div class="swiper mySwiper w-100 h-100">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('stimg/slider_one.jpg') }}" alt="Slide 1" class="w-100 h-100 object-fit-cover" style="border-radius: 30px;">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('stimg/slider_two.jpg') }}" alt="Slide 2" class="w-100 h-100 object-fit-cover" style="border-radius: 30px;">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('stimg/slider_three.jpg') }}" alt="Slide 3" class="w-100 h-100 object-fit-cover" style="border-radius: 30px;">
                    </div>
                </div>

                <!-- Swiper Controls -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <!-- Search Bar Positioned at Top -->

        </div>
        <!-- end hero section  -->


        <section class="section">

            <div class="subheading">
                Top Hotels and Holiday Retreats in Sri Lanka
            </div>
            <p class="sp_pera">Sri Lanka is a paradise island that blends natural beauty, cultural heritage, and modern luxury. For travelers seeking comfort and unforgettable experiences, the country offers some of the finest hotels and holiday retreats in South Asia.</p>
            <p class="sp_pera">From the golden beaches of Bentota and Unawatuna to the misty hills of Nuwara Eliya and Ella, Sri Lanka’s hotels provide breathtaking views and world-class service. Star-class beachfront resorts offer direct access to the Indian Ocean, complete with infinity pools, spas, and fine dining. In contrast, boutique retreats in the hill country provide cozy stays surrounded by tea plantations, waterfalls, and fresh mountain air.</p>
            <div class="row maingap destinationrow">
                @foreach ($hotelcategories as $hotelcategori)
                <div class="col-md-4 tripmainbox">
                    <img src="{{ asset($hotelcategori->cover_img ) }}" alt="" style="border-radius: 20px;">
                    <div class="tripstpoic">{{ $hotelcategori->category }}</div>
                    <div class="tripsmintro">{{ \Illuminate\Support\Str::limit($hotelcategori->content, 100, '...') }}</div>
                    <a href="{{ route('exploreHotels', ['id' => $hotelcategori->id]) }}" class="greenbtn">
                        Explore
                    </a>
                </div>
                @endforeach
            </div>
        </section>

        <section class="section">

            <div class="subheading">
                Most Rated Destination List
            </div>

            <div class="row maingap destinationrow">
                @foreach ($destinations as $destination)
                <div class="col-md-2 objectbox">
                    <img src="{{ asset($destination->firstImage->file_url) }}" alt="{{ $destination->name }}">
                    <div class="location_name">{{ $destination->name }}</div>
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

    <script>
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            effect: 'fade',
            speed: 1000
        });
    </script>