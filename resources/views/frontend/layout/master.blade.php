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

    <style>
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
    @stack('css')
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

    @include('frontend.partial.header')

    @yield('content')

    @include('frontend.partial.footer')


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

    @stack('js')
</body>


</html>
