<?php

namespace App\Filament\Resources\LegalTermAndUserAgreements;

use App\Filament\Resources\LegalTermAndUserAgreements\Pages\CreateLegalTermAndUserAgreement;
use App\Filament\Resources\LegalTermAndUserAgreements\Pages\EditLegalTermAndUserAgreement;
use App\Filament\Resources\LegalTermAndUserAgreements\Pages\ListLegalTermAndUserAgreements;
use App\Filament\Resources\LegalTermAndUserAgreements\Schemas\LegalTermAndUserAgreementForm;
use App\Filament\Resources\LegalTermAndUserAgreements\Tables\LegalTermAndUserAgreementsTable;
use App\Models\LegalTermAndUserAgreement;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LegalTermAndUserAgreementResource extends Resource
{
    protected static ?string $model = LegalTermAndUserAgreement::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'title->az';

    protected static string|\UnitEnum|null $navigationGroup = 'Məzmun';

    protected static ?string $modelLabel = 'Hüquqi Məlumat';

    protected static ?string $pluralModelLabel = 'Hüquqi Məlumatlar';

    protected static ?string $navigationLabel = 'Hüquqi Məlumatlar';

    public static function form(Schema $schema): Schema
    {
        return LegalTermAndUserAgreementForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LegalTermAndUserAgreementsTable::configure($table);
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
            'index' => ListLegalTermAndUserAgreements::route('/'),
            'create' => CreateLegalTermAndUserAgreement::route('/create'),
            'edit' => EditLegalTermAndUserAgreement::route('/{record}/edit'),
        ];
    }
}
