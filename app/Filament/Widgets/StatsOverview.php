<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Company;
use App\Models\Vacancy;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    public ?string $pollingInterval = null;

    protected function getStats(): array
    {
        $now = now();
        $weekStart = $now->copy()->startOfWeek();
        $prevWeekStart = $weekStart->copy()->subWeek();
        $prevWeekEnd = $weekStart->copy()->subDay()->endOfDay();

        // -- Ümumi Baxış (Impressions) --
        $totalViews = Vacancy::sum('view_count');
        $viewsThisWeek = Vacancy::where('updated_at', '>=', $weekStart)->sum('view_count');
        $viewsPrevWeek = Vacancy::whereBetween('updated_at', [$prevWeekStart, $prevWeekEnd])->sum('view_count');
        $viewsTrend = $this->trend($viewsThisWeek, $viewsPrevWeek);

        // -- Vakansiyalar --
        $activeVacancies = Vacancy::where('is_active', true)->count();
        $newThisWeek = Vacancy::where('created_at', '>=', $weekStart)->count();
        $newPrevWeek = Vacancy::whereBetween('created_at', [$prevWeekStart, $prevWeekEnd])->count();
        $newTrend = $this->trend($newThisWeek, $newPrevWeek);

        // -- Müraciət imkanı (email/url olan vakansiyalar) --
        $withEmail = Vacancy::whereNotNull('email')->where('email', '!=', '')->count();
        $withUrl = Vacancy::whereNotNull('application_url')->where('application_url', '!=', '')->count();
        $totalApps = $withEmail + $withUrl;

        // -- Şirkətlər --
        $totalCompanies = Company::count();
        $verifiedCompanies = Company::where('is_verified', true)->count();
        $companiesThisWeek = Company::where('created_at', '>=', $weekStart)->count();
        $companiesPrevWeek = Company::whereBetween('created_at', [$prevWeekStart, $prevWeekEnd])->count();
        $companiesTrend = $this->trend($companiesThisWeek, $companiesPrevWeek);

        // -- Bloq --
        $totalBlogReads = Blog::sum('read_count');
        $blogReadsThisWeek = Blog::where('updated_at', '>=', $weekStart)->sum('read_count');
        $blogReadsPrevWeek = Blog::whereBetween('updated_at', [$prevWeekStart, $prevWeekEnd])->sum('read_count');
        $blogTrend = $this->trend($blogReadsThisWeek, $blogReadsPrevWeek);

        // Premium
        $premiumCount = Vacancy::where('is_premium', true)->count();
        $premiumThisWeek = Vacancy::where('is_premium', true)->where('created_at', '>=', $weekStart)->count();
        $premiumPrevWeek = Vacancy::where('is_premium', true)->whereBetween('created_at', [$prevWeekStart, $prevWeekEnd])->count();
        $premiumTrend = $this->trend($premiumThisWeek, $premiumPrevWeek);

        // 7-day view sparkline
        $viewsChart = collect(range(6, 0))->map(fn ($d) =>
            Vacancy::whereDate('updated_at', $now->copy()->subDays($d))->sum('view_count')
        )->toArray();

        // 7-day vacancy creation sparkline
        $vacancyChart = collect(range(6, 0))->map(fn ($d) =>
            Vacancy::whereDate('created_at', $now->copy()->subDays($d))->count()
        )->toArray();

        // 7-day premium trend
        $premiumChart = collect(range(6, 0))->map(fn ($d) =>
            Vacancy::where('is_premium', true)->whereDate('created_at', $now->copy()->subDays($d))->count()
        )->toArray();

        return [
            Stat::make('Ümumi Baxış', number_format($totalViews))
                ->description($this->trendText($viewsTrend, 'bu həftə'))
                ->descriptionIcon($viewsTrend >= 0 ? 'heroicon-o-arrow-trending-up' : 'heroicon-o-arrow-trending-down')
                ->chart($viewsChart)
                ->color($viewsTrend >= 0 ? 'success' : 'danger'),

            Stat::make('Aktiv Vakansiyalar', $activeVacancies)
                ->description($this->trendText($newTrend, 'yeni, bu həftə'))
                ->descriptionIcon('heroicon-o-briefcase')
                ->chart($vacancyChart)
                ->color('primary'),

            Stat::make('Müraciət İmkanı', $totalApps)
                ->description('E-poçt: ' . $withEmail . ' | Link: ' . $withUrl)
                ->descriptionIcon('heroicon-o-document-text')
                ->color('warning'),

            Stat::make('Şirkətlər', $totalCompanies)
                ->description($this->trendText($companiesTrend, 'yeni') . ' | Təsdiq: ' . $verifiedCompanies)
                ->descriptionIcon('heroicon-o-building-office')
                ->color('info'),

            Stat::make('Bloq Oxunmaları', number_format($totalBlogReads))
                ->description($this->trendText($blogTrend, 'bu həftə'))
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('gray'),

            Stat::make('Premium Vakansiyalar', $premiumCount)
                ->description($this->trendText($premiumTrend, 'yeni, bu həftə'))
                ->descriptionIcon('heroicon-o-star')
                ->chart($premiumChart)
                ->color('danger'),
        ];
    }

    private function trend(float|int $current, float|int $previous): float
    {
        if ($previous === 0) {
            return $current > 0 ? 100 : 0;
        }
        return round((($current - $previous) / $previous) * 100, 1);
    }

    private function trendText(float $trend, string $label): string
    {
        $sign = $trend > 0 ? '+' : '';
        return "{$sign}{$trend}% {$label}";
    }

}
