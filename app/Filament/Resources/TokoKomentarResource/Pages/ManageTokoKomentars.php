<?php

namespace App\Filament\Resources\TokoKomentarResource\Pages;

use App\Filament\Resources\TokoKomentarResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTokoKomentars extends ManageRecords
{
    protected static string $resource = TokoKomentarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
