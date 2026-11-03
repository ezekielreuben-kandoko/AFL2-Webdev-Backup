@extends('layouts.app')

@section('title', 'Gallery | Tepuk Tangan Photography & Videography')

@section('content')
    <section class="gallery-hero" aria-labelledby="gallery-title">
        <div class="gallery-hero__inner">
            <div class="gallery-hero__copy">
                <h1 class="gallery-hero__title" id="gallery-title">Gallery</h1>
                <p class="gallery-hero__subtitle">The Art of Stillness &amp; Motion</p>

                <blockquote class="gallery-hero__quote">
                    <p>“Sebuah foto membekukan detak waktu menjadi keabadian, dan sepotong video menghidupkan kembali jiwa di dalamnya. Di sini, setiap tatapan, tawa, dan air mata dirangkai menjadi warisan cerita yang tak lekang oleh usia.”</p>
                    <cite>Capturing stillness in motion — Preserving your timeless chapters.</cite>
                </blockquote>
            </div>

            <div class="gallery-moodboard" aria-label="Editorial photography and film moodboard">
                <figure class="gallery-moodboard__portrait">
                    <img
                        src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&amp;fit=crop&amp;w=1200&amp;q=85"
                        alt="A couple framed in warm, cinematic wedding light"
                        fetchpriority="high"
                    >
                </figure>

                <figure class="gallery-moodboard__landscape">
                    <img
                        src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&amp;fit=crop&amp;w=900&amp;q=85"
                        alt="A quiet wedding moment captured on film"
                        loading="lazy"
                    >
                </figure>
            </div>
        </div>
    </section>

    <section class="gallery-archive" aria-label="Daftar klien galeri">
        <div class="gallery-card-grid">
            @foreach ($clients as $client)
                <a
                    class="gallery-card"
                    href="{{ route('gallery.detail', $client) }}"
                    aria-label="View full album for {{ $client->display_title }}"
                >
                    <span class="gallery-card__cover">
                        <img src="{{ $client->cover_url ?: 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=85' }}" alt="{{ $client->display_title }} — Tepuk Tangan visual archive" loading="lazy">
                        <span class="gallery-card__shade" aria-hidden="true"></span>
                    </span>

                    <span class="gallery-card__meta">
                        <span class="gallery-card__title">{{ $client->display_title }} <span class="gallery-card__arrow" aria-hidden="true">→</span></span>
                    </span>
                    <span class="gallery-card__rule" aria-hidden="true"></span>
                </a>
            @endforeach
        </div>
    </section>
@endsection
