<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bonzella Saltwater World') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sweetalert.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ asset('js/sweetalert.js')}}"></script>
    @include('Alerts::alerts')

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @yield('popup')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Bonzella Saltwater World') }}
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav"></ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class='btn btn-primary addAquariumMargin'><a href="{{route('login')}}">Login</a></li>
                            <li class='btn btn-primary addAquariumMargin'><a href="{{route('register')}}">Register</a></li>
                        @else
                            @yield('buttons')
                            @if (Route::getCurrentRoute()->uri() != '/')
                                <li class="addAquariumMargin">
                                    <a class="btn btn-primary btn-aquarium-padding" @yield('back')>Back</a>
                                </li>
                            @endif
                            <li class="btn btn-primary addAquariumMargin">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @if(Session::get('message') !=null)
            <div class="message">{{ Session::get('message') }}</div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default text-center">
                        <h1 class="panel-heading">@yield('heading')</h1>
                        <div class="panel-body">
                            @yield('content')
                        </div>
                        <footer>
                            &copy; {{ date('Y') }} | Bonzella.com
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
