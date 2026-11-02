<article @class(['about-artist-card', 'about-artist-card--offset' => $artist['offset']])>
    <a class="about-artist-image-link" href="{{ route($film ? 'gallery.videos' : 'gallery.photos') }}" aria-label="{{ $film ? 'Watch films by Name' : "View Name's portfolio" }}">
        <div @class(['about-artist-image', 'about-artist-image--film' => $film])>
            <img class="about-artist-portrait" src="{{ $artist['portrait'] }}" alt="Editorial portrait representing Name" @if ($film || ($artist['portrait_lazy'] ?? false)) loading="lazy" @endif>
            <img class="about-artist-work" src="{{ $artist['work'] }}" alt="{{ $artist['work_alt'] }}" loading="lazy">
            @if ($film)
                <span class="about-play-badge" aria-hidden="true">▶</span>
            @endif
            <span class="about-image-hint">{{ $film ? 'Watch selected films' : 'View selected work' }}</span>
        </div>
    </a>
    <div class="about-artist-copy">
        <div class="about-artist-heading">
            <h3>Name</h3>
            <p>Holder</p>
        </div>
        <p class="about-artist-bio">Holder</p>
        <a class="about-text-link" href="{{ route($film ? 'gallery.videos' : 'gallery.photos') }}">{{ $artist['link_text'] ?? ($film ? 'Watch films' : 'View Name portfolio') }} <span aria-hidden="true">⟶</span></a>
    </div>
</article>
