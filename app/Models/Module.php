<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $guarded = [];
    //protected $with = ['room', 'professor'];

    // public function room()
    // {
    //     return $this->belongsTo(Room::class);
    // }

    // public function professor()
    // {
    //     return $this->hasOne(Professor::class);
    // }
}
