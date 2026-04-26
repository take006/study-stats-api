<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\User;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'id' => Str::uuid(),
            'user_id' => User::factory,
            'name' => fake()->word(),
            'color_code' => fake()->hexColor(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
