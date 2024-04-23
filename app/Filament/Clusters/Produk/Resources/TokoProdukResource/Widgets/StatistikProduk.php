<?php

namespace App\Filament\Clusters\Produk\Resources\TokoProdukResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatistikProduk extends BaseWidget
{
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', '10'),
            Stat::make('Produk Inventori', '200'),
            Stat::make('Harga Rata-rata', '100.000'),
        ];
    }
}
