<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => [
                'az' => fake()->word() . ' (AZ)',
                'en' => fake()->word(),
            ],
            'icon' => fake()->randomElement(['fas-briefcase', 'fas-laptop', 'fas-graduation-cap', 'fas-gear', null]),
            'parent_id' => null,
        ];
    }
}
