<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'YVW') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        .titulo_Users{

        }
        .contenedor_users{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(58px,1fr));
            position: absolute;
            grid-gap: 5px;
            top: 38%;
            left: 4%;
            width: 10%;
            text-align: center;
        }
        .contenerdor_videos {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px,1fr));
            margin: 35px;
            margin-top: 35px;
            margin-top: 175px;
        }
        .video_id{
            width: 100%;
        }
        .contenerdor_videos_id{
            width: 56%;
            position: absolute;
            top: 31%;
            height: 100%;
            left: 3%;
        }
        .video_block_id {

        }

        .videos_lateral{
            right: 0;
            position: absolute;
            top: 281px;
            width: 33%;
        }
        .titulo_videos {
            position: absolute;
            top: 206px;
            width: 100%;
            text-align: center;
        }
        .buscar_video{
            position: absolute;
            top: 24%;
            right: 45px;
        }
        .Bienvenida{
            text-align: center;
        }
        .subir_videos{
            border: 1px solid black;
            padding: 6px;
            cursor: pointer;
            right: 175px;
            position: absolute;
            top: 69px;
            color: black;
        }
        .tus_videos{
            position: absolute;
            top: 294px;
        }
        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
            text-align: center;
        }
        .editar_users{
            border: 1px solid black;
            padding: 6px;
            cursor: pointer;
            right: 276px;
            position: absolute;
            top: 69px;
            color: black;
        }
        .editar_users:hover{
            color: grey;
            background-color: #95c5ed;
            text-decoration: none;
        }

        .perfil{
            border: 1px solid black;
            padding: 6px;
            cursor: pointer;
            right: 47px;
            position: absolute;
            top: 69px;
            color: black;
        }
        .perfil:hover{
            color: grey;
            background-color: #95c5ed;
            text-decoration: none;
        }
        .subir_videos:hover{
            color: grey;
            background-color: #95c5ed;
            text-decoration: none;
        }
        .video_block {
            display: grid;
            grid-template-columns: auto;
            grid-template-rows: 241px 44px 25px 28px;
            width: fit-content;
        }

        .error_no_videos{
            text-align: center;
        }
    </style>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'YVW') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <a href="{{ url('/home') }}" class="nav-link">Home</a>



                        @guest

                            @if (Route::has('login'))
                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
