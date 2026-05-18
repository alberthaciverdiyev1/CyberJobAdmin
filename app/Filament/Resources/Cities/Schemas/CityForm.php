<?php

namespace App\Filament\Resources\Cities\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.az')
                    ->label('Ad (AZ)')
                    ->maxLength(255)
                    ->required()
                ->columnSpanFull(),
                TextInput::make('name.en')
                    ->label('Ad (EN)')
                    ->maxLength(255)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('name.ru')
                    ->label('Ad (RU)')
                    ->maxLength(255)
                    ->required()
                    ->columnSpanFull(),

            ]);
    }
}
