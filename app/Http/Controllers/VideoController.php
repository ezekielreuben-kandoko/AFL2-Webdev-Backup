<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Video;
use Illuminate\Contracts\View\View;

class VideoController extends Controller
{
    public function index(): View
    {
        $videos = Video::query()->orderBy('path')->get();
        $posters = Photo::query()->orderBy('path')->limit($videos->count() + 1)->get();

        $films = $videos->values()->map(function (Video $video, int $index) use ($posters): array {
            $category = $this->categoryFor($video->title);

            return [
                'video' => $video,
                'poster' => $posters->get($index + 1) ?? $posters->first(),
                'category' => $category,
                'label' => strtoupper(str_replace('-', ' ', $category)),
            ];
        })->all();

        return view('gallery.videos', [
            'active' => 'videos',
            'films' => $films,
            'heroPoster' => $posters->first(),
            'featuredFilm' => $films[0] ?? null,
            'nextFilm' => $films[1] ?? null,
        ]);
    }

    private function categoryFor(string $title): string
    {
        $title = strtolower($title);

        return match (true) {
            str_contains($title, 'pre-wedding'),
            str_contains($title, 'pre wedding'),
            str_contains($title, 'elopement') => 'pre-wedding',
            str_contains($title, 'portrait'),
            str_contains($title, 'intimate') => 'portraits',
            str_contains($title, 'teaser'),
            str_contains($title, 'reel') => 'reels',
            default => 'wedding-cinema',
        };
    }
}
