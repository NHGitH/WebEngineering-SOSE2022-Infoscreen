<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['name','picture_path'];
    protected $guarded = [];

    public function module()
    {
        return $this->hasMany(Module::class);
    }
}