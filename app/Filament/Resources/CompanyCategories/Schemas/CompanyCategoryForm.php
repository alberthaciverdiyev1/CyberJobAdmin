<?php

namespace App\Filament\Resources\CompanyCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class CompanyCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.az')
                    ->maxLength(255)
//                    ->unique(ignoreRecord: true)
                    ->columnSpanFull()
                    ->label('Ad (AZ)')
                    ->required(),
                TextInput::make('name.en')
                    ->label('Name (EN)')
                    ->maxLength(255)
//                    ->unique(ignoreRecord: true)
                    ->columnSpanFull(),
                TextInput::make('name.ru')
                    ->label('Имя (RU)')
                    ->maxLength(255)
//                    ->unique(ignoreRecord: true)
                    ->columnSpanFull(),
            ]);
    }
}
