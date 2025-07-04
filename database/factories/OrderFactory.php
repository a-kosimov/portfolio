<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => strtoupper(Str::random(10)),
            'status' => $this->faker->randomElement(['new', 'processing', 'completed', 'cancelled']),
            'amount' => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}
