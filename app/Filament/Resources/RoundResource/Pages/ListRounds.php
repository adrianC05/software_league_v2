<?php

namespace App\Filament\Resources\RoundResource\Pages;

use App\Filament\Resources\RoundResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRounds extends ListRecords
{
    protected static string $resource = RoundResource::class;
    protected ?string $heading = 'Rondas';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
