<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'dni' => fake()->numberBetween(10000000000,999999999999),
            'tlf' => fake()->phoneNumber(),
            'category_id' => (\App\Models\Category::factory()->create())->id,
        ];
    }
}
