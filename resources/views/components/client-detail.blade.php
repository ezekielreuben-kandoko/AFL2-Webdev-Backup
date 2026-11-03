<div class="client-detail">
    <header class="client-detail__header">
        <h1 class="client-detail__title">{{ $client->display_title }}</h1>
        @if ($client->month_date)
            <p class="client-detail__meta">
                <span>{{ $client->month_date }}</span>
            </p>
        @endif
    </header>

    <div class="client-detail__media">
        @foreach ($client->videos as $asset)
            <video class="client-detail__video" controls playsinline preload="metadata">
                <source src="{{ $asset->url }}">
            </video>
        @endforeach

        @foreach ($client->photos as $asset)
            <img class="client-detail__photo" src="{{ $asset->url }}" alt="{{ $asset->alt ?: $client->display_title }}" loading="lazy">
        @endforeach
    </div>

    @if ($client->videos->isEmpty() && $client->photos->isEmpty())
        <p class="client-detail__empty">Belum ada aset untuk klien ini.</p>
    @endif

    <a class="client-detail__back" href="{{ route($listingRoute) }}">Kembali</a>
</div>
