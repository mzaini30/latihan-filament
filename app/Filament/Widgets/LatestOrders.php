<?php

namespace App\Filament\Widgets;

use App\Models\TokoOrder;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    protected int | string | array $columnSpan = 2;

    protected static bool $isLazy = false;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                TokoOrder::query()
            )
            ->columns([
                Tables\Columns\TextColumn::make('order_date'),
                Tables\Columns\TextColumn::make('number'),
                Tables\Columns\TextColumn::make('customer'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('currency'),
                Tables\Columns\TextColumn::make('total_price'),
                Tables\Columns\TextColumn::make('shipping_cost'),
            ]);
    }
}
