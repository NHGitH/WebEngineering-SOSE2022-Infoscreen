<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['room_id','courses_id','building_id','name', 'professors_id', 'date','time'];
    protected $guarded = [];
    protected $with = ['room','professor','course'];

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class,'professors_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'courses_id');
    }

}
