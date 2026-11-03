<?php

namespace Tests\Feature;

use App\Models\Client;
use Database\Seeders\ClientAssetSeeder;
use Database\Seeders\ClientSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GalleryPagesTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_gallery_page_shows_no_client_cards_when_no_gallery_clients_exist(): void
    {
        $response = $this->get('/gallery');

        $response
            ->assertOk()
            ->assertViewIs('index')
            ->assertSee('Gallery')
            ->assertDontSee('Holder')
            ->assertDontSee('COLLECTIONS')
            ->assertDontSee('All Stories')
            ->assertDontSee('Intimate Session')
            ->assertDontSee('PHOTO & FILM')
            ->assertDontSee('View Full Album')
            ->assertDontSee('REC')
            ->assertDontSee('STILL FRAME')
            ->assertDontSee('TT — 2020');

        $this->assertStringNotContainsString('data-gallery-filter', $response->getContent());
        $this->assertSame(0, substr_count($response->getContent(), 'class="gallery-card"'));
    }

    public function test_gallery_page_shows_client_cards_from_the_database(): void
    {
        $client = Client::create([
            'client_name' => 'Simon & Sherly',
            'card_title' => 'Simon & Sherly',
            'cover_image' => null,
            'month_date' => '03/04/25',
            'client_type' => 'gallery',
        ]);

        $this->get('/gallery')
            ->assertOk()
            ->assertSee('Simon & Sherly')
            ->assertDontSee('View Full Album')
            ->assertSee(route('gallery.detail', $client));
    }

    public function test_existing_client_seeders_persist_vera_nuel_media_and_display_video_before_photos(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('gallery/photos/DIA00001.jpg', 'photo');
        Storage::disk('public')->put('gallery/photos/DIA00003.jpg', 'photo');
        Storage::disk('public')->put('gallery/photos/notes.txt', 'not an image');
        Storage::disk('public')->put('gallery/videos/Wdding Cinema - Vera & Nuel.mp4', 'video');

        $clientSeeder = new ClientSeeder;
        $assetSeeder = new ClientAssetSeeder;
        $clientSeeder->run();
        $assetSeeder->run();
        $clientSeeder->run();
        $assetSeeder->run();

        $client = Client::query()->where('client_name', 'Vera & Nuel')->firstOrFail();

        $this->assertDatabaseHas('clients', [
            'id' => $client->id,
            'card_title' => 'Vera & Nuel',
            'client_type' => 'gallery',
            'cover_image' => 'gallery/photos/DIA00001.jpg',
        ]);
        $this->assertDatabaseHas('client_assets', [
            'client_id' => $client->id,
            'file_path' => 'gallery/videos/Wdding Cinema - Vera & Nuel.mp4',
            'file_type' => 'video',
        ]);
        $this->assertSame(3, $client->assets()->count());

        $this->get(route('gallery'))
            ->assertOk()
            ->assertSee('Vera & Nuel')
            ->assertDontSee('Holder')
            ->assertSee(route('gallery.detail', $client));

        $response = $this->get(route('gallery.detail', $client))
            ->assertOk()
            ->assertSee('Vera & Nuel')
            ->assertSee('/storage/gallery/videos/Wdding Cinema - Vera & Nuel.mp4')
            ->assertSee('/storage/gallery/photos/DIA00001.jpg');

        $html = $response->getContent();
        $videoPosition = strpos($html, 'class="client-detail__video"');
        $photoPosition = strpos($html, 'class="client-detail__photo');

        $this->assertIsInt($videoPosition);
        $this->assertIsInt($photoPosition);
        $this->assertLessThan($photoPosition, $videoPosition);
    }

    public function test_gallery_detail_shows_client_photos_and_formatted_month_date(): void
    {
        $client = Client::create([
            'client_name' => 'Stephen & Phoppy Wedding',
            'card_title' => 'Stephen & Phoppy Wedding',
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
        $this->get('/gallery/holder/1')->assertNotFound();
    }
}
