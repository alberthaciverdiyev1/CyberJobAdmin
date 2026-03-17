<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Şirkət Məlumatları')
                    ->schema([
                        Grid::make(3)->schema([
                        TextInput::make('name')
                            ->label('Şirkət Adı')
                            ->required(),
                            TextInput::make('email')
                                ->email()
                                ->required(),
                            TextInput::make('phone')->tel(),
                            Textarea::make('address')->label('Ünvan')->columnSpanFull(),

                        ]),

                        Tabs::make('Haqqında')
                            ->tabs([
                                Tabs\Tab::make('Azərbaycan')->schema([
                                    RichEditor::make('about.az')
                                        ->label(false)
                                        ->extraInputAttributes(['style' => 'min-height: 20rem; max-height: 50vh; overflow-y: auto;'])
                                        ->placeholder('Şirkət haqqında ətraflı məlumat yazın...')
                                        ->columnSpanFull(),
                                ]),
                                Tabs\Tab::make('English')->schema([
                                    RichEditor::make('about.en')
                                        ->extraInputAttributes(['style' => 'min-height: 20rem; max-height: 50vh; overflow-y: auto;'])
                                        ->columnSpanFull(),
                                ]),
                                Tabs\Tab::make('Русский')->schema([
                                    RichEditor::make('about.ru')
                                        ->extraInputAttributes(['style' => 'min-height: 20rem; max-height: 50vh; overflow-y: auto;'])
                                        ->columnSpanFull(),
                                ]),
                            ])
                            ->columnSpanFull(),

                    ])->columnSpanFull(),

                Section::make('Media Bölməsi')
                    ->schema([
                        Grid::make(2)
                        ->schema([
                            FileUpload::make('logo')
                                ->label('Şirkət Logosu')
                                ->image()
                                ->directory('companies/logos'),

                            FileUpload::make('banner_image')
                                ->label('Banner Şəkli')
                                ->image()
                                ->directory('companies/banners'),
                        ])
                    ])
                    ->columnSpanFull(),


                Section::make('Status və Ayarlar')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Select::make('category_id')
                                    ->label('Kateqoriya')
                                    ->relationship('category', 'name->az')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Toggle::make('is_verified')
                                    ->label('Təsdiqlənmiş')
                                    ->onColor('success')
                                    ->extraAttributes(['class' => 'mt-8']),

                                Toggle::make('is_active')
                                    ->label('Aktiv')
                                    ->default(true)
                                    ->extraAttributes(['class' => 'mt-8']),
                            ])
                    ])->columnSpanFull(),
            ]);
    }
}
