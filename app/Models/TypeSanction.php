<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSanction extends Model
{
    use HasFactory;

    protected $guarded = [];

    // One "type of sanction" can have many "sanctioned teams".

    public function teamSanctions()
    {
        return $this->hasMany(TeamSanction::class);
    }

    // One type of "sanction type" has many "sanctioned players".
    public function playerSanctions()
    {
        return $this->hasMany(PlayerSanction::class);
    }
}
