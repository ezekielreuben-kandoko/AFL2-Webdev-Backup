<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('root');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

foreach (['inquiry', 'livestreaming', 'photobooth', 'lumenara'] as $page) {
    Route::view("/{$page}", $page, ['active' => $page])->name($page);
}

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/photos', [PhotoController::class, 'index'])->name('gallery.photos');
Route::get('/gallery/videos', [VideoController::class, 'index'])->name('gallery.videos');
