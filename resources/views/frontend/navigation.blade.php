<a href="https://wa.me/94777897147" target="_blank" class="whatsapp-float">
    <i class="fab fa-whatsapp"></i>
</a>

<div class="navigation">
    <!-- Burger for mobile -->
    <button class="burger d-md-none" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <!-- Left menu items (desktop only) -->
    <div class="nav-left d-none d-md-flex">
        <ul class="nav-links">
            <li><a href="#">Discover</a></li>
            <li><a href="/fr/trips">Our Trips</a></li>
            <li><a href="/fr/itinerary">Our Itineraries</a></li>
            <li><a href="/fr/review">Our Reviews</a></li>
        </ul>
    </div>

    <!-- Center logo -->
    <div class="nav-center">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('logo/logo_website.png') }}" alt="Triple SR Travelers Logo">
        </a>
    </div>

    <!-- Right Sign In + Social Icons (desktop only) -->
    <div class="nav-right d-none d-md-flex">
        @if(Auth::check())
        <a class="signin-btn" href="/myaccount">My Account</a>
        @else
        <button class="signin-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign In</button>
        <button class="login-btn" data-bs-toggle="modal" data-bs-target="#login">Login</button>
        @endif

        <!-- Social icons -->
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        </div>
    </div>

    <!-- Mobile menu (hidden by default) -->
    <div class="mobile-menu d-md-none" id="mobileMenu">
        <ul>
            <li><a href="#">Discover</a></li>
            <li><a href="/fr/trips">Trips</a></li>
            <li><a href="/fr/review">Review</a></li>
        </ul>

        <div class="mobile-buttons">
            @if(Auth::check())
            <a class="signin-btn w-100" href="/myaccount">My Account</a>
            @else
            <button class="signin-btn w-100 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign In</button>
            <button class="login-btn w-100" data-bs-toggle="modal" data-bs-target="#login">Login</button>
            @endif
        </div>

        <!-- Mobile social icons -->
        <div class="mobile-social-icons">
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content stylish-modal">
            <div class="modal-header border-0">
                <h1 class="modal-title fs-4 fw-bold text-white" id="exampleModalLabel">📝 Customer Registration</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-white">
                <h6 class="fw-bold">Personal Information</h6>
                <p class="small">Please fill in your details below. Your details will be kept confidential at all times. See our Privacy Policy for more details.</p>

                <h6 class="fw-bold mt-3">Login Information</h6>
                <p class="small">Enter your email as the username. Choose a password that is at least 5 characters long.</p>

                <div class="container-form">
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="text" class="form-control cool-input" id="fullname" placeholder="Full Name">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control cool-input" id="email" placeholder="Email Address">
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control cool-input" id="password" placeholder="Password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-between">
                <button type="button" class="btn btn-outline-light px-4 rounded-pill" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success px-4 rounded-pill" onclick="registerCustomer()">Register ✅</button>
            </div>
        </div>
    </div>
</div>


<!-- Login Modal -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content stylish-modal">
            <div class="modal-header border-0">
                <h1 class="modal-title fs-4 fw-bold text-white" id="exampleModalLabel">Login</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-white">
                <h6 class="fw-bold mt-3">Login Information</h6>
                <p class="small">Enter your email as the username. Choose a password that is at least 5 characters long.</p>

                <div class="container-form">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <input type="email" class="form-control cool-input" id="email_login" name="email_login" placeholder="Email Address">
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control cool-input" id="password_login" name="password_login" placeholder="Password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-between">
                <button type="button" class="btn btn-outline-light px-4 rounded-pill" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success px-4 rounded-pill" onclick="signin()">Login ✅</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
    function toggleMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('open');
    }

    function registerCustomer() {
        var fullname = $('#fullname').val();
        var email = $('#email').val();
        var password = $('#password').val();

        if (fullname === "" || email === "" || password === "") {
            alert("Please fill in all the required fields.");
            return;
        }

        var data = {
            fullname: fullname,
            email: email,
            password: password,
        }

        $.ajax({
            url: '/registerwebcustomer',
            type: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.status == 200) {
                    // Close registration modal
                    $('#exampleModal').modal('hide');

                    // Wait a bit for the modal to close smoothly
                    setTimeout(function() {
                        $('#login').modal('show');
                    }, 500);
                } else {
                    refresh(); // Your refresh function
                }
            },

            complete: function() {
                hideLoader(); // Hide loader after AJAX
            }
        });
    }

    function signin() {
        var email = document.getElementById('email_login').value;
        var password = document.getElementById('password_login').value;

        if (email === "" || password === "") {
            alert("Please fill in both email and password.");
            return;
        }

        $.ajax({
            url: "/customerlogin",
            type: "POST",
            data: {
                email: email,
                password: password
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = response.redirect;
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr) {
                alert("An error occurred. Please try again.");
            }
        });
    }
</script>