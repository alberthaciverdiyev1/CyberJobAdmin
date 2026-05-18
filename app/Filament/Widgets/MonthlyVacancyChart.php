<?php

namespace App\Filament\Widgets;

use App\Models\Vacancy;
use Filament\Widgets\LineChartWidget;

class MonthlyVacancyChart extends LineChartWidget
{
    protected static ?int $sort = 5;

    public ?string $heading = 'Son 6 Ayda Vakansiya Trendi';

    protected function getData(): array
    {
        $data = collect(range(5, 0))->map(function ($i) {
            $date = now()->subMonths($i);
            return Vacancy::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        });

        $labels = collect(range(5, 0))->map(function ($i) {
            return now()->subMonths($i)->format('F Y');
        });

        $activeData = collect(range(5, 0))->map(function ($i) {
            $date = now()->subMonths($i);
            return Vacancy::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->where('is_active', true)
                ->count();
        });

        return [
            'datasets' => [
                [
                    'label' => 'Ümumi',
                    'data' => $data,
                    'borderColor' => '#2563EB',
                    'backgroundColor' => 'rgba(37, 99, 235, 0.1)',
                    'tension' => 0.3,
                    'fill' => true,
                ],
                [
                    'label' => 'Aktiv',
                    'data' => $activeData,
                    'borderColor' => '#10B981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'tension' => 0.3,
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }
}
