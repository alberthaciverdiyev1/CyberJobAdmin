<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'image' => 'banners/' . fake()->uuid() . '.jpg',
            'location' => fake()->randomElement(['header', 'sidebar', 'footer', 'between_content']),
            'link' => fake()->url(),
            'start_at' => now(),
            'expiration_date' => now()->addDays(30),
            'is_active' => true,
            'is_desktop' => fake()->boolean(),
        ];
    }
}
