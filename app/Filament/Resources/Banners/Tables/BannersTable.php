<?php

namespace App\Filament\Resources\Banners\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BannersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Şəkil')
                    ->square()
                    ->width(60),
                TextColumn::make('location')
                    ->label('Yerləşmə')
                    ->searchable()
                    ->badge()
                    ->color('primary'),
                TextColumn::make('start_at')
                    ->label('Başlama')
                    ->date('d.m.Y')
                    ->sortable(),
                TextColumn::make('expiration_date')
                    ->label('Bitmə')
                    ->date('d.m.Y')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Aktiv')
                    ->boolean(),
                TextColumn::make('link')
                    ->label('Link')
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_desktop')
                    ->label('Masaüstü')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
