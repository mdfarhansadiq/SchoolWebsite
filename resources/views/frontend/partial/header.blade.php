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
                {{-- <a class="navbar-brand logo_h" href="{{ url('/') }}"><img
                        src="{{ asset('backend/adminsignuplogin/asset/images/school-logo.jpg') }}" alt /></a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
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
