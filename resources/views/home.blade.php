@extends('layouts.app')

@section('title', 'Tepuk Tangan & Livi Visual | Home')

@section('content')
    <div class="home-page">
        <section class="home-hero" aria-label="Featured wedding stories">
            <div class="home-hero-track" aria-live="off">
                <article class="home-hero-slide">
                    <img src="/storage/gallery/photos/DIA00001.jpg" alt="Wedding photography by Tepuk Tangan" fetchpriority="high">
                </article>
                <article class="home-hero-slide">
                    <img src="/storage/gallery/photos/DIA00003.jpg" alt="Wedding photography by Tepuk Tangan" loading="lazy">
                </article>
                <article class="home-hero-slide">
                    <img src="/storage/gallery/photos/DIA00007.jpg" alt="Wedding photography by Tepuk Tangan" loading="lazy">
                </article>
                <article class="home-hero-slide">
                    <img src="/storage/gallery/photos/DIA00021.jpg" alt="Wedding photography by Tepuk Tangan" loading="lazy">
                </article>
                <article class="home-hero-slide">
                    <img src="/storage/gallery/photos/DIA00039.jpg" alt="Wedding photography by Tepuk Tangan" loading="lazy">
                </article>
            </div>
            <div class="home-hero-vignette" aria-hidden="true"></div>
        </section>

        <section class="home-intro" id="our-approach" aria-labelledby="home-intro-title">
            <div class="home-intro-copy">
                <h1 id="home-intro-title">Where fleeting golden hours become classic, living heirlooms.</h1>
                <div class="home-intro-story">
                    <p class="home-eyebrow">Who we are</p>
                    <p>We are a collective of passionate, creative photographers and videographers collaborating together to realize your once-in-a-lifetime story. Founded in January 2020 in Indonesia, Tepuk Tangan and Livi Visual have continuously challenged our team to capture your golden moments—and it is always a genuine pleasure to preserve every frame.</p>
                </div>
                <div class="home-intro-story home-intro-belief">
                    <p class="home-eyebrow">Our believe</p>
                    <p>Rooted in a simple, classic, and timeless style, we deeply value how our creative minds grow-nurturing our craft, emotions, and passion together. We believe in the quiet magic of capturing every beautiful moment through each artist's unique strengths.</p>
                </div>
            </div>
            <figure class="home-intro-figure">
                <img class="home-intro-portrait" src="/storage/gallery/photos/DIA00056.jpg" alt="Wedding photography by Tepuk Tangan" loading="lazy">
                <img class="home-intro-detail" src="/storage/gallery/photos/DIA00223.jpg" alt="" aria-hidden="true" loading="lazy">
            </figure>
        </section>

        <section class="home-darkroom" id="selected-works" aria-labelledby="home-darkroom-title">
            <div class="home-darkroom-inner">
                <header class="home-darkroom-header">
                    <div>
                        <p class="home-eyebrow">A living archive, made together</p>
                        <h2 id="home-darkroom-title">Golden Moments<br>&amp; Motion</h2>
                    </div>
                </header>

                <div class="home-gallery-grid">
                    <a class="home-gallery-card home-gallery-card--1" href="{{ route('gallery.photos') }}">
                        <img src="/storage/gallery/photos/DIA00313.jpg" alt="Wedding photography by Tepuk Tangan" loading="lazy">
                        <span><i>Photography by Tepuk Tangan</i></span>
                    </a>
                    <a class="home-gallery-card home-gallery-card--2" href="{{ route('gallery.photos') }}">
                        <img src="/storage/gallery/photos/DIA00368.jpg" alt="Wedding photography by Tepuk Tangan" loading="lazy">
                        <span><i>Photography by Tepuk Tangan</i></span>
                    </a>
                    <a class="home-gallery-card home-gallery-card--3" href="{{ route('gallery.photos') }}">
                        <img src="/storage/gallery/photos/DIA00384.jpg" alt="Wedding photography by Tepuk Tangan" loading="lazy">
                        <span><i>Photography by Tepuk Tangan</i></span>
                    </a>
                    <a class="home-gallery-card home-gallery-card--4" href="{{ route('gallery.photos') }}">
                        <img src="/storage/gallery/photos/DIA00396.jpg" alt="Wedding photography by Tepuk Tangan" loading="lazy">
                        <span><i>Photography by Tepuk Tangan</i></span>
                    </a>
                    <a class="home-gallery-card home-gallery-card--5" href="{{ route('gallery.photos') }}">
                        <img src="/storage/gallery/photos/DIA00462.jpg" alt="Wedding photography by Tepuk Tangan" loading="lazy">
                        <span><i>Photography by Tepuk Tangan</i></span>
                    </a>
                    <a class="home-gallery-card home-gallery-card--6" href="{{ route('gallery.photos') }}">
                        <img src="/storage/gallery/photos/DIA00465.jpg" alt="Wedding photography by Tepuk Tangan" loading="lazy">
                        <span><i>Photography by Tepuk Tangan</i></span>
                    </a>
                    <a class="home-gallery-card home-gallery-card--7" href="{{ route('gallery.photos') }}">
                        <img src="/storage/gallery/photos/DIA00478.jpg" alt="Wedding photography by Tepuk Tangan" loading="lazy">
                        <span><i>Photography by Tepuk Tangan</i></span>
                    </a>
                    <a class="home-gallery-card home-gallery-card--8" href="{{ route('gallery.photos') }}">
                        <img src="/storage/gallery/photos/DIA00486.jpg" alt="Wedding photography by Tepuk Tangan" loading="lazy">
                        <span><i>Photography by Tepuk Tangan</i></span>
                    </a>
                    @if ($filmVideo)
                        <a class="home-gallery-card home-gallery-card--film" href="{{ route('gallery.videos') }}">
                            <img src="/storage/gallery/photos/DIA08889.jpg" alt="Wedding film by Livi Visual" loading="lazy">
                            <span><i>Film by Livi Visual</i></span>
                            <span class="home-gallery-film-mark" aria-hidden="true">Play film ↗</span>
                        </a>
                    @endif
                </div>
                <a class="home-archive-link" href="{{ route('gallery') }}">Explore all stories <span aria-hidden="true">⟶</span></a>
            </div>
        </section>

        <section class="home-collage" aria-labelledby="home-cta-title">
            <div class="home-collage-frame home-collage-frame--one" data-parallax="0.12">
                <img src="/storage/gallery/photos/DIA08913.jpg" alt="" aria-hidden="true" loading="lazy">
            </div>
            <div class="home-collage-frame home-collage-frame--two" data-parallax="-0.1">
                <img src="/storage/gallery/photos/DIA08966.jpg" alt="" aria-hidden="true" loading="lazy">
            </div>
            <div class="home-collage-frame home-collage-frame--three" data-parallax="0.08">
                <img src="/storage/gallery/photos/DIA09013.jpg" alt="" aria-hidden="true" loading="lazy">
            </div>
            <div class="home-collage-frame home-collage-frame--four" data-parallax="-0.14">
                <img src="/storage/gallery/photos/DIA09069.jpg" alt="" aria-hidden="true" loading="lazy">
            </div>
            <div class="home-collage-copy">
                <p class="home-eyebrow">Crafted for once in a lifetime</p>
                <h2 id="home-cta-title"><span>Golden moments pass</span> <span>in a heartbeat.</span> <span>Let’s make yours</span> <span>stay forever.</span></h2>
                <p class="home-collage-invitation">Kindly share your magical ideas or dreams with us—we would love to hear from you and make them happen.</p>
                <a class="home-cta-link" href="{{ route('inquiry') }}">Share your dream with us <span aria-hidden="true">⟶</span></a>
            </div>
        </section>

    </div>
@endsection
