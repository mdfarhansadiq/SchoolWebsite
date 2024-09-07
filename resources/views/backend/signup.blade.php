<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('frontend/asset/img/favicon.png') }}" type="image/png" />
    <title>Gonga Pur Govt. Primary School</title>

    <!-- Font Icon -->
    <link rel="stylesheet"
        href="{{ asset('backend/adminsignuplogin/asset/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('backend/adminsignuplogin/asset/css/style.css') }}">
    <style>
        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
            /* adjust height as needed */
        }

        .navbar-brand {
            display: inline-block;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
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
    </style>

    </style>
</head>

<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <nav class="navbar">
                        <a class="navbar-brand logo_h" href="{{ url('/') }}">
                            <img src="{{ asset('backend/adminsignuplogin/asset/images/school-logo.jpg') }}" alt />
                        </a>
                    </nav>
                    <form method="POST" id="signup-form" class="signup-form"
                        action="{{ url('/ourschool-admin/signup/create') }}">
                        @csrf
                        <h2 class="form-title">Admin Signup</h2>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name"
                                placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email"
                                placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password"
                                placeholder="Password" />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        {{-- <div class="form-group">
                            <input type="password" class="form-input" name="pass_confirmation" id="re_password"
                                placeholder="Repeat your password" />
                        </div> --}}
                        {{-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div> --}}
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up" />
                        </div>
                    </form>

                    <p class="loginhere">
                        Have already an account ? <a href="{{ url('/ourschool-admin/login/view') }}"
                            class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('backend/adminsignuplogin/asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/adminsignuplogin/asset/js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
