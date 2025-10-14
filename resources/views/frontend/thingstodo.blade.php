<x-frontend-app-layout>

    <!-- wrapper  -->
    <div class="wrapper">
        <!-- navigation  -->

        @include('frontend.navigation')

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

        <section class="section">

            <div class="subheading">
                Plan a trip to a traveler-loved spot
            </div>

            <div class="row maingap destinationrow">


                @foreach ($destinations as $destination)
                
                    <div class="col-md-3 objectbox" style="--i: {{ $loop->index }};">
                        <a href="{{ route('thingstodo', $destination->id) }}">
                            <img src="{{ asset($destination->firstImage->file_url) }}" alt="{{ $destination->name }}">
                        </a>
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