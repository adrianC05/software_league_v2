<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeagueTable extends Model
{
    use HasFactory;

    protected $guarded = [];

    // A team has many results(League Table)
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

}
