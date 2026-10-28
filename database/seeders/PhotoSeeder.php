<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PhotoSeeder extends Seeder
{
    public function run(): void
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'avif'];
        $paths = Storage::files('gallery/photos');

        sort($paths);

        foreach ($paths as $path) {
            $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

            if (! in_array($extension, $allowedExtensions)) {
                continue;
            }

            $name = pathinfo($path, PATHINFO_FILENAME);
            $title = ucwords(strtolower(str_replace(['-', '_'], ' ', $name)));

            Photo::query()->firstOrCreate(
                ['path' => $path],
                ['title' => $title],
            );
        }
    }
}
