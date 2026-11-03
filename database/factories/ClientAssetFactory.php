<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\ClientAsset;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ClientAsset>
 */
class ClientAssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'file_path' => 'clients/sample.jpg',
            'file_type' => fake()->randomElement(['photo', 'video']),
            'alt' => null,
            'sort_order' => fake()->numberBetween(0, 10),
        ];
    }
}
