<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('partners')
                    ->visibility('public')
                    ->required()
                ->columnSpanFull(),
                TextInput::make('link'),
                Toggle::make('is_active')
                    ->default(true)
                    ->required(),
            ]);
    }
}
