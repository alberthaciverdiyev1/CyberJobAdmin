<?php

namespace App\Filament\Resources\LegalTermAndUserAgreements\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class LegalTermAndUserAgreementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
                    ->label('Tip')
                    ->options([
                        'terms' => 'İstifadəçi Razılaşması',
                        'privacy' => 'Məxfilik Siyasəti',
                    ])
                    ->required(),

                Toggle::make('is_active')
                    ->label('Aktiv')
                    ->default(true),

                Tabs::make()->schema([
                    Tabs\Tab::make('AZ')->schema([
                        TextInput::make('title.az')
                            ->label('Başlıq (AZ)')
                            ->required()
                            ->columnSpanFull(),
                        RichEditor::make('content.az')
                            ->label('Məzmun (AZ)')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                    Tabs\Tab::make('EN')->schema([
                        TextInput::make('title.en')
                            ->label('Başlıq (EN)')
                            ->columnSpanFull(),
                        RichEditor::make('content.en')
                            ->label('Məzmun (EN)')
                            ->columnSpanFull(),
                    ]),
                    Tabs\Tab::make('RU')->schema([
                        TextInput::make('title.ru')
                            ->label('Başlıq (RU)')
                            ->columnSpanFull(),
                        RichEditor::make('content.ru')
                            ->label('Məzmun (RU)')
                            ->columnSpanFull(),
                    ]),
                ])->columnSpanFull(),
            ]);
    }
}
