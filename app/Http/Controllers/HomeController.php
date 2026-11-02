<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'active' => 'home',
            'filmVideo' => Video::query()->orderBy('path')->first(),
        ]);
    }
}
