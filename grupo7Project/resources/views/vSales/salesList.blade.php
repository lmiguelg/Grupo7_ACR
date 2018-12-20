@extends('layouts.app')
@section('content')

<h1>Lista de vendas</h1>


@foreach($sales as $sale)
<h1>{{$sale->price}}</h1>
@endforeach

@endsection
