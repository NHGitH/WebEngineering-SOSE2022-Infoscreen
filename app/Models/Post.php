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

    public function building(){
        return $this->belongsTo(Building::class,'building_id');
    }

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
