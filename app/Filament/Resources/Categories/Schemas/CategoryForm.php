<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Guava\IconPicker\Forms\Components\IconPicker;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Dillər')
                    ->tabs([
                        self::makeLanguageTab('Azərbaycan', 'az'),
                        self::makeLanguageTab('English', 'en'),
                        self::makeLanguageTab('Русский', 'ru'),
                    ])->columnSpanFull(),

                Select::make('parent_id')
                    ->label('Üst Kateqoriya')
                    ->relationship('parent', 'name->az')
                    ->placeholder('Ana Kateqoriya Olaraq Təyin Et')
                    ->searchable()
                    ->preload(),

                IconPicker::make('icon')
                    ->label('İkon')
                    ->sets(['fontawesome-solid'])
                    ->searchable()
                    ->columnSpanFull(),

                TextInput::make('icon_custom')
                    ->label('və ya əl ilə HTML ikon daxil edin')
                    ->placeholder('Məsələn: <i class="fa-solid fa-code"></i>')
                    ->columnSpanFull()
                    ->helperText('İkon seçicidə olmayan xüsusi bir ikon əlavə etmək üçün HTML kodunu yazın'),
            ]);
    }

    private static function makeLanguageTab(string $label, string $code): Tabs\Tab
    {
        return Tabs\Tab::make($label)
            ->schema([
                TextInput::make("name.{$code}")
                    ->label("Kateqoriya Adı ({$label})")
                    ->required($code === 'az')
                    ->placeholder($label . ' dilində ad daxil edin...'),
            ]);
    }
}
