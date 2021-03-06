<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/fileJs.js') }}" defer></script>
    <script src="{{ asset('js/session.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>


<div id="app">
    <nav class="navbar-top">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <div class="nav-item">

                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registar') }}</a>
                        @endif

                    </div>
                @else


                    @switch(Auth::user()->category )
                        @case('admin')

                        <div class="nav-item">

                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registar') }}</a>
                            @endif

                        </div>
                        <div class="nav-item">


                            <a class="nav-link" href="{{ route('products') }}">{{ __('Produtos') }}</a>

                        </div>
                        <div class="nav-item">

                            <a class="nav-link" href="{{ route('getSales') }}">{{ __('Vendas') }}</a>

                        </div>
                        <div class="nav-item">

                            <a class="nav-link" href="{{ route('sales') }}">{{ __('Nova Venda') }}</a>

                        </div>
                        <div class="nav-item">

                            <a class="nav-link" href="{{ route('fornecedor') }}">{{ __('Fornecedor') }}</a>

                        </div>
                        <div class="nav-item">

                            <a class="nav-link" href="{{ '/addClient' }}">{{ __('Clientes') }}</a>

                        </div>
                        <div class="nav-item">

                            <a class="nav-link" href="{{ '/editUser' }}">{{ __('Utilizadores') }}</a>

                        </div>
                        @break

                        @case('armazem')

                        <div class="nav-item">

                            <a class="nav-link" href="{{ route('products') }}">{{ __('Produtos') }}</a>

                        </div>
                        <div class="nav-item">

                            <a class="nav-link" href="{{ route('fornecedor') }}">{{ __('Fornecedor') }}</a>

                        </div>

                        @break

                        @case('loja')

                        <div class="nav-item">

                            <a class="nav-link" href="{{ route('products') }}">{{ __('Produtos') }}</a>

                        </div>

                        <div class="nav-item">

                            <a class="nav-link" href="{{ '/addClient' }}">{{ __('Cliente') }}</a>

                        </div>
                        <div class="nav-item">

                            <a class="nav-link" href="{{ route('getSales') }}">{{ __('Vendas') }}</a>

                        </div>
                        <div class="nav-item">

                            <a class="nav-link" href="{{ route('sales') }}">{{ __('Nova Venda') }}</a>

                        </div>


                        @break

                        @case('gestor')

                        <div class="nav-item">

                            <a class="nav-link" href="{{ route('fornecedor') }}">{{ __('Fornecedor') }}</a>

                        </div>
                        <div class="nav-item">

                            <a class="nav-link" href="{{ '/addClient' }}">{{ __('Clientes') }}</a>

                        </div>
                        <div class="nav-item">

                            <a class="nav-link" href="{{ route('getSales') }}">{{ __('Vendas') }}</a>

                        </div>



                        @break
                    @endswitch


                    <div class="navbar-drop">
                        <a id="navbarDropdown" class="name_user" style="float: right" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-content">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </div>

                @endguest
            </ul>
        </div>


    </nav>

    <main class="py-4">


        @yield('content')

    </main>
</div>
</body>
</html>
