<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('icon')
                    ->label('İkon')
                    ->formatStateUsing(fn ($record): ?HtmlString => self::renderIcon($record))
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

    private static function renderIcon($record): ?HtmlString
    {
        if (! $record->icon) {
            return null;
        }

        $iconName = str_replace('fas-', '', $record->icon);
        $iconPath = resource_path('icons/blade-fontawesome/solid/' . $iconName . '.svg');

        if (! file_exists($iconPath)) {
            return new HtmlString(e($record->icon));
        }

        $svg = file_get_contents($iconPath);

        // Add explicit width/height so the SVG renders inline properly
        $svg = str_replace(
            '<svg',
            '<svg width="24" height="24"',
            $svg,
        );

        return new HtmlString($svg);
    }
}
