<?php

namespace App\Filament\Widgets;

use App\Models\Vacancy;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestVacancies extends BaseWidget
{
    protected static ?int $sort = 8;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Son Vakansiyalar';

    public function table(Table $table): Table
    {
        return $table
            ->query(Vacancy::with(['company', 'city'])->latest()->limit(10))
            ->columns([
                TextColumn::make('name')
                    ->label('Vakansiya')
                    ->searchable(),
                TextColumn::make('company.name')
                    ->label('Şirkət'),
                TextColumn::make('city.name.az')
                    ->label('Şəhər'),
                TextColumn::make('is_active')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn ($state): string => $state ? 'Aktiv' : 'Deaktiv')
                    ->color(fn ($state): string => $state ? 'success' : 'danger'),
                TextColumn::make('is_premium')
                    ->label('Premium')
                    ->badge()
                    ->formatStateUsing(fn ($state): string => $state ? 'Premium' : '')
                    ->color(fn ($state): string => $state ? 'warning' : ''),
                TextColumn::make('view_count')
                    ->label('Baxış'),
                TextColumn::make('created_at')
                    ->label('Tarix')
                    ->dateTime('d.m.Y'),
            ]);
    }

}
