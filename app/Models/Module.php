<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['room_id','course_id','building_id','name', 'user_id', 'date','time'];
    protected $guarded = [];
    protected $with = ['user','course'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['module'] ?? false, function ($query, $module) {
            $query
                ->where('name', 'like', '%' . $module . '%')
                ->orWhereHas('user', fn($query) => $query->where('name', 'like', '%' . $module . '%'))
                ->orWhereHas('course', fn($query) => $query->where('name', 'like', '%' . $module . '%'));
                
        });
    }
}
