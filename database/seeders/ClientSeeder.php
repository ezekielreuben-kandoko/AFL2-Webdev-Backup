<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            [
                'client_name' => 'Stephen & Phoppy Wedding',
                'folder' => 'gallery/Stephen&Poppy',
                'month_date' => '13/10/25',
            ],
            [
                'client_name' => 'Erica & Alvin',
                'folder' => 'gallery/Erica&Alvin',
                'month_date' => '06/06/22',
            ],
            [
                'client_name' => 'Vera & Nuel',
                'folder' => 'gallery/photos',
                'month_date' => null,
            ],
        ];

        foreach ($clients as $data) {
            Client::updateOrCreate(
                ['client_name' => $data['client_name']],
                [
                    'card_title' => $data['client_name'],
                    'cover_image' => $this->firstImage($data['folder']),
                    'month_date' => $data['month_date'],
                    'client_type' => 'gallery',
                ]
            );
        }
    }

    private function firstImage(string $folder): ?string
    {
        $files = Storage::disk('public')->files($folder);

        $files = array_values(array_filter($files, function (string $path): bool {
            return in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp', 'gif'], true);
        }));

        sort($files, SORT_NATURAL | SORT_FLAG_CASE);

        return $files[0] ?? null;
    }
}
