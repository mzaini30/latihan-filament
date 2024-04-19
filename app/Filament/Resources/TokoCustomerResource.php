<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TokoCustomerResource\Pages;
use App\Filament\Resources\TokoCustomerResource\RelationManagers;
use App\Models\TokoCustomer;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TokoCustomerResource extends Resource
{
    protected static ?string $model = TokoCustomer::class;

    protected static ?string $navigationGroup = 'Toko';
    protected static ?string $pluralModelLabel = 'Customer';
    protected static ?string $slug = 'toko/customer';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        Forms\Components\TextInput::make('nama')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->email(),
                        Forms\Components\TextInput::make('hp')
                            ->label('HP'),
                        Forms\Components\DatePicker::make('tanggal_lahir')
                            ->native(false)
                            ->label('Tanggal Lahir'),

                    ]),
                    Section::make([
                        Placeholder::make('created_at')
                            ->content(fn (TokoCustomer $record): string => $record->created_at?->diffForHumans()),
                        Placeholder::make('updated_at')
                            ->content(fn (TokoCustomer $record): string => $record->created_at?->diffForHumans()),

                    ])
                        /* ->hidden(fn (?TokoCustomer $record): string => $record == null) */
                        ->hiddenOn('create')
                        ->grow(false)
                ])










            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                /* Tables\Columns\TextColumn::make('id') */
                /* ->label('ID') */
                /* ->searchable(), */
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                /* Tables\Columns\TextColumn::make('negara') */
                /* ->searchable(), */
                Tables\Columns\TextColumn::make('hp')
                    ->label('HP')
                    ->searchable(),
                /* Tables\Columns\TextColumn::make('tanggal_lahir') */
                /* ->date() */
                /* ->label('Tanggal Lahir') */
                /* ->sortable(), */
                /* Tables\Columns\TextColumn::make('created_at') */
                /* ->dateTime() */
                /* ->sortable() */
                /* ->toggleable(isToggledHiddenByDefault: true), */
                /* Tables\Columns\TextColumn::make('updated_at') */
                /* ->dateTime() */
                /* ->sortable() */
                /* ->toggleable(isToggledHiddenByDefault: true), */
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
            'index' => Pages\ManageTokoCustomers::route('/'),
        ];
    }
}
