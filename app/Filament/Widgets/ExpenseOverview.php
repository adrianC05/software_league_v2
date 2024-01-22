<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use App\Models\Revenue;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ExpenseOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total de Gastos', Expense::sum('value'))
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                // Chart segun los gastos
                ->chart(Expense::get()->pluck('value')->toArray())
                ->color('danger'),
            Stat::make('Total de Ingresos', Revenue::sum('value'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                // Chart segun los ingresos
                ->chart(Revenue::get()->pluck('value')->toArray())
                ->color('success'),
            // Gastos - Ingresos
            Stat::make('Balance',  Revenue::sum('value') - Expense::sum('value')),
        ];
    }
}
