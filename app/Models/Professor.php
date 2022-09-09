<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = [];
    protected $with = ['module', 'course'];

    public function module()
    {
        return $this->hasMany(Module::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}