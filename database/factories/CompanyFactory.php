<?php

namespace Database\Factories;

use App\Models\CompanyCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'email' => fake()->unique()->companyEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'address' => fake()->address(),
            'short_address' => fake()->city(),
            'about' => [
                'az' => fake()->paragraphs(2, true) . ' (AZ)',
                'en' => fake()->paragraphs(2, true),
            ],
            'logo' => 'logos/' . fake()->uuid() . '.png',
            'cover_image' => 'covers/' . fake()->uuid() . '.jpg',
            'banner_image' => 'company_banners/' . fake()->uuid() . '.jpg',
            'category_id' => CompanyCategory::factory(),
            'is_verified' => fake()->boolean(70),
            'is_active' => true,
            'founded_year' => fake()->numberBetween(1990, 2024),
        ];
    }
}
