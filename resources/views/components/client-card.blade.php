<article class="client-card">
    <a class="client-card__cover-link" href="{{ route($detailRoute, $client) }}" aria-label="Buka {{ $client->display_title }}">
        @if ($client->cover_url)
            <img class="client-card__cover" src="{{ $client->cover_url }}" alt="{{ $client->display_title }}" loading="lazy">
        @else
            <span class="client-card__cover client-card__cover--empty" aria-hidden="true"></span>
        @endif
    </a>

    <h2 class="client-card__title">{{ $client->display_title }}</h2>
    <a class="client-card__more" href="{{ route($detailRoute, $client) }}">Read More</a>
</article>
