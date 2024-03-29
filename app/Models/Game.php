<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function round()
    {
        return $this->belongsTo(Round::class);
    }
    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    // One game has many goal scorers
    public function goalScorers()
    {
        return $this->hasMany(GoalScorer::class);
    }


    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    // One game has many player sanctions
    public function playerSanctions(){
        return $this->hasMany(PlayerSanction::class);
    }
}
