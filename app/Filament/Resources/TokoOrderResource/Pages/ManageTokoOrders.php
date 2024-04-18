<?php

namespace App\Filament\Resources\TokoOrderResource\Pages;

use App\Filament\Resources\TokoOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTokoOrders extends ManageRecords
{
    protected static string $resource = TokoOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
