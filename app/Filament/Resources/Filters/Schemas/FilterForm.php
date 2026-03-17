<?php

namespace App\Filament\Resources\Filters\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class FilterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        Tabs::make('Dillər')
                            ->tabs([
                                Tabs\Tab::make('Azərbaycan')
                                    ->schema([
                                        TextInput::make('name.az')
                                            ->label('Ad (AZ)')
                                            ->required()
                                            ->placeholder('Məsələn: Rəng'),
                                    ]),
                                Tabs\Tab::make('English')
                                    ->schema([
                                        TextInput::make('name.en')
                                            ->label('Ad (EN)')
                                            ->placeholder('Məsələn: Color'),
                                    ]),
                                Tabs\Tab::make('Русский')
                                    ->schema([
                                        TextInput::make('name.ru')
                                            ->label('Ad (RU)')
                                            ->placeholder('Məsələn: Цвет'),
                                    ]),
                            ]),

                        Grid::make(2)
                        ->schema([
                            TextInput::make('key')
                                ->label('Filtr Kodu (Key)')
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->placeholder('color, size...'),

                            Select::make('parent_id')
                                ->label('Üst Filtr')
                                ->relationship(
                                    name: 'parent',
                                    titleAttribute: 'name->az',
                                    modifyQueryUsing: fn ($query, $record) => $query
                                        ->whereNull('parent_id')
                                        ->when($record, fn ($q) => $q->where('id', '!=', $record->id))
                                )
                                ->placeholder('Əsas filtr olaraq təyin et')
                                ->searchable()
                                ->preload()
                        ]),
                    ]),
            ]);
    }
}
