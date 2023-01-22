<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasakanResource\Pages;
use App\Filament\Resources\MasakanResource\RelationManagers;
use App\Models\Masakan;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasakanResource extends Resource
{
    protected static ?string $model = Masakan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'System Management';
    protected static ?string $navigationLabel = 'Masakan';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('nama_masakan')
                        ->required()
                        ->unique()
                        ->maxLength(255),
                    Forms\Components\Select::make('type')
                        ->required()
                        ->options([
                            "makanan" => 'Makanan',
                            "minuman" => 'Minuman',
                        ]),
                    Forms\Components\Select::make('status_masakan')
                        ->required()
                        ->options([
                            "tersedia" => 'Tersedia',
                            "habis" => 'Habis',
                        ]),
                    Forms\Components\TextInput::make('harga')
                        ->numeric()
                        ->required(),
                    SpatieMediaLibraryFileUpload::make('image')
                        ->image()
                        ->required()
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_masakan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_masakan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga')
                    ->sortable(),
                SpatieMediaLibraryImageColumn::make('image'),
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
            'index' => Pages\ListMasakans::route('/'),
            'create' => Pages\CreateMasakan::route('/create'),
            'edit' => Pages\EditMasakan::route('/{record}/edit'),
        ];
    }
}