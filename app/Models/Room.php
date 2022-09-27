<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['building'];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query
                ->where('name', 'like', '%' . $search . '%');
        });
        $query->when($filters['building'] ?? false, function ($query, $building) {
            $query
                ->whereHas('building', fn ($query) => $query->where('name', $building));
        });
    }

    protected $fillable = [
        'name',
        'building_id',
    ];
}
