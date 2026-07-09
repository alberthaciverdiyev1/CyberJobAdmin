<?php

namespace App\Filament\Resources\Faqs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class FaqsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('question.az')
                    ->label('Sual')
                    ->searchable()
                    ->words(10),
                TextColumn::make('answer.az')
                    ->label('Cavab')
                    ->searchable()
                    ->words(15),
                TextColumn::make('type')
                    ->label('Tip')
                    ->formatStateUsing(fn ($state): string => match ($state) {
                        'service' => 'Xidmətlər',
                        'rating' => 'Reytinq',
                        default => $state,
                    })
                    ->badge()
                    ->color(fn ($state): string => match ($state) {
                        'service' => 'success',
                        'rating' => 'warning',
                        default => 'gray',
                    }),
            ])
            ->filters([
                TrashedFilter::make(),
                SelectFilter::make('type')
                    ->label('Tip')
                    ->options([
                        'service' => 'Xidmətlər',
                        'rating' => 'Reytinq',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
