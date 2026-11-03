<div class="client-list">
    @forelse ($clients as $client)
        @include('partials.client-card', ['client' => $client, 'detailRoute' => $detailRoute])
    @empty
        <p class="client-list__empty">{{ $emptyMessage }}</p>
    @endforelse
</div>
