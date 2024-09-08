@extends('frontend.layout.master')

@push('css')
    <style>
        /* Slider container */
        .slider {
            position: relative;
            width: 100vw;
            /* Full screen width */
            height: auto;
            /* Full screen height */
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        /* Slide images */
        .slides {
            display: flex;
            width: 100%;
            transition: transform 0.5s ease-in-out;
        }

        .slides img {
            width: 100vw;
            /* Full screen width for images */
            height: auto;
            /* Full screen height for images */
            object-fit: cover;
            /* Ensures images cover the slider without stretching */
        }

        /* Left and right navigation arrows */
        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            cursor: pointer;
            border: none;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        /* Dots (indicators) */
        .dots {
            text-align: center;
            margin-top: 10px;
        }

        .dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            background-color: #bbb;
            border-radius: 50%;
            margin: 0 5px;
            cursor: pointer;
        }

        .active-dot {
            background-color: #717171;
        }


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

        table,
        td,
        th {
            border: 1px solid #dee2e6;
            vertical-align: middle !important;
            text-align: left;
        }

        table,
        td {
            border: 1px solid #dee2e6;
            vertical-align: middle !important;
            text-align: center;
        }


        table.dataTable tbody tr.stripe1 {
            background-color: #ffffff;
        }

        table.dataTable tbody tr.stripe2 {
            background-color: #f6f6f6;
            border-bottom: solid #f6f6f6;
        }
    </style>
@endpush

@section('title', 'Home')


@section('content')

    <section class="home_banner_area">
        <div class="banner_inner">

            <div class="container">
                <div class="row">
                    {{-- <div class="col-lg-12">

                        <div class="banner_content text-center">
                            <p class="text-uppercase">
                                শিক্ষা জাতির মেরুদন্ড
                            </p>
                            <h2 class="text-uppercase mt-4 mb-5">
                                প্রতিটি পদক্ষেপে এগিয়ে থাকুন
                            </h2>

                            <div>
                                <a href="#" class="primary-btn2 mb-3 mb-sm-0">learn more</a>

                            </div>
                        </div>
                    </div> --}}
                    <div class="slider">
                        <div class="slides">
                            <img src="{{ asset('frontend/asset/img/banner/home-banner.jpg') }}" alt="Slide 1">
                            <img src="{{ asset('frontend/asset/img/banner/home-banner.jpg') }}" alt="Slide 2">
                            <img src="{{ asset('frontend/asset/img/banner/home-banner.jpg') }}" alt="Slide 3">
                        </div>
                        <!-- Navigation buttons -->
                        <button class="prev" onclick="plusSlides(-1)">&#10094;</button>
                        <button class="next" onclick="plusSlides(1)">&#10095;</button>
                        <!-- Dots for each slide -->
                        <div class="dots">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>


    <div id="rs-about" class="rs-about sec-spacer sec-color">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="about-desc">
                        <h3>WELCOME TO Our School</h3>
                        <p>At the present time the College receives no financial aid from the government of Bangladesh. It
                            is supported entirely by tuition fees collected from the students.</p>
                    </div>
                    <div id="accordion" class="rs-accordion-style1">
                        <div class="card custom-card">
                            <div class="card-header active" id="headingOne">
                                <h3 class="acdn-title" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    School History
                                </h3>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">



                                    <p style="text-align: justify;"><strong>Hillcrest College was established in
                                            Mapleton, Dhaka in November, 1949. It was established by the Roman Catholic
                                            Priests from the Congregation of Holy Cross due to the crisis in
                                            the education sector of the newly formed East Pakistan. It was Archbishop
                                            Howard, CSC, as Archbishop of Dhaka and leader of the Catholic Church in East
                                            Pakistan, who invited the Congregation of Holy Cross Priest Society to found and
                                            administer a college in this new country. Initially, it was known as St.
                                            Peter's College, an extension of the St. Peter's School, which was also
                                            established by the Congregation. It was relocated to its current location in
                                            Greenfield in 1954 and renamed to Hillcrest College. The Congregation of Holy
                                            Cross also maintains the University of Hillcrest, Maplewood University, and
                                            Birchfield and Redwood College in the United States. The new name was a tribute
                                            to
                                            the University of Hillcrest, the <em>alma mater</em> of many of the faculty
                                            members. In French, <em>Hillcrest</em> means <em>Our Haven</em>, symbolizing a
                                            safe space for learning and growth.</strong></p>
                                    <p style="text-align: justify;"><strong>From the very beginning, the two main objectives
                                            of the founders of the college have been to provide education at a college level
                                            to Christian students and to offer quality and value-based education to
                                            students to contribute to the development of this country. In
                                            keeping with the ideals of social justice, special emphasis is given to
                                            students who would otherwise be deprived of the opportunity for such quality and
                                            value-based education due to their economic condition, ethnicity, or
                                            otherwise disadvantaged social situation. The educational objective is to
                                            instill in students a love of God, their country, and wisdom. Emphasis is given
                                            to character formation.</strong></p>
                                    <p style="text-align: justify;"><strong>Hillcrest College is seen as a family.
                                            All students, teaching and non-teaching staff, and administrative staff
                                            are members of the Hillcrest Family. The Hillcrest Family life is based on
                                            mutual
                                            respect, love, shared responsibility, and a common interest in the holistic
                                            formation of students. Here, everyone performs their duties with sincerity,
                                            competence, and compassion, which brings a unique dimension to the Hillcrest
                                            Family. The glory of Hillcrest College does not lie solely in its exam results
                                            but also in the opportunities it offers to poor, underprivileged, and
                                            tribal students from different parts of the country.</strong></p>
                                    <p style="text-align: justify;"><strong>At the present time, the College receives no
                                            financial aid from the government of Bangladesh. It is supported entirely by
                                            tuition fees collected from the students.</strong></p>



                                </div>
                            </div>
                        </div>
                        <div class="card custom-card">
                            <div class="card-header" id="headingTwo">
                                <h3 class="acdn-title collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    Our Mission
                                </h3>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">



                                    <p><em><strong>In fulfillment of the vision, the College, established and administered
                                                by the Congregation of Holy Cross Priest Society, offers quality education
                                                and endeavors to form students in moral values -- tolerance, justice,
                                                compassion, responsibility and deep love for the society, the country and
                                                the world. The College cultivates both mind and heart to become
                                                fully-developed and actualized human beings.</strong></em></p>


                                </div>
                            </div>
                        </div>
                        <div class="card custom-card">
                            <div class="card-header mb-0" id="headingThree">
                                <h3 class="acdn-title collapsed" data-toggle="collapse" data-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    Our Vision
                                </h3>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">



                                    <p>Hilcrest College envisions providing a comprehensive education to develop the whole
                                        person -- committed, creative, productive, service-oriented, academically competent
                                        and responsive to face the challenges of the times.</p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-area">
                        <div class="latest-courses">
                            <h3 class="title">Notice Board</h3>

                            @foreach ($notice_documents_1 as $notice)
                                <div class="post-item">
                                    <div class="post-img">

                                        <a href="{{ url($notice->document_url) }}" target="_blank"><img
                                                style="width:130px; height: 100px;"
                                                src="https://ndc.edu.bd/themes/notredame/assets/images/pdf-icon.png"
                                                alt="" title="News image"></a>



                                    </div>
                                    <div class="post-desc notice-details">
                                        <h4>

                                            <a href="{{ url($notice->document_url) }}"
                                                target="_blank">{{ $notice->title }}</a>

                                        </h4>
                                        <span class="price"> <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                                {{$notice->created_at}}</span></span>
                                        ...
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="post-item">
                                <div class="post-img">

                                    <a href="https://ndc.edu.bd/storage/app/uploads/public/66d/97e/e50/66d97ee506a3b058866013.pdf"
                                        target="_blank"><img style="width:130px; height: 100px;"
                                            src="https://ndc.edu.bd/themes/notredame/assets/images/pdf-icon.png"
                                            alt="" title="News image"></a>



                                </div>
                                <div class="post-desc notice-details">
                                    <h4>

                                        <a href="https://ndc.edu.bd/storage/app/uploads/public/66d/97e/e50/66d97ee506a3b058866013.pdf"
                                            target="_blank">এইচএসসি ২য় বর্ষ ২০২৪ ছাত্রদের ব্যাবহারিক...</a>

                                    </h4>
                                    <span class="price"> <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                            09/05/2024</span></span>
                                    ...
                                </div>
                            </div>


                            <div class="post-item">
                                <div class="post-img">

                                    <a href="https://ndc.edu.bd/storage/app/uploads/public/66d/57d/37c/66d57d37cfbbd674181677.pdf"
                                        target="_blank"><img style="width:130px; height: 100px;"
                                            src="https://ndc.edu.bd/themes/notredame/assets/images/pdf-icon.png"
                                            alt="" title="News image"></a>



                                </div>
                                <div class="post-desc notice-details">
                                    <h4>

                                        <a href="https://ndc.edu.bd/storage/app/uploads/public/66d/57d/37c/66d57d37cfbbd674181677.pdf"
                                            target="_blank">এইচএসসি প্রথম বর্ষ-২০২৪ শিক্ষার্থীদের স্...</a>

                                    </h4>
                                    <span class="price"> <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                            09/02/2024</span></span>
                                    ...
                                </div>
                            </div> --}}


                            <div style="text-align: right; margin-top: 10px;"><a href="{{url('/notice')}}"
                                    class="vr_btn">More Notice</a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="feature_area section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="main_title">
                        <h2 class="mb-3">উল্লেখযোগ্য বৈশিষ্ট্য</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
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
                <div class="col-lg-6 col-md-6">
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
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="popular_courses">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="main_title">
                        <h2 class="mb-3">Our Popular Courses</h2>
                        <p>
                            Replenish man have thing gathering lights yielding shall you
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="owl-carousel active_course">
                        <div class="single_course">
                            <div class="course_head">
                                <img class="img-fluid" src="{{asset('frontend/asset/img/courses/c1.jpg')}}" alt />
                            </div>
                            <div class="course_content">
                                <span class="price">$25</span>
                                <span class="tag mb-4 d-inline-block">design</span>
                                <h4 class="mb-3">
                                    <a href="course-details.html">Custom Product Design</a>
                                </h4>
                                <p>
                                    One make creepeth man bearing their one firmament won't fowl
                                    meat over sea
                                </p>
                                <div
                                    class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4">
                                    <div class="authr_meta">
                                        <img src="img/courses/author1.png" alt />
                                        <span class="d-inline-block ml-2">Cameron</span>
                                    </div>
                                    <div class="mt-lg-0 mt-3">
                                        <span class="meta_info mr-4">
                                            <a href="#"> <i class="ti-user mr-2"></i>25 </a>
                                        </span>
                                        <span class="meta_info"><a href="#"> <i class="ti-heart mr-2"></i>35
                                            </a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_course">
                            <div class="course_head">
                                <img class="img-fluid" src="{{asset('frontend/asset/img/courses/c2.jpg')}}" alt />
                            </div>
                            <div class="course_content">
                                <span class="price">$25</span>
                                <span class="tag mb-4 d-inline-block">design</span>
                                <h4 class="mb-3">
                                    <a href="course-details.html">Social Media Network</a>
                                </h4>
                                <p>
                                    One make creepeth man bearing their one firmament won't fowl
                                    meat over sea
                                </p>
                                <div
                                    class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4">
                                    <div class="authr_meta">
                                        <img src="{{asset('frontend/asset/img/courses/author2.png')}}" alt />
                                        <span class="d-inline-block ml-2">Cameron</span>
                                    </div>
                                    <div class="mt-lg-0 mt-3">
                                        <span class="meta_info mr-4">
                                            <a href="#"> <i class="ti-user mr-2"></i>25 </a>
                                        </span>
                                        <span class="meta_info"><a href="#"> <i class="ti-heart mr-2"></i>35
                                            </a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_course">
                            <div class="course_head">
                                <img class="img-fluid" src="{{asset('frontend/asset/img/courses/c3.jpg')}}" alt />
                            </div>
                            <div class="course_content">
                                <span class="price">$25</span>
                                <span class="tag mb-4 d-inline-block">design</span>
                                <h4 class="mb-3">
                                    <a href="course-details.html">Computer Engineering</a>
                                </h4>
                                <p>
                                    One make creepeth man bearing their one firmament won't fowl
                                    meat over sea
                                </p>
                                <div
                                    class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4">
                                    <div class="authr_meta">
                                        <img src="{{asset('frontend/asset/img/courses/author3.png')}}" alt />
                                        <span class="d-inline-block ml-2">Cameron</span>
                                    </div>
                                    <div class="mt-lg-0 mt-3">
                                        <span class="meta_info mr-4">
                                            <a href="#"> <i class="ti-user mr-2"></i>25 </a>
                                        </span>
                                        <span class="meta_info"><a href="#"> <i class="ti-heart mr-2"></i>35
                                            </a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    {{-- <div class="section_gap registration_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="row clock_sec clockdiv" id="clockdiv">
                        <div class="col-lg-12">
                            <h1 class="mb-3">Register Now</h1>
                            <p>
                                There is a moment in the life of any aspiring astronomer that
                                it is time to buy that first telescope. It’s exciting to think
                                about setting up your own viewing station.
                            </p>
                        </div>
                        <div class="col clockinner1 clockinner">
                            <h1 class="days">150</h1>
                            <span class="smalltext">Days</span>
                        </div>
                        <div class="col clockinner clockinner1">
                            <h1 class="hours">23</h1>
                            <span class="smalltext">Hours</span>
                        </div>
                        <div class="col clockinner clockinner1">
                            <h1 class="minutes">47</h1>
                            <span class="smalltext">Mins</span>
                        </div>
                        <div class="col clockinner clockinner1">
                            <h1 class="seconds">59</h1>
                            <span class="smalltext">Secs</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="register_form">
                        <h3>Courses for Free</h3>
                        <p>It is high time for learning</p>
                        <form class="form_area" id="myForm"
                            action="https://preview.colorlib.com/theme/edustage/mail.html" method="post">
                            <div class="row">
                                <div class="col-lg-12 form_group">
                                    <input name="name" placeholder="Your Name" required type="text" />
                                    <input name="name" placeholder="Your Phone Number" required type="tel" />
                                    <input name="email" placeholder="Your Email Address"
                                        pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required
                                        type="email" />
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <section class="trainer_area section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    {{-- <div class="main_title" style="width: 100%">
                        <h2 class="mb-3">আমাদের সম্মানিত শিক্ষকবৃন্দ</h2>
                        <h2 class="mb-3"></h2>

                    </div> --}}
                    <div class="main_title" style="width: 100%;">
                        <h2 class="mb-3" style="white-space: nowrap;">আমাদের সম্মানিত শিক্ষকবৃন্দ</h2>

                        <p>
                            জীবনের প্রতিটি মুহূর্ত শেখার একটি সুযোগ, তোমার জ্ঞানই তোমার আসল সম্পদ।
                        </p>
                    </div>

                </div>
            </div>
            <div class="row justify-content-center d-flex align-items-center">
                <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                    <div class="thumb d-flex justify-content-sm-center">
                        <img class="img-fluid" src="{{ asset('frontend/asset/img/trainer/t1.jpg') }}" alt />
                    </div>
                    <div class="meta-text text-sm-center">
                        <h4>Mated Nithan</h4>
                        <p class="designation">Sr. web designer</p>
                        <div class="mb-4">
                            <p>
                                “অধ্যবসায়ের কোনো বিকল্প নেই, কঠোর পরিশ্রমই তোমার সাফল্যের চাবিকাঠি।”
                            </p>
                        </div>
                        <div class="align-items-center justify-content-center d-flex">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter"></i></a>
                            <a href="#"><i class="ti-linkedin"></i></a>
                            <a href="#"><i class="ti-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                    <div class="thumb d-flex justify-content-sm-center">
                        <img class="img-fluid" src="{{ asset('frontend/asset/img/trainer/t2.jpg') }}" alt />
                    </div>
                    <div class="meta-text text-sm-center">
                        <h4>David Cameron</h4>
                        <p class="designation">Sr. web designer</p>
                        <div class="mb-4">
                            <p>
                                “জ্ঞান অর্জন করো, কারণ জ্ঞান এমন একটি ধন যা কখনো শেষ হয় না।”
                            </p>
                        </div>
                        <div class="align-items-center justify-content-center d-flex">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter"></i></a>
                            <a href="#"><i class="ti-linkedin"></i></a>
                            <a href="#"><i class="ti-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                    <div class="thumb d-flex justify-content-sm-center">
                        <img class="img-fluid" src="{{ asset('frontend/asset/img/trainer/t3.jpg') }}" alt />
                    </div>
                    <div class="meta-text text-sm-center">
                        <h4>Jain Redmel</h4>
                        <p class="designation">Sr. Faculty Data Science</p>
                        <div class="mb-4">
                            <p>
                                “ভুল করাটা কোনো লজ্জার বিষয় নয়, ভুল থেকে শিক্ষা নেওয়াটাই আসল বুদ্ধিমানের কাজ।”
                            </p>
                        </div>
                        <div class="align-items-center justify-content-center d-flex">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter"></i></a>
                            <a href="#"><i class="ti-linkedin"></i></a>
                            <a href="#"><i class="ti-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                    <div class="thumb d-flex justify-content-sm-center">
                        <img class="img-fluid" src="{{ asset('frontend/asset/img/trainer/t4.jpg') }}" alt />
                    </div>
                    <div class="meta-text text-sm-center">
                        <h4>Nathan Macken</h4>
                        <p class="designation">Sr. web designer</p>
                        <div class="mb-4">
                            <p>
                                “জ্ঞান অর্জন হলো পথচলার শুরু, সাফল্য অর্জন হলো সেই পথে ধৈর্যের ফল।”
                            </p>
                        </div>
                        <div class="align-items-center justify-content-center d-flex">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter"></i></a>
                            <a href="#"><i class="ti-linkedin"></i></a>
                            <a href="#"><i class="ti-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="testimonial_area section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="main_title">
                        <h2 class="mb-3">শিক্ষকবৃন্দের বক্তব্য</h2>
                        <p>
                            শিক্ষা এমন একটি আলো যা যত বিতরণ করা যায় ততই বৃদ্ধি পায়। শিখতে থাকো, বড় হতে থাকো।
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testi_slider owl-carousel">
                    <div class="testi_item">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <img src="{{ asset('frontend/asset/img/testimonials/t1.jpg') }}" alt />
                            </div>
                            <div class="col-lg-8">
                                <div class="testi_text">
                                    <h4>Elite Martin</h4>
                                    <p>
                                        Him, made can't called over won't there on divide there
                                        male fish beast own his day third seed sixth seas unto.
                                        Saw from
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testi_item">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <img src="{{ asset('frontend/asset/img/testimonials/t2.jpg') }}" alt />
                            </div>
                            <div class="col-lg-8">
                                <div class="testi_text">
                                    <h4>Davil Saden</h4>
                                    <p>
                                        Him, made can't called over won't there on divide there
                                        male fish beast own his day third seed sixth seas unto.
                                        Saw from
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testi_item">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <img src="{{ asset('frontend/asset/img/testimonials/t1.jpg') }}" alt />
                            </div>
                            <div class="col-lg-8">
                                <div class="testi_text">
                                    <h4>Elite Martin</h4>
                                    <p>
                                        Him, made can't called over won't there on divide there
                                        male fish beast own his day third seed sixth seas unto.
                                        Saw from
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testi_item">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <img src="{{ asset('frontend/asset/img/testimonials/t2.jpg') }}" alt />
                            </div>
                            <div class="col-lg-8">
                                <div class="testi_text">
                                    <h4>Davil Saden</h4>
                                    <p>
                                        Him, made can't called over won't there on divide there
                                        male fish beast own his day third seed sixth seas unto.
                                        Saw from
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testi_item">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <img src="{{ asset('frontend/asset/img/testimonials/t1.jpg') }}" alt />
                            </div>
                            <div class="col-lg-8">
                                <div class="testi_text">
                                    <h4>Elite Martin</h4>
                                    <p>
                                        Him, made can't called over won't there on divide there
                                        male fish beast own his day third seed sixth seas unto.
                                        Saw from
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testi_item">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <img src="{{ asset('frontend/asset/img/testimonials/t2.jpg') }}" alt />
                            </div>
                            <div class="col-lg-8">
                                <div class="testi_text">
                                    <h4>Davil Saden</h4>
                                    <p>
                                        Him, made can't called over won't there on divide there
                                        male fish beast own his day third seed sixth seas unto.
                                        Saw from
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
@push('js')
    <!-- JavaScript for Slider Functionality -->
    <script>
        let slideIndex = 0;
        let slides = document.querySelector('.slides');
        let totalSlides = slides.children.length;

        showSlides();

        function plusSlides(n) {
            slideIndex += n;
            if (slideIndex >= totalSlides) slideIndex = 0;
            if (slideIndex < 0) slideIndex = totalSlides - 1;
            showSlides();
        }

        function currentSlide(n) {
            slideIndex = n - 1;
            showSlides();
        }

        function showSlides() {
            slides.style.transform = 'translateX(' + (-slideIndex * 100) + '%)';
            updateDots();
        }

        function updateDots() {
            let dots = document.querySelectorAll('.dot');
            dots.forEach((dot, index) => {
                if (index === slideIndex) {
                    dot.classList.add('active-dot');
                } else {
                    dot.classList.remove('active-dot');
                }
            });
        }

        // Auto-play the slider every 3 seconds
        setInterval(() => {
            plusSlides(1);
        }, 3000);
    </script>
@endpush
