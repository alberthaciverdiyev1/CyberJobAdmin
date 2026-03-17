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
                    ->maxLength(255)
                    ->required()
                ->columnSpanFull(),
                TextInput::make('name.en')
                    ->maxLength(255)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('name.ru')
                    ->maxLength(255)
                    ->required()
                    ->columnSpanFull(),

            ]);
    }
}
