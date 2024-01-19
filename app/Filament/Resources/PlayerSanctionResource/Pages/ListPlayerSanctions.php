<?php

namespace App\Filament\Resources\PlayerSanctionResource\Pages;

use App\Filament\Resources\PlayerSanctionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlayerSanctions extends ListRecords
{
    protected static string $resource = PlayerSanctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
