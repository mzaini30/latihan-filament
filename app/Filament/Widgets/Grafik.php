<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class Grafik extends ChartWidget
{
    protected static bool $isLazy = false;

    protected static ?string $heading = 'Orders per month';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [

                    'label' => 'Orders',
                    'data' => [10, 20, 30, 15, 10, 20, 15, 20, 30, 20, 15, 20],
                ]
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
