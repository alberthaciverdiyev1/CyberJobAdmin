<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question' => [
                'az' => fake()->sentence(6) . '? (AZ)',
                'en' => fake()->sentence(6) . '?',
            ],
            'answer' => [
                'az' => fake()->paragraphs(2, true) . ' (AZ)',
                'en' => fake()->paragraphs(2, true),
            ],
        ];
    }
}
