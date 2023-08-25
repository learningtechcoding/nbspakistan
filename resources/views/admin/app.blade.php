<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=1400, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="SYP" />

    <title>Admin Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Icons -->
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-touch-icon.png"> --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('./logo/NBS Logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('./logo/NBS Logo.png') }}">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Scripts -->
    <script src="{{ asset('js/admin/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,700;0,900;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/main.css') }}" rel="stylesheet">
    <style>
        :root {
            --bs-font-sans-serif: "Rubik", sans-serif;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="/admin">
                    <span class="align-middle">Admin Panel</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">Data</li>
                    @if (Auth::user()->type === 'superAdmin')
                        <li class="sidebar-item {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }} ">
                            <a class="sidebar-link" href="/admin">
                                <i class="align-middle" data-feather="sliders"></i>
                                <span class="align-middle">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::currentRouteName() === 'adminSlides' ? 'active' : '' }} ">
                            <a class="sidebar-link" href="/admin/slides">
                                <i class="align-middle" data-feather="layers"></i>
                                <span class="align-middle">Slides</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::currentRouteName() === 'adminGallery' ? 'active' : '' }} ">
                            <a class="sidebar-link" href="admin/gallery">
                                <i class="align-middle" data-feather="layers"></i>
                                <span class="align-middle">Gallery</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::currentRouteName() === 'adminAccounts' ? 'active' : '' }} ">
                            <a class="sidebar-link" href="/admin/accounts">
                                <i class="align-middle" data-feather="user"></i>
                                <span class="align-middle">Accounts</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::currentRouteName() === 'adminNews' ? 'active' : '' }} ">
                            <a class="sidebar-link" href="/admin/news">
                                <i class="align-middle" data-feather="user"></i>
                                <span class="align-middle">News</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::currentRouteName() === 'adminContact' ? 'active' : '' }} ">
                            <a class="sidebar-link" href="/admin/contacts">
                                <i class="align-middle" data-feather="user"></i>
                                <span class="align-middle">Contac Queries</span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a data-bs-target="#central-cabanits" data-bs-toggle="collapse"
                                class="sidebar-link collapsed" aria-expanded="false">
                                <i class="align-middle" data-feather="user"></i>
                                Central Cabinets</span>
                            </a>
                            <ul id="central-cabanits"
                                class="sidebar-dropdown list-unstyled {{ Route::currentRouteName() === 'adminCC' || Route::currentRouteName() === 'adminCOC' ? '' : 'collapse' }}"
                                data-bs-parent="#sidebar" style="">
                                <li class="sidebar-item {{ Route::currentRouteName() === 'adminCC' ? 'active' : '' }}">
                                    <a class="sidebar-link" href="/admin/central-cabinets/cc">CC</a>
                                </li>
                                <li
                                    class="sidebar-item {{ Route::currentRouteName() === 'adminCOC' ? 'active' : '' }}">
                                    <a class="sidebar-link" href="/admin/central-cabinets/coc">COC</a>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="sidebar-item {{ Route::currentRouteName() === 'adminLeadership' ? 'active' : '' }} ">
                            <a class="sidebar-link" href="/admin/leadership">
                                <i class="align-middle" data-feather="user"></i>
                                <span class="align-middle">Leadership</span>
                            </a>
                        </li>
                        <li
                            class="sidebar-item {{ Route::currentRouteName() === 'adminNotificationTemplate' ? 'active' : '' }} ">
                            <a class="sidebar-link" href="/admin/notification-template">
                                <i class="align-middle" data-feather="book"></i>
                                <span class="align-middle">Notification Template</span>
                            </a>
                        </li>
                        <li
                            class="sidebar-item {{ Route::currentRouteName() === 'adminNotifications' ? 'active' : '' }} ">
                            <a class="sidebar-link" href="/admin/notifications">
                                <i class="align-middle" data-feather="book"></i>
                                <span class="align-middle">Notifications</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ Route::currentRouteName() === 'profile' ? 'active' : '' }} ">
                            <a class="sidebar-link" href="/profile">
                                <i class="align-middle" data-feather="user"></i>
                                <span class="align-middle">Profile</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->type === 'superAdmin' || Auth::user()->type === 'admin')
                        <li class="sidebar-item">
                            <a data-bs-target="#registrations" data-bs-toggle="collapse"
                                class="sidebar-link collapsed" aria-expanded="false">
                                <i class="align-middle" data-feather="user"></i>
                                Registrations</span>
                            </a>
                            <ul id="registrations"
                                class="sidebar-dropdown list-unstyled {{ Route::currentRouteName() === 'adminRegistrations' || Route::currentRouteName() === 'adminRegistrationsNew' || Route::currentRouteName() === 'adminRegistrationsRejected' ? '' : 'collapse' }}"
                                data-bs-parent="#sidebar" style="">
                                <li
                                    class="sidebar-item {{ Route::currentRouteName() === 'adminRegistrationsNew' ? 'active' : '' }}">
                                    <a class="sidebar-link" href="/admin/registrations/new">New</a>
                                </li>
                                <li
                                    class="sidebar-item {{ Route::currentRouteName() === 'adminRegistrations' ? 'active' : '' }}">
                                    <a class="sidebar-link" href="/admin/registrations">Accepted</a>
                                </li>
                                <li
                                    class="sidebar-item {{ Route::currentRouteName() === 'adminRegistrationsRejected' ? 'active' : '' }}">
                                    <a class="sidebar-link" href="/admin/registrations/rejects">Rejected</a>
                                </li>
                            </ul>
                        </li>
                    @endif

                </ul>
                @if (Auth::user()->type === 'superAdmin')
                    <ul class="sidebar-nav">
                        <li class="sidebar-header">Pages</li>

                        <li class="sidebar-item {{ Route::currentRouteName() === 'adminAbout' ? 'active' : '' }} ">
                            <a class="sidebar-link" href="/admin/about-us">
                                <i class="align-middle" data-feather="user"></i>
                                <span class="align-middle">About Page</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::currentRouteName() === 'adminPrivacy' ? 'active' : '' }} ">
                            <a class="sidebar-link" href="/admin/privacy-policy">
                                <i class="align-middle" data-feather="user"></i>
                                <span class="align-middle">Privacy Page</span>
                            </a>
                        </li>
                    </ul>
                @endif

            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle d-flex">
                    <i class="hamburger align-self-center"></i>
                </a>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">

                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src=" {{ Auth::user()->image ? '/storage/images/' . Auth::user()->image : '/storage/images/static/default_profile.png' }} "
                                    class="avatar img-fluid rounded me-1" alt=" {{ Auth::user()->name }} " />
                                <span class="text-dark">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="/profile"><i class="align-middle me-1"
                                        data-feather="user"></i>
                                    Profile</a>
                                <div class="dropdown-divider"></div>

                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="btn">Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            @if (session('message'))
                <div class="alert alert-success"
                    style="justify-content: center;font-size: 1rem;padding: 0.5rem 0;margin: 0;">
                    {{ session('message') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger"
                    style="justify-content: center;font-size: 1rem;padding: 0.5rem 0;margin: 0;">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')

        </div>
    </div>

    @stack('scripts')

</body>

</html>
