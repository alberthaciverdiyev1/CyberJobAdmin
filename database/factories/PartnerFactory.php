<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'image' => 'partners/' . fake()->uuid() . '.png',
            'link' => fake()->url(),
            'is_active' => true,
        ];
    }
}
