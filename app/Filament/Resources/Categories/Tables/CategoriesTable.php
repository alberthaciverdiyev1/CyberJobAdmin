<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('icon')
                    ->label('İkon')
                    ->formatStateUsing(fn ($record): string => self::renderIcon($record))
                    ->html()
                    ->width(1),

                TextColumn::make('name.az')
                    ->label('Kateqoriya Adı')
                    ->searchable(),
                TextColumn::make('parent.name.az')
                    ->label('Üst Kateqoriya')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                ReplicateAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    private static function renderIcon($record): string
    {
        if (! $record->icon) {
            return '';
        }

        $iconPath = resource_path('icons/blade-fontawesome/solid/' . str_replace('fas-', '', $record->icon) . '.svg');

        if (! file_exists($iconPath)) {
            return '';
        }

        $svg = file_get_contents($iconPath);

        return '<div class="flex items-center justify-center" style="width:24px;height:24px;color:rgb(107,114,128)">'
            . $svg
            . '</div>';
    }
}
