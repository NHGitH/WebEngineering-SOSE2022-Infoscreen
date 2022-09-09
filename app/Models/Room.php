<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = [];
    protected $with = ['module', 'building'];

    public function module()
    {
        return $this->hasMany(Module::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
