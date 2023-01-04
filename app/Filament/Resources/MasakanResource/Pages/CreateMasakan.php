<?php

namespace App\Filament\Resources\MasakanResource\Pages;

use App\Filament\Resources\MasakanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMasakan extends CreateRecord
{
    protected static string $resource = MasakanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}