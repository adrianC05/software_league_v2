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
                ->color('danger')
                ->chart(Expense::get()->pluck('value')->toArray()),

            Stat::make('Total de Ingresos', Revenue::sum('value'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart(Revenue::get()->pluck('value')->toArray()),

            // Gastos - Ingresos
            Stat::make('Balance',  Revenue::sum('value') - Expense::sum('value')),
        ];
    }
}
