<?php

namespace App\Filament\Resources\Subscribes\Pages;

use App\Filament\Resources\Subscribes\SubscribeResource;
use Filament\Resources\Pages\ViewRecord;

class ViewSubscribe extends ViewRecord
{
    protected static string $resource = SubscribeResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
