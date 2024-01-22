<?php

namespace App\Filament\Resources\ExpenseResource\Widgets;

use App\Models\Expense;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;

class ExpenseCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [

            // Get total expenses, column name: 'value'
            Card::make('Total de Gastos', Expense::sum('value')),
        ];
    }
}
