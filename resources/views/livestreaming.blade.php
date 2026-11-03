@extends('layouts.app')

@section('title', 'Livestreaming | AFL2 Webdev')

@section('content')
    <section class="client-page" aria-labelledby="livestreaming-title">
        <h1 class="client-page__title" id="livestreaming-title">Livestreaming</h1>

        @include('components.client-list', [
            'clients' => $clients,
            'detailRoute' => $detailRoute,
            'emptyMessage' => $emptyMessage,
        ])
    </section>
@endsection
