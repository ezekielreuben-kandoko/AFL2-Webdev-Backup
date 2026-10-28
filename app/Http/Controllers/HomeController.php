<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Video;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $photos = Photo::query()
            ->orderBy('path')
            ->limit(20)
            ->get()
            ->all();

        $heroPhotos = array_slice($photos, 0, 5);

        $approachPhoto = null;
        if (isset($photos[5])) {
            $approachPhoto = $photos[5];
        }

        $approachDetailPhoto = null;
        if (isset($photos[6])) {
            $approachDetailPhoto = $photos[6];
        }

        $galleryPhotos = array_slice($photos, 7, 8);

        $filmPoster = null;
        if (isset($photos[15])) {
            $filmPoster = $photos[15];
        }

        $collagePhotos = array_slice($photos, 16, 4);

        $collageFrames = [
            ['class' => 'one', 'parallax' => '0.12'],
            ['class' => 'two', 'parallax' => '-0.1'],
            ['class' => 'three', 'parallax' => '0.08'],
            ['class' => 'four', 'parallax' => '-0.14'],
        ];

        $filmVideo = Video::query()->orderBy('path')->first();

        return view('home', [
            'active' => 'home',
            'heroPhotos' => $heroPhotos,
            'approachPhoto' => $approachPhoto,
            'approachDetailPhoto' => $approachDetailPhoto,
            'galleryPhotos' => $galleryPhotos,
            'filmPoster' => $filmPoster,
            'collagePhotos' => $collagePhotos,
            'collageFrames' => $collageFrames,
            'filmVideo' => $filmVideo,
        ]);
    }
}
