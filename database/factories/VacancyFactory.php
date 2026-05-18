<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->jobTitle(),
            'requirements' => fake()->paragraphs(3, true),
            'description' => fake()->paragraphs(5, true),
            'city_id' => City::factory(),
            'view_count' => fake()->numberBetween(0, 500),
            'expire_date' => now()->addDays(fake()->numberBetween(10, 60)),
            'banner_image' => fake()->boolean(30) ? 'vacancy_banners/' . fake()->uuid() . '.jpg' : null,
            'min_salary' => fake()->randomFloat(2, 300, 1000),
            'max_salary' => fake()->randomFloat(2, 1000, 5000),
            'min_age' => fake()->numberBetween(18, 25),
            'max_age' => fake()->numberBetween(35, 55),
            'email' => fake()->companyEmail(),
            'company_id' => Company::factory(),
            'category_id' => Category::factory(),
            'is_active' => true,
            'is_premium' => fake()->boolean(20),
            'is_bring_top' => fake()->boolean(10),
        ];
    }
}
