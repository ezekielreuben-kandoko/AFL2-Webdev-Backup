@extends('layouts.app')

@section('title', 'Gallery | AFL2 Webdev')

@section('content')
    <section class="client-page" aria-labelledby="gallery-title">
        <h1 class="client-page__title" id="gallery-title">Gallery</h1>

        @include('components.client-list', [
            'clients' => $clients,
            'detailRoute' => $detailRoute,
            'emptyMessage' => $emptyMessage,
        ])
    </section>
@endsection
