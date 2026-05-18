<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class VacancyCategoryChart extends ChartWidget
{
    protected static ?int $sort = 3;

    public ?string $heading = 'Kateqoriyalar üzrə Vakansiyalar';

    protected function getData(): array
    {
        $categories = Category::withCount('vacancies')->orderByDesc('vacancies_count')->limit(10)->get();

        return [
            'datasets' => [
                [
                    'label' => 'Vakansiya sayı',
                    'data' => $categories->pluck('vacancies_count'),
                    'backgroundColor' => [
                        '#2563EB', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6',
                        '#EC4899', '#06B6D4', '#84CC16', '#F97316', '#6366F1',
                    ],
                ],
            ],
            'labels' => $categories->pluck('name.az'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

}
