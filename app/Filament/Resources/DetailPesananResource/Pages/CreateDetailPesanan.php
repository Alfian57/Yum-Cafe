<?php

namespace App\Filament\Resources\DetailPesananResource\Pages;

use App\Filament\Resources\DetailPesananResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDetailPesanan extends CreateRecord
{
    protected static string $resource = DetailPesananResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}