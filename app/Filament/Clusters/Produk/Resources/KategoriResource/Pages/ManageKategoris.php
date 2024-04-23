<?php

namespace App\Filament\Clusters\Produk\Resources\KategoriResource\Pages;

use App\Filament\Clusters\Produk\Resources\KategoriResource;
use App\Filament\Imports\KategoriImporter;
use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ManageRecords;

class ManageKategoris extends ManageRecords
{
    protected static string $resource = KategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->importer(KategoriImporter::class)
        ];
    }
}
