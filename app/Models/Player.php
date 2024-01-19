<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $guarded = [];

    // A team has many players
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // A player has many goal scorers
    public function goalScorers()
    {
        return $this->hasMany(GoalScorer::class);
    }

    // A player can have many sanctions
    public function playerSanctions()
    {
        return $this->hasMany(PlayerSanction::class);
    }
}
