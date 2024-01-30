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
        // Obtiene los 5 jugadores con más goles y la suma de sus goles
        $topScorers = GoalScorer::with('player')
            ->selectRaw('player_id, SUM(goals) as total_goals')
            ->groupBy('player_id')
            ->orderByDesc('total_goals')
            ->take(5)
            ->get();

        return [
            // Muestra los goleadores con su número total de goles
            'datasets' => [
                [
                    'label' => 'Goles Anotados',
                    'data' => $topScorers->pluck('total_goals')->toArray(),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            // Muestra los nombres de los 5 jugadores
            'labels' => $topScorers->map(function ($scorer) {
                return $scorer->player->name;
            })->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
