<?php

namespace App\Filament\Resources\SubscriptionPlanOptions\Pages;

use App\Filament\Resources\SubscriptionPlanOptions\SubscriptionPlanOptionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubscriptionPlanOptions extends ListRecords
{
    protected static string $resource = SubscriptionPlanOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
