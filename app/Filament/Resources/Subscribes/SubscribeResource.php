<?php

namespace App\Filament\Resources\Subscribes;

use App\Filament\Resources\Subscribes\Pages\ListSubscribes;
use App\Filament\Resources\Subscribes\Pages\ViewSubscribe;
use App\Filament\Resources\Subscribes\Tables\SubscribesTable;
use App\Models\Subscribe;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SubscribeResource extends Resource
{
    protected static ?string $model = Subscribe::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?string $recordTitleAttribute = 'email';

    protected static string|\UnitEnum|null $navigationGroup = 'Məzmun';

    protected static ?string $modelLabel = 'Abunə';

    protected static ?string $pluralModelLabel = 'Abunələr';

    protected static ?string $navigationLabel = 'Abunələr';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->label('Email'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return SubscribesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSubscribes::route('/'),
            'view' => ViewSubscribe::route('/{record}'),
        ];
    }
}
