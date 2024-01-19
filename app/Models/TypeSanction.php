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
}
