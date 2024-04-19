<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TokoOrderResource\Pages;
use App\Filament\Resources\TokoOrderResource\RelationManagers;
use App\Models\TokoOrder;
use App\Models\TokoProduk;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Forms\Set;
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
                            Forms\Components\TextInput::make('nomor')
                                ->columnSpan(3),
                            Forms\Components\Select::make('customer_id')
                                ->relationship('customer', 'nama')
                                ->native(false)
                                ->searchable()
                                ->preload()
                                ->createOptionForm([
                                    TextInput::make('nama'),
                                    TextInput::make('email')
                                        ->email(),
                                    TextInput::make('hp'),
                                    Select::make('gender')
                                        ->native(false)
                                        ->options([
                                            'pria' => 'Pria',
                                            'wanita' => 'Wanita',
                                        ]),
                                ])
                                ->columnSpan(3),
                            Forms\Components\ToggleButtons::make('status')
                                ->options([
                                    'baru' => 'Baru',
                                    'diproses' => 'Diproses',
                                    'diantarkan' => 'Diantarkan',
                                    'sudah_sampai' => 'Sudah Sampai',
                                    'dibatalkan' => 'Dibatalkan',
                                ])
                                ->icons([
                                    'baru' => 'heroicon-o-sparkles',
                                    'diproses' => 'heroicon-o-arrow-path',
                                    'diantarkan' => 'heroicon-o-truck',
                                    'sudah_sampai' => 'heroicon-o-check-badge',
                                    'dibatalkan' => 'heroicon-o-x-circle',
                                ])

                                ->inline()
                                ->columnSpan(3),
                            Forms\Components\Select::make('mata_uang_id')
                                ->relationship('mataUang', 'nama')
                                ->createOptionForm([
                                    TextInput::make('nama')
                                ])
                                ->preload()
                                ->searchable()
                                ->native(false)
                                ->columnSpan(3),
                            Forms\Components\Select::make('negara_id')
                                ->native(false)
                                ->preload()
                                ->searchable()
                                ->relationship('negara', 'nama')
                                ->createOptionForm([
                                    TextInput::make('nama')
                                ])
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('jalan')
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('kota')
                                ->columnSpan(2),
                            Forms\Components\TextInput::make('provinsi')
                                ->columnSpan(2),
                            Forms\Components\TextInput::make('kode_pos')
                                ->columnSpan(2),
                            Forms\Components\RichEditor::make('catatan')
                                ->columnSpanFull(),
                        ])
                        ->columns(6),
                    Step::make('Order Items')
                        ->schema([
                            Repeater::make('orderDetail')
                                ->schema([
                                    Select::make('produk_id')
                                        ->preload()
                                        ->searchable()
                                        ->live()
                                        ->native(false)
                                        ->afterStateUpdated(function (Set $set, $state) {
                                            $data = TokoProduk::find($state)
                                                ->harga_jual;
                                            $set('harga_jual', $data);
                                        })
                                        ->createOptionForm([
                                            TextInput::make('nama'),
                                            TextInput::make('harga_jual')
                                                ->numeric(),
                                        ])
                                        ->relationship('produk', 'nama'),
                                    TextInput::make('banyaknya'),
                                    TextInput::make('harga_jual')
                                        ->disabled(),
                                ])
                                ->columns(3)
                        ]),

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
