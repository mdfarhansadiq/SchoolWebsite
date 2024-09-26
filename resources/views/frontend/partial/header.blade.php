<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="custom-container d-flex align-items-center justify-content-between">

                <!-- School Logo Fix -->
                <a class="navbar-brand logo_h" href="{{ url('/') }}">
                    <img src="{{ asset('backend/adminsignuplogin/asset/images/school-logo.jpg') }}"
                         alt="School Logo"
                         style="max-width: 150px; height: auto;" />
                </a>

                <!-- Mail Address Fix -->
                <div class="header-contact d-flex align-items-center" style="margin-right: 30px;">
                    <i class="glyph-icon flaticon-email mr-2"></i>
                    <div class="info-text">
                        <a href="mailto:ourschool@example.edu" style="color: #002347; text-decoration: none;">
                            <span>Mail Us: </span>
                            <span>ourschool@example.edu</span>
                        </a>
                    </div>
                </div>

                <!-- Navbar Toggle Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Navbar Menu -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>

                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Class</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item {{ request()->is('online-class-link') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{url('online-class-link')}}">Online Class</a>
                                </li>
                                <li class="nav-item {{ request()->is('class-recording') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{url('class-recording')}}">Class Record</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="course-details.html">Course Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="elements.html">Elements</a>
                                </li> --}}
                            </ul>
                        </li>
                        <li class="nav-item {{ request()->is('/teacher') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('/teacher')}}">Our Teacher</a>
                        </li>
                        <!-- Other nav items -->
                        <li class="nav-item {{ request()->is('/about') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/about') }}">About</a>
                        </li>
                        <li class="nav-item {{ request()->is('/contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('/contact')}}">Contact</a>
                        </li>

                        <!-- Logout Button Fix -->
                        <li class="nav-item">
                            @if ($admin_logged_in == null)
                                <a class="nav-link" href="{{ route('admin.login') }}">Login/Signup</a>
                            @else
                                <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn nav-link"
                                            style="padding: 0; color: #292ccc; text-decoration: none;">
                                        Logout
                                    </button>
                                </form>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
