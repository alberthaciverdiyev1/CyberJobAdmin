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
                    ->options(fn (): array => self::getFontAwesomeIcons())
                    ->allowHtml()
                    ->native(false)
                    ->searchable()
                    ->columnSpanFull(),
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

    private static function getFontAwesomeIcons(): array
    {
        $path = resource_path('icons/blade-fontawesome/solid');
        $icons = [];

        if (!is_dir($path)) {
            return $icons;
        }

        $files = scandir($path);
        sort($files);

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'svg') {
                $name = pathinfo($file, PATHINFO_FILENAME);
                $value = 'fas-' . $name;

                $svgContent = file_get_contents($path . '/' . $file);
                $label = self::formatIconLabel($name, $svgContent);
                $icons[$value] = $label;
            }
        }

        return $icons;
    }

    private static function formatIconLabel(string $name, string $svg): string
    {
        return '<div class="flex items-center gap-3">'
            . '<span style="width:20px;height:20px;display:inline-flex;align-items:center;color:rgb(107,114,128);flex-shrink:0">'
            . $svg
            . '</span>'
            . '<span>' . self::formatIconName($name) . '</span>'
            . '</div>';
    }

    private static function formatIconName(string $name): string
    {
        return str($name)
            ->replace(['-', '_'], ' ')
            ->title();
    }
}
