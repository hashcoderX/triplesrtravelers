<x-frontend-app-layout>
    <div class="boxed_wrapper">


        <!-- preloader -->
        <div class="preloader"></div>
        <!-- preloader -->


        <!-- main header -->
        <header class="main-header style-three">
            <!-- header-upper -->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="upper-inner">
                        <div class="logo-box">
                            <figure class="logo"><a href="index.html"><img src="{{ asset('frontend/assets/images/web_logo_202x59.png') }}" alt=""></a></figure>
                        </div>
                        <ul class="upper-info clearfix">
                            <li>
                                <i class="fal fa-phone"></i>
                                <p>Need Services? Dial</p>
                                <h3><a href="tel:12017193488">0703400000</a></h3>
                            </li>
                            <li>
                                <i class="fal fa-map-signs"></i>
                                <p>Lanka Wings Auto Spa,Kohalwila road</p>
                                <h3>Dalugama,Kelaniya</h3>
                            </li>
                            <li class="btn-box">
                                <!-- <a href="/backend" class="theme-btn-one"><span class="btn-shape"></span>Login Portal</a> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- header-lower -->
            <div class="auto-container">
                <div class="header-lower">
                    <div class="outer-box clearfix">
                        <div class="menu-area pull-left">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation scroll-nav clearfix">
                                        <li class="current dropdown"><a href="/">Home</a> </li>
                                        <li><a href="/fr/about">About</a></li>
                                        <li><a href="/fr/services">Services</a></li>
                                        <li><a href="/fr/contactus">Contact Us</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-right-content clearfix">
                            <ul class="social-links clearfix">
                                <li><a href="index-3.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="index-3.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="index-3.html"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="index-3.html"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box clearfix">
                        <div class="logo-box pull-left">
                            <figure class="logo"><a href="index.html"><img src="{{ asset('frontend/assets/images/weblogo_small.png') }}" alt=""></a></figure>
                        </div>
                        <div class="menu-area pull-right">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                            <div class="menu-right-content clearfix">
                                <div class="search-box-outer">
                                    <div class="dropdown">
                                        <button class="search-box-btn" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-search"></i></button>

                                    </div>
                                </div>
                                <!-- <div class="btn-box"><a href="/portal" class="theme-btn-one"><span class="btn-shape"></span>Login Portal</a></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img src="{{ asset('frontend/assets/images/logo-2.png') }}" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>



                        <li>Lanka Wings Auto Spa, Kohalwila road,Dalugama,Kelaniya</li>
                        <li><a href="tel:+8801682648101">0703400000</a></li>
                        <li><a href="mailto:info@example.com">info@lankawingsautospa.lk</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->




        <!-- appointment-section -->
        <section class="appointment-section">
            <div class="auto-container">
                <div class="sec-title centred">
                    <span>Login To Portal</span>
                    <h2>Get your service History</h2>
                    <p>Get your vehicle service records hussle free</p>
                </div>
                <div class="inner-content">
                    <div class="row align-items-center clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12 form-column">
                            <div class="form-inner">
                                <h3 style="text-align: center;">Log in to our portal and access your previous service records. </h3>
                                <form action="/customerlogin" method="post" class="appointment-form">
                                    @csrf <!-- Laravel will generate the CSRF token here -->
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 form-group">
                                            <input type="email" name="email" placeholder="Email" required="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 form-group">
                                            <input class="form-control" type="password" name="password" placeholder="Password" required="">
                                        </div>
                                        <div class="col-lg-12 message-btn form-group">
                                            <button type="submit" class="theme-btn-one"><span class="btn-shape"></span>Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cta-text centred">
                    <p>Need Vehicle Repair or Maintenance? We’re Ready to Get You Back on the Road!</p>
                    <h3>Call Us Today <i class="icon-mob"></i> <a href="tel:0703400000"><span>0703400000</span></a> or <a href="/contact"><span>Request a FREE Quote</span></a></h3>
                </div>
            </div>
        </section>
        <!-- appointment-section end -->


        <!-- clients-section -->
        <section class="clients-section pb-0">
            <div class="auto-container">
                <div class="other-text centred">
                    <h3>PREMIUM AUTOCARE SERVICE PROVIDER</h3>
                </div>
                <div class="four-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                    <figure class="clients-logo"><img src="{{ asset('frontend/assets/images/providers/mobil.png') }}" alt=""></figure>
                    <figure class="clients-logo"><img src="{{ asset('frontend/assets/images/providers/toyota.png') }}" alt=""></figure>
                    <figure class="clients-logo"><img src="{{ asset('frontend/assets/images/providers/wurth.png') }}" alt=""></figure>
                    <figure class="clients-logo"><img src="{{ asset('frontend/assets/images/providers/3m.png') }}" alt=""></figure>
                    <figure class="clients-logo"><img src="{{ asset('frontend/assets/images/providers/honda.png') }}" alt=""></figure>
                    <figure class="clients-logo"><img src="{{ asset('frontend/assets/images/providers/nissan.png') }}" alt=""></figure>
                    <figure class="clients-logo"><img src="{{ asset('frontend/assets/images/providers/castrol.png') }}" alt=""></figure>
                </div>
            </div>
        </section>
        <!-- clients-section end -->


        <!-- news-section -->



        <!-- main-footer -->
        <footer class="main-footer">
            <div class="auto-container">
                <div class="widget-section">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget logo-widget">
                                <figure class="footer-logo"><a href="/"><img src="{{ asset('frontend/assets/images/footer-logo.png') }}" alt=""></a></figure>
                                <div class="text">
                                    <p>Expert vehicle service & repairs with quality parts and skilled mechanics. Your car’s safety first!</p>
                                </div>
                                <ul class="social-links clearfix">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#l"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h3>What We Offers</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="#">Vehicle Maintaince</a></li>
                                        <li><a href="#">Bodywash and Vacuum</a></li>
                                        <li><a href="#">Wax and Cut & Polish</a></li>
                                        <li><a href="#">Underwash</a></li>
                                        <li><a href="#">Interiar Cleaning</a></li>
                                        <li><a href="#">Remove Rain Acid and Thar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h3>About Lanka Wings Auto Spa</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="#">Service Locations</a></li>
                                        <li><a href="#">Career Opportunities</a></li>
                                        <li><a href="#">Safety Commitment</a></li>
                                        <li><a href="#">Photo Gallery</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h3>Get In Touch</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="info clearfix">
                                        <li>Lanka Wings Auto Spa, Kohalwila Road,Dalugama,Kelaniya</li>
                                        <li><a href="tel:+94703400000">(+94) 70 3400000</a></li>
                                        <li><a href="mailto:info@lankawingsautospa.lk">info@lankawingsautospa.lk</a></li>
                                        <li><span>Working Hours</span></li>
                                        <li>Mon - Sun : 9am to 7pm</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="subscribe-inner clearfix">
                    <div class="widget-title pull-left">
                        <h3>Subscribe To Newsletter</h3>
                    </div>
                    <div class="form-inner pull-right">

                    </div>
                </div>
            </div>
            <div class="footer-bottom centred">
                <div class="auto-container">
                    <div class="copyright">
                        <p>Softcodelk (Pvt) Ltd (c) 2024&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.html"><span>Sitemap</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.html"><span>Terms & Conditions</span></a></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="far fa-long-arrow-up"></span>
        </button>
    </div>

    </x-frontendapp-layout>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".appointment-form").on("submit", function(e) {
                e.preventDefault(); // Prevent form submission

                $.ajax({
                    url: "/customerlogin", // Route to the login function
                    type: "POST",
                    data: $(this).serialize(), // Serialize form data
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            window.location.href = "/dashboardfr"; // Redirect to dashboard after success
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });
        });
    </script>