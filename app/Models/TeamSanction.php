<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamSanction extends Model
{
    use HasFactory;

    protected $guarded = [];

    // One "type of sanction" can have many "sanctioned teams".

    public function typeSanction()
    {
        return $this->belongsTo(TypeSanction::class);
    }

    // A team can have many team_sanctions

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
