<?php

namespace App\Filament\Resources\SubscriptionPlanOptions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class SubscriptionPlanOptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('subscription_plan_id')
                    ->label('Plan')
                    ->relationship('plan', 'name->az')
                    ->searchable()
                    ->preload()
                    ->required(),

                \Filament\Forms\Components\Toggle::make('is_active')
                    ->label('Aktiv')
                    ->default(true),

                Tabs::make('Dillər')
                    ->tabs([
                        self::makeLanguageTab('Azərbaycan', 'az'),
                        self::makeLanguageTab('English', 'en'),
                        self::makeLanguageTab('Русский', 'ru'),
                    ])->columnSpanFull(),
            ]);
    }

    private static function makeLanguageTab(string $label, string $code): Tabs\Tab
    {
        return Tabs\Tab::make($label)
            ->schema([
                TextInput::make("name.{$code}")
                    ->label("Opsiya Adı ({$label})")
                    ->required($code === 'az')
                    ->placeholder($label . ' dilində ad daxil edin...'),
            ]);
    }
}
