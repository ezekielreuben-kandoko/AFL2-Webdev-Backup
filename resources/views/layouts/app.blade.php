<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#263317">
    <title>@yield('title', 'AFL2 Webdev')</title>
    <link rel="stylesheet" href="{{ asset('mydesign/style.css') }}">
</head>
<body>
    @php
        if (! isset($active)) {
            $active = '';
        }
    @endphp

    @include('Navbar', ['active' => $active])

    <main>
        @yield('content')
    </main>
</body>
</html>
