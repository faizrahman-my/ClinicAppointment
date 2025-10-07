<nav class="navbar navbar-expand-lg bg-primary rounded-4 fixed-top mx-2 mt-2" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand px-2" href="{{ URL::to('/') }}">FindMyDoc</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item ps-lg-3">
                    <a class="nav-link @yield('about-active')" href="{{ URL::to('/about') }}">About</a>
                </li>
                @auth
                    @if (Auth::user()->is_superadmin == 0 && !Auth::user()->staff)
                        <li class="nav-item ps-lg-3">
                            <a class="nav-link @yield('appointment-active')" href="{{ URL::to('/appointment/reserve') }}">Make
                                Appointment</a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item ps-lg-3">
                    <a class="nav-link @yield('service-active')" href="{{ URL::to('/service') }}">Services</a>
                </li>
                <li class="nav-item ps-lg-3">
                    <a class="nav-link @yield('branch-active')" href="{{ URL::to('/branch') }}">Our Branches</a>
                </li>
                <li class="nav-item ps-lg-3">
                    <a class="nav-link @yield('doctor-active')" href="{{ URL::to('/doctor') }}">Our Doctors</a>
                </li>
                <li class="nav-item dropdown ps-lg-3">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false"></a>
                    <div class="dropdown-menu">

                        @auth
                            <a class="dropdown-item @yield('account-active')"
                                href="{{ URL::to('/profile') }}">{{ ucwords(Auth::user()->username) }}</a>

                            @if (Auth::user()->is_superadmin == 1)
                                <a class="dropdown-item @yield('manageuser-active')" href="{{ URL::to('/users') }}">Manage User</a>
                            @endif

                            @if (Auth::user()->is_superadmin == 0 && !Auth::user()->staff)
                                <a class="dropdown-item @yield('myappointment-active')" href="{{ URL::to('/appointment') }}">My
                                    Appointment</a>
                            @endif

                            @if (Auth::user()->staff)
                                @if (Auth::user()->staff->is_admin == 1)
                                    <a class="dropdown-item @yield('staff-appointment-active')"
                                        href="{{ URL::to('appointment/admin') }}">Appointment</a>
                                @else
                                    <a class="dropdown-item @yield('staff-appointment-active')"
                                        href="{{ URL::to('appointment/doctor') }}">Appointment</a>
                                @endif
                            @endif

                            <form action="{{ URL::to('logout') }}" method="post">
                                @method('post')
                                @csrf
                                <button type="submit" class="dropdown-item">Sign Out</button>
                            </form>
                        @endauth
                        @guest
                            <a class="dropdown-item @yield('login-active')" href="{{ URL::to('/login') }}">Sign In</a>
                        @endguest

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<span class="my-5"></span>
