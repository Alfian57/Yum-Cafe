<?php

namespace App\Filament\Resources\DetailPesananResource\Pages;

use App\Filament\Resources\DetailPesananResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDetailPesanans extends ListRecords
{
    protected static string $resource = DetailPesananResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
