@extends('layouts.app')
@section('content')

<div class="divSidebar">
    <table class="tableSideBar"><br>
        <tr>option 1</tr><br>
        <tr>option 2</tr><br>
        <tr>option 3</tr><br>
        <tr>option 4</tr><br>
        <tr>option 5</tr><br>
    </table>
</div>
<div class="containerViewProducts">
    @yield('content2')

    @yield('contentProductDetails')
</div>

@endsection
