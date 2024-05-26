<nav class="navbar navbar-expand-lg bg-primary rounded-4 fixed-top mx-2 mt-2" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand px-2" href="@yield('link-home')">FindMyDoc</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item ps-lg-3">
                    <a class="nav-link @yield('about-active')" href="@yield('link-about')">About</a>
                </li>
                <li class="nav-item ps-lg-3">
                    <a class="nav-link @yield('appointment-active')" href="@yield('link-appointment')">Make Appointment</a>
                </li>
                <li class="nav-item ps-lg-3">
                    <a class="nav-link @yield('service-active')" href="@yield('link-service')">Services</a>
                </li>
                <li class="nav-item ps-lg-3">
                    <a class="nav-link @yield('branch-active')" href="@yield('link-branch')">Our Branches</a>
                </li>
                <li class="nav-item ps-lg-3">
                    <a class="nav-link @yield('doctor-active')" href="@yield('link-doctor')">Our Doctors</a>
                </li>
                <li class="nav-item dropdown ps-lg-3">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false"></a>
                    <div class="dropdown-menu">

                        @if (session()->has('username'))
                            <a class="dropdown-item @yield('account-active')"
                                href="@yield('link-account')">{{ session('username') }}</a>
                        @endif
                        <a class="dropdown-item @yield('manageuser-active')" href="@yield('link-manageuser')">Manage User</a>
                        <a class="dropdown-item @yield('myappointment-active')" href="@yield('link-myappointment')">My Appointment</a>
                        <form action="{{ URL::to('logout') }}" method="post">
                            @method('post')
                            @csrf
                            <button type="submit" class="dropdown-item">Sign Out</button>
                        </form>
                        <a class="dropdown-item @yield('login-active')" href="@yield('link-login')">Sign In</a>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<span class="my-5"></span>
