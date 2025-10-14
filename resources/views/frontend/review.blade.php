<x-frontend-app-layout>

    <!-- wrapper  -->
    <div class="wrapper">
        <!-- navigation  -->

        @include('frontend.navigation')


        <!-- end navigation-->

        <!-- hero section -->
        <div class="herosection">
            <h1 class="review-topic">Write a review, make someone's trip</h1>
            <p class="reviewpera">Your stories help fellow travelers have better experiences. Share your journey and make a difference for someone planning their next adventure!</p>
        </div>
        <!-- end hero section  -->

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
        <section class=".section-review">


            <div class="writereview">
                <div class="searchbar">
                    <input type="text" class="reviewbar" id="reviewbar" placeholder="What would you like to write?">
                    <button class="greenbtn" onclick="addReview()" data-bs-toggle="modal" data-bs-target="#reviewmodal">Add Review</button>
                </div>
            </div>
        </section>

        <section class="section">

            <div class="subheading">
                Our Review
            </div>

            <div class="reviews mt-4">
                @foreach($reviews as $review)
                <div class="review-item border p-3 mb-3 rounded shadow-sm">
                    <h5 class="mb-1">{{ $review->author }}</h5>
                    {{-- Show star rating --}}
                    <div class="rating mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <=$review->rating_level)
                            ⭐
                            @else
                            ☆
                            @endif
                            @endfor
                    </div>

                    <p class="text-dark">{{ $review->note ?? 'No message provided.' }}</p>
                </div>
                @endforeach
            </div>


        </section>
        <!-- end wrapper  -->
    </div>
    @include('frontend.footer')



    <div class="modal fade" id="reviewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content stylish-modal">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-4 fw-bold text-white" id="exampleModalLabel">Please Fill Below Data</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-white">
                    <h6 class="fw-bold">Personal Information</h6>
                    <p class="small">Please fill in your details below. Your details will be kept confidential at all times. See our Privacy Policy for more details.</p>

                    <div class="container-form">
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="text" class="form-control cool-input" id="fullnamex" name="fullnamex" placeholder="Full Name">
                            </div>
                            <div class="col-md-12">
                                <input type="email" class="form-control cool-input" id="emailx" name="emailx" placeholder="Email Address">
                            </div>

                        </div>
                    </div>

                    <!-- ⭐ Star Rating Section -->
                    <div class="mt-4">
                        <h6 class="fw-bold">Your Rating</h6>
                        <div class="star-rating">
                            <span class="star" data-value="1">&#9733;</span>
                            <span class="star" data-value="2">&#9733;</span>
                            <span class="star" data-value="3">&#9733;</span>
                            <span class="star" data-value="4">&#9733;</span>
                            <span class="star" data-value="5">&#9733;</span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer border-0 justify-content-between">
                    <button type="button" class="btn btn-outline-light px-4 rounded-pill" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success px-4 rounded-pill" onclick="submitReview()">Submit Review ✅</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px;">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    ✅ Thank you for your feedback!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="reload()">OK</button>
                </div>
            </div>
        </div>
    </div>

    </x-frontendapp-layout>


    <script>
        let reviewRating = 0;

        document.querySelectorAll(".star-rating .star").forEach((star, index) => {
            star.addEventListener("click", () => {
                reviewRating = index + 1;
                document.querySelectorAll(".star-rating .star").forEach((s, i) => {
                    s.classList.toggle("active", i < reviewRating);
                });
                console.log("Selected rating:", reviewRating);
            });
        });

        function submitReview() {
            const fullname = document.getElementById('fullnamex').value;
            const email = document.getElementById('emailx').value;
            const review = document.getElementById('reviewbar').value;

            console.log("Saving review with rating:", reviewRating);

            // Example: send via AJAX
            $.ajax({
                url: '/savereview',
                type: 'POST',
                data: {
                    fullname: fullname,
                    email: email,
                    rating: reviewRating,
                    review: review,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // close modal and show success
                    $('#reviewmodal').modal('hide');
                    var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                    myModal.show();
                }
            });
        }

        function reload() {
            location.reload();
        }


        function toggleMenu() {
            const navLeft = document.querySelector('.nav-left');
            navLeft.classList.toggle('show');
        }
    </script>