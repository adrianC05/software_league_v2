<?php

namespace App\Filament\Resources\TeamSanctionResource\Pages;

use App\Filament\Resources\TeamSanctionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeamSanction extends EditRecord
{
    protected static string $resource = TeamSanctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
