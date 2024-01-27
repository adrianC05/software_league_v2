<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\GoalScorer;
use App\Models\Game;
use App\Models\LeagueTable;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function versus()
    {
        $vs = Game::with(['round', 'team1', 'team2'])
        ->orderBy('date', 'asc') // Ordenar por fecha ascendente
        ->orderBy('time', 'asc') // Luego ordenar por hora ascendente
        ->get();
        $resultados = LeagueTable::with(['team'])
        ->orderBy('points', 'desc')
        ->get();
        $goleadores = GoalScorer::with(['player.team'])->get(); 
    
        return view('welcome', compact('vs', 'goleadores', 'resultados'));

    }
    

}
