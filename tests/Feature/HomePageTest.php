<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_home_page_renders_the_editorial_sections_and_existing_navigation(): void
    {
        $response = $this->get('/')->assertOk();

        $response
            ->assertSee('class="nav"', false)
            ->assertSee('class="home-hero"', false)
            ->assertSee('class="home-intro-figure"', false)
            ->assertDontSee('<figcaption>', false)
            ->assertSee('Where fleeting golden hours become classic, living heirlooms.')
            ->assertSee('Golden Moments')
            ->assertSee('Crafted for once in a lifetime')
            ->assertSee('Golden moments pass')
            ->assertSee('in a heartbeat.')
            ->assertSee('stay forever.')
            ->assertSee(route('photobooth'))
            ->assertSee(route('gallery'))
            ->assertSee(route('inquiry'));

        $this->assertSame(5, substr_count((string) $response->getContent(), 'class="home-hero-slide"'));
        $this->assertSame(9, substr_count((string) $response->getContent(), 'class="home-gallery-card '));
    }

    public function test_home_page_omits_gallery_filters_and_manual_carousel_controls(): void
    {
        $response = $this->get('/home');

        $response
            ->assertOk()
            ->assertDontSee('data-gallery-filter=', false)
            ->assertDontSee('data-gallery-kind=', false)
            ->assertDontSee('home-hero-counter')
            ->assertDontSee('home-hero-progress')
            ->assertDontSee('home-hero-arrow')
            ->assertDontSee('data-home-slide=', false)
            ->assertDontSee('data-home-direction=', false);
    }

    public function test_home_renders_hardcoded_photo_files_without_photo_records(): void
    {
        $response = $this->get('/')->assertOk();
        $content = (string) $response->getContent();

        $this->assertSame(0, substr_count($content, 'https://images.unsplash.com'));
        $this->assertSame(20, substr_count($content, '/storage/gallery/photos/'));
        $this->assertSame(9, substr_count($content, 'class="home-gallery-card '));
        foreach ([
            'DIA00001.jpg',
            'DIA00003.jpg',
            'DIA00007.jpg',
            'DIA00021.jpg',
            'DIA00039.jpg',
            'DIA00056.jpg',
            'DIA00223.jpg',
            'DIA00313.jpg',
            'DIA00368.jpg',
            'DIA00384.jpg',
            'DIA00396.jpg',
            'DIA00462.jpg',
            'DIA00465.jpg',
            'DIA00478.jpg',
            'DIA00486.jpg',
            'DIA08889.jpg',
            'DIA08913.jpg',
            'DIA08966.jpg',
            'DIA09013.jpg',
            'DIA09069.jpg',
        ] as $photoFilename) {
            $response->assertSee('/storage/gallery/photos/'.$photoFilename);
        }

        $response
            ->assertSee('Photography by Tepuk Tangan')
            ->assertSee('home-gallery-card--film', false)
            ->assertSee('Film by Livi Visual')
            ->assertSee('© Tepuk Tangan × Livi Visual. Founded 2020, Indonesia.');
    }
}
