<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class Grafik2 extends ChartWidget
{
    protected static bool $isLazy = false;
    protected static ?string $heading = 'Total Customers';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Customers',
                    'data' => [12, 31, 42, 1, 23, 42, 53, 12, 23, 55, 44, 91]
                ]
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des',]
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
