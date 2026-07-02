<?php

namespace App\Filament\Resources\SubscriptionPlans\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OptionsRelationManager extends RelationManager
{
    protected static string $relationship = 'options';

    protected static ?string $title = 'Plan Opsiyaları';

    protected static ?string $recordTitleAttribute = 'name->az';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Dillər')
                    ->tabs([
                        Tabs\Tab::make('Azərbaycan')
                            ->schema([
                                TextInput::make('name.az')
                                    ->label('Ad (AZ)')
                                    ->required(),
                            ]),
                        Tabs\Tab::make('English')
                            ->schema([
                                TextInput::make('name.en')
                                    ->label('Ad (EN)'),
                            ]),
                        Tabs\Tab::make('Русский')
                            ->schema([
                                TextInput::make('name.ru')
                                    ->label('Ad (RU)'),
                            ]),
                    ]),
                Toggle::make('is_active')
                    ->label('Aktiv')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name.az')
                    ->label('Ad'),
                IconColumn::make('is_active')
                    ->label('Aktiv')
                    ->boolean(),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
