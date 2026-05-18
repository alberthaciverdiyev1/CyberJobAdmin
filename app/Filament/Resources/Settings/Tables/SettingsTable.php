<?php

namespace App\Filament\Resources\Settings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('site_name')
                    ->label('Sayt Adı')
                    ->searchable(),
                TextColumn::make('mail')
                    ->label('E-poçt')
                    ->searchable(),
                TextColumn::make('phone_number')
                    ->label('Telefon')
                    ->searchable(),
                TextColumn::make('address')
                    ->label('Ünvan')
                    ->limit(25)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('working_hours')
                    ->label('İş Saatları')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
