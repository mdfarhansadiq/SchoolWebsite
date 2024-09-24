<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if ($chk == 'user')
            Gongapur Govt. Primary School
        @elseif($chk == 'admin')
            {{ $subject }}
        @endif
    </title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 650px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }

        .header {
            background: linear-gradient(45deg, #6b00b6, #002347, #d63384);
            color: white;
            padding: 25px;
            text-align: center;
            border-bottom: 3px solid #9b59b6;
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .content {
            padding: 30px;
            background-color: #fafafa;
        }

        .content h2 {
            color: #333;
            font-size: 26px;
            margin-bottom: 20px;
            font-weight: 700;
            border-bottom: 2px solid #f0e3f5;
            padding-bottom: 10px;
        }

        .content p {
            font-size: 18px;
            color: #555;
            line-height: 1.7;
            margin: 10px 0;
        }

        .content p strong {
            color: #333;
        }

        .content a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
        }

        .content a:hover {
            text-decoration: underline;
        }

        .button {
            display: inline-block;
            background-color: #002347;
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #bf2f6b;
        }

        .footer {
            background-color: #f0e3f5;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
            border-top: 1px solid #ddd;
        }

        .footer a {
            color: #8e44ad;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    @if ($chk == 'user')
        <div class="container">
            <!-- Header Section -->
            <div class="header">
                <h1>Welcome to {{ config('app.name') }}</h1>
            </div>

            <!-- Content Section -->
            <div class="content">
                <h2>Gongapur Govt. Primary School</h2>

                <p>Hello <strong>{{ $name }}</strong>,</p>

                {{-- <p>{!! $emailMessage !!}</p> --}}

                <p>Call at: <b>+8801785707700</b></p>

                <p>Email at: <b>mdfarhansadiq01@gmail.com</b></p>

                <p>Thank you for your email. We will contact you soon. If you need further information or have any
                    questions, feel free to reach out by replying to this
                    email or visiting our website.</p>

                <a href="{{ url('https://school.simplifiedskill.com') }}" target="_blank" class="button">Explore More at
                    {{ config('app.name') }}</a>

                <p>Best regards,<br>The {{ config('app.name') }} Team</p>
            </div>

            <!-- Footer Section -->
            <div class="footer">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                <p>
                    <a href="{{ url('/unsubscribe') }}">Unsubscribe</a> |
                    <a href="{{ url('/terms') }}">Terms of Service</a>
                </p>
            </div>
        </div>
    @elseif($chk == 'admin')
        <div class="container">
            <!-- Header Section -->
            <div class="header">
                <h1>Welcome to {{ config('app.name') }}</h1>
            </div>

            <!-- Content Section -->
            <div class="content">
                <h2>{{ $subject }}</h2>

                <p><strong>{{ $name }}</strong>,</p>

                <p>{!! $emailMessage !!}</p>

                <p>Call at: <b>{{ $phone }}</b></p>

                <p>Email at: <b>{{ $email }}</b></p>

                {{-- <p>If you need further information or have any questions, feel free to reach out by replying to this
                    email or visiting our website.</p> --}}

                <a href="{{ url('https://school.simplifiedskill.com') }}" target="_blank" class="button">Explore More
                    at {{ config('app.name') }}</a>

                <p>Best regards,<br>{{ $name }}</p>
            </div>

            <!-- Footer Section -->
            <div class="footer">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                <p>
                    <a href="{{ url('/unsubscribe') }}">Unsubscribe</a> |
                    <a href="{{ url('/terms') }}">Terms of Service</a>
                </p>
            </div>
        </div>
    @endif

</body>

</html>
