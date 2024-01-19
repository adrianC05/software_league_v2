<?php

namespace App\Filament\Resources\GoalScorerResource\Pages;

use App\Filament\Resources\GoalScorerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGoalScorer extends EditRecord
{
    protected static string $resource = GoalScorerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
