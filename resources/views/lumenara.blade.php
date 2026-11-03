@extends('layouts.app')

@section('title', 'Lumenara | AFL2 Webdev')

@section('content')
    <section class="client-page" aria-labelledby="lumenara-title">
        <h1 class="client-page__title" id="lumenara-title">Lumenara</h1>

        @include('components.client-list', [
            'clients' => $clients,
            'detailRoute' => $detailRoute,
            'emptyMessage' => $emptyMessage,
        ])
    </section>
@endsection
