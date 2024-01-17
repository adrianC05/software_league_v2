<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Muchos equipos pueden tener muchos grupos
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'team_group')->withTimestamps();
    }
    public function games1()
    {
        return $this->hasMany(Game::class, 'team1_id');
    }

    public function games2()
    {
        return $this->hasMany(Game::class, 'team2_id');
    }
}
