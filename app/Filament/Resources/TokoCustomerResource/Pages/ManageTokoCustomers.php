<?php

namespace App\Filament\Resources\TokoCustomerResource\Pages;

use App\Filament\Resources\TokoCustomerResource;
use App\Models\TokoCustomer;
use Filament\Actions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Resources\Pages\ManageRecords;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;

class ManageTokoCustomers extends ManageRecords implements HasTable, HasForms
{
    /* use InteractsWithTable; */
    /* use InteractsWithForms; */

    protected static string $resource = TokoCustomerResource::class;


    /* public function table(Table $table): Table */
    /* { */
    /*     return $table */
    /*         ->query(TokoCustomer::query()) */
    /*         ->columns([ */
    /*             TextColumn::make('name'), */
    /*         ]) */
    /*         ->filters([ */
    /*             // ... */
    /*         ]) */
    /*         ->actions([ */
    /*             // ... */
    /*         ]) */
    /*         ->bulkActions([ */
    /*             // ... */
    /*         ]); */
    /* } */
    /**/
    /* public function render(): View */
    /* { */
    /*     return view('toko.customer'); */
    /* } */

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
