<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['room_id','name', 'user_id', 'date','time', 'module_id'];
    protected $guarded = [];
    protected $with = ['room','user', 'module'];

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class,'module_id');
    }
}
