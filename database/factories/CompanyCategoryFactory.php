<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => [
                'az' => fake()->word(),
                'en' => fake()->word(),
            ],
        ];
    }
}
