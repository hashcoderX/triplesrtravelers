<x-frontend-app-layout>

    <!-- wrapper  -->
    <div class="wrapper">
        <!-- navigation  -->

        @include('frontend.navigation')

        <section class="section">

            <div class="subheading">
                Contact Us
            </div>

            <div class="contact-container">
                <address><b>Address - Triple SR Travelers,</b> 33/3, Bakmeeruppa, Wellarawa</address>
                <div class="cntact_numbers">
                    <div><b>Hot lines - +94 77 78 97 147 (Whatsapp) (Ruwan Hewawissa)/ +94 77 06 78 032 (Tharidu Priyankara),</b></div>
                    <div><b>Mobile - +94 77 37 15 301 (Amarajeewa)</b></div>
                </div>
            </div>

            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15820.064445944534!2d79.90646520875391!3d7.573221649678417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2ce02523325b1%3A0xa49076457f71160d!2sWellarawa!5e0!3m2!1sen!2slk!4v1756896968183!5m2!1sen!2slk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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