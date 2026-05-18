<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use Filament\Widgets\LineChartWidget;

class CompanyGrowthChart extends LineChartWidget
{
    protected static ?int $sort = 7;

    public ?string $heading = 'Son 6 Ayda Şirkət Artımı';

    protected function getData(): array
    {
        $data = collect(range(5, 0))->map(function ($i) {
            $date = now()->subMonths($i);
            return Company::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        });

        $verifiedData = collect(range(5, 0))->map(function ($i) {
            $date = now()->subMonths($i);
            return Company::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->where('is_verified', true)
                ->count();
        });

        $labels = collect(range(5, 0))->map(function ($i) {
            return now()->subMonths($i)->format('F Y');
        });

        return [
            'datasets' => [
                [
                    'label' => 'Yeni Şirkətlər',
                    'data' => $data,
                    'borderColor' => '#F59E0B',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.1)',
                    'tension' => 0.3,
                    'fill' => true,
                ],
                [
                    'label' => 'Təsdiqlənmiş',
                    'data' => $verifiedData,
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
