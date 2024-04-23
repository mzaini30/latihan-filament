<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Symfony\Component\CssSelector\Node\FunctionNode;

class AStatistik extends BaseWidget
{
    protected static bool $isLazy = false;
    protected function getStats(): array
    {
        return [
            Stat::make('Revenue', '$411')
                ->chart([
                    1, 3, 1, 2, 4, 2
                ])
                ->color('success')
                ->description('32k increase'),
            Stat::make('New Customers', '41')
                ->chart([
                    6, 13, 4, 23, 23, 2, 1, 1, 1
                ])
                ->color('danger')
                ->description('3% decrease'),
            Stat::make('New Orders', '39')
                ->chart([
                    12, 12, 42, 2, 3, 4, 23, 1
                ])
                ->color('success')
                ->description('7% decrease'),
        ];
    }
}
