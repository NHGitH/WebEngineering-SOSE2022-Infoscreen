<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'post_id', 'module_id', 'building_id'];
    protected $guarded = [];
    protected $with = ['room','post', 'module'];

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

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

}
