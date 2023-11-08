<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UndergroundWebRadio') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <!-- Scripts - register the js scripts , css and images here -->
    @vite([
        'public/img/tab.png',
        'public/img/background.jpg',
        'resources/sass/app.scss',
        'public/css/base_css.css',
        'public/css/homepage.css',
        'public/css/player.css',
        'resources/js/app.js',
        'public/js/jquery-3.6.4.js',
        'public/js/loader.js',
        'public/js/player.js',
        'public/js/selection.js',
        ])

    <!-- In your blade template - Cookie Consent -->
    @include('cookie-consent::index')
</head>
<body>
    <div id="app">

        <!-- Navigation and Header -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'UndergroundWebRadio') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (auth()->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Main</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('producer.index')}}">Producers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('show.index')}}">Shows</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('program.index')}}">Program of the week</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home.index')}}">Now On Air</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('gefyra')}}">Gefyra</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('about')}}">About Us</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Main</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('producer')}}">Producers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('show')}}">Shows</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('program')}}">Program of the week</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('gefyra')}}">Gefyra</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('about')}}">About Us</a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <!-- PLEASE DELETE BEFORE PRODUCTION
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                -->
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content that will change -->
        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer section -->
        <footer class="footer">
            <div class="footdiv">
                <div class="contact-details">
                    <h4>Επικοινωνία</h4>
                    <ul>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Πανεπιστημιούπολη, Ξάνθη, 671 00</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i> underground1003@gmail.com</li>
                    </ul>
                </div>
                <div class="social-menu">
                    <ul>
                        <li><a href="https://www.facebook.com/undergroundradio1003"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/undergroundwebradio/"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://open.spotify.com/user/waiae01koht4ne4kntsj58ixq?si=8ba8a5841aee41df"><i class="fa fa-spotify"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="copyrights"><p>Copyright © 2023 Underground Web Radio</p></div>
        </footer>
        
        <!--Player division -->
        <div id="aWrap">
            <!-- (B) PLAY/PAUSE BUTTON -->
            <button id="aPlay">
                <span id="aPlayIco" class="material-icons"> play_arrow
                </span>
            </button>

            <!-- Division for artwork -->
            <div>
                <img id="aArtWork" alt="Album Artwork" src="../img/pcs_logo.png" style="width:40px;height:40px;" />
            </div>
            <!-- Division for Song Title and Artist -->
            <div></div>

            <!-- (C) TIME -->
            <!--<div id="aCron">
            <span id="aNow"></span> / <span id="aTime"></span>
            </div>-->
            <!-- (D) SEEK BAR -->
            <!--<input id="aSeek" type="range" min="0" value="0" step="1" disabled/>-->
            <!-- (E) VOLUME SLIDE -->
            <button id="aVolIco"><span id="aVolIco" class="material-icons">volume_up</span></button>
            <input id="aVolume" type="range" min="0" max="1" value="1" step="0.1" />
        </div>

        <!-- Loading division for form submition -->
        <div id="loader" class="hidden" style="display: none">
            Loading ...
        </div>
    </div>
</body>
</html>
