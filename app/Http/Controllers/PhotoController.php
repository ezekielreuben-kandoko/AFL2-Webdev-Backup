<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Contracts\View\View;

class PhotoController extends Controller
{
    public function index(): View
    {
        return view('gallery.photos', [
            'active' => 'photos',
            'photos' => Photo::query()->orderBy('created_at', 'desc')->get(),
        ]);
    }
}
