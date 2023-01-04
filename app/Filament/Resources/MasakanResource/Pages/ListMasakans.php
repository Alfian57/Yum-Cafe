<?php

namespace App\Filament\Resources\MasakanResource\Pages;

use App\Filament\Resources\MasakanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasakans extends ListRecords
{
    protected static string $resource = MasakanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
