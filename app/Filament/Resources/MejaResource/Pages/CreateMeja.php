<?php

namespace App\Filament\Resources\MejaResource\Pages;

use App\Filament\Resources\MejaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMeja extends CreateRecord
{
    protected static string $resource = MejaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}