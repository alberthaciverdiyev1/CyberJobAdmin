<?php

namespace App\Filament\Resources\Filters\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\RestoreAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FiltersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name.az')
                    ->label('Filtr Adı')
                    ->searchable()
                    ->formatStateUsing(fn ($state, $record) =>
                    $record->parent_id ? "    ↳ {$state}" : "● {$state}"
                    )
                    ->weight(fn ($record) => $record->parent_id ? 'normal' : 'bold')
                    ->color(fn ($record) => $record->parent_id ? 'gray' : 'primary'),

                TextColumn::make('key')
                    ->label('Kod (Key)')
                    ->searchable()
                    ->fontFamily('mono')
                    ->toggleable(),

                TextColumn::make('parent.name.az')
                    ->label('Aid Olduğu Filtr')
                    ->placeholder('Əsas Filtr')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->defaultSort(fn ($query) =>
            $query->orderByRaw('COALESCE(parent_id, id) ASC, parent_id IS NOT NULL ASC, id ASC')
            )
            ->filters([
                SelectFilter::make('type')
                    ->label('Filtr Növü')
                    ->options([
                        'parent' => 'Yalnız Əsas Filtrlər',
                        'child' => 'Yalnız Alt Seçimlər',
                    ])
                    ->query(function ($query, array $data) {
                        if ($data['value'] === 'parent') return $query->whereNull('parent_id');
                        if ($data['value'] === 'child') return $query->whereNotNull('parent_id');
                    })
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
            ]);
    }
}
