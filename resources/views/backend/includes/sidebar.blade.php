<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{route('backend.dashboard')}}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('backend/assets/images/logo.png')}}" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="assets/images/logo_sm.png" alt="" height="16">
                    </span>
    </a>

    <!-- LOGO -->
    <a href="" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src=" {{asset('backend/images/logo_sm_dark.png')}}" alt="" height="16">

                    </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Apps</li>

            <li class="side-nav-item">
                <a href="{{route('backend.users.index')}}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span>İstifadəçilər</span>
                </a>
            </li>



        </ul>



    </div>
    <!-- Sidebar -left -->

</div>
