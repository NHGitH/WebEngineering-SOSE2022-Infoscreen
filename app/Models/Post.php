<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id', 'picture_path', 'published_at'];
    protected $guarded = [];
    protected $with = ['author'];

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['post'] ?? false, function ($query, $post) {
            $query
                ->where('title', 'like', '%' . $post . '%')                
                ->orWhere('body', 'like', '%' . $post . '%')
                ->orWhereHas('author', fn($query) => $query->where('name', 'like', '%' . $post . '%'));
                
        });
    }
}
