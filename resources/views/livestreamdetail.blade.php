@extends('layouts.app')

@section('title', $client->display_title)

@section('content')
    @include('components.client-detail', ['client' => $client, 'listingRoute' => 'livestreaming'])
@endsection
