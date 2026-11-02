<nav class="nav" aria-label="Navigasi utama">
    <a class="nav__brand" href="{{ route('home') }}">
        <img src="{{ asset('storage/logo/logophoto/Logo_Orange.png') }}" alt="Logo Tepuk Tangan × Livi Visual" width="40px" height="40px" style="padding: 10px;">
    </a>
    <button class="nav__toggle" type="button" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="primary-navigation">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <div class="nav__menu" id="primary-navigation">
        <a @class(['nav__link', 'is-active' => request()->routeIs('home', 'root')]) href="{{ route('home') }}" @if (request()->routeIs('home', 'root')) aria-current="page" @endif>Home</a>
        <a @class(['nav__link', 'is-active' => request()->routeIs('gallery', 'gallery.photos', 'gallery.videos')]) href="{{ route('gallery') }}" @if (request()->routeIs('gallery', 'gallery.photos', 'gallery.videos')) aria-current="page" @endif>Gallery</a>
        <a @class(['nav__link', 'is-active' => request()->routeIs('photobooth')]) href="{{ route('photobooth') }}" @if (request()->routeIs('photobooth')) aria-current="page" @endif>Photobooth</a>
        <a @class(['nav__link', 'is-active' => request()->routeIs('livestreaming')]) href="{{ route('livestreaming') }}" @if (request()->routeIs('livestreaming')) aria-current="page" @endif>LiveStreaming</a>
        <a @class(['nav__link', 'is-active' => request()->routeIs('lumenara')]) href="{{ route('lumenara') }}" @if (request()->routeIs('lumenara')) aria-current="page" @endif>Lumenara</a>
        <a @class(['nav__link', 'is-active' => request()->routeIs('inquiry')]) href="{{ route('inquiry') }}" @if (request()->routeIs('inquiry')) aria-current="page" @endif>Inquiry</a>
    </div>
</nav>
