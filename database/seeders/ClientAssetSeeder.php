<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ClientAssetSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            'Stephen & Phoppy Wedding' => 'gallery/Stephen&Poppy',
            'Erica & Alvin' => 'gallery/Erica&Alvin',
        ];

        foreach ($clients as $clientName => $folder) {
            $client = Client::query()->where('client_name', $clientName)->first();

            if (! $client) {
                continue;
            }

            $files = Storage::disk('public')->files($folder);

            $files = array_values(array_filter($files, function (string $path): bool {
                return in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp', 'gif'], true);
            }));

            sort($files, SORT_NATURAL | SORT_FLAG_CASE);

            $client->update(['cover_image' => $files[0] ?? null]);
            $client->assets()->where('file_type', 'photo')->delete();

            foreach ($files as $index => $path) {
                $client->assets()->create([
                    'file_path' => $path,
                    'file_type' => 'photo',
                    'alt' => $client->client_name,
                    'sort_order' => $index,
                ]);
            }
        }
    }
}
