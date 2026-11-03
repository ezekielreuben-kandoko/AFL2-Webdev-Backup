<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_name' => fake()->name(),
            'card_title' => fake()->words(2, true),
            'cover_image' => null,
            'month_date' => fake()->date('M j'),
            'client_type' => fake()->randomElement(['gallery', 'photobooth', 'lumenara', 'livestream']),
        ];
    }
}
