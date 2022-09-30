<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'module_id', 'building_id'];
    protected $guarded = [];
    protected $with = ['post', 'module'];

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['news'] ?? false, function ($query, $news) {
            $query
                ->whereHas('post', fn($query) => $query->where('title', 'like', '%' . $news . '%'))
                ->orWhereHas('module', fn($query) => $query->where('name', 'like', '%' . $news . '%'))
                ->orWhereHas('building', fn($query) => $query->where('name', 'like', '%' . $news . '%'));
                
        });
    }

}
