<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerSanction extends Model
{
    use HasFactory;

    protected $guarded = [];

    // One type of "sanction type" has many "sanctioned players".

    public function typeSanction()
    {
        return $this->belongsTo(TypeSanction::class);
    }

    // A player can have many sanctions
    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    // A game can have many player sanctions
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
