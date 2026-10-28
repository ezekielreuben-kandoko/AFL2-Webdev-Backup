<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $allowedExtensions = ['mp4', 'm4v', 'mov', 'webm'];
        $paths = Storage::files('gallery/videos');

        sort($paths);

        foreach ($paths as $path) {
            $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

            if (! in_array($extension, $allowedExtensions)) {
                continue;
            }

            $name = pathinfo($path, PATHINFO_FILENAME);
            $title = str_replace(['-', '_'], ' ', $name);
            $title = preg_replace('/\s+/', ' ', $title);
            $title = trim($title);
            $title = ucwords(strtolower($title));
            $title = str_replace('Wdding', 'Wedding', $title);

            $video = Video::query()->firstOrCreate(
                ['path' => $path],
                ['title' => $title],
            );

            if (strpos($video->title, 'Wdding') !== false) {
                $video->update(['title' => $title]);
            }
        }
    }
}
