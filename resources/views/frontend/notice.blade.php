<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/edustage/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Sep 2024 05:52:41 GMT -->

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{ asset('frontend/asset/img/favicon.png') }}" type="image/png" />
    <title>Gonga Pur Govt. Primary School</title>

    <link rel="stylesheet" href="{{ asset('frontend/asset/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/asset/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/asset/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/asset/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/asset/vendors/nice-select/css/nice-select.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/asset/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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
            max-width: 163px;
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
    </style>
    <script nonce="6685f9e1-74e5-4a8a-9212-9993819d0a37">
        try {
            (function(w, d) {
                ! function(j, k, l, m) {
                    if (j.zaraz) console.error("zaraz is loaded twice");
                    else {
                        j[l] = j[l] || {};
                        j[l].executed = [];
                        j.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        j.zaraz._v = "5796";
                        j.zaraz.q = [];
                        j.zaraz._f = function(n) {
                            return async function() {
                                var o = Array.prototype.slice.call(arguments);
                                j.zaraz.q.push({
                                    m: n,
                                    a: o
                                })
                            }
                        };
                        for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
                        j.zaraz.init = () => {
                            var q = k.getElementsByTagName(m)[0],
                                r = k.createElement(m),
                                s = k.getElementsByTagName("title")[0];
                            s && (j[l].t = k.getElementsByTagName("title")[0].text);
                            j[l].x = Math.random();
                            j[l].w = j.screen.width;
                            j[l].h = j.screen.height;
                            j[l].j = j.innerHeight;
                            j[l].e = j.innerWidth;
                            j[l].l = j.location.href;
                            j[l].r = k.referrer;
                            j[l].k = j.screen.colorDepth;
                            j[l].n = k.characterSet;
                            j[l].o = (new Date).getTimezoneOffset();
                            if (j.dataLayer)
                                for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                                        ...x[1],
                                        ...y[1]
                                    })), {}))) zaraz.set(w[0], w[1], {
                                    scope: "page"
                                });
                            j[l].q = [];
                            for (; j.zaraz.q.length;) {
                                const z = j.zaraz.q.shift();
                                j[l].q.push(z)
                            }
                            r.defer = !0;
                            for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C
                                .startsWith("_zaraz_"))).forEach((B => {
                                try {
                                    j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
                                } catch {
                                    j[l]["z_" + B.slice(7)] = A.getItem(B)
                                }
                            }));
                            r.referrerPolicy = "origin";
                            r.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[
                                l])));
                            q.parentNode.insertBefore(r, q)
                        };
                        ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener(
                            "DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
                window.zaraz._p = async bv => new Promise((bw => {
                    if (bv) {
                        bv.e && bv.e.forEach((bx => {
                            try {
                                const by = d.querySelector("script[nonce]"),
                                    bz = by?.nonce || by?.getAttribute("nonce"),
                                    bA = d.createElement("script");
                                bz && (bA.nonce = bz);
                                bA.innerHTML = bx;
                                bA.onload = () => {
                                    d.head.removeChild(bA)
                                };
                                d.head.appendChild(bA)
                            } catch (bB) {
                                console.error(`Error executing script: ${bx}\n`, bB)
                            }
                        }));
                        Promise.allSettled((bv.f || []).map((bC => fetch(bC[0], bC[1]))))
                    }
                    bw()
                }));
                zaraz._p({
                    "e": ["(function(w,d){})(window,document)"]
                });
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>

<body>
    <header class="header_area">
        <div class="main_menu">
            <div class="search_input" id="search_input_box">
                <div class="container">
                    <form class="d-flex justify-content-between" method action>
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here" />
                        <button type="submit" class="btn"></button>
                        <span class="ti-close" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <div class="col-md-0 col-sm-0">
                        <div class="header-contact" style="margin-right: 30px; !important;">
                            <div id="info-details" class="widget-text">
                                <i class="glyph-icon flaticon-email"></i>
                                <div class="info-text" style="color: #002347;">
                                    <a href="mailto:notredamecollege@ndc.edu.bd">
                                        <span>Mail Us: </span>
                                        <span style="color: #002347;">ourschool@example.edu</span>
                                    </a>
                                </div>
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
                            {{-- <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="blog.html">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="single-blog.html">Blog Details</a>
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
                                <a class="nav-link" href="contact.html">Our Teacher</a>
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
                            <li class="nav-item">
                                <a class="navbar-brand logo_h" href="{{ url('/') }}"><img
                                        src="{{ asset('backend/adminsignuplogin/asset/images/school-logo.jpg') }}"
                                        alt /></a>
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
                                    <!-- ### For Notice - Start ### -->

                                    {{-- <td class="border-0">

                                <a href="https://ndc.edu.bd/storage/app/uploads/public/66d/984/b0e/66d984b0eb05f009607891.pdf"
                                    target="_blank"> জরুরি বিজ্ঞপ্তি </a> &nbsp; &nbsp; &nbsp;

                            </td>


                            <td class="border-0">

                                <a href="https://ndc.edu.bd/storage/app/uploads/public/66d/97e/e50/66d97ee506a3b058866013.pdf"
                                    target="_blank"> এইচএসসি ২য় বর্ষ ২০২৪ ছাত্রদের ব্যাবহারিক ক্লাসের রুটিন </a>
                                &nbsp; &nbsp; &nbsp;

                            </td> --}}


                                    {{-- <td class="border-0">

                                <a href="https://ndc.edu.bd/storage/app/uploads/public/66d/57d/37c/66d57d37cfbbd674181677.pdf"
                                    target="_blank"> এইচএসসি প্রথম বর্ষ-২০২৪ শিক্ষার্থীদের স্থায়ী রোল নম্বর প্রকাশ
                                </a> &nbsp; &nbsp; &nbsp;

                            </td> --}}

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

    <section class="section_gap_top">
        <div class="container">
            {{-- <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="main_title">
                        <h2 class="mb-3">উল্লেখযোগ্য বৈশিষ্ট্য</h2>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="single_feature">
                        <div class="icon"><span class="flaticon-student"></span></div>
                        <div class="desc">
                            <h4 class="mt-3 mb-2">বৃত্তি সুবিধা</h4>
                            <p>
                                One make creepeth, man bearing theira firmament won't great
                                heaven
                            </p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6">
                    <div class="single_feature">
                        <div class="icon"><span class="flaticon-book"></span></div>
                        <div class="desc">
                            <h4 class="mt-3 mb-2">Sell Online Course</h4>
                            <p>
                                One make creepeth, man bearing theira firmament won't great
                                heaven
                            </p>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-6 col-md-6">
                    <div class="single_feature">
                        <div class="icon"><span class="flaticon-earth"></span></div>
                        <div class="desc">
                            <h4 class="mt-3 mb-2">সার্টিফিকেশন</h4>
                            <p>
                                One make creepeth, man bearing theira firmament won't great
                                heaven
                            </p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <div class="container">
        <h1 class="mt-4" style="text-align: center">Notice</h1>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered" style="width:100%" id="dataTable">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Serial No.</th>

                        <th scope="col">Title</th>
                        <th scope="col">File Format</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $notice)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $notice->title }}</td>
                            <td><a href="{{ url($notice->document_url) }}" target="_blank"
                                class="btn btn-primary"><img style="width:130px; height: 100px;"
                                    src="https://ndc.edu.bd/themes/notredame/assets/images/pdf-icon.png"
                                    alt="" title="News image"></a></td>

                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>



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

    <div id="scrollUp" style="display: block;">
        <i class="fa fa-angle-up"></i>
    </div>


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
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"8be3f4537a66ba53","version":"2024.8.0","serverTiming":{"name":{"cfL4":true}},"token":"cd0b4b3a733644fc843ef0b185f98241","b":1}'
        crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Custom DataTables script -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

    <!-- Custom DataTables script -->
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>

    <script>
        // When the user scrolls down 100px from the top of the document, show the button
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

        // When the user clicks on the button, scroll to the top of the document
        document.getElementById("scrollUp").addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

</body>

</html>
