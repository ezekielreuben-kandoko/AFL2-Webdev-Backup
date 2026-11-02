<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $extensions = ['mp4', 'm4v', 'mov', 'webm'];

        foreach ($this->mediaPaths('gallery/videos', $extensions) as $path) {
            $title = $this->titleFromPath($path);

            $video = Video::query()->firstOrCreate(
                ['path' => $path],
                ['title' => $title],
            );

            if (str_contains($video->title, 'Wdding')) {
                $video->update(['title' => $title]);
            }
        }
    }

    protected function mediaPaths(string $directory, array $allowedExtensions): array
    {
        $paths = Storage::files($directory);
        sort($paths);

        return array_values(array_filter($paths, function (string $path) use ($allowedExtensions): bool {
            return in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), $allowedExtensions, true);
        }));
    }

    protected function titleFromPath(string $path): string
    {
        $name = pathinfo($path, PATHINFO_FILENAME);
        $title = preg_replace('/[\-_]+/', ' ', $name);
        $title = preg_replace('/\s+/', ' ', $title);
        $title = ucwords(strtolower(trim($title)));

        return str_replace('Wdding', 'Wedding', $title);
    }
}
