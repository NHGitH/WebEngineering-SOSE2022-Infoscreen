<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['building'];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class,'buildings_id');
    }
}
