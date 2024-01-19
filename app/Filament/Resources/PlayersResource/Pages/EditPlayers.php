<?php

namespace App\Filament\Resources\PlayersResource\Pages;

use App\Filament\Resources\PlayersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayers extends EditRecord
{
    protected static string $resource = PlayersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
