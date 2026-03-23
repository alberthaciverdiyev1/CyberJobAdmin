<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->directory('blogs')
                            ->disk('public')
                            ->visibility('public')
                            ->required()
                            ->columnSpanFull(),
                Tabs::make('Diller')
                    ->tabs([
                        self::makeLanguageTab('Azerbaycan', 'az'),
                        self::makeLanguageTab('English', 'en'),
                        self::makeLanguageTab('Rusça', 'ru'),
                    ])
                    ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('Aktif mi?')
                            ->default(true)
                            ->required(),
                    ])->columnSpanFull(),

            ]);
    }


    private static function makeLanguageTab(string $label, string $code): Tabs\Tab
    {
        return Tabs\Tab::make($label)
            ->schema([
                TextInput::make("title.{$code}")
                    ->label("Title ({$label})")
                    ->required($code === 'az'),

                RichEditor::make("description.{$code}")
                    ->label("Description ({$label})")
                    ->required($code === 'az'),
            ]);
    }
}
