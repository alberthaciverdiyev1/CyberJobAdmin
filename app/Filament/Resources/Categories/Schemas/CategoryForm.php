<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

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

                Select::make('icon')
                    ->label('İkon')
                    ->options(self::getIconOptions())
                    ->searchable()
                    ->native(false)
                    ->allowHtml()
                    ->columnSpanFull(),

                TextInput::make('icon_custom')
                    ->label('və ya əl ilə ikon sinifi daxil edin')
                    ->placeholder('Məsələn: <i class="fa-solid fa-code"></i>')
                    ->columnSpanFull()
                    ->helperText('İstədiyiniz HTML ikon kodunu yazın'),
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

    private static function getIconOptions(): array
    {
        $options = [];
        foreach (self::getIconMap() as $key => [$html, $label]) {
            $options[$key] = $html . ' ' . $label;
        }
        return $options;
    }

    private static function getIconMap(): array
    {
        return [
            'code' => ['<i class="fa-solid fa-code"></i>', 'Kodlaşdırma'],
            'database' => ['<i class="fa-solid fa-database"></i>', 'Məlumat Bazası'],
            'globe' => ['<i class="fa-solid fa-globe"></i>', 'Veb / İnternet'],
            'server' => ['<i class="fa-solid fa-server"></i>', 'Server'],
            'network' => ['<i class="fa-solid fa-network-wired"></i>', 'Şəbəkə'],
            'security' => ['<i class="fa-solid fa-shield-halved"></i>', 'Təhlükəsizlik'],
            'cloud' => ['<i class="fa-solid fa-cloud"></i>', 'Cloud / Bulud'],
            'mobile' => ['<i class="fa-solid fa-mobile-screen-button"></i>', 'Mobil'],
            'design' => ['<i class="fa-solid fa-pen-ruler"></i>', 'Dizayn'],
            'analytics' => ['<i class="fa-solid fa-chart-line"></i>', 'Analitika'],
            'ai' => ['<i class="fa-solid fa-brain"></i>', 'Süni Zəka'],
            'robot' => ['<i class="fa-solid fa-robot"></i>', 'Robotexnika'],
            'cogs' => ['<i class="fa-solid fa-gears"></i>', 'Ayarlar / Konfiqurasiya'],
            'paint' => ['<i class="fa-solid fa-palette"></i>', 'İnterfeys / UI'],
            'chart' => ['<i class="fa-solid fa-chart-bar"></i>', 'Qrafik / Hesabat'],
            'envelope' => ['<i class="fa-solid fa-envelope"></i>', 'E-poçt / Mesajlaşma'],
            'shopping' => ['<i class="fa-solid fa-cart-shopping"></i>', 'E-ticarət'],
            'camera' => ['<i class="fa-solid fa-camera"></i>', 'Multimedia'],
            'support' => ['<i class="fa-solid fa-headset"></i>', 'Dəstək / Yardım'],
            'education' => ['<i class="fa-solid fa-graduation-cap"></i>', 'Təhsil / Kurs'],
        ];
    }

    public static function getIconHtml(?string $icon): string
    {
        $map = collect(self::getIconMap())->mapWithKeys(fn ($item, $key) => [$key => $item[0]]);

        return $map[$icon] ?? $icon ?? '';
    }
}
