<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('banners')
                    ->visibility('public')
                    ->imageEditor()
                    ->columnSpanFull(),
                Select::make('location')
                    ->options([
                        'small' => 'Balaca',
                        'medium' => 'Orta',
                        'large' => 'Boyuk',
                    ])
                    ->required(),
                TextInput::make('link'),
                DateTimePicker::make('start_at')
                    ->default(now())
                    ->required(),
                DateTimePicker::make('expiration_date')
                    ->default(now()->addDays(30))
                    ->required(),
                Toggle::make('is_active')
                    ->default(true)
                    ->required(),
                Toggle::make('is_desktop')
                    ->required(),
            ]);
    }
}
