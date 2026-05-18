<?php

namespace App\Filament\Resources\Categories\Tables;

use App\Filament\Resources\Categories\Schemas\CategoryForm;
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
                    ->html(),

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
        if ($record->icon_custom) {
            return $record->icon_custom;
        }

        return CategoryForm::getIconHtml($record->icon);
    }
}
