<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', '學生作業管理系統') }}</title>
    @include('layouts.partials.header')
</head>
<body>
    @include('layouts.partials.navbar')
    <div class="content">
        @yield('content')
    </div>
    @include('layouts.partials.footer')
</body>
</html>
