<?php

namespace App\Filament\Resources\SubscriptionPlanOptions\Pages;

use App\Filament\Resources\SubscriptionPlanOptions\SubscriptionPlanOptionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSubscriptionPlanOption extends EditRecord
{
    protected static string $resource = SubscriptionPlanOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
