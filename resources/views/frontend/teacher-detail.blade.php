<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/asset/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/asset/css/style.css') }}" />
    <link rel="icon" href="{{ asset('frontend/asset/img/favicon.png') }}" type="image/png" />
    <title>Gonga Pur Govt. Primary School</title>


    <style>
        #rs-about {
            padding: 60px 0;
            background-color: #002347;
            /* Light background for a clean look */
        }

        .about-desc h3 {
            font-size: 32px;
            color: #ffffff;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .about-desc p {
            font-size: 18px;
            line-height: 1.6;
            color: #ffffff;
            text-align: justify;
        }

        .card-header h3 {
            font-size: 24px;
            font-weight: 600;
            color: #34495e;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .card-header h3:hover {
            color: #2980b9;
            /* Hover effect for titles */
        }

        .card-body p {
            font-size: 16px;
            color: #666;
            line-height: 1.7;
        }

        .sidebar-area {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .latest-courses h3 {
            font-size: 26px;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .post-item {
            display: flex;
            margin-bottom: 20px;
        }

        .post-img img {
            border-radius: 6px;
            transition: transform 0.3s ease;
        }

        .post-img img:hover {
            transform: scale(1.05);
            /* Slight zoom on hover */
        }

        .post-desc {
            margin-left: 15px;
        }

        .post-desc h4 a {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            transition: color 0.3s ease;
        }

        .post-desc h4 a:hover {
            color: #2980b9;
            /* Hover color for links */
        }

        .post-desc .price {
            font-size: 14px;
            color: #888;
        }

        .vr_btn {
            display: inline-block;
            padding: 8px 15px;
            background-color: #2980b9;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .vr_btn:hover {
            background-color: #1a73b9;
            /* Button hover effect */
        }

        @media (max-width: 768px) {
            .about-desc h3 {
                font-size: 28px;
            }

            .card-header h3 {
                font-size: 20px;
            }

            .post-item {
                flex-direction: column;
            }

            .post-img {
                margin-bottom: 10px;
            }
        }

        .custom-card .card-body {
            padding: 40px;
            /* Increase padding for larger card-body */
            font-size: 18px;
            /* Slightly increase the font size */
            background-color: #f9f9f9;
            /* Light background to differentiate */
            border-radius: 8px;
            /* Rounded corners */
        }

        .custom-card {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }


        .rs-accordion-style1 .card .card-header .acdn-title:not(.collapsed) {
            background-color: #4ea1d3;
            color: #ffffff;
        }

        select.form-control {
            display: inline;
            width: 200px;
            margin-left: 25px;
        }


        /* DataTable customization */
        .dataTables_wrapper .dataTables_filter input {
            width: 300px;
            margin-left: 0.5em;
            display: inline-block;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 5px;
        }

        .dataTables_length select {
            width: auto;
            margin-left: 5px;
        }

        /* Custom table styling */
        table.table {
            border: 1px solid #dee2e6;
            margin-bottom: 20px;
            font-size: 15px;
            background-color: #fff;
        }

        .table th,
        .table td {
            padding: 10px;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }

        .table-dark {
            background-color: #343a40;
            color: white;
        }

        /* Responsive for small devices */
        @media (max-width: 768px) {
            .dataTables_wrapper .dataTables_filter input {
                width: 100%;
                margin: 0;
                margin-bottom: 10px;
            }

            .dataTables_length select {
                width: 100%;
                margin-bottom: 10px;
            }
        }

        .dataTables_paginate .paginate_button {
            padding: 0.5em 1em;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            margin: 0 3px;
        }

        .dataTables_paginate .paginate_button.disabled {
            background-color: #ccc;
        }

        .dataTables_paginate .paginate_button:hover {
            background-color: #0056b3;
        }

        /* Fix for image overflow */
        .navbar-brand img {
            width: 100%;
            max-width: 80px;
            /* Set the exact width as needed */
            height: auto;
        }

        /* Make sure the form container has proper width and prevents overflow */
        .signup-content {
            max-width: 600px;
            margin: 0 auto;
        }


        #scrollUp {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            /* Initially hidden */
            width: 40px;
            height: 40px;
            background-color: #333;
            color: #fff;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 1000;
            /* Make sure it's above other content */
        }

        #scrollUp:hover {
            background-color: #555;
            /* Change color on hover */
        }

        .fa-angle-up {
            font-size: 20px;

        }

        .person-info h2 {
            transition: color 0.3s ease;
        }

        .person-info h2:hover {
            color: #2980b9;
        }

        .person-contact a:hover {
            text-decoration: underline;
        }

        img {
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.05);
        }

        .person-contact i {
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .person-contact a:hover i {
            transform: rotate(360deg);
        }
    </style>
</head>

<body>

    <header class="header_area">
        <div class="main_menu">
            {{-- <div class="search_input" id="search_input_box">
                <div class="container">
                    <form class="d-flex justify-content-between" method action>
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here" />
                        <button type="submit" class="btn"></button>
                        <span class="ti-close" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div> --}}
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <div class="col-md-0 col-sm-0">
                        <div class="header-contact d-flex align-items-center" style="margin-right: 30px;">
                            <i class="glyph-icon flaticon-email mr-2"></i>
                            <div class="info-text">
                                <a class="navbar-brand logo_h" href="{{ url('/') }}"><img
                                        src="{{ asset('backend/adminsignuplogin/asset/images/school-logo.jpg') }}"
                                        alt /></a>
                                <a href="mailto:ourschool@example.edu" style="color: #002347; text-decoration: none;">
                                    <span>Mail Us: </span>
                                    <span>ourschool@example.edu</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            {{-- <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="courses.html">Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="course-details.html">Course Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="elements.html">Elements</a>
                                    </li>
                                </ul>
                            </li> --}}

                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Live Class</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Class Record</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/teacher') }}">Our Teacher</a>
                            </li>
                            <li class="nav-item {{ request()->is('/about') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/about') }}">About</a>
                            </li>
                            <li class="nav-item {{ request()->is('/contact') ? 'active' : '' }}">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="#" class="nav-link search" id="search">
                                    <i class="ti-search"></i>
                                </a>
                            </li> --}}
                            <!-- Logout Button Fix -->
                            {{-- <li class="nav-item">
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
                            </li> --}}
                            <li class="nav-item">

                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!--start code for scrolling -->
            <div class="col-md-12 col-7">
                <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseleave="this.start();">

                    <table class="border-0">
                        <tbody>
                            <tr>

                                @foreach ($noticeDocuments as $dt)
                                    <td class="border-0">


                                        <a href="{{ url($dt->document_url) }}" target="_blank">{{ $dt->title }}</a>
                                        &nbsp; &nbsp; &nbsp;



                                    </td>
                                @endforeach

                                <!-- ### Notice End ### -->

                            </tr>
                        </tbody>
                    </table>

                </marquee>
            </div>
            <!--end code for scrolling-->
        </div>
    </header>

    <section class="section_gap_top" style="background: linear-gradient(135deg, #f0f4f8, #d9e4f1); padding: 200px 0;">
        <div class="container" style="padding: 60px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            <div class="row person-details-container align-items-center">
                <div class="col-md-4 text-center">
                    <!-- Person Image -->
                    <img style="width: 230px; height: auto; border-radius: 50%; box-shadow: 0 4px 12px rgba(0,0,0,0.1);"
                        src="https://drive.google.com/thumbnail?id={{ $teacher_info->photo_link }}"
                        alt="{{ $teacher_info->name }}" title="{{ $teacher_info->name }}">
                </div>
                <div class="col-md-8 person-info">
                    <!-- Person Name -->
                    <h2 style="font-weight: bold; font-size: 2.5rem; color: #2c3e50; margin-bottom: 20px;">
                        {{ $teacher_info->name }}</h2>
                    <h5 style="color: #002347">Designation: {{ $teacher_info->position }}</h5>
                    <!-- Short Bio -->
                    <p style="font-size: 1.1rem; line-height: 1.6; color: #7f8c8d; margin-bottom: 30px;">
                        {!! $teacher_info->educational_qualification !!}</p>
                    <!-- Contact Info -->
                    <div class="person-contact" style="font-size: 1.2rem; color: #34495e;">
                        <a href="mailto:johndoe@example.com"
                            style="color: #2980b9; text-decoration: none; margin-bottom: 10px; display: inline-block;">
                            <i class="fa fa-envelope" style="margin-right: 10px; color: #e74c3c;"></i>
                            johndoe@example.com
                        </a><br>
                        <a href="tel:+1234567890" style="color: #2980b9; text-decoration: none;">
                            <i class="fa fa-phone" style="margin-right: 10px; color: #27ae60;"></i> +123 456 7890
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scroll to Top Button -->
    <div id="scrollUp" style="display: none;">
        <i class="fa fa-angle-up"></i>
    </div>

    <!-- Footer -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Top Products</h4>
                    <ul>
                        <li><a href="#">Managed Website</a></li>
                        <li><a href="#">Manage Reputation</a></li>
                        <li><a href="#">Power Tools</a></li>
                        <li><a href="#">Marketing Service</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Features</h4>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Guides</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Experts</a></li>
                        <li><a href="#">Agencies</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 single-footer-widget">
                    <h4>Newsletter</h4>
                    <p>You can trust us. we only send promo offers,</p>
                    <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank"
                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                            method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'"
                                required type="email" />
                            <button class="click-btn btn btn-default">
                                <span>subscribe</span>
                            </button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value
                                    type="text" />
                            </div>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row footer-bottom d-flex justify-content-between">
                <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">

                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="ti-heart"
                        aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>

                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter"></i></a>
                    <a href="#"><i class="ti-dribbble"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('frontend/asset/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/asset/js/popper.js') }}"></script>
    <script src="{{ asset('frontend/asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/asset/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/asset/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/asset/js/owl-carousel-thumb.min.js') }}"></script>
    <script src="{{ asset('frontend/asset/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/asset/js/mail-script.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('frontend/asset/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('frontend/asset/js/theme.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

    <script>
        // Scroll to top functionality
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            const scrollUpButton = document.getElementById("scrollUp");
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                scrollUpButton.style.display = "block";
            } else {
                scrollUpButton.style.display = "none";
            }
        }

        document.getElementById("scrollUp").addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

</body>

</html>
