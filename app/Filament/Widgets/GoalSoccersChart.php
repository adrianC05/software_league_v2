<?php

namespace App\Filament\Widgets;

use App\Models\GoalScorer;
use Filament\Widgets\ChartWidget;

class GoalSoccersChart extends ChartWidget
{
    protected static ?string $heading = 'Goleadores';
    protected static string $color = 'info';

    protected function getData(): array
    {
        // Obtiene los 5 jugadores con más goles
        $topScorers = GoalScorer::with('player')->orderByDesc('goals')->take(5)->get();

        return [
            // Muestra los goleadores con su número de goles
            'datasets' => [
                [
                    'label' => 'Goles Anotados',
                    'data' => $topScorers->pluck('goals')->toArray(),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            // Muestra los nombres de los 5 jugadores
            'labels' => $topScorers->pluck('player.name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
