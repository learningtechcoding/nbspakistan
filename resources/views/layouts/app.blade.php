<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'syp') }}</title>

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karma:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/fontawesome.css">

    <!-- <style>
        body {
            position: relative;
            font-family: 'Karma', serif;
            min-height: calc(100vh - 400px);
        }

        /* Standard styles */
        h1,
        h2 {
            font-weight: bold;
        }

        h3 {
            font-weight: 500;
        }

        .text-justify {
            text-align: justify;
        }

        /* Font size responsiveness */
        html {
            font-size: 13px;
        }

        @media (min-width: 768px) {
            html {
                font-size: 14px;
            }
        }

        @media (min-width: 1100px) {
            html {
                font-size: 15px;
            }
        }

        @media (min-width: 1500px) {
            html {
                font-size: 17px;
            }
        }

        @media (min-width: 1920px) {
            html {
                font-size: 20px;
            }
        }

        /* Scroll bar styles */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #8b8787;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #009247;
        }

        nav.navbar {
            z-index: 100;
            backdrop-filter: blur(20px);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #ffffff61 !important;
            background-blend-mode: screen;
            padding-top: 0;
            padding-bottom: 0.3rem;
        }

        nav.navbar>div.container-fluid {
            padding-top: 0.3rem;
        }

        nav.navbar .navbar-link {
            color: black;
        }

        nav.navbar .nav-link {
            color: black !important;
            font-size: 1.1rem;
            font-weight: 500;
            text-align: center;
            padding-bottom: 0;
        }

        nav.navbar .nav-link.active {
            position: relative;
        }

        nav.navbar .nav-link.active::before {
            position: absolute;
            bottom: 0;
            left: 50%;
            content: "";
            width: 5px;
            height: 5px;
            border-radius: 50%;
            transform: translateX(-50%);
            background: #3f3d3b;
        }

        nav.navbar .navbar-nav {
            margin-left: 10px;
            width: 100%;
            align-items: center;
            justify-content: space-evenly;
        }

        /* Footer styles */
        footer.footer {
            position: absolute;
            bottom: 0;
            transform: translateY(100%);
        }

        footer.footer .footer-top {
            padding-top: 40px;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 50px;
        }

        footer.footer .footer-links-container div+div {
            padding-left: 70px;
        }

        footer.footer h4 {
            font-size: 1.3rem;
            font-weight: 600;
        }

        footer.footer .footer-links-container a {
            text-decoration: none;
            color: black;
            padding-bottom: 3px;
        }

        footer.footer .footer-content-container {
            margin-right: 11.25rem;
        }

        footer.footer>div.separator {
            width: 100%;
            height: 60px;
            background-color: #EBEBEB;
        }

        footer.footer .footer-bottom div.separator {
            width: 100%;
            height: 60px;
            background-color: #EBEBEB;
            padding-top: 10px;
            padding-inline: 2rem;
        }

        @media(max-width: 1350px) {
            footer.footer .footer-links-container div+div {
                padding-left: 5px;
            }

            footer.footer .footer-links-container {
                justify-content: space-between;
            }
        }

        @media(max-width: 1200px) {
            button.navbar-toggler {
                margin-right: 40px;
            }

            nav.navbar .nav-link.active::before {
                position: absolute;
                top: 50%;
                bottom: unset;
                left: -5px;
                content: "";
                width: 5px;
                height: 5px;
                border-radius: 50%;
                transform: translate(-100%, -50%);
                background: #3f3d3b;
            }
        }

        @media(max-width: 900px) {
            footer.footer .footer-content-container {
                margin-right: 2rem;
            }
        }

        @media(max-width: 767px) {
            footer.footer div.separator {
                height: unset;
                padding: 20px;
            }

            button.navbar-toggler {
                margin-right: 10px;
            }

            nav.navbar .navbar-brand img {
                margin-left: 10px !important;
            }

            footer.footer .footer-bottom div.separator {
                height: unset;
            }
        }

        @media(max-width: 700px) {
            footer.footer .footer-top {
                padding-top: 30px;
                padding-left: 10px;
                padding-right: 10px;
                padding-bottom: 40px;
            }

            div#app {
                overflow: hidden;
            }
        }

        @media(max-width: 500px) {
            nav.navbar .navbar-brand img {
                width: 40px !important;
            }

            footer.footer .footer-content-container {
                margin-right: 0;
            }

            footer.footer .footer-links-container {
                flex-wrap: wrap;
                row-gap: 20px;
            }

            nav.navbar .nav-link {
                font-size: 0.9rem;
            }
        }

        @media(max-width: 400px) {
            nav.navbar .navbar-brand {
                padding: 0 !important;
            }

            nav.navbar>div.container-fluid {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
        }

    </style> -->
    @stack('styles')
</head>

<body>

    <div id="app">
        <!-- <nav id="app-nav" class="navbar navbar-expand-xl navbar-light bg-light flex-column">
            @yield('top-content')
            <div class="container-fluid">
                <div class=" navbar-brand d-flex align-items-center">
                    <img src="/logo/logo.png" alt="SYP" width="45" style="margin-left: 40px;margin-right: 10px;">
                    <a class="nav-link text-center text-decoration-none" href="#">IJAZ GONDAL - PRESIDENT <br>
                        STATE YOUTH PARLIAMENT</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() === 'home' ? 'active' : '' }}"
                                aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() === 'central-cabinets' ? 'active' : '' }}"
                                href="/central-cabinets">Central Cabinets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() === 'associated-wings' ? 'active' : '' }}"
                                href="/associated-wings">Associated Wings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() === 'leadership' ? 'active' : '' }}"
                                href="/leadership">Leadership</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() === 'news-events' ? 'active' : '' }}"
                                href="/news">News & Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() === 'register' ? 'active' : '' }}"
                                href="/register">Registration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() === 'contact' ? 'active' : '' }}"
                                href="/contact-us">Contact Us</a>
                        </li>
                    </ul>

                </div>
            </div>
            @yield('bottom-content')
        </nav> -->

<!-- new navbar -->
<nav class="navbar navbar-expand-lg navbar-light  " style="background:#fff !important">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">  <img src="assets/images/logo.jpg" alt=""></a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-dark"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end me-5" id="navbarToggler">
    
      </ul>
      <form class="d-flex " >
      <ul class="navbar-nav">
                                    <li class="nav-item active mx-2">
                                        <a class="nav-link text-dark fw-bold" href="#">Home
                                        </a>
                                    </li>
                                    <li class="nav-item mx-2">
                                        <a class="nav-link fw-bold text-dark" href="#about">About Us</a>
                                    </li>

                                    <li class="nav-item mx-2">
                                        <a class="nav-link fw-bold text-dark" href="#gallery">Gallery</a>
                                    </li>
                                    <li class="nav-item mx-2">
                                        <a class="nav-link fw-bold text-dark" href="#process">Process</a>
                                    </li>
                                    <li class="nav-item mx-2">
                                        <a class="nav-link fw-bold text-dark" href="#blog">Blog</a>
                                    </li>
                                    <li class="nav-item mx-2">
                                        <a class="nav-link fw-bold text-dark" href="#contact">Contact US</a>
                                    </li>
                                </ul>
      </form>
    </div>
  </div>
</nav>
<!-- new navbar end -->
<!-- 
        <div id="menu-jk" class="header-bottom">
            <div class="container">
                <div class="row nav-row">
                    <div class="col-md-3 logo">
                        <a href="/">
                            <img src="assets/images/logo.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-md-9 nav-col">
                        <nav class="navbar navbar-expand-lg navbar-light">

                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#about">About Us</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#gallery">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#process">Process</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#blog">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#contact">Contact US</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div> -->

        <main id="app-main">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @stack('scripts')
</body>

</html>
