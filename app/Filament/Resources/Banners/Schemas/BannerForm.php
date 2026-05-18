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
                    ->label('Yerləşmə')
                    ->options([
                        'small' => 'Vakansiya Səhifəsi',
                        'medium' => 'Ana Səhifə (3)',
                        'large' => 'Uzun Banner',
                    ])
                    ->required(),
                TextInput::make('link')
                    ->label('Link'),
                DateTimePicker::make('start_at')
                    ->label('Başlama Tarixi')
                    ->default(now())
                    ->required(),
                DateTimePicker::make('expiration_date')
                    ->label('Bitmə Tarixi')
                    ->default(now()->addDays(30))
                    ->required(),
                Toggle::make('is_active')
                    ->label('Aktiv')
                    ->default(true)
                    ->required(),
                Toggle::make('is_desktop')
                    ->label('Masaüstü üçün')
                    ->required(),
            ]);
    }
}
