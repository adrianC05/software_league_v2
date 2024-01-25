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
        $balance = Revenue::sum('value') - Expense::sum('value');
        $balanceColor = ($balance >= 0) ? 'success' : 'danger';
        return [
            Stat::make('Ingresos', '$ ' . number_format(Revenue::sum('value'), 2))
                ->description('Total de ingresos obtenidos')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            //->chart(Revenue::get()->pluck('value')->toArray()),

            Stat::make('Gastos', '$ ' . number_format(Expense::sum('value'), 2))
                ->description('Total de gastos realizados')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            //->chart(Expense::get()->pluck('value')->toArray()),


            // Gastos - Ingresos
            Stat::make('Balance', '$ ' . number_format($balance, 2))
                ->description('Balance de ingresos y gastos')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color($balanceColor),
        ];
    }
}
