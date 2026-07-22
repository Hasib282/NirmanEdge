<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    protected $casts = [
        'image' => 'array',
    ];

    public function Type(){
        return $this->belongsTo(Service::class,'type_id','id');
    }
}
