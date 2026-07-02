<?php

namespace App\Filament\Resources\LegalTermAndUserAgreements\Pages;

use App\Filament\Resources\LegalTermAndUserAgreements\LegalTermAndUserAgreementResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLegalTermAndUserAgreement extends EditRecord
{
    protected static string $resource = LegalTermAndUserAgreementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
