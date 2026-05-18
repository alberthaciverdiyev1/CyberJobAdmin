<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilterFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => [
                'az' => fake()->word() . ' (AZ)',
                'en' => fake()->word(),
            ],
            'key' => fake()->unique()->slug(1),
            'parent_id' => null,
        ];
    }
}
