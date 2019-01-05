<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<link rel="Shortcut Icon" type="image/x-icon" href="img/book_write.png"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | 學生作業管理系統</title>
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
