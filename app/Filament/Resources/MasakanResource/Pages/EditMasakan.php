<?php

namespace App\Filament\Resources\MasakanResource\Pages;

use App\Filament\Resources\MasakanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasakan extends EditRecord
{
    protected static string $resource = MasakanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}