<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>WeBlog - Laravel Blog CMS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .min-h-screen {
            min-height: 100vh;
        }
        .bg-gray-900 {
            --tw-bg-opacity: 1;
            background-color: rgb(17 24 39/var(--tw-bg-opacity));
        }
        .bg-dark {
            background-color: #1F2937 !important;
        }
        .bg-dark .navbar-brand {
            color: #fff;
        }
        .bg-dark .nav-link {
            color: #fff;
        }
        .max-w-7xl {
            max-width: 80rem;
        }
        .bg-dark .card-text {
            color: #fff;
        }
        .text-gray-400 {
            --tw-text-opacity: 1;
            color: rgb(156 163 175/var(--tw-text-opacity));
        }
        .w-4 {
            width: 1rem;
        }
        .h-4 {
            height: 1rem;
        }
        a {
            text-decoration: inherit;
        }
        .pagination{
            justify-content: center;
        }
        .border-gray-600 {
            --tw-border-opacity: 1;
            border-color: rgb(75 85 99/var(--tw-border-opacity));
        }
        .border-t-2 {
            border-top-width: 2px !important;
        }
        ul {
            list-style: none;
        }
        .bg-gray-700 {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81/var(--tw-bg-opacity));
            color: #fff;
        }
        .opacity-75 {
            opacity: .75;
        }
        .border-l-2 {
            border-left-width: 2px;
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-gray-900">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('devstarit.app_name') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-gray-400"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <form class="d-flex" role="search" action="{{ route('home.index') }}">
                            <input class="form-control me-2" type="search" name="search" placeholder="Enter keyword to search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.profile.index') }}">Profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        >
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container max-w-7xl">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
