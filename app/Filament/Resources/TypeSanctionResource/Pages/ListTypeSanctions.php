<?php

namespace App\Filament\Resources\TypeSanctionResource\Pages;

use App\Filament\Resources\TypeSanctionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeSanctions extends ListRecords
{
    protected static string $resource = TypeSanctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
