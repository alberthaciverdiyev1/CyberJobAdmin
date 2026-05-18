<?php

namespace App\Filament\Widgets;

use App\Models\Vacancy;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ExpiringVacancies extends BaseWidget
{
    protected static ?int $sort = 9;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Son istifadə müddəti yaxınlaşan vakansiyalar';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Vacancy::with(['company', 'city'])
                    ->where('is_active', true)
                    ->whereNotNull('expire_date')
                    ->where('expire_date', '<=', now()->addDays(7))
                    ->where('expire_date', '>=', now())
                    ->latest('expire_date')
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Vakansiya')
                    ->searchable(),
                TextColumn::make('company.name')
                    ->label('Şirkət'),
                TextColumn::make('city.name.az')
                    ->label('Şəhər'),
                TextColumn::make('expire_date')
                    ->label('Bitmə Tarixi')
                    ->dateTime('d.m.Y')
                    ->color('danger')
                    ->formatStateUsing(fn ($state) => $state ? $state->format('d.m.Y') . ' (' . $state->diffForHumans() . ')' : ''),
            ]);
    }
}
