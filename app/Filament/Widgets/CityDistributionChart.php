<?php

namespace App\Filament\Widgets;

use App\Models\City;
use Filament\Widgets\ChartWidget;

class CityDistributionChart extends ChartWidget
{
    protected static ?int $sort = 4;

    public ?string $heading = 'Şəhərlər üzrə Vakansiyalar';

    protected function getData(): array
    {
        $cities = City::withCount('vacancies')->orderByDesc('vacancies_count')->limit(10)->get();

        return [
            'datasets' => [
                [
                    'label' => 'Vakansiya sayı',
                    'data' => $cities->pluck('vacancies_count'),
                    'backgroundColor' => [
                        '#2563EB', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6',
                        '#EC4899', '#06B6D4', '#84CC16', '#F97316', '#6366F1',
                    ],
                ],
            ],
            'labels' => $cities->pluck('name.az'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
