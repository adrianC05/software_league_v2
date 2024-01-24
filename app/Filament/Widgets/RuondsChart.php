<?php

namespace App\Filament\Widgets;

use App\Models\Round;
use Filament\Widgets\ChartWidget;

class RuondsChart extends ChartWidget
{
    protected static ?string $heading = 'Rondas y partidos';

    protected function getData(): array
    {
        // Definir colores para cada parte del círculo
        $colors = ['#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FFCD56', '#4BC0C0', '#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FFCD56', '#4BC0C0', '#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FFCD56', '#4BC0C0', '#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FFCD56', '#4BC0C0'];
        return [
            // Muestra el numero de partidos por ronda
            'datasets' => [
                [
                    'label' => 'Partidos',
                    // Cuenta el numero de partidos en el modelo game
                    'data' => (new Round)->get()->map(function ($round) {
                        return $round->games->count();
                    })->toArray(),
                    'backgroundColor' => $colors,
                    'borderColor' => '#9BD0F5',
                    'hoverOffset' => 7,
                    // animation.animateScale
                ],
            ],
            // Muestra los nombres de las rondas
            'labels' => (new Round)->get()->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
