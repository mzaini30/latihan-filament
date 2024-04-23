<?php

namespace App\Filament\Clusters\Produk\Resources\TokoProdukResource\Pages;

use App\Filament\Clusters\Produk\Resources\TokoProdukResource;
use App\Filament\Clusters\Produk\Resources\TokoProdukResource\Widgets\StatistikProduk;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTokoProduks extends ManageRecords
{
    protected static string $resource = TokoProdukResource::class;
    protected function getHeaderWidgets(): array
    {
        return [
            StatistikProduk::class
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
