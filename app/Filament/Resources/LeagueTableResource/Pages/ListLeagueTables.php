<?php

namespace App\Filament\Resources\LeagueTableResource\Pages;

use App\Filament\Resources\LeagueTableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLeagueTables extends ListRecords
{
    protected static string $resource = LeagueTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
