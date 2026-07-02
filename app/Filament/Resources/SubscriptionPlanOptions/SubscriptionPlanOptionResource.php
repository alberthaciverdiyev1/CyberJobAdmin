<?php

namespace App\Filament\Resources\SubscriptionPlanOptions;

use App\Filament\Resources\SubscriptionPlanOptions\Pages\CreateSubscriptionPlanOption;
use App\Filament\Resources\SubscriptionPlanOptions\Pages\EditSubscriptionPlanOption;
use App\Filament\Resources\SubscriptionPlanOptions\Pages\ListSubscriptionPlanOptions;
use App\Filament\Resources\SubscriptionPlanOptions\Schemas\SubscriptionPlanOptionForm;
use App\Filament\Resources\SubscriptionPlanOptions\Tables\SubscriptionPlanOptionsTable;
use App\Models\SubscriptionPlanOption;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SubscriptionPlanOptionResource extends Resource
{
    protected static ?string $model = SubscriptionPlanOption::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;

    protected static ?string $recordTitleAttribute = 'name->az';

    protected static string|\UnitEnum|null $navigationGroup = 'Abunəliklər';

    protected static ?string $modelLabel = 'Plan Opsiyası';

    protected static ?string $pluralModelLabel = 'Plan Opsiyaları';

    protected static ?string $navigationLabel = 'Plan Opsiyaları';

    public static function form(Schema $schema): Schema
    {
        return SubscriptionPlanOptionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubscriptionPlanOptionsTable::configure($table);
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
            'index' => ListSubscriptionPlanOptions::route('/'),
            'create' => CreateSubscriptionPlanOption::route('/create'),
            'edit' => EditSubscriptionPlanOption::route('/{record}/edit'),
        ];
    }
}
