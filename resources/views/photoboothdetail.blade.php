@extends('layouts.app')

@section('title', $client->display_title)

@section('content')
    @include('partials.client-detail', ['client' => $client, 'listingRoute' => 'photobooth'])
@endsection
