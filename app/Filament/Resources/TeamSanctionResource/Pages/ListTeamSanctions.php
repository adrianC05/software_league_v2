<?php

namespace App\Filament\Resources\TeamSanctionResource\Pages;

use App\Filament\Resources\TeamSanctionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeamSanctions extends ListRecords
{
    protected static string $resource = TeamSanctionResource::class;
    protected ?string $heading = 'Sanciones de equipos';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
