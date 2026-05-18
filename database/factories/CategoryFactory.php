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
            'icon' => fake()->randomElement(['heroicon-o-briefcase', 'heroicon-o-computer', 'heroicon-o-academic-cap', 'heroicon-o-cog', null]),
            'parent_id' => null,
        ];
    }
}
