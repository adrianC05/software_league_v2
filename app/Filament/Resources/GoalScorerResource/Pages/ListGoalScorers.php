<?php

namespace App\Filament\Resources\GoalScorerResource\Pages;

use App\Filament\Resources\GoalScorerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGoalScorers extends ListRecords
{
    protected static string $resource = GoalScorerResource::class;
    protected ?string $heading = 'Goleadores';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
