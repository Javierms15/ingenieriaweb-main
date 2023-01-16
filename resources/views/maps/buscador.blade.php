<?php
    /*Just for your server-side code*/
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="ISO-8859-1'">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/fonts/vendor/font-awesome/fontawesome-webfont.svg')}}">

    <script src="https://kit.fontawesome.com/019f0c211a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="">
                    {{ config('app.name', 'Laravel') }} <i class="fa-brands fa-twitter"></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    @else
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" style="color: black" href="{{ route('advertisement.index')}}"> {{ __('Advertisements')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color: black" href="{{ route('booking.index')}}"> {{ __('My Bookings')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color: black" href="{{ route('advertisement.myadvs')}}"> {{ __('My Advertisements')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color: black" href="{{ route('mapa')}}"> {{ __('Map')}}</a>
                            </li>
                        </ul>
                    @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa-solid fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>


@section('template_title')
    Maps
@endsection

@section('content')
    <div class="container" style="width: 100% heigth: 100%">
        <iframe id="map" frameborder="0" width="100%" height="100%" scrolling="no" style="border: 1px solid black">
        </iframe>
    </div>
    <script>
        var map = document.getElementById('map');
        map.src = "https://www.openstreetmap.org/export/embed.html?bbox=-8.497924804687502%2C38.39333888832238%2C0.6756591796875001%2C42.220381783720605&amp;layer=mapnik";
        map.style.height = window.innerHeight + 'px';
    </script>