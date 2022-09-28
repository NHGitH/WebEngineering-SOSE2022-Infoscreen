<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

        public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query
                ->wherehas('rooms', fn($query)=> $query->where('name'),$search);
        });
        $query->when($filters['building'] ?? false, function ($query, $building) {
            $query
                ->where('name', 'like', '%' . $building . '%');
        });
    }


    protected $fillable = [
        'name',
    ];
}