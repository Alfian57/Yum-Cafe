<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesananResource\Pages;
use App\Filament\Resources\PesananResource\RelationManagers;
use App\Models\Meja;
use App\Models\Pesanan;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
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
                Card::make()->schema([
                    Forms\Components\Select::make('id_user')
                        ->label('User')
                        ->options(User::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                    Forms\Components\Select::make('id_meja')
                        ->label('Masakan')
                        ->options(Meja::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                    Forms\Components\DateTimePicker::make('tanggal_pesanan')
                        ->required(),
                    Forms\Components\TextInput::make('total_harga')
                        ->numeric()
                        ->required(),
                    Forms\Components\TextInput::make('bayar')
                        ->numeric()
                        ->required(),
                    Forms\Components\TextInput::make('kembali')
                        ->numeric()
                        ->required(),
                    Forms\Components\Toggle::make('status_pesanan')
                        ->required(),
                    Forms\Components\Select::make('status_makanan_pesanan')
                        ->label('Status Pesanan')
                        ->searchable()
                        ->options([
                            'sedang diproses' => 'Sedang Diproses',
                            'siap antar' => 'Siap Antar',
                            'telah tersaji' => 'Telah Tersaji',
                            'telah dibawa pulang' => 'Telah Dibawa Pulang',
                        ])
                        ->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('meja.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_pesanan')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_harga')
                    ->sortable(),
                Tables\Columns\TextColumn::make('bayar')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kembali')
                    ->sortable(),
                Tables\Columns\IconColumn::make('status_pesanan')
                    ->boolean(),
                Tables\Columns\TextColumn::make('status_makanan_pesanan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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