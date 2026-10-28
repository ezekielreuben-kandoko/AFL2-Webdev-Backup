<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Video;
use Illuminate\Contracts\View\View;

class VideoController extends Controller
{
    public function index(): View
    {
        $videos = Video::query()->orderBy('path')->get()->all();
        $posters = Photo::query()->orderBy('path')->limit(count($videos) + 1)->get()->all();

        $films = [];

        foreach ($videos as $index => $video) {
            $title = strtolower($video->title);

            if (strpos($title, 'pre-wedding') !== false || strpos($title, 'pre wedding') !== false || strpos($title, 'elopement') !== false) {
                $category = 'pre-wedding';
            } elseif (strpos($title, 'portrait') !== false || strpos($title, 'intimate') !== false) {
                $category = 'portraits';
            } elseif (strpos($title, 'teaser') !== false || strpos($title, 'reel') !== false) {
                $category = 'reels';
            } else {
                $category = 'wedding-cinema';
            }

            $poster = null;
            if (isset($posters[$index + 1])) {
                $poster = $posters[$index + 1];
            } elseif (isset($posters[0])) {
                $poster = $posters[0];
            }

            $films[] = [
                'video' => $video,
                'poster' => $poster,
                'category' => $category,
                'label' => strtoupper(str_replace('-', ' ', $category)),
            ];
        }

        $heroPoster = null;
        if (isset($posters[0])) {
            $heroPoster = $posters[0];
        }

        $featuredFilm = null;
        if (isset($films[0])) {
            $featuredFilm = $films[0];
        }

        $nextFilm = null;
        if (isset($films[1])) {
            $nextFilm = $films[1];
        }

        return view('gallery.videos', [
            'active' => 'videos',
            'films' => $films,
            'heroPoster' => $heroPoster,
            'featuredFilm' => $featuredFilm,
            'nextFilm' => $nextFilm,
        ]);
    }
}
