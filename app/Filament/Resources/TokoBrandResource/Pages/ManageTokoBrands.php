<?php

namespace App\Filament\Resources\TokoBrandResource\Pages;

use App\Filament\Resources\TokoBrandResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTokoBrands extends ManageRecords
{
    protected static string $resource = TokoBrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
