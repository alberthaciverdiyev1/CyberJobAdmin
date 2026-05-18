<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence(5);
        return [
            'title' => [
                'az' => $title . ' (AZ)',
                'en' => $title,
            ],
            'description' => [
                'az' => fake()->paragraphs(3, true) . ' (AZ)',
                'en' => fake()->paragraphs(3, true),
            ],
            'image' => 'blogs/' . fake()->uuid() . '.jpg',
            'read_count' => fake()->numberBetween(0, 1000),
            'is_active' => true,
        ];
    }
}
