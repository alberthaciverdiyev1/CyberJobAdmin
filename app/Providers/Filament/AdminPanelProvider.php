<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\CityDistributionChart;
use App\Filament\Widgets\CompanyGrowthChart;
use App\Filament\Widgets\ExpiringVacancies;
use App\Filament\Widgets\LatestVacancies;
use App\Filament\Widgets\MonthlyVacancyChart;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\StatusDoughnutChart;
use App\Filament\Widgets\VacancyCategoryChart;
use App\Filament\Widgets\VacancyTrendChart;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->login()
            ->brandName('CyberJob')
            ->darkMode(false)
            ->breadcrumbs(false)
            ->colors([
                'primary' => Color::hex('#2563EB'),
                'gray' => Color::Slate,
                'danger' => Color::Rose,
                'info' => Color::Cyan,
                'success' => Color::Emerald,
                'warning' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                StatsOverview::class,
                VacancyTrendChart::class,
                VacancyCategoryChart::class,
                CityDistributionChart::class,
                MonthlyVacancyChart::class,
                StatusDoughnutChart::class,
                CompanyGrowthChart::class,
                ExpiringVacancies::class,
                LatestVacancies::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
