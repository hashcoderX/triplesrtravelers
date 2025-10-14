<x-frontend-app-layout>

    <!-- wrapper  -->
    <div class="wrapper">
        <!-- navigation  -->

        @include('frontend.navigation')


        <!-- end navigation-->

        <!-- search bar  -->




        <!-- features section  -->

        <!-- End features section  -->
        <section class="section">
            <div class="subheading">
                Very important for the travelers
            </div>
            <div class="row trips_row maingap">
                <div class="col-md-3 tripmainbox">
                    <img src="{{ asset('stimg/down_south.jpg') }}" alt="">
                    <div class="tripstpoic">Start a trip in minutes with</div>
                    <div class="tripsmintro">Answer four short questions and get personalized recs with AI, guided by traveler opinions.</div>
                    <button class="greenbtn">Read</button>
                </div>

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