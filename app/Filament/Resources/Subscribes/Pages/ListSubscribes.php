<?php

namespace App\Filament\Resources\Subscribes\Pages;

use App\Filament\Resources\Subscribes\SubscribeResource;
use Filament\Resources\Pages\ListRecords;

class ListSubscribes extends ListRecords
{
    protected static string $resource = SubscribeResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
