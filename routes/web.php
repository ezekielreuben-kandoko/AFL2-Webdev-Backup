<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('root');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::view('/inquiry', 'inquiry', ['active' => 'inquiry'])->name('inquiry');

Route::get('/gallery', [ClientController::class, 'gallery'])->name('gallery');
Route::get('/gallery/photos', [PhotoController::class, 'index'])->name('gallery.photos');
Route::get('/gallery/videos', [VideoController::class, 'index'])->name('gallery.videos');
Route::get('/gallery/{client}', [ClientController::class, 'galleryDetail'])->name('gallery.detail');

Route::get('/photobooth', [ClientController::class, 'photobooth'])->name('photobooth');
Route::get('/photobooth/{client}', [ClientController::class, 'photoboothDetail'])->name('photobooth.detail');

Route::get('/lumenara', [ClientController::class, 'lumenara'])->name('lumenara');
Route::get('/lumenara/{client}', [ClientController::class, 'lumenaraDetail'])->name('lumenara.detail');

Route::get('/livestreaming', [ClientController::class, 'livestreaming'])->name('livestreaming');
Route::get('/livestreaming/{client}', [ClientController::class, 'livestreamDetail'])->name('livestreaming.detail');
