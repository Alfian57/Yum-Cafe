<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailPesananResource\Pages;
use App\Filament\Resources\DetailPesananResource\RelationManagers;
use App\Models\DetailPesanan;
use App\Models\Masakan;
use App\Models\Pesanan;
use Filament\Forms;
use Filament\Forms\Components\Card;
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
        $pesanan = Pesanan::join('users', 'pesanan.id_user', '=', 'users.id')->get();

        foreach ($pesanan as $item) {
            $data = [
                $item->id => $item->tanggal_pesanan . ' ' . $item->name
            ];
        }

        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Select::make('id_pesanan')
                        ->label('Pesanan')
                        ->options($data)
                        ->searchable()
                        ->required(),
                    Forms\Components\Select::make('id_masakan')
                        ->label('Masakan')
                        ->options(Masakan::all()->pluck('nama_masakan', 'id'))
                        ->searchable()
                        ->required(),
                    Forms\Components\TextInput::make('qty')
                        ->numeric()
                        ->required(),
                    Forms\Components\TextInput::make('sub_total')
                        ->numeric()
                        ->required(),
                    Forms\Components\Textarea::make('keterangan_pesanan')
                        ->required()
                        ->maxLength(65535),
                    Forms\Components\Select::make('status_detail_masakan')
                        ->label('Status Masakan')
                        ->options([
                            'dimasak' => 'Dimasak',
                            'sudah siap' => 'Sudah Siap',
                        ])
                        ->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pesanan.tanggal_pesanan')
                    ->label("Tanggal Pesanan")
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('id_masakan')
                    ->label("Masakan")
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('qty')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sub_total')
                    ->sortable(),
                Tables\Columns\TextColumn::make('keterangan_pesanan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_detail_masakan')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListDetailPesanans::route('/'),
            'create' => Pages\CreateDetailPesanan::route('/create'),
            'edit' => Pages\EditDetailPesanan::route('/{record}/edit'),
        ];
    }
}