@extends('layouts.app')

@section('content')


<div id="menuButtons">
    @switch(Auth::user()->category )
        @case('admin')
        <h1>Bem-vindo {{ Auth::user()->name }} </h1>

        <div class="menuButtons">

            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registar') }}</a>
            @endif

        </div>
        <div class="menuButtons">


            <a class="nav-link" href="{{ route('products') }}">{{ __('Produtos') }}</a>

        </div>
        <div class="menuButtons">

            <a class="nav-link" href="{{ route('getSales') }}">{{ __('Vendas') }}</a>

        </div>
        <div class="menuButtons">

            <a class="nav-link" href="{{ route('sales') }}">{{ __('Nova Venda') }}</a>

        </div>
        <div class="menuButtons">

            <a class="nav-link" href="{{ route('fornecedor') }}">{{ __('Fornecedor') }}</a>

        </div>
        <div class="menuButtons">

            <a class="nav-link" href="{{ '/addClient' }}">{{ __('Cliente') }}</a>

        </div>
        <div class="menuButtons">

            <a class="nav-link" href="{{ '/editUser' }}">{{ __('Utilizadores') }}</a>

        </div>
        @break

        @case('armazem')
        <h1>Bem-vindo excelentíssimo {{ Auth::user()->name }} </h1>
        <div class="menuButtons">

            <a class="nav-link" href="{{ route('products') }}">{{ __('Produtos') }}</a>

        </div>
        <div class="menuButtons">

            <a class="nav-link" href="{{ route('fornecedor') }}">{{ __('Fornecedor') }}</a>

        </div>

        @break

        @case('loja')
        <h1>Bem-vindo excelentíssimo {{ Auth::user()->name }} </h1>
        <div class="menuButtons">

            <a class="nav-link" href="{{ route('products') }}">{{ __('Produtos') }}</a>

        </div>

        <div class="menuButtons">

            <a class="nav-link" href="{{ '/addClient' }}">{{ __('Cliente') }}</a>

        </div>
        <div class="menuButtons">

            <a class="nav-link" href="{{ route('sales') }}">{{ __('Vendas') }}</a>

        </div>


        @break

        @case('gestor')
        <h1>Bem-vindo excelentíssimo {{ Auth::user()->name }} </h1>
        <div class="menuButtons">

            <a class="nav-link" href="{{ route('fornecedor') }}">{{ __('Fornecedor') }}</a>

        </div>
        <div class="menuButtons">

            <a class="nav-link" href="{{ route('sales') }}">{{ __('Vendas') }}</a>

        </div>
        <div class="menuButtons">

            <a class="nav-link" href="{{ '/addClient' }}">{{ __('Cliente') }}</a>

        </div>



        @break
    @endswitch
        </div>
@endsection
