<?php

namespace App\Filament\Resources\LegalTermAndUserAgreements\Pages;

use App\Filament\Resources\LegalTermAndUserAgreements\LegalTermAndUserAgreementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLegalTermAndUserAgreements extends ListRecords
{
    protected static string $resource = LegalTermAndUserAgreementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
