<?php

namespace App\Filament\Resources\TokoProdukResource\Pages;

use App\Filament\Resources\TokoProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTokoProduks extends ManageRecords
{
    protected static string $resource = TokoProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
