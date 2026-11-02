@extends('layouts.app')

@section('title', 'About the Collective | Holder')

@section('content')
    <div class="about-page" id="top">
        <section class="about-hero" aria-labelledby="about-manifesto">
            <p class="about-eyebrow">Behind the collective</p>
            <h1 class="about-manifesto" id="about-manifesto">
                We don’t stage an idealized version of life. We preserve the quiet, authentic moments of meaningful and lasting memories.
            </h1>

            <div class="about-hero-story">
                <figure class="about-team-image">
                    <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&amp;fit=crop&amp;w=1800&amp;q=85" alt="Creative team sharing ideas in a studio" fetchpriority="high">
                    <figcaption>Holder — photographers, filmmakers, and observers of life.</figcaption>
                </figure>

                <div class="about-story-copy">
                    <p>We are a close-knit collective drawn to the moments that make a life feel like your own: the joy, the growing, and the genuine connection in between.</p>
                    <p>From the first quiet frame to the final moving image, we create with care and leave room for the story to unfold naturally.</p>
                    <a class="about-text-link" href="#lead-photographers">Explore our artists <span aria-hidden="true">↓</span></a>
                </div>
            </div>
        </section>

        <section class="about-artist-section" id="lead-photographers" aria-labelledby="photographers-title">
            <header class="about-section-intro">
                <h2 class="about-section-title" id="photographers-title">Lead<br>Photographers</h2>
                <p class="about-section-note">Three perspectives, held together by an instinct for honest moments.</p>
            </header>

            <div class="about-artist-grid about-artist-grid--three">
                @foreach ($photographers as $artist)
                    @include('partials.artist-card', ['artist' => $artist, 'film' => false])
                @endforeach
            </div>
        </section>

        <section class="about-philosophy" id="philosophy" aria-labelledby="philosophy-title">
            <div class="about-philosophy-inner">
                <p class="about-eyebrow">What guides us</p>
                <h2 class="about-philosophy-title" id="philosophy-title">Our philosophy</h2>
                <div class="about-values-grid">
                    <article class="about-value">
                        <h3>Unscripted Direction</h3>
                        <p>We guide gently, leaving room for you to move, connect, and be yourself without stiff posing.</p>
                    </article>
                    <article class="about-value">
                        <h3>Timeless Monochrome &amp; Tone</h3>
                        <p>Thoughtful light and considered tones create images that outlive fleeting trends.</p>
                    </article>
                    <article class="about-value">
                        <h3>Unified Storytelling</h3>
                        <p>Photographers and filmmakers work in harmony, making every still and moving image feel part of one story.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="about-artist-section about-film-section" id="video-directors" aria-labelledby="directors-title">
            <header class="about-section-intro">
                <h2 class="about-section-title" id="directors-title">Video<br>Directors</h2>
                <p class="about-section-note">Films with room to breathe, remember, and feel again.</p>
            </header>

            <div class="about-artist-grid about-artist-grid--three">
                @foreach ($directors as $artist)
                    @include('partials.artist-card', ['artist' => $artist, 'film' => true])
                @endforeach
            </div>
        </section>

        <section class="about-cta" id="inquire" aria-labelledby="about-cta-title">
            <p class="about-eyebrow">The beginning of something meaningful</p>
            <h2 id="about-cta-title">Found the right eyes for your story?</h2>
            <a class="about-cta-link" href="{{ route('inquiry') }}">Inquire your date <span aria-hidden="true">⟶</span></a>
        </section>

        <footer class="about-footer">
            <p>© 2026 Holder. All stories held with care.</p>
            @include('partials.social-links')
        </footer>
    </div>
@endsection
