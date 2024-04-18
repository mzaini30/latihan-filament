<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TokoOrderResource\Pages;
use App\Filament\Resources\TokoOrderResource\RelationManagers;
use App\Models\TokoOrder;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TokoOrderResource extends Resource
{
    protected static ?string $model = TokoOrder::class;

    protected static ?string $navigationGroup = 'Toko';
    protected static ?string $slug = 'toko/order';
    protected static ?string $pluralModelLabel = 'Order';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('Order Details')
                        ->schema([
                            Forms\Components\TextInput::make('nomor'),

                            Forms\Components\TextInput::make('customer'),
                            Forms\Components\TextInput::make('status'),
                            Forms\Components\TextInput::make('mata_uang'),
                            Forms\Components\TextInput::make('negara'),
                            Forms\Components\TextInput::make('jalan'),
                            Forms\Components\TextInput::make('kota'),
                            Forms\Components\TextInput::make('provinsi'),
                        ]),
                    Step::make('Order Items')
                        ->schema([]),

                ])
                    ->columnSpanFull()
                /*
                Forms\Components\TextInput::make('harga_total')
                    ->numeric(),
                Forms\Components\TextInput::make('ongkir')
                    ->numeric(),
                Forms\Components\TextInput::make('tanggal_pemesanan')
                    ->numeric(),*/
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mata_uang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga_total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ongkir')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_pemesanan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTokoOrders::route('/'),
        ];
    }
}
