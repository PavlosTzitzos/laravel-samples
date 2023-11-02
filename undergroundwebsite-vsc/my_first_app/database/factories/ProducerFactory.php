<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producer>
 */
class ProducerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'second_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'description' => fake()->sentence(10),
            'producer_image' => 'null',
            'phone_number' => fake()->unique()->e164PhoneNumber(),
            'email' => fake()->safeEmail(),
        ];
    }
}
