<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\Select;
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
                            ->label('Sual (AZ)')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('answer.az')
                            ->label('Cavab (AZ)')
                            ->required()->columnSpanFull(),
                    ]),
                    Tabs\Tab::make('EN')->schema([
                        TextInput::make('question.en')
                            ->maxLength(255)
                            ->label('Sual (EN)')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('answer.en')
                            ->label('Cavab (EN)')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                    Tabs\Tab::make('RU')->schema([
                        TextInput::make('question.ru')
                            ->maxLength(255)
                            ->label('Sual (RU)')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('answer.ru')
                            ->required()
                            ->label('Cavab (RU)')
                            ->columnSpanFull(),
                    ])

                ])->columnSpanFull(),

                Select::make('type')
                    ->label('Tip')
                    ->options([
                        'service' => 'Xidmətlər',
                        'rating' => 'Reytinq',
                    ])
                    ->default('service')
                    ->required(),
            ]);
    }
}
