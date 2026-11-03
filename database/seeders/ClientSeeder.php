<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            [
                'client_name' => 'Stephen & Phoppy Wedding',
                'cover_image' => 'gallery/Stephen&Poppy/_NRO0465.jpg',
                'month_date' => '13/10/25',
            ],
            [
                'client_name' => 'Erica & Alvin',
                'cover_image' => 'gallery/Erica&Alvin/DIA00699.JPG',
                'month_date' => '06/06/22',
            ],
            [
                'client_name' => 'Vera & Nuel',
                'cover_image' => 'gallery/photos/.jpg',
                'month_date' => null,
            ],
        ];

        foreach ($clients as $data) {
            Client::updateOrCreate(
                ['client_name' => $data['client_name']],
                [
                    'cover_image' => $data['cover_image'],
                    'month_date' => $data['month_date'],
                    'client_type' => 'gallery',
                ]
            );
        }
    }
}
