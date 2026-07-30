<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamCategory extends Model
{
    protected $guarded = [];

    public function team()
    {
        return $this->hasMany(Team::class, 'category_id');
    }
}
