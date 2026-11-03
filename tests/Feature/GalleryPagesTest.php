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
            'cover_image' => null,
            'month_date' => '03/04/25',
            'client_type' => 'gallery',
        ]);

        $this->get('/gallery')
            ->assertOk()
            ->assertSee('Simon & Sherly')
            ->assertSee('Read More')
            ->assertSee(route('gallery.detail', $client));
    }

    public function test_gallery_detail_shows_client_photos_and_formatted_month_date(): void
    {
        $client = Client::create([
            'client_name' => 'Stephen & Phoppy Wedding',
            'cover_image' => 'gallery/Stephen&Poppy/DIA00495.jpg',
            'month_date' => '13/10/25',
            'client_type' => 'gallery',
        ]);

        $client->assets()->create([
            'file_path' => 'gallery/Stephen&Poppy/DIA00495.jpg',
            'file_type' => 'photo',
            'alt' => 'Stephen & Phoppy Wedding',
            'sort_order' => 0,
        ]);

        $this->get(route('gallery.detail', $client))
            ->assertOk()
            ->assertSee('Stephen & Phoppy Wedding')
            ->assertSee('13/10/25')
            ->assertSee('/storage/gallery/Stephen&Poppy/DIA00495.jpg');
    }

    public function test_legacy_photo_and_video_gallery_urls_return_not_found(): void
    {
        $this->get('/gallery/photos')->assertNotFound();
        $this->get('/gallery/videos')->assertNotFound();
    }
}
