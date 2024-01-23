<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\GoalScorer;
use App\Models\Player;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    

    public function mostrarGoleadores()
    {
        $goleadores = GoalScorer::with(['player.team'])->get(); 
        return view('welcome', compact('goleadores'));
    }
    
      
}
