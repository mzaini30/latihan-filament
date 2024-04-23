<?php

namespace App\Filament\Clusters\Produk\Resources;

use App\Filament\Clusters\Produk;
use App\Filament\Clusters\Produk\Resources\TokoProdukResource\Pages;
use App\Filament\Clusters\Produk\Resources\TokoProdukResource\Widgets\StatistikProduk;
use App\Filament\Resources\TokoProdukResource\RelationManagers;
use App\Models\TokoProduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\NumberConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TokoProdukResource extends Resource
{
    protected static ?string $model = TokoProduk::class;

    protected static ?string $pluralModelLabel = 'Produk';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $cluster = Produk::class;
    public static function getWidgets(): array
    {
        return [
            StatistikProduk::class
        ];
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('brand_id'),
                Forms\Components\TextInput::make('nama'),
                Forms\Components\TextInput::make('slug'),
                Forms\Components\Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('gambar')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('harga_beli')
                    ->numeric(),
                Forms\Components\TextInput::make('harga_jual')
                    ->numeric(),
                Forms\Components\TextInput::make('sku')
                    ->label('SKU'),
                Forms\Components\TextInput::make('barcode'),
                Forms\Components\TextInput::make('banyak')
                    ->numeric(),
                Forms\Components\TextInput::make('batas_stok_aman')
                    ->numeric(),
                Forms\Components\Toggle::make('pengiriman_bisa_dikembalikan'),
                Forms\Components\Toggle::make('pengiriman_mau_dikirim'),
                Forms\Components\Toggle::make('visibility'),
                Forms\Components\DatePicker::make('tersedia_sampai'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table








            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga_beli')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga_jual')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                Tables\Columns\TextColumn::make('barcode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('banyak')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('batas_stok_aman')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('pengiriman_bisa_dikembalikan')
                    ->boolean(),
                Tables\Columns\IconColumn::make('pengiriman_mau_dikirim')
                    ->boolean(),
                Tables\Columns\IconColumn::make('visibility')
                    ->boolean(),
                Tables\Columns\TextColumn::make('tersedia_sampai')
                    ->date()
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
            ->filters(
                [
                    QueryBuilder::make()
                        ->constraints([
                            TextConstraint::make('nama'),
                            TextConstraint::make('slug'),
                            TextConstraint::make('sku'),
                            TextConstraint::make('barcode'),
                            TextConstraint::make('description'),
                            NumberConstraint::make('compare_at_price'),
                            NumberConstraint::make('price'),
                            NumberConstraint::make('cost_per_item'),
                            NumberConstraint::make('kuantitas'),
                            NumberConstraint::make('stok_aman'),
                            BooleanConstraint::make('visibility'),
                            BooleanConstraint::make('featured'),
                            BooleanConstraint::make('backorder'),
                            BooleanConstraint::make('requires_shipping'),
                            DateConstraint::make('published_at'),
                        ])
                        ->constraintPickerColumns(2),
                ],
                layout: FiltersLayout::AboveContentCollapsible
            )

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
            'index' => Pages\ManageTokoProduks::route('/'),
        ];
    }
}
