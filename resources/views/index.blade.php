@extends('layouts.app')

@section('title', 'Gallery | AFL2 Webdev')

@section('content')
    <section class="gallery-hero" aria-labelledby="gallery-title">
        <div class="gallery-hero__inner">
            <div class="gallery-hero__meta" aria-hidden="true">
                <span>FRAME 01 — ARCHIVE</span>
                <span class="gallery-hero__rec">REC // 00:00:00</span>
            </div>

            <div class="gallery-hero__stage">
                <span class="gallery-hero__corner gallery-hero__corner--tl" aria-hidden="true"></span>
                <span class="gallery-hero__corner gallery-hero__corner--tr" aria-hidden="true"></span>
                <span class="gallery-hero__corner gallery-hero__corner--bl" aria-hidden="true"></span>
                <span class="gallery-hero__corner gallery-hero__corner--br" aria-hidden="true"></span>

                <div class="gallery-hero__content">
                    <p class="gallery-hero__eyebrow">Editorial Photography &amp; Videography</p>
                    <h1 class="gallery-hero__title" id="gallery-title">Gallery</h1>
                    <span class="gallery-hero__rule" aria-hidden="true"></span>
                    <blockquote class="gallery-hero__quote">
                        <p>“Sebuah foto membekukan detak waktu menjadi keabadian, dan sepotong video menghidupkan kembali jiwa di dalamnya. Di sini, setiap tatapan, tawa, dan air mata dirangkai menjadi warisan cerita yang tak lekang oleh usia.”</p>
                    </blockquote>
                    <p class="gallery-hero__accent">Capturing stillness in motion — Preserving your timeless chapters.</p>
                </div>
            </div>

            <div class="gallery-hero__foot" aria-hidden="true">
                <span>STILL / MOTION</span>
                <span>ARCHIVE / 01</span>
            </div>
        </div>
    </section>

    <section class="client-page client-page--gallery" aria-label="Daftar klien galeri">
        @include('components.client-list', [
            'clients' => $clients,
            'detailRoute' => $detailRoute,
            'emptyMessage' => $emptyMessage,
        ])
    </section>
@endsection
