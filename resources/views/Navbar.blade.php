@php
    if (! isset($active)) {
        $active = '';
    }

    $galleryActive = false;
    if ($active == 'gallery' || $active == 'photos' || $active == 'videos') {
        $galleryActive = true;
    }

    $homeClass = 'nav__link';
    if ($active == 'home') {
        $homeClass = 'nav__link is-active';
    }

    $aboutClass = 'nav__link';
    if ($active == 'about') {
        $aboutClass = 'nav__link is-active';
    }

    $galleryClass = 'nav__link';
    if ($galleryActive) {
        $galleryClass = 'nav__link is-active';
    }

    $photoClass = 'nav__dropdown-link';
    if ($active == 'photos') {
        $photoClass = 'nav__dropdown-link is-active';
    }

    $videoClass = 'nav__dropdown-link';
    if ($active == 'videos') {
        $videoClass = 'nav__dropdown-link is-active';
    }

    $photoboothClass = 'nav__link';
    if ($active == 'photobooth') {
        $photoboothClass = 'nav__link is-active';
    }

    $livestreamingClass = 'nav__link';
    if ($active == 'livestreaming') {
        $livestreamingClass = 'nav__link is-active';
    }

    $lumenaraClass = 'nav__link';
    if ($active == 'lumenara') {
        $lumenaraClass = 'nav__link is-active';
    }

    $inquiryClass = 'nav__link';
    if ($active == 'inquiry') {
        $inquiryClass = 'nav__link is-active';
    }
@endphp

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
        <a class="{{ $homeClass }}" href="{{ route('home') }}" @if ($active == 'home') aria-current="page" @endif>Home</a>
        <a class="{{ $aboutClass }}" href="{{ route('about') }}" @if ($active == 'about') aria-current="page" @endif>About</a>
        <div class="nav__item nav__item--dropdown">
            <a class="{{ $galleryClass }}" href="{{ route('gallery') }}" @if ($galleryActive) aria-current="page" @endif>Gallery</a>
            <div class="nav__dropdown">
                <a class="{{ $photoClass }}" href="{{ route('gallery.photos') }}" @if ($active == 'photos') aria-current="page" @endif>Photo</a>
                <a class="{{ $videoClass }}" href="{{ route('gallery.videos') }}" @if ($active == 'videos') aria-current="page" @endif>Video</a>
            </div>
        </div>
        <a class="{{ $photoboothClass }}" href="{{ route('photobooth') }}" @if ($active == 'photobooth') aria-current="page" @endif>Photobooth</a>
        <a class="{{ $livestreamingClass }}" href="{{ route('livestreaming') }}" @if ($active == 'livestreaming') aria-current="page" @endif>LiveStreaming</a>
        <a class="{{ $lumenaraClass }}" href="{{ route('lumenara') }}" @if ($active == 'lumenara') aria-current="page" @endif>Lumenara</a>
        <a class="{{ $inquiryClass }}" href="{{ route('inquiry') }}" @if ($active == 'inquiry') aria-current="page" @endif>Inquiry</a>
    </div>
</nav>
