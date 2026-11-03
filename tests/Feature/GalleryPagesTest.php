<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class GalleryPagesTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_gallery_page_shows_client_gallery_without_photo_and_video_navigation(): void
    {
        $this->get('/gallery')
            ->assertOk()
            ->assertViewIs('index')
            ->assertSee('Gallery')
            ->assertSee('Belum ada klien galeri.');
    }

    public function test_gallery_page_shows_client_cards_from_the_database(): void
    {
        $client = Client::create([
            'client_name' => 'Simon & Sherly',
            'card_title' => 'Melbourne Wedding',
            'cover_image' => null,
            'month_date' => 'Apr 3',
            'client_type' => 'gallery',
        ]);

        $this->get('/gallery')
            ->assertOk()
            ->assertSee('Melbourne Wedding')
            ->assertSee('Read More')
            ->assertSee(route('gallery.detail', $client));
    }

    public function test_legacy_photo_and_video_gallery_urls_return_not_found(): void
    {
        $this->get('/gallery/photos')->assertNotFound();
        $this->get('/gallery/videos')->assertNotFound();
    }
}
