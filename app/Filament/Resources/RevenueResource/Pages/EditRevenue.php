<?php

namespace App\Filament\Resources\RevenueResource\Pages;

use App\Filament\Resources\RevenueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRevenue extends EditRecord
{
    protected static string $resource = RevenueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
