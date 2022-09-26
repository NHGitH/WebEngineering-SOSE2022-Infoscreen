<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['room_id','course_id','name', 'user_id', 'date','time', 'module_id'];
    protected $guarded = [];
    protected $with = ['room','user','course', 'module'];

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class,'module_id');
    }

}
