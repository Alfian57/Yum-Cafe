<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailPesananResource\Pages;
use App\Filament\Resources\DetailPesananResource\RelationManagers;
use App\Models\DetailPesanan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailPesananResource extends Resource
{
    protected static ?string $model = DetailPesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'System Management';
    protected static ?string $navigationLabel = 'Detail Pesanan';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_pesanan')
                    ->required(),
                Forms\Components\TextInput::make('id_masakan')
                    ->required(),
                Forms\Components\TextInput::make('qty')
                    ->required(),
                Forms\Components\TextInput::make('sub_total')
                    ->required(),
                Forms\Components\Textarea::make('keterangan_pesanan')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('status_detail_masakan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_pesanan'),
                Tables\Columns\TextColumn::make('id_masakan'),
                Tables\Columns\TextColumn::make('qty'),
                Tables\Columns\TextColumn::make('sub_total'),
                Tables\Columns\TextColumn::make('keterangan_pesanan'),
                Tables\Columns\TextColumn::make('status_detail_masakan'),
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
            'index' => Pages\ListDetailPesanans::route('/'),
            'create' => Pages\CreateDetailPesanan::route('/create'),
            'edit' => Pages\EditDetailPesanan::route('/{record}/edit'),
        ];
    }
}