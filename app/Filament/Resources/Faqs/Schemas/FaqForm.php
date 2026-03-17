<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()->schema([
                    Tabs\Tab::make('AZ')->schema([
                        TextInput::make('question.az')
                            ->maxLength(255)
                            ->label('Sual')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('answer.az')
                            ->label('Cavab')
                            ->required()->columnSpanFull(),
                    ]),
                    Tabs\Tab::make('EN')->schema([
                        TextInput::make('question.en')
                            ->maxLength(255)
                            ->label('Question')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('answer.en')
                            ->label('Answer')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                    Tabs\Tab::make('RU')->schema([
                        TextInput::make('question.ru')
                            ->maxLength(255)
                            ->label('')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('answer.ru')
                            ->required()
                            ->label('')
                            ->columnSpanFull(),
                    ])

                ])->columnSpanFull(),
            ]);
    }
}
