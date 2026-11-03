<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#263317">
    <title>@yield('title', 'AFL2 Webdev')</title>
    <link rel="preload" href="{{ asset('font/GlacialIndifference-Regular.otf') }}" as="font" type="font/otf" crossorigin>
    <link rel="preload" href="{{ asset('font/GlacialIndifference-Bold.otf') }}" as="font" type="font/otf" crossorigin>
    <link rel="stylesheet" href="{{ asset('mydesign/style.css') }}">
</head>
<body>
    @php
    $route = request()->route()->getName();
    if (in_array($route, ['home', 'root'])) {
        $navbarFile = 'components.navbar-home';
    } elseif (in_array($route, ['gallery', 'gallery.detail'])) {
        $navbarFile = 'components.navbar-gallery';
    } elseif ($route === 'inquiry') {
        $navbarFile = 'components.navbar-inquiry';
    } elseif (in_array($route, ['photobooth', 'photobooth.detail'])) {
        $navbarFile = 'components.navbar-photobooth';
    } elseif (in_array($route, ['livestreaming', 'livestreaming.detail'])) {
        $navbarFile = 'components.navbar-livestream';
    } elseif (in_array($route, ['lumenara', 'lumenara.detail'])) {
        $navbarFile = 'components.navbar-lumenara';
    } else {
        $navbarFile = 'components.navbar-home';
    }
@endphp
@include($navbarFile)

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
</body>
</html>
