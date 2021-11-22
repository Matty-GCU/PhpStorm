@extends('layouts.jqweui.main')
@section('body')
<header style="padding: 35px 0">
    <h1 style="text-align: center;font-size: 34px;color: #3cc51f;font-weight: 400;margin: 0 15%;">@yield('title')</h1>
</header>
@yield('content')
@include('layouts.jqweui.footer')
@endsection