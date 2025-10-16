<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- SEO Meta Tags -->
    @if(isset($seo))
        {!! $seo->getMetaTags() !!}
    @else
        <title>Triple SR Travelers - Discover Sri Lanka with Custom Travel Experiences</title>
        <meta name="description" content="Premium travel agency offering customized Sri Lankan adventures. Explore pristine beaches, lush mountains, and rich culture with our expert-guided tours and personalized itineraries.">
        <meta name="keywords" content="Sri Lanka travel, custom tours, travel agency, Sri Lankan adventures, personalized travel, beach holidays, mountain tours">
        <link rel="canonical" href="{{ url()->current() }}">
        
        <!-- Open Graph meta tags -->
        <meta property="og:title" content="Triple SR Travelers - Discover Sri Lanka">
        <meta property="og:description" content="Premium travel agency offering customized Sri Lankan adventures. Explore pristine beaches, lush mountains, and rich culture.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset('slider/one.png') }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:site_name" content="Triple SR Travelers">
        
        <!-- Twitter Card meta tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Triple SR Travelers - Discover Sri Lanka">
        <meta name="twitter:description" content="Premium travel agency offering customized Sri Lankan adventures.">
        <meta name="twitter:image" content="{{ asset('slider/one.png') }}">
        
        <!-- Additional meta tags -->
        <meta name="robots" content="index, follow">
        <meta name="author" content="Triple SR Travelers">
    @endif

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}" -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('frontend/assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/assets/css/nice-select.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/assets/css/color.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">  -->

    <link href="{{ asset('frontend/assets/css/trsr.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/trsresponcive.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Performance Optimizations -->
    <style>
        /* Lazy loading images */
        img[data-src] {
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        img[data-src].loaded {
            opacity: 1;
        }
        
        /* Improve Core Web Vitals */
        img {
            height: auto;
            max-width: 100%;
        }
        
        /* Preload critical resources */
        .hero-image {
            object-fit: cover;
            width: 100%;
            height: 100vh;
        }
    </style>

    <!-- Structured Data -->
    @if(isset($seo))
        {!! $seo->getStructuredData() !!}
        {!! $seo->getBreadcrumbStructuredData() !!}
    @else
        <!-- Default Organization Schema -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "TravelAgency",
            "name": "Triple SR Travelers",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('logo/logo_website.png') }}",
            "description": "Premium travel agency specializing in Sri Lankan adventures and customized travel experiences.",
            "address": {
                "@type": "PostalAddress",
                "addressCountry": "LK"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+94777897147",
                "contactType": "customer support",
                "availableLanguage": ["English", "Sinhala"]
            },
            "sameAs": [
                "https://facebook.com/triplesrtravelers",
                "https://instagram.com/triplesrtravelers",
                "https://twitter.com/triplesrtravelers"
            ]
        }
        </script>
    @endif
</head>

<body>

    <main>
        {{ $slot }}
    </main>

</body>

<script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
<script src="{{ asset('frontend/assets/js/validation.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('frontend/assets/js/appear.js') }}"></script>
<script src="{{ asset('frontend/assets/js/scrollbar.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/isotope.js') }}"></script>
<script src="{{ asset('frontend/assets/js/pagenav.js') }}"></script>

<!-- map script -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
<script src="{{ asset('frontend/assets/js/gmaps.js') }}"></script>
<script src="{{ asset('frontend/assets/js/map-helper.js') }}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    const swiper = new Swiper('.mySwiper', {
        loop: true,
        autoplay: {
            delay: 3000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });

    // Lazy loading for images
    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('img[data-src]');
        
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.add('loaded');
                    img.removeAttribute('data-src');
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));
    });
</script>


<!-- main-js -->
<!-- <script src="{{ asset('frontend/assets/js/script.js') }}"></script> -->

</html>