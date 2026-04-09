<?php

namespace App\Filament\Resources\Vacancies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
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
                    ->label('Ad')
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('view_count')
                    ->label("Baxış Sayı")
                    ->numeric()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('expire_date')
                    ->dateTime()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('salary')
                    ->label('Maaş')
                    ->state(function ($record): string {
                        if (!$record->min_salary && !$record->max_salary) {
                            return 'Razılaşma ilə';
                        }
                        return ($record->min_salary ?? '0') . ' - ' . ($record->max_salary ?? '...');
                    })
                    ->badge()
                    ->color('success')
                    ->toggleable()
                    ->sortable(['min_salary']),

                TextColumn::make('company.name')
                    ->label("Şirkət")
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('category.name.az')
                    ->label('Kateqoriya')
                    ->toggleable()
                    ->searchable(),
                ToggleColumn::make('is_active')
                    ->label('Status')
                    ->onColor('success')
                    ->offColor('danger')
                    ->toggleable(isToggledHiddenByDefault: true),

                ToggleColumn::make('is_premium')
                    ->label('Premium')
                    ->onColor('warning')
                    ->offColor('gray'),

                ToggleColumn::make('is_bring_top')
                    ->label('Önə çıxarılan')
                    ->onColor('info')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
                ViewAction::make(),
                DeleteAction::make(),
                ReplicateAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
