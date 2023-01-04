<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesananResource\Pages;
use App\Filament\Resources\PesananResource\RelationManagers;
use App\Models\Pesanan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PesananResource extends Resource
{
    protected static ?string $model = Pesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'System Management';
    protected static ?string $navigationLabel = 'Pesanan';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_user')
                    ->required(),
                Forms\Components\TextInput::make('no_meja')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_pesanan')
                    ->required(),
                Forms\Components\TextInput::make('total_harga')
                    ->required(),
                Forms\Components\TextInput::make('bayar')
                    ->required(),
                Forms\Components\TextInput::make('kembali')
                    ->required(),
                Forms\Components\Toggle::make('status_pesanan')
                    ->required(),
                Forms\Components\TextInput::make('status_makanan_pesanan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_user'),
                Tables\Columns\TextColumn::make('no_meja'),
                Tables\Columns\TextColumn::make('tanggal_pesanan')
                    ->date(),
                Tables\Columns\TextColumn::make('total_harga'),
                Tables\Columns\TextColumn::make('bayar'),
                Tables\Columns\TextColumn::make('kembali'),
                Tables\Columns\IconColumn::make('status_pesanan')
                    ->boolean(),
                Tables\Columns\TextColumn::make('status_makanan_pesanan'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesanans::route('/'),
            'create' => Pages\CreatePesanan::route('/create'),
            'edit' => Pages\EditPesanan::route('/{record}/edit'),
        ];
    }
}