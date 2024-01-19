<?php

namespace App\Filament\Resources\PlayerSanctionResource\Pages;

use App\Filament\Resources\PlayerSanctionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayerSanction extends EditRecord
{
    protected static string $resource = PlayerSanctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
