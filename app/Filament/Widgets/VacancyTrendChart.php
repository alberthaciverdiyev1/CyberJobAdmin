<?php

namespace App\Filament\Widgets;

use App\Models\Vacancy;
use Filament\Widgets\LineChartWidget;

class VacancyTrendChart extends LineChartWidget
{
    protected static ?int $sort = 2;

    public ?string $heading = 'Son 7 Gündə Vakansiya Aktivliyi';

    protected function getData(): array
    {
        $data = collect(range(6, 0))->map(function ($daysAgo) {
            $date = now()->subDays($daysAgo);
            return Vacancy::whereDate('created_at', $date)->count();
        });

        $labels = collect(range(6, 0))->map(function ($daysAgo) {
            return now()->subDays($daysAgo)->format('d.m');
        });

        return [
            'datasets' => [
                [
                    'label' => 'Yeni Vakansiyalar',
                    'data' => $data,
                    'borderColor' => '#2563EB',
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

}
