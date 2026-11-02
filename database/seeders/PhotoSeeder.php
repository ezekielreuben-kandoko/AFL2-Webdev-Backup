<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PhotoSeeder extends Seeder
{
    public function run(): void
    {
        $extensions = ['jpg', 'jpeg', 'png', 'webp', 'avif'];

        foreach ($this->mediaPaths('gallery/photos', $extensions) as $path) {
            Photo::query()->firstOrCreate(
                ['path' => $path],
                ['title' => $this->titleFromPath($path)],
            );
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
