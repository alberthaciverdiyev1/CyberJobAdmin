<?php

namespace App\Filament\Resources\Vacancies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class VacanciesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Vakansiya')
                    ->searchable()
                    ->words(6),
                TextColumn::make('company.name')
                    ->label('Şirkət')
                    ->searchable()
                    ->words(4),
                TextColumn::make('salary')
                    ->label('Maaş')
                    ->state(function ($record): string {
                        if (!$record->min_salary && !$record->max_salary) {
                            return 'Razılaşma ilə';
                        }
                        return ($record->min_salary ?? '0') . ' - ' . ($record->max_salary ?? '...');
                    })
                    ->badge()
                    ->color('success'),
                ToggleColumn::make('is_active')
                    ->label('Aktiv')
                    ->onColor('success')
                    ->offColor('danger'),
                ToggleColumn::make('is_premium')
                    ->label('Premium')
                    ->onColor('warning')
                    ->offColor('gray'),
                TextColumn::make('expire_date')
                    ->label('Bitmə')
                    ->date('d.m.Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('category.name.az')
                    ->label('Kateqoriya')
                    ->badge()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('view_count')
                    ->label('Baxış')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ToggleColumn::make('is_bring_top')
                    ->label('Önə çıxarılan')
                    ->onColor('info')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email')
                    ->label('Email')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('application_url')
                    ->label('Müraciət Linki')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->limit(30),
            ])
            ->filters([])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
