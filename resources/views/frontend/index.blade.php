<x-frontend-app-layout :seo="$seo">
    @include('frontend.navigation')

    <!-- Full-Screen Hero Carousel -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('slider/one.png') }}" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <div class="herosection text-center">
                        <h1 class="herosection-topic" style="color: white;">Customize Your Travel Plans</h1>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('slider/two.png') }}" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <div class="herosection text-center">
                        <h1 class="herosection-topic" style="color: white;">Explore Sri Lanka with Us</h1>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('slider/one.png') }}" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <div class="herosection text-center">
                        <h1 class="herosection-topic" style="color: white;">Your Journey, Your Way</h1>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- wrapper  -->
    <div class="wrapper">

        <div class="row contactdiv">
            <div class="col">
                <div class="stopic"> Plan With Us</div>
                <div class="subtopic_g">START NOW</div>
            </div>
            <div class="col">
                <input type="text" placeholder="Full Name" class="contact_input" name="fullnames" id="fullnames">
            </div>
            <div class="col">
                <input type="text" placeholder="Contact No" class="contact_input" name="contactno" id="contactno">
            </div>
            <div class="col">
                <input type="email" placeholder="Email" class="contact_input" name="email_es" id="email_es">
            </div>
            <div class="col">
                <select name="country" id="country" class="contact_input">
                    <option value="">Select Country</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="United States">United States</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="Canada">Canada</option>
                    <option value="Australia">Australia</option>
                    <option value="Germany">Germany</option>
                    <option value="France">France</option>
                    <option value="India">India</option>
                    <option value="Japan">Japan</option>
                    <option value="Singapore">Singapore</option>
                </select>
            </div>
            <div class="col">
                <button class="contact_btn" onclick="contactus()">Contact Us</button>
            </div>
        </div>

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
        <!-- <section class="section">
            <div class="subheading">
                Already started? Log in to see your saved trips.
            </div>

            <div class="row maingap profeaturerow">
                <div class="col containerbox containerboxleft">
                    <img src="{{ asset('') }}" alt="">
                    <div class="subtopic">Start a trip in minutes with</div>
                    <div class="intro">Answer four short questions and get personalized recs with AI, guided by traveler opinions.</div>
                    <button class="greenbtn">Try trip builder</button>
                </div>
                <div class="col containerbox containerboxright">
                    <img src="{{ asset('') }}" alt="">
                    <div class="subtopic">Build your trip from scratch</div>
                    <div class="intro">Browse top destinations, restaurants, and things to do and save your faves to your itinerary as you go.</div>
                    <button class="purplebtn">Try trip builder</button>
                </div>
            </div>
        </section> -->

        <section class="section">
            <div class="subheading">
                Plan a trip to a traveler-loved spot
            </div>

            <div class="row maingap destinationrow">
                @foreach ($destinations as $destination)
                <div class="col-md-3 objectbox" style="--i: {{ $loop->index }};">
                    <img src="{{ asset($destination->firstImage->file_url) }}" alt="{{ $destination->name }}">
                    <div class="location_name">{{ $destination->name }}</div>
                </div>
                @endforeach
            </div>
        </section>
        <!-- end wrapper  -->
    </div>
    @include('frontend.footer')

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px;">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    ✅ Your data has been saved successfully!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="refresh()">OK</button>
                </div>
            </div>
        </div>
    </div>

    </x-frontendapp-layout>


    <script>
        function contactus() {
            var fullname = document.getElementById('fullnames').value;
            var contactno = document.getElementById('contactno').value;
            var email = document.getElementById('email_es').value;
            var country = document.getElementById('country').value;

            var data = {
                fullname: fullname,
                contactno: contactno,
                email: email,
                country: country,
            }

            $.ajax({
                url: '/addnewleads',
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Show modal after saving
                    var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                    myModal.show();
                },

                complete: function() {
                    hideLoader(); // Hide loader after AJAX
                }
            });
        }

        function refresh() {
            location.reload();
        }
    </script>