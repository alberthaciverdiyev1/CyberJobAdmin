<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use App\Models\Vacancy;
use Filament\Widgets\ChartWidget;

class StatusDoughnutChart extends ChartWidget
{
    protected static ?int $sort = 6;

    public ?string $heading = 'Vakansiya Statusu';

    protected function getData(): array
    {
        $active = Vacancy::where('is_active', true)->count();
        $inactive = Vacancy::where('is_active', false)->count();
        $premium = Vacancy::where('is_premium', true)->count();
        $regular = Vacancy::where('is_premium', false)->count();
        $top = Vacancy::where('is_bring_top', true)->count();

        return [
            'datasets' => [
                [
                    'label' => 'Aktiv / Deaktiv',
                    'data' => [$active, $inactive],
                    'backgroundColor' => ['#10B981', '#EF4444'],
                    'hoverOffset' => 4,
                ],
                [
                    'label' => 'Premium / Adi',
                    'data' => [$premium, $regular],
                    'backgroundColor' => ['#F59E0B', '#6B7280'],
                    'hoverOffset' => 4,
                ],
                [
                    'label' => 'Önə Çıxan',
                    'data' => [$top, Vacancy::count() - $top],
                    'backgroundColor' => ['#8B5CF6', '#E5E7EB'],
                    'hoverOffset' => 4,
                ],
            ],
            'labels' => ['Aktiv', 'Deaktiv', 'Premium', 'Adi', 'Önə Çıxan', 'Digər'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
            'scales' => [
                'x' => ['display' => false],
                'y' => ['display' => false],
            ],
        ];
    }
}
