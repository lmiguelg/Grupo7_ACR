@extends('layouts.app')
@section('content')

<div class="divSidebar">
    <table class="tableSideBar">
        <tr>option 1</tr>
        <tr>option 2</tr>
        <tr>option 3</tr>
        <tr>option 4</tr>
        <tr>option 5</tr>
    </table>
</div>
<div class="containerViewProducts">
    @yield('content2')
</div>

@endsection
