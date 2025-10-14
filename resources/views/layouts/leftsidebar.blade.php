<nav class="sidebar sidebar-offcanvas" id="sidebar" style="height: 1480px;">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html">
            <img src="{{ asset('logo/new_ishara_motors_logo.jpg') }}" alt="" width="100%" height="auto">
        </a>
        <a class="sidebar-brand brand-logo-mini" href="index.html">
            <img src="{{ asset('logo/new_ishara_motors_logo.jpg') }}" alt="" width="100%" height="auto">
        </a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <!-- <img class="img-xs rounded-circle " src="#" alt=""> -->
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                        <!-- <span>{{ Auth::user()->company_id }}</span> -->
                        <span>{{ Auth::user()->usertype }}</span>
                    </div>
                </div>

            </div>
        </li>
        <!-- <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li> -->
        @if (Auth::user()->usertype == 'Admin')
        <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/addnewuser"> New User </a></li>
                </ul>
            </div>
        </li>



        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Inquiries</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/addenquary"> Add inquiries </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewenquary"> View inquiries </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/enquarysummery"> Inquiries Summery </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Regions</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/adregions"> Add New Regions </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/regionslist"> Our Regions List </a></li>

                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Hotel</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/hotelcategory"> Hotel Category </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/addnewhotel"> Add New Hotel </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/hotellist"> Our Hotel List </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Trips</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/tripcategory"> Trip Category </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/addnewtrip"> Add New Trip </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/triplist"> Our Trip List </a></li>

                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Destination</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/addestination"> Add New Destination </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/destinationlist"> Our Destination List </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/addsubdestination"> Add New Sub Destination </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/subdestinationlist"> Our Sub Destination List </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/subdestinationdetails"> Sub Destination Details </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Orders</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/addestination"> View Orders</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Review</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/reviewlist"> Review Lists</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Discover</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/reviewlist"> Review Lists</a></li>
                </ul>
            </div>
        </li>

        
        @endif


    </ul>
</nav>