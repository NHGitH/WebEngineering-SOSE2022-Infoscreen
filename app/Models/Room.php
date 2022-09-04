<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = [];
    protected $with = ['veranstaltung', 'gebaude'];

    public function veranstaltung()
    {
        return $this->hasMany(Veranstaltung::class);
    }

    public function gebaude()
    {
        return $this->belongsTo(Gebaude::class);
    }
}
