@extends('layouts.app')

@section('title', 'Photobooth | AFL2 Webdev')

@section('content')
    <section class="client-page" aria-labelledby="photobooth-title">
        <h1 class="client-page__title" id="photobooth-title">Photobooth</h1>

        @include('partials.client-list', [
            'clients' => $clients,
            'detailRoute' => $detailRoute,
            'emptyMessage' => $emptyMessage,
        ])
    </section>
@endsection
