<?php

namespace App\Filament\Resources\SubscriptionPlans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class SubscriptionPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Dillər')
                    ->tabs([
                        self::makeNameTab('Azərbaycan', 'az'),
                        self::makeNameTab('English', 'en'),
                        self::makeNameTab('Русский', 'ru'),
                    ])->columnSpanFull(),

                TextInput::make('old_price')
                    ->label('Köhnə Qiymət')
                    ->numeric()
                    ->required(),

                TextInput::make('new_price')
                    ->label('Yeni Qiymət')
                    ->numeric()
                    ->required(),

                Section::make('Endirim Tarixi')
                    ->description('Boş buraxılarsa endirimli qiymət hər zaman göstərilir')
                    ->schema([
                        DatePicker::make('discount_start')
                            ->label('Başlama Tarixi'),
                        DatePicker::make('discount_end')
                            ->label('Bitmə Tarixi'),
                    ])->columns(2),

                Select::make('type')
                    ->label('Tip')
                    ->options([
                        'monthly' => 'Aylıq',
                        'yearly' => 'İllik',
                    ])
                    ->required(),

                Toggle::make('is_active')
                    ->label('Aktiv')
                    ->default(true),
            ]);
    }

    private static function makeNameTab(string $label, string $code): Tabs\Tab
    {
        return Tabs\Tab::make($label)
            ->schema([
                TextInput::make("name.{$code}")
                    ->label("Plan Adı ({$label})")
                    ->required($code === 'az')
                    ->placeholder($label . ' dilində ad daxil edin...'),
            ]);
    }
}
