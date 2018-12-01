@extends('layouts.app')
@section('content')

<div class="divSidebar">
    <table class="tableSideBar"><br>
        <tr>Sort by Name</tr><br>
        <tr>Sort by price</tr><br>
        <tr>Sort by validation date</tr><br>
        <tr>Procurar prod e abrir logo os details </tr><br>
        <tr>produtos proximos do limite definido pelo gestor</tr><br>
        <tr>Meter a mesma coisa mas para os funcionarios</tr><br>
    </table>
</div>
<div class="containerViewProducts">
    @yield('content2')

    @yield('contentProductDetails')
</div>

@endsection
