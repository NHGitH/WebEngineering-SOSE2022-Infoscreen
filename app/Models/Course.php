<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name','building_id'];
    protected $guarded = [];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}