<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalScorer extends Model
{
    use HasFactory;

    protected $guarded = [];

    // A player has many goal scorers
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
