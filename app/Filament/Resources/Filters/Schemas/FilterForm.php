<?php

namespace App\Filament\Resources\Filters\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FilterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.az')->label('Name (AZ)')->required()->columnSpanFull(),
                TextInput::make('name.en')->label('Name (EN)')->required()->columnSpanFull(),
                TextInput::make('name.ru')->label('Name (RU)')->required()->columnSpanFull(),
                TextInput::make('key')->required(),
            ]);
    }
}
