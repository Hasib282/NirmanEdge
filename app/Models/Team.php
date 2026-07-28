<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function Category(){
        return $this->belongsTo(TeamCategory::class,'category_id','id');
    }
}
