<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Guava\IconPicker\Forms\Components\IconPicker;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                    Tabs::make('Diller')
                        ->tabs([
                            self::makeLanguageTab('Azerbaycan', 'az'),
                            self::makeLanguageTab('English', 'en'),
                            self::makeLanguageTab('Rusça', 'ru'),
                        ])->columnSpanFull(),


                            Select::make('parent_id')
                                ->label('Üst Kategori')
                                ->relationship('parent', 'name->az')
                                ->placeholder('Ana Kategori Olarak Belirle')
                                ->searchable()
                                ->preload(),

                IconPicker::make('icon')
                    ->label('Kategori İkonu')
                    ->sets(['fontawesome-regular']) // Sadece FontAwesome Regular ikonlarını yükler
                    ->gridSearchResults()
                    ->searchable()
            ]);
    }

    private static function makeLanguageTab(string $label, string $code): Tabs\Tab
    {
        return Tabs\Tab::make($label)
            ->schema([
                TextInput::make("name.{$code}")
                    ->label("Kategori Adı ({$label})")
                    ->required($code === 'az')
                    ->placeholder($label . ' dilinde isim girin...'),
            ]);
    }
}
