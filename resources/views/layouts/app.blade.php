<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Catálogo - @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- JavaScripts -->
    {{Html::script('js/jquery-3.2.1.min.js')}}
    {{Html::script('js/bootstrap.js')}}
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                {{-- Collapsed Hamburger --}}
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Mudar Navegação</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                {{-- Branding Image --}}
                <a class="navbar-brand" href="{{ route('index') }}">
                    Catálogo
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                {{-- Left Side Of Navbar --}}
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                        <li>
                        <a href="{{ route('produtos.create') }}">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Novo produto
                        </a>
                        </li>
                    @endif
                </ul>

                {{-- Right Side Of Navbar --}}
                <ul class="nav navbar-nav navbar-right">
                    {{-- Authentication Links --}}
                    @if (Auth::check())
                        <li><a href="{{ url('/register') }}">Registrar</a></li>
                    @endif

                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
