<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => [
                'az' => fake()->city() . ' (AZ)',
                'en' => fake()->city(),
            ],
        ];
    }
}
